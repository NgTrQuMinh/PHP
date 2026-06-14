<?php 
// Đăng Nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_USERNAME = $_POST["dangnhap_username"] ?? "";
    $input_PASSWORD = $_POST["dangnhap_password"] ?? "";
    $check = true;
    if ($input_USERNAME === "") {
        echo "Vui long nhap username <br>";
        $check = false;
    } else {
        echo "Username: " . $input_USERNAME . "<br>";
    }
    if ($input_PASSWORD === "") {
        echo "Vui long nhap password <br>";
        $check = false;
    } else {
        echo "Password: " . $input_PASSWORD . "<br>";
    }
    if ($check) {
        echo "Dang nhap thanh cong";
    }
} 

// Đăng Kí
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_FULLNAME = $_POST["fullname"] ?? "";
    $input_USERNAME = $_POST["dangki_username"] ?? "";
    $input_PASSWORD = $_POST["dangki_passwordord"] ?? "";
    $input_EMAIL = $_POST["dangki_email"] ?? "";
    $input_PHONE = $_POST["dangki_phone"] ?? "";
    $input_SEX = $_POST["sex"] ?? "";
    echo "Fullname: " . $input_FULLNAME . "<br>";
    echo "Username: " . $input_USERNAME . "<br>";
    echo "Password: " . $input_PASSWORD . "<br>";
    echo "Email: " . $input_EMAIL . "<br>";
    echo "Phone: " . $input_PHONE . "<br>";
    echo "Sex: " . $input_SEX . "<br>";
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
    <h1>Đăng Nhập</h1>
    <form action="" method="post">
        <input type="text" name="dangnhap_username" placeholder="Username">
        <br>
        <input type="password" name="dangnhap_password" placeholder="Password">
        <br>
        <input type="submit" value="Login">
    </form>


    <h1>Đăng Kí</h1>
    <form action="" method="post">
        <input type="text" name="fullname" placeholder="Fullname">
        <br>
        <input type="text" name="dangki_username" placeholder="Username">
        <br>
        <input type="password" name="dangki_passwordord" placeholder="Password">
        <br>
        <input type="text" name="dangki_email" placeholder="Email">
        <br>
        <input type="text" name="dangki_phone" placeholder="Phone">
        <br>
        <label for="sex">Giới tính</label>
        <input type="radio" name="sex" value="Nam">
        <label for="Nam">Nam</label>
        <input type="radio" name="sex" value="Nữ">
        <label for="Nữ">Nữ</label>
        <br>
        <input type="submit" value="Register">
    </form>
</body>
</html>