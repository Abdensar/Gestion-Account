<?php
class Client {
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $idCity;

    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($firstname, $lastname, $email, $password, $idCity) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->idCity = $idCity;
    }

    public function insertClient($conn) {
        $sql = "INSERT INTO Clients (firstname, lastname, email, password, idCity)
                VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->idCity')";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "Client added successfully!";
        } else {
            self::$errorMsg = "Error: " . mysqli_error($conn);
        }
    }

    public static function selectAllClients($conn) {
        $sql = "SELECT Clients.*, Cities.cityName 
                FROM Clients 
                LEFT JOIN Cities ON Clients.idCity = Cities.id";
        $result = mysqli_query($conn, $sql);
        $clients = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $clients[] = $row;
        }
        return $clients;
    }

    public static function deleteClient($conn, $id) {
        $sql = "DELETE FROM Clients WHERE id = $id";
        mysqli_query($conn, $sql);
    }

    public static function selectClientById($conn, $id) {
        $sql = "SELECT * FROM Clients WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function updateClient($conn, $id, $firstname, $lastname, $email, $idCity) {
        $sql = "UPDATE Clients SET 
                firstname = '$firstname', 
                lastname = '$lastname', 
                email = '$email',
                idCity = '$idCity'
                WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}
?>
