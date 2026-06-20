<?php
class bookmodel
{
    private $conn;
    private $table = 'books';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả sách
    public function readAll()
    {
        $sql  = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy 1 sách theo ID
    public function read($id)
    {
        $sql  = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Thêm sách mới
    public function create($title, $cover_image, $author, $publisher, $publish_date)
    {
        $sql  = "INSERT INTO $this->table (title, cover_image, author, publisher, publish_date)
                 VALUES (:title, :cover_image, :author, :publisher, :publish_date)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':title'        => $title,
            ':cover_image'  => $cover_image,
            ':author'       => $author,
            ':publisher'    => $publisher,
            ':publish_date' => $publish_date,
        ]);
    }

    // Cập nhật sách
    public function update($id, $title, $cover_image, $author, $publisher, $publish_date)
    {
        $sql  = "UPDATE $this->table
                 SET title        = :title,
                     cover_image  = :cover_image,
                     author       = :author,
                     publisher    = :publisher,
                     publish_date = :publish_date
                 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':title'        => $title,
            ':cover_image'  => $cover_image,
            ':author'       => $author,
            ':publisher'    => $publisher,
            ':publish_date' => $publish_date,
            ':id'           => $id,
        ]);
    }

    // Xóa sách
    public function delete($id)
    {
        $sql  = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
