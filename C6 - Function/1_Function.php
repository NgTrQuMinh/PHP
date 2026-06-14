<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Hàm không tham số, không giá trị trả về
    function xinChao()
    {
        echo "Chào mừng bạn đến với PHP!";
    }
    xinChao(); // Kết quả: Chào mừng bạn đến với PHP!
    
    // 2. Hàm có tham số, không giá trị trả về
    function chaoTen($ten)
    {
        echo "Xin chào, " . $ten . "!";
    }
    chaoTen("An"); // Kết quả: Xin chào, An!
    
    // 3. Hàm không tham số, có giá trị trả về
    function layNamHienTai()
    {
        return date("Y");
    }
    $nam = layNamHienTai(); // $nam sẽ giữ giá trị 2026
    
    // 4. Hàm có tham số và có giá trị trả về
    function tinhTong($a, $b)
    {
        return $a + $b;
    }
    $ketQua = tinhTong(5, 10); // $ketQua là 15

    // Mẹo nhỏ: Trong PHP hiện đại (từ bản 7.0 trở đi), bạn nên khai báo kiểu dữ liệu cho tham số và giá trị trả về để code minh bạch hơn
    ?>
</body>

</html>