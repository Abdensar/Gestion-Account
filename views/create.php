<?php
require '../config/connection.php';
require '../models/Client.php';
require '../models/City.php';

$connection = new Connection();
$connection->selectDatabase("tpCRUD");

$fname = $lname = $email = $password = $city = "";
$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];

    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($city)) {
        $error = "All fields are required.";
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
        $error = "Password must be at least 8 characters long and include an uppercase letter.";
    } else {
        $client = new Client($fname, $lname, $email, $password, $city);
        $client->insertClient($connection->conn);
        $error = Client::$errorMsg;
        $success = Client::$successMsg;
    }
}

$cities = City::selectAllCities($connection->conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2>Create Client</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-warning"><?= $error ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $fname ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $lname ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select name="city" id="city" class="form-select">
                <option value="">Select City</option>
                <?php foreach ($cities as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['cityName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="read.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
