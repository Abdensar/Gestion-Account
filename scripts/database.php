<?php
require '../config/connection.php';

$connection = new Connection();
$connection->createDatabase("tpCRUD");
$connection->selectDatabase("tpCRUD");

$citiesTable = "
CREATE TABLE IF NOT EXISTS Cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cityName VARCHAR(50) NOT NULL
)";

$clientsTable = "
CREATE TABLE IF NOT EXISTS Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idCity INT,
    FOREIGN KEY (idCity) REFERENCES Cities(id)
)";

$connection->createTable($citiesTable);
$connection->createTable($clientsTable);
?>
