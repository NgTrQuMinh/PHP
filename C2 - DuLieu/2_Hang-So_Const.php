<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Dùng hàm define()
    define("PI", 3.14);
    define("GREETING", "Chào mừng bạn!");

    echo PI, "<br>";       // Kết quả: 3.14

    echo GREETING; // Kết quả: Chào mừng bạn!

    // 2. Dùng từ khóa const
    const APP_NAME = "My Web App";
    echo APP_NAME, "<br>";

    // 3.Các Hằng số định sẵn (Magic Constants)
    // __LINE__: Trả về số dòng hiện tại trong file.
    // __FILE__: Trả về đường dẫn đầy đủ của file hiện tại.
    // __DIR__: Trả về thư mục của file hiện tại.
    // __FUNCTION__: Trả về tên hàm đang chạy.

    echo "Bạn đang ở dòng thứ: " . __LINE__;
    ?>
</body>

</html>