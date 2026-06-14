<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="userName" id="userName">
        <input type="password" name="password" id="password">
        <input type="submit" name="btn-login" value="login">
    </form>
</body>

</html>
<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["btn-login"])) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        if (empty($_POST["userName"])) {
            echo "UserName khong dc de trong <br>";
        }
        if (empty($_POST["password"])) {
            echo "Password khong dc de trong <br>";
        }
    }
    echo $_POST["password"];
}

?>