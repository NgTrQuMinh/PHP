<?php
class Book
{
    private $conn;
    private $table = 'books';
    public $id;
    public $title;
    public $author;
    public $publisher;
    public $publisher_date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne()
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addBook()
    {
        $sql = "INSERT INTO $this->table (title, author, publisher, publish_date)  VALUES (:title, :author, :publisher, :publish_date)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':publish_date', $this->publish_date);

        return $stmt->execute();
    }

    public function updateBook()
    {
        $sql = "UPDATE $this->table SET title = :title, author = :author, publisher = :publisher, publish_date = :publish_date WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title);
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
