<?php
class Database
{
    private $host = "localhost";
    private $db_name = "minhph68313_test";
    private $username = "root";
    private $password = "Ntqm21092007";
    public $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, $options);
            echo "Connected successfully";
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
