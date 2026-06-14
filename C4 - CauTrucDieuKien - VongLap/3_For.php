<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Cú pháp của vòng lặp for
    for ($i = 1; $i <= 5; $i++) {
        echo "Số thứ: $i <br>";
    }

    // 2. Duyệt mảng với vòng lặp for
    $colors = ["Đỏ", "Xanh", "Vàng"];
    $length = count($colors);

    for ($i = 0; $i < $length; $i++) {
        echo "Màu tại vị trí $i là: " . $colors[$i] . "<br>";
    }

    // 3. Vòng lặp while - Vòng lặp này sẽ kiểm tra điều kiện trước. Nếu đúng, nó mới chạy code bên trong
    while ($i <= 3) {
        echo "Lần lặp thứ $i <br>";
        $i++; // Đừng quên tăng biến đếm, nếu không sẽ bị lặp vô tận!
    }

    // 4. Vòng lặp do...while - sẽ chạy code một lần rồi mới kiểm tra điều kiện.
    do {
        echo "Số là: $i"; // Vẫn in ra "Số là: 10" dù điều kiện sai ngay từ đầu
        ++$i;
    } while ($i < 5);
    ?>
</body>

</html>