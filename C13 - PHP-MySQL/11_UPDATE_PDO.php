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

    // SQL
    $sql = "UPDATE students SET name = :name, msv = :msv WHERE id = :id";
    $stm = $conn->prepare($sql);

    // Update data
    $UpdateDATA = [
        ['name' => 'Giang', 'msv' => 'A4', 'id' => 18],
        ['name' => 'Quan', 'msv' => 'A5', 'id' => 19],
        ['name' => 'Hoa', 'msv' => 'A6', 'id' => 20],
        ['name' => 'Duyen', 'msv' => 'A7', 'id' => 21],
    ];

    foreach ($UpdateDATA as $row) {
        $stm->execute([
            ':name' => $row['name'],
            ':msv' => $row['msv'],
            ':id' => $row['id']
        ]);

        if ($stm->rowCount() > 0) {
            echo "Đã cập nhật học sinh ID " . $row['id'] . " thành công! <br>";
        } else {
            echo "Không có thay đổi cho ID " . $row['id'] . " <br>";
        }
    }

    echo "Hoàn thành UPDATE dữ liệu!";
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
