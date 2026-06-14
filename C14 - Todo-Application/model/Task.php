<?php
class Task
{
    private $conn; // $conn: Được đặt là private(chỉ dùng nội bộ) chứa đối tượng kết nối cơ sở dữ liệu PDO.
    private $table = 'tasks'; // $table: Tên bảng CSDL sẽ thao tác, ở đây bảng có tên là 'task'.

    // tương ứng với các cột trong bảng task ở cơ sở dữ liệu
    public $id;
    public $task;
    public $is_completed;
    public $created_at;


    public function __construct($db)
    {
        $this->conn = $db;
        // Nó nhận vào một tham số $db (chính là biến kết nối CSDL) và gán vào thuộc tính $this->conn để các hàm khác trong lớp có thể sử dụng lại.
    }
    // Hàm thêm dữ liệu (Phương thức create)
    public function create()
    {
        $sql = "INSERT INTO $this->table (task) VALUES (:task)";
        $stmt = $this->conn->prepare($sql); // (prepare) ngăn chặn lỗi bảo mật nguy hiểm là SQL Injection.
        $stmt->bindParam(':task', $this->task); // bindParam chính là hành động "điền vào chỗ trống (?)" Số 1: Nghĩa là dấu hỏi chấm thứ nhất, $this->task: Là giá trị thực tế mà bạn muốn điền vào dấu hỏi chấm đó.
        return $stmt->execute(); // Thực thi câu lệnh SQL.
    }

    public function read()
    {
        $sql = "SELECT * FROM $this->table ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function complete($id)
    {
        // var_dump($id); // kiem tra 
        $sql = "UPDATE $this->table SET is_completed = 1 WHERE id = (:id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }

    public function undo_complete($id)
    {
        $sql = "UPDATE $this->table SET is_completed = 0 WHERE id = (:id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = (:id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }
}
