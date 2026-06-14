<?php
class Database
{
    private $host = "localhost";
    private $dbname = "todo_db";
    private $username = "root";
    private $password = "Ntqm21092007";
    public $conn;

    public function connect()
    {
        $this->conn = null;
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4",
                $this->username,
                $this->password,
                $option
            );
        } catch (PDOException $th) {
            die("Lỗi kết nối CSDL: " . $th->getMessage());
        }

        return $this->conn;
    }
}
