<?php
require '../config/connection.php';
require '../models/Client.php';
require '../models/City.php';

$connection = new Connection();
$connection->selectDatabase("tpCRUD");

$id = $_GET['id'];
$client = Client::selectClientById($connection->conn, $id);

$cities = City::selectAllCities($connection->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    Client::updateClient($connection->conn, $id, $fname, $lname, $email, $city);
    header("Location: read.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2>Update Client</h2>
    <form method="post">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $client['firstname'] ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $client['lastname'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $client['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select name="city" id="city" class="form-select">
                <?php foreach ($cities as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $client['idCity'] ? 'selected' : '' ?>><?= $c['cityName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="read.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
