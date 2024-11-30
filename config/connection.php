<?php
class Connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tpCRUD";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function createDatabase($dbName)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if (mysqli_query($this->conn, $sql)) {
            echo "Database created or exists already.<br>";
        } else {
            echo "Error creating database: " . mysqli_error($this->conn);
        }
    }

    public function selectDatabase($dbName)
    {
        mysqli_select_db($this->conn, $dbName);
    }
    public function createTable($query)
    {
        if (mysqli_query($this->conn, $query)) {
            echo "Table created successfully or exists already.<br>";
        } else {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }
}
