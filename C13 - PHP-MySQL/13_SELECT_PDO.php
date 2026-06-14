<?php
$host = 'localhost';
$dbname = 'school';
$user_db = 'root';
$pass_db = 'Ntqm21092007';

try {
    // Cấu hình các thuộc tính kết nối (Options)
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Thiết lập chế độ báo lỗi.
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Thiết lập chế độ lấy dữ liệu mặc định(trả về sẽ là một mảng liên hợp)
    ];

    // Khởi tạo kết nối đến Cơ sở dữ liệu
    $conn = new PDO("mysql::host= $host; dbname=$dbname", $user_db, $pass_db, $options);
    echo "Kết nối OK! <br>";

    // SQL SELECT
    $sql = "SELECT * FROM students"; // Tạo một chuỗi chứa câu lệnh SQL chuẩn bị lấy toàn bộ dữ liệu
    $stm = $conn->prepare($sql); // Đây là một tính năng bảo mật quan trọng của PDO
    // Statement sẽ lưu trữ đối tượng câu lệnh đã được chuẩn bị này.

    // Thực thi câu lệnh và Lấy dữ liệu (Execute & Fetch)
    $stm->execute(); // execute() sẽ thực thi cấu trúc SQL trên cơ sở dữ liệu
    $result = $stm->fetchAll(); // Hàm fetchAll() sẽ lấy toàn bộ dữ liệu va tra ve $result.

    echo "<pre>";
    print_r($result);
    echo "</pre>";
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}
