<?php
$host = 'localhost';
$dbname = 'school';
$user_db = 'root';
$pass_db = 'Ntqm21092007';

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user_db, $pass_db, $options);
    echo "Kết nối thành công! <br>";

    $sql = "INSERT INTO students (name, ClassID) VALUES (:name, :ClassID)";
    $stm = $conn->prepare($sql);

    $students = [
        ['name' => 'Minh', 'ClassID' => 5],
        ['name' => 'Nhat', 'ClassID' => 5],
        ['name' => 'Tuan Anh', 'ClassID' => 5],
        ['name' => 'Trang', 'ClassID' => 5],
    ];

    foreach ($students as $row) {
        $stm->execute([
            ':name' => $row['name'],
            ':ClassID' => $row['ClassID']
        ]);
        echo "Đã thêm học sinh: " . $row['name'] . " vào lớp " . $row['ClassID'] . "<br>";
    }

    echo "Hoàn thành INSERT dữ liệu!";
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
