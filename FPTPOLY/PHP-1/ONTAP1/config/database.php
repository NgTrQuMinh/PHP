<?php
class Database
{
    private $host = 'localhost';
    private $dbname = 'minhph68313_test';
    private $user = 'root';
    private $pass = 'Ntqm21092007';
    public $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->user, $this->pass, $option);
            // echo "Connect OK";
        } catch (PDOException $th) {
            echo("Kết nối thất bại: " . $th->getMessage());
        }
        return $this->conn;
    }
}
