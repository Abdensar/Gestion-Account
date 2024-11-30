<?php
require '../config/connection.php';
require '../models/Client.php';

$connection = new Connection();
$connection->selectDatabase("tpCRUD");

$id = $_GET['id'];
Client::deleteClient($connection->conn, $id);

header("Location: read.php");
?>
