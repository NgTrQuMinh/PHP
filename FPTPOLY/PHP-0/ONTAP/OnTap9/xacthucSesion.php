<?php
session_start();

$userName = "admin";
$password = "123456";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = trim(mb_strtolower($_POST["userName"], "UTF-8"));
    $userPassword = trim($_POST["password"]);
    if ($userInput === $userName && $userPassword === $password) {
        $_SESSION["isLogin"] = "Hotel";
        header("Location: rooms.php");
        exit;
    } else {
        echo "Sai tài khoản hoặc mật khẩu";
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

        h1 {
            padding: 10px 15px;
        }

        form {
            width: 50%;
            display: flex;
            flex-direction: column;
            padding: 10px 15px;
        }

        input,
        button {
            padding: 15px 20px;
            color: gray;
        }
    </style>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="userName" id="userName" placeholder="UserName">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>

</html>