<?php
require '../config/connection.php';
require '../models/Client.php';

$connection = new Connection();
$connection->selectDatabase("tpCRUD");

$clients = Client::selectAllClients($connection->conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2>Clients List</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add New Client</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client['id'] ?></td>
                <td><?= $client['firstname'] ?></td>
                <td><?= $client['lastname'] ?></td>
                <td><?= $client['email'] ?></td>
                <td><?= $client['cityName'] ?></td>
                <td>
                    <a href="update.php?id=<?= $client['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $client['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
