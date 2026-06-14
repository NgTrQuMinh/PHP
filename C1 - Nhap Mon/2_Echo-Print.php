<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1.Echo
    // Bạn có thể dùng dấu ngoặc kép " hoặc ngoặc đơn '
    echo "Chào mừng bạn đến với PHP!<br>";
    echo 'Hello, World!<br>';

    // Có thể in nhiều tham số khác nhau bằng dấu (,)
    echo "Học ", "PHP ", "thật ", "thú ", "vị!";


    // 2.Hàm printf() trong PHP Khác với echo, printf() cho phép bạn kiểm soát chính xác cách hiển thị của các biến.
    $name = "Hà Nội";
    $tempValue = 28;
    printf("Hôm nay tại %s nhiệt độ là %d độ C.", $name, $tempValue);    // Kết quả: Hôm nay tại Hà Nội nhiệt độ là 28 độ C.
    ?>
</body>

</html>