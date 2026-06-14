<?php 
session_start();
$user = "cinema";
$password = "movie123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUser = $_POST["username"] ?? "";
    $inputPass = $_POST["password"] ?? "";
    if ($inputPass === $password && $inputUser === $user) {
        $_SESSION["user"] = $inputUser;
        header("Location: movies.php");
        exit;
    } else {
        echo "Login that bai";
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
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>