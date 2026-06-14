<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Biến PHP dùng để lưu trữ thông tin và luôn bắt đầu bằng ký hiệu --> $

    $txt = "Hello World!"; // Kiểu chuỗi (String)
    $x = 5;               // Kiểu số nguyên (Integer)
    $y = 10.5;            // Kiểu số thực (Float)
    $is_admin = true;     // Kiểu logic (Boolean)

    echo $txt;

    // 2. Biến của biến (Variable Variables) --> $$
    $greet = "hello";
    $$greet = "Chào bạn!"; // Tương đương với tạo biến $hello

    echo $hello; // Kết quả: Chào bạn!
    ?>
</body>

</html>