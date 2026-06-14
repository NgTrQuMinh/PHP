<?php
// File này chịu trách nhiệm kết nối DB thông qua PDO và lấy danh sách sách lên dưới dạng mảng.
class BookModel
{
    private $conn;

    // Hàm khởi tạo: Tự động kết nối DB khi Model được gọi
    public function __construct()
    {
        $host = "localhost";
        $db_name = "quan_ly_sach";
        $username = "root";
        $password = "Ntqm21092007";

        try {
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Lỗi kết nối Database: " . $exception->getMessage());
        }
    }

    // Hàm lấy toàn bộ danh sách sách
    public function getAllBooks()
    {
        $query = "SELECT * FROM books";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Trả về mảng dữ liệu sạch (Array)
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
