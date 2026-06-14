<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
    Cách 1: Chỉ lấy giá trị (Value)

    foreach ($array as $value) {
        // Mã thực thi
    }

    Cách 2: Lấy cả khóa và giá trị (Key & Value)
    
    foreach ($array as $key => $value) {
        // Mã thực thi
    } 
    -->

    <?php
    $fruits = ["Táo", "Chuối", "Cam"];
    // Lấy value.
    foreach ($fruits as $value) {
        echo "Tôi thích ăn: $value <br>";
    }
    echo "<br>";
    $numbers = [1, 2, 3, 4, 5];

    // Lấy cả index và value.
    foreach ($numbers as $index => $value) {
        echo "$index: $value <br>";
    }
    echo "<br>";


    // 2. Mảng liên kết (Associative Array)
    $person = [
        "Name" => "Hoàng",
        "Age" => 25,
        "Job" => "Developer"
    ];

    foreach ($person as $index => $value) {
        echo "$index: $value <br>";   // Kết quả: Name: Hoàng, Age: 25...
    }
    echo "<br>";

    // 3. Mảng Đa chiều.
    $Students = [
        ["name" => "Minh", "age" => "19",
         "hometown" => ["Hà Nội" => "Thường Tín"]],
        ["name" => "Nhật", "age" => "19", "hometown" => ["Hà Nội" => "Thường Tín"]],
    ];

    foreach ($Students as $row) {
        foreach ($row as $key => $element) {
            if (is_array($element)) {
                foreach ($element as $city => $district) {
                    echo "$district ($city) ";
                }
            } else {
                echo $element . " ";
            }
        }
        echo "\n";
    }
    echo "<br><br>";

    // 4. Thay đổi giá trị trực tiếp bằng Tham chiếu (&)
    $numbers = [1, 2, 3];
    foreach ($numbers as &$val) {
        $val = $val * 2; // Nhân đôi giá trị
    }
    // Lưu ý quan trọng: Nên unset biến tham chiếu sau khi dùng để tránh lỗi logic về sau
    unset($val);
    print_r($numbers); // Kết quả: [2, 4, 6]
    
    ?>

</body>

</html>