<?php
// Bài 2: Xác thực người dùng sử dụng Session (2đ)
// Đăng nhập thành công với:
// user = movie
// pass = 123456
// Nếu đăng nhập thành công:
// Chuyển sang movies.php
// Hiển thị tên người đăng nhập
// Nếu đăng nhập thất bại:
// Hiển thị thông báo:
// "Thông tin đăng nhập không hợp lệ"

session_start();

$user = "movie";
$pass = "123456";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST["username"] ?? "";
    $passdInput = $_POST["password"] ?? ""; 
    if ($user === $userInput && $pass === $passdInput) {
        $_SESSION['user'] = $userInput; 
        header("Location: movies.php");
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
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="username" id="username" placeholder="username"><br><br>
        <input type="password" name="password" id="password" placeholder="password"><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>