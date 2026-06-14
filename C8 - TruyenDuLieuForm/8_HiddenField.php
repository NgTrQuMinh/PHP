<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Trang Login Đơn Giản</title>
</head>

<body>
    <h2>Đăng nhập hệ thống</h2>
    <form action="" method="post">
        Tên đăng nhập: <br>
        <input type="text" name="userName" value="<?php echo htmlspecialchars($username); ?>"><br>

        Mật khẩu: <br>
        <input type="password" name="password"><br>

        <input type="hidden" name="redirect_to" value="trang_chu_01">

        <br>
        <input type="submit" name="btn-login" value="Đăng nhập">
    </form>
</body>

</html>
<?php
// 1. Khởi tạo các biến để tránh lỗi
$error = [];
$username = "";

// 2. Kiểm tra xem người dùng có nhấn nút Login không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-login"])) {

    $username = $_POST["userName"];
    $password = $_POST["password"];
    $redirect_to = $_POST["redirect_to"];

    // 3. Kiểm tra rỗng
    if (empty($username)) {
        $error["userName"] = "Tên đăng nhập không được để trống!";
    }

    if (empty($password)) {
        $error["password"] = "Mật khẩu không được để trống!";
    }

    // 4. Nếu không có lỗi thì kiểm tra thông tin
    if (empty($error)) {
        $info_user = ["userName" => "admin", "password" => "123"];

        if ($username == $info_user["userName"] && $password == $info_user["password"]) {
            echo "<h3>Đăng nhập thành công!</h3>";
            echo "Bạn đang được chuyển hướng đến trang ID: " . htmlspecialchars($redirect_to);
        } else {
            echo "<h3 style='color:red;'>Sai tài khoản hoặc mật khẩu!</h3>";
        }
    }
}
?>