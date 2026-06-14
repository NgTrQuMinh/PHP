<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Biến cục bộ (Local Variable) - là biến được khai báo bên trong một hàm. Nó chỉ có thể được truy cập và sử dụng trong phạm vi hàm đó. Khi hàm kết thúc, biến này sẽ bị xóa khỏi bộ nhớ.
    function thongBao()
    {
        $loiChao = "Xin chào!"; // Biến cục bộ
        echo $loiChao;
    }
    thongBao();
    // echo $loiChao; // Lỗi! Biến không tồn tại ngoài hàm.
    

    // 2. Biến toàn cục (Global Variable) - là biến được khai báo bên ngoài tất cả các hàm. 
    // Tuy nhiên, để sử dụng nó bên trong một hàm, bạn phải dùng từ khóa global hoặc mảng siêu toàn cục $GLOBALS.
    $x = 10; // Biến toàn cục
    function kiemTra()
    {
        global $x;
        echo "Giá trị của x là: " . $x;
    }
    kiemTra();


    // 3. Biến tĩnh (Static Variable)
    // khi một hàm hoàn tất, tất cả các biến của nó sẽ bị xóa. 
    // Tuy nhiên, đôi khi chúng ta muốn giữ lại giá trị của biến cục bộ cho lần gọi hàm tiếp theo. Đó là lúc ta dùng từ khóa static.
    function demSo()
    {
        static $count = 0; // Khởi tạo biến static
        $count++;
        echo $count . " ";
    }

    demSo(); // Kết quả: 1
    demSo(); // Kết quả: 2
    demSo(); // Kết quả: 3
    
    ?>
</body>

</html>