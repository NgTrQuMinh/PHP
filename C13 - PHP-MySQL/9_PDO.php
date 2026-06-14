<?php
$host = 'localhost';
$dbname = 'school'; // ten database
$user_db = 'root';
$pass_db = 'Ntqm21092007';

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $conn = new PDO("mysql::host= $host; dbname=$dbname", $user_db, $pass_db, $options);
    // echo "<pre>";
    // print_r($conn);
    // echo "</pre>";
    echo "OK";
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}


class Database
{
    private $host = 'localhost';
    private $db_name   = 'quan_ly_cua_hang';
    private $user_db = 'root';
    private $pass_db = 'Ntqm21092007';
    private $conn;

    public function KetNoi()
    {
        $this->conn = null;
        try {
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Báo lỗi dạng ngoại lệ (Exception)
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Trả dữ liệu về dạng mảng dữ liệu (Array) dễ dùng
            ];
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->user_db, $this->pass_db, $options);
        } catch (PDOException $error) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $error->getMessage();
        }
        return $this->conn;
    }
}
