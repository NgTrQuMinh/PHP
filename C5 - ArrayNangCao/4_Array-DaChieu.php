<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Mảng 2 chiều (Phổ biến nhất)
    // Mảng 2 chiều giống như một cái bảng gồm các hàng và cột. Để truy cập một phần tử, bạn cần hai chỉ số: [hàng][cột].
    $students = array(
        array("An", 20, "Hà Nội"),
        array("Bình", 22, "Đà Nẵng"),
        array("Chi", 21, "TP.HCM")
    );

    // Truy cập phần tử:
    echo $students[0][0]; // Kết quả: An
    echo $students[1][2]; // Kết quả: Đà Nẵng
    
    // 2. Mảng đa chiều kết hợp (Associative)
    // Trong thực tế, người ta thường dùng mảng kết hợp lồng nhau để code dễ đọc hơn thay vì dùng số thứ tự.
    $products = [
        "iphone" => [
            "price" => 1000,
            "stock" => 10,
            "color" => "Titan"
        ],
        "samsung" => [
            "price" => 900,
            "stock" => 15,
            "color" => "Black"
        ]
    ];

    // Lấy giá của iphone
    echo $products["iphone"]["price"]; // Kết quả: 1000
    
    // 3. Cách duyệt mảng đa chiều
    // Để lấy toàn bộ dữ liệu ra, chúng ta sử dụng các vòng lặp foreach lồng nhau.
    foreach ($products as $brand => $details) {
        echo "Dòng máy: $brand <br>";
        foreach ($details as $key => $value) {
            echo "- $key: $value <br>";
        }
    }

    // 4. Mảng 3 chiều và xa hơn nữa
    // Bạn có thể lồng mảng bao nhiêu cấp tùy thích, nhưng hãy cẩn thận! Càng nhiều cấp thì code càng khó bảo trì.
    // Mảng 1 chiều: Một danh sách.
    // Mảng 2 chiều: Một cái bảng (Excel)
    // Mảng 3 chiều: Một chồng các bảng.
    // $$A[i_1][i_2]...[i_n]$$

    // Lời khuyên nhỏ: Nếu dữ liệu của bạn bắt đầu vượt quá 3 tầng lồng nhau, hãy cân nhắc sử dụng Object (Đối tượng) để quản lý dễ dàng và chuyên nghiệp hơn nhé!
    ?>


</body>

</html>