<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Cú pháp cơ bản
    $day = "Monday";
    switch ($day) {
        case "Monday":
            echo "Hôm nay là thứ Hai, bắt đầu tuần mới thôi!";
            break;
        case "Friday":
            echo "Thứ Sáu rồi, quẩy thôi!";
            break;
        case "Saturday":
        case "Sunday":
            echo "Cuối tuần rồi, nghỉ ngơi đi."; // Gộp nhiều case có chung kết quả
            break;
        default:
            echo "Một ngày bình thường như bao ngày khác.";
            break;
    }
    ?>
</body>

</html>