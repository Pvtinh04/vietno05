<?php
class Database {
    public $hostname = 'localhost';
    public $dbName = 'no05';
    public $username = 'root';
    public $password = 'root';

    public $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>