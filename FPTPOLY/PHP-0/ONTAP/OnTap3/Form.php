<?php
$user = "movie@gmail.com";
$password = "123456";

$error = ""; // Biến lưu thông báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user"]) || empty($_POST["password"])) {
        $error = "Chưa nhập đầy đủ giá trị";
    } else {
        $inputUser = $_POST["user"];
        $inputPass = $_POST["password"];
        if (filter_var($inputUser, FILTER_VALIDATE_EMAIL)) {
            $inputUser = $_POST["user"];
        } else {
            $error = "Sai định dạng Email";
        }
        if (strlen($inputPass) > 6 && strlen($inputPass) < 12) {
            $inputPass = $_POST["password"];
        } else {
            $error = "password phải từ 6 - 12 ký tự";
        }
        if ($user === $inputUser && $password === $inputPass) {
            header("Location: OnTap3.php");
            exit(); // Luôn dùng exit sau header Location
        } 
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        input {
            width: 250px;
            padding: 10px;
            margin: 5px 0px;
            font-size: 16px;
        }

        button {
            width: 250px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>Login</h2>
        <form method="POST">
            <input type="text" name="user" id="user" placeholder="User" required><br>
            <input type="password" name="password" id="password" placeholder="Pasworld" required><br>
            <button type="submit">Login</button>
            <p><?php echo $error; ?></p>
        </form>
</body>

</html>