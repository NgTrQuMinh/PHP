<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Hàm có return (Trả về giá trị)
    function Sum($a, $b)
    {
        return $a + $b;
    }
    $Result = Sum(5, 10);
    echo ("Kết Quả là {$Result}<br>");

    
    function Price_Buff($money)
    {
        $money += 50;
        echo ("Giá Trong Hàm là: {$money}<br>");
    }
    $Number = 20;
    // 2. Tham trị (Pass by Value) - Mặc định trong PHP
    echo ("Kết Quả Ngoài Hàm là: {$Number}<br>");   // 20 vì ngoài hàm

    // 3. Tham chiếu (Pass by Reference)
    Price_Buff("{$Number}"); // 50 + 20 = 70.
    
    
    ?>
</body>

</html>