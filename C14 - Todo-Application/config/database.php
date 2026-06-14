<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'todo_app_mysqli_oop';
    private $db_user = 'root';
    private $db_pass = 'Ntqm21092007';
    public $conn;

    public function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        $this->conn = null; // gan co
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->db_user, $this->db_pass, $option);
        } catch (PDOException $th) {
            echo "Error" . $th->getMessage();
        }
        return $this->conn;
    }
}
