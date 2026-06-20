<?php
class Database
{
    private $host     = 'localhost';
    private $db_name  = 'minhph68313_test';
    private $user     = 'root';
    private $password = 'Ntqm21092007';

    public function connect()
    {
        $option = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name;charset=utf8",
                $this->user,
                $this->password,
                $option
            );
            return $conn;                           // ← FIX: bỏ echo, chỉ return
        } catch (PDOException $e) {
            die("Lỗi kết nối CSDL: " . $e->getMessage());
        }
    }
}
