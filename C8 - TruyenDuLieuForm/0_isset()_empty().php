<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. isset() dùng để kiểm tra xem một biến đã được khởi tạo và có giá trị khác NULL hay chưa.
    // 2. empty() dùng để kiểm tra xem một biến có giá trị khác ròng hay chưa.

    // $userName = "null";
    // echo isset($userName) ? "true" : "false";   // true vi $userName = "null"
    // echo empty($userName) ? "true" : "false";   // false vi no != "" (ròng)
    
    foreach ($_POST as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }

    ?>  
    <form action="" method="post">
        <input type="text" name="userName" id="userName">
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
</body>

</html>