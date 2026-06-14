<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Hàm ẩn danh (Anonymous Functions) được gọi là Closure, 
    // Thay vì khai báo một cái tên để gọi đi gọi lại, 
    // bạn định nghĩa hàm ngay tại chỗ và thường gán nó vào một biến hoặc truyền nó như một tham số cho hàm khác.
    
    // 1. Cú pháp cơ bản
    // Điểm khác biệt lớn nhất là không có tên hàm sau từ khóa function và kết thúc khối lệnh phải có dấu chấm phẩy ;
    $Hello = function ($ten) {  // // Gán hàm ẩn danh vào một biến
        return "Hello, $ten";
    };

    echo $Hello("World!<br>");

    // 2. Sử dụng biến bên ngoài với từ khóa use
    $thong_diep = "Chúc bạn học tốt!<br>";
    $nhan_tin = function ($ten) use ($thong_diep) {
        echo "Chào $ten, $thong_diep";
    };

    $nhan_tin("Thành"); // Kết quả: Chào Thành, Chúc bạn học tốt!
    
    // 3. Arrow Functions (PHP 7.4+)
    $he_so = 2;
    $nhan_doi = fn($n) => $n * $he_so;

    echo "Hệ Số 2 của: ", $nhan_doi(5); // Kết quả: 10
    ?>
</body>

</html>