<?php
class AuthorModel
{
    private $table = 'author';
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả tác giả (id + name) để dùng cho dropdown
    public function readAll()
    {
        $sql  = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
