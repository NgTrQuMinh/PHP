<?php
class Database
{
    private $host     = 'localhost';
    private $user     = 'root';
    private $password = 'Ntqm21092007';   // ← đổi lại password của bạn
    private $db_name  = 'ph68313_test2';

    public function connect()
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name;charset=utf8",
                $this->user,
                $this->password,
                $options
            );
            return $conn;
        } catch (PDOException $e) {
            die("Lỗi kết nối CSDL: " . $e->getMessage());
        }
    }
}
