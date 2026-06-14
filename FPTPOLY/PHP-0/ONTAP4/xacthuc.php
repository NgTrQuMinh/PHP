<!-- 2. Xác thực người dùng sử dụng Session (2đ)
Tạo file login.php
Đăng nhập với:
user = admin
password = 123456
Yêu cầu:
Nếu đăng nhập thành công:
Lưu session
Chuyển sang product.php
Hiển thị: “Xin chào, admin”
Nếu đăng nhập thất bại:
Hiển thị: "Sai tài khoản hoặc mật khẩu" -->

<?php 
session_start();
$user = "admin";
$password = "123456";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUser = $_POST["usersname"] ?? "";
    $inputPass = $_POST["password"] ?? "";
    if ($inputPass === $password && $inputUser === $user) {
        $_SESSION["user"] = $inputUser;
        header("Location: products.php");
        exit;
    } else {
        echo "Sai tài khoản hoặc mật khẩu";
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
    <h1>login</h1>
    <form action="" method="post">
        <input type="text" name="usersname" id="usersname" placeholder="usersname"><br><br>
        <input type="password" name="password" id="password" placeholder="password"><br><br>
        <button type="submit">login</button>
    </form>
</body>
</html>
