<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sinh_vien = [
        "FullName" => "Nguyễn Văn A",
        "Age" => "19",
        "Score" => 8.5
    ];

    // 2. Cách truy xuất và thay đổi dữ liệu
    // echo $sinh_vien["ho_ten"];      // Xuất ra: Nguyễn Văn A 
    $sinh_vien["Score"] = 9.0;    // Thay đổi giá trị
    $sinh_vien["Email"] = "ngvanA@gmail.com";     // Thêm phần tử mới
    unset($sinh_vien['ngay_sinh']); // Xóa phần tử

    
    foreach ($sinh_vien as $key => $value) {
        printf ("%s: %s<br>", $key, $value);
    }
    echo "<br>";
    
    // 3. Duyệt mảng kết hợp với foreach
    $luong = [
        "Giam doc" => "50 trieu",
        "Truong phong" => "30 trieu",
        "Nhan vien" => "15 trieu"
    ];

    foreach ($luong as $index => $value) {
        echo "Chức vụ: " . $index . " - Lương: " . $value . "<br>";
    }


    // 4. Một số hàm hữu ích cho mảng kết hợp
    // array_keys($array): Trả về một mảng chỉ chứa các Key.
    // array_values($array): Trả về một mảng chỉ chứa các Value.
    // array_key_exists("key", $array): Kiểm tra xem một Key có tồn tại trong mảng không.
    

    // asort($array): Sắp xếp mảng theo Value (giữ nguyên Key).
    $Age = [
        "Peter" => "35",
        "Ben" => "37",
        "Joe" => "43",
        "Adam" => "25"
    ];
    asort($Age);    // Sắp xếp tăng dần theo Value (Tuổi)
    foreach ($Age as $index => $value) {
        echo "Key=" . $index . ", Value=" . $value . "<br>";
    }
    // Key=Adam, Value=25
    // Key=Peter, Value=35
    // Key=Ben, Value=37
    // Key=Joe, Value=43
    
    
    ?>
</body>

</html>