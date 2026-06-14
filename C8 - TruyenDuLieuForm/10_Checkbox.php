<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <p>Chọn sở thích của bạn:</p>
        <input type="checkbox" name="so_thich[]" value="Doc sach"> Đọc sách <br>
        <input type="checkbox" name="so_thich[]" value="Da bong"> Đá bóng <br>
        <input type="checkbox" name="so_thich[]" value="Choi game"> Chơi game <br>

        <button type="submit">Gửi dữ liệu</button>
    </form>
</body>

</html>
<?php
if (isset($_POST['so_thich'])) {
    // Lấy mảng dữ liệu từ checkbox
    $ds_so_thich = $_POST['so_thich'];

    echo "Sở thích bạn đã chọn là: <br>";

    // Duyệt qua mảng để in từng giá trị
    foreach ($ds_so_thich as $value) {
        echo "- " . htmlspecialchars($value) . "<br>";
    }
} else {
    echo "Bạn chưa chọn sở thích nào!";
}
?>