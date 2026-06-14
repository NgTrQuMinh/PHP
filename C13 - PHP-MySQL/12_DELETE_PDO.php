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
    $conn = new PDO("mysql::host= $host; dbname=$dbname", $user_db, $pass_db, $options);
    echo "Kết nối OK! <br>";

    $sql = "DELETE FROM students WHERE id = :id";
    $stm = $conn->prepare($sql);

    $DELETE_DATA = [
        ["id" => 15],
    ];
    foreach ($DELETE_DATA as $row) {
        $stm->execute([
            ':id' => $row["id"],
        ]);
    }
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
