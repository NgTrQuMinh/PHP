<?php
class BookModel
{
    private $table = 'books';
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả sách, kèm tên tác giả
    public function readAll()
    {
        $sql  = "SELECT books.*, author.name AS author_name
                 FROM $this->table
                 INNER JOIN author ON books.author_id = author.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy 1 cuốn sách theo id
    public function read($id)
    {
        $sql  = "SELECT books.*, author.name AS author_name
                 FROM $this->table
                 INNER JOIN author ON books.author_id = author.id
                 WHERE books.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Thêm sách mới
    public function create($title, $cover_image, $author_id, $publisher, $publish_date)
    {
        $sql  = "INSERT INTO $this->table (title, cover_image, author_id, publisher, publish_date)
                 VALUES (:title, :cover_image, :author_id, :publisher, :publish_date)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':title'        => $title,
            ':cover_image'  => $cover_image,
            ':author_id'    => $author_id,
            ':publisher'    => $publisher,
            ':publish_date' => $publish_date,
        ]);
    }

    // Cập nhật sách
    public function update($id, $title, $cover_image, $author_id, $publisher, $publish_date)
    {
        $sql  = "UPDATE $this->table
                 SET title        = :title,
                     cover_image  = :cover_image,
                     author_id    = :author_id,
                     publisher    = :publisher,
                     publish_date = :publish_date
                 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':title'        => $title,
            ':cover_image'  => $cover_image,
            ':author_id'    => $author_id,
            ':publisher'    => $publisher,
            ':publish_date' => $publish_date,
            ':id'           => $id,
        ]);
    }

    // Xoá sách
    public function delete($id)
    {
        $sql  = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
