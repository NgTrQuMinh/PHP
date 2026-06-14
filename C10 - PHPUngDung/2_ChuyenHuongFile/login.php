<?php
$errors = [];

// Danh sách nhiều tài khoản
$login = [
    ["username" => "admin", "password" => "123456"],
    ["username" => "user1", "password" => "abcdef"]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    if ($username === "") {
        $errors[] = "Username khong dc de trong";
    }
    if ($password === "") {
        $errors[] = "Password khong dc de trong";
    }

    if (empty($errors)) {
        $is_valid = false;

        // Duyệt qua từng tài khoản trong danh sách
        foreach ($login as $account) {
            if ($username === $account['username'] && $password === $account['password']) {
                $is_valid = true;
                break; // Tìm thấy phát thoát vòng lặp luôn
            }
        }

        if ($is_valid) {
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Thong tin dang nhap khong hop le";
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
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" id="username"><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Login</button><br>
        <?php
        // Duyệt qua mảng và in từng lỗi ra thành từng dòng riêng biệt
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
        ?>

    </form>
</body>

</html>