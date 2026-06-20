<?php
class CRUD
{
    private $table = "nhanvien";
    private $conn;

    public $id;
    public $ten;
    public $email;
    public $luong;
    public $img;

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

    public function read()
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create()
    {
        $sql = "INSERT INTO $this->table (ten, email, luong, img) VALUES (:name, :email, :money, :img)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $this->ten);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":money", $this->luong);
        $stmt->bindParam(":img", $this->img);
        return $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET ten = :ten, email = :email, luong = :luong , img = :img WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ten", $this->ten);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":luong", $this->luong);
        $stmt->bindParam(":img", $this->img);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }


    public function delete()
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
