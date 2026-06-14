<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //  1. Cách khai báo mảng
    // Cách 1: Dùng hàm array() (Cách truyền thống)
    // $trai_cay = array("Táo", "Chuối", "Cam");

    // Cách 2: Dùng dấu ngoặc vuông [] (Cách ngắn gọn - Khuyên dùng)
    $trai_cay = ["Táo", "Chuối", "Cam"];

    // 2. Truy xuất và Thao tác
    // Truy cập phần tử
    echo $trai_cay[0]; // Kết quả: Táo
    echo $trai_cay[2]; // Kết quả: Cam
    
    // Thêm phần tử mới
    $trai_cay[] = "Xoài"; // "Xoài" sẽ có index là 3
    
    // Đếm số phần tử
    echo count($trai_cay); // Kết quả: 4    Sử dụng hàm count() để biết mảng có bao nhiêu phần tử:

    // Xóa 
    unset($trai_cay[2]);

    
    // 3. Duyệt mảng (Looping)
    // foreach ($trai_cay as $item) {
    //     echo "Quả: " . $item . "<br>";
    // }
    $colors = array("Red", "Green", "Blue");   
    for ($i = 0; $i < count($colors); $i++) {
        echo "Index $i: " . $colors[$i] . "<br>";
    }
    ?>
</body>

</html>