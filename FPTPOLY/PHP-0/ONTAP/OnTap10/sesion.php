<?php
session_start();
$user = "admin";
$pass = "123456";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "") {
        echo "Vui lòng nhập dữ liệu tài khoản";
    } elseif ($password === "") {
        echo "Vui lòng nhập mật khẩu";
    } elseif ($username === $user && $password === $pass) {
        $_SESSION['username'] = $username;
        header("Location: bill.php");
        exit;
    } else {
        echo "Thông tin đăng nhập không hợp lệ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" id="username">
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
</body>

</html>