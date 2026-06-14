<?php
class Task
{
    private $conn;
    public $id;
    // SỬA LỖI 1: Tên bảng trong Database của bạn là 'tasks', chứ không phải 'task_name'
    private $table = 'tasks';
    public $task_name;
    public $status;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $sql = "INSERT INTO $this->table (task_name) VALUES (:task)";
        $stmt = $this->conn->prepare($sql); // Ngăn chặn SQL Injection

        // SỬA LỖI 2: Bạn phải truyền thuộc tính $this->task_name vào (vì ở trên bạn khai báo public $task_name)
        $stmt->bindParam(':task', $this->task_name);

        return $stmt->execute(); // Thực thi câu lệnh SQL.
    }

    public function read()
    {
        $sql = "SELECT * FROM $this->table ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về dạng Mảng (Array) chuẩn như bạn muốn
        return $result;
    }
}
