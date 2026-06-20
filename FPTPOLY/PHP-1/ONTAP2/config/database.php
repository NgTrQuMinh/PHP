<?php
class Database
{
    private $host = 'localhost';
    private $dbname = 'quanly_nhanvien';
    private $user = 'root';
    private $pass = 'Ntqm21092007';
    public $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->user, $this->pass, $option);
        } catch (PDOException $th) {
            echo "Connection error: " . $th->getMessage();
        }
        return $this->conn;
    }
}
