<?php
class Book
{
    private $conn;
    public $id;
    private $table = 'books';
    public $title;
    public $cover_image;
    public $author;
    public $publisher;
    public $publish_date;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $sql = "SELECT * FROM $this->table ORDER BY id ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function readOne()
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addBook()
    {
        $sql = "INSERT INTO $this->table (title, cover_image, author, publisher, publish_date) 
                VALUES (:title, :cover_image, :author, :publisher, :publish_date)";

        $stmt = $this->conn->prepare($sql);

        // ĐÃ FIX: Tách biệt từng trường bindParam rõ ràng
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':cover_image', $this->cover_image);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':publish_date', $this->publish_date);

        return $stmt->execute();
    }

    public function updateBook()
    {
        $sql = "UPDATE $this->table 
                SET title = :title, 
                    cover_image = :cover_image, 
                    author = :author, 
                    publisher = :publisher, 
                    publish_date = :publish_date 
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        // Bind dữ liệu bao gồm cả ID để biết sửa hàng nào
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':cover_image', $this->cover_image);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':publish_date', $this->publish_date);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    public function deleteBook()
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute();
    }
}
