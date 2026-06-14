<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Cấu trúc if ... else cơ bản
    $tuoi = 18;
    if ($tuoi >= 18) {
        echo "Bạn đã đủ tuổi bầu cử!";
    } else {
        echo "Bạn chưa đủ tuổi rồi.";
    }

    // 2. Cấu trúc if ... elseif ... else
    $diem = 8.5;

    if ($diem >= 9) {
        echo "Hạng: Xuất sắc";
    } else if ($diem >= 8) {
        echo "Hạng: Giỏi";
    } else if ($diem >= 6.5) {
        echo "Hạng: Khá";
    } else {
        echo "Hạng: Trung bình/Yếu";
    }

    // 3. Cú pháp viết tắt (Ternary Operator)
    // Cấu trúc: (điều kiện) ? "giá trị nếu đúng" : "giá trị nếu sai";
    echo ($tuoi >= 18) ? "Người lớn" : "Trẻ em";
    ?>
</body>

</html>