<?php
// Bắt đầu session phải là lệnh đầu tiên
session_start();

$userName = "admin";
$password = "123456";

$err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ $_POST thay vì $_GET
    $user = trim($_POST['user'] ?? '');
    $pass = $_POST['pass'] ?? '';

    if ($user == $userName && $pass == $password) {
        $_SESSION['username'] = $user;
        $_SESSION['is_login'] = true;
        header("Location: index.php");
    } else {
        $err = "Sai thong tin";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sử dụng POST</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="user" id="user">
        <input type="password" name="pass" id="pass">
        <button type="submit">Submit</button>
    </form>
</body>

</html>