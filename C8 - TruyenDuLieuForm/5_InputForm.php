<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .container form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 400px;
            justify-content: center;
            margin: 20% auto;
        }

        .container form input {
            padding: 10px;
            margin: 5px 0;
        }

        .container form button {
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <input type="text" name="userName" id="userName" placeholder="UserName">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["userName"]) && !empty($_POST["password"])) {
        echo "UserName: " . $_POST["userName"] . "<br>";
        echo "Password: " . $_POST["password"] . "<br>";
    }
}

?>