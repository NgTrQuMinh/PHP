<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="xuly.php" method="POST">
        <label>Nhập nội dung tin nhắn:</label><br>
        <textarea name="message" rows="5" cols="40" placeholder="Viết gì đó vào đây..."></textarea>
        <br>
        <button type="submit">Gửi tin nhắn</button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Lấy dữ liệu
    $noidung = $_POST['message'];

    // 2. Kiểm tra xem có trống không
    if (!empty(trim($noidung))) {

        // CÁCH 1: In ra giữ nguyên định dạng xuống dòng (Dùng nl2br)
        // nl2br() sẽ chuyển dấu xuống dòng \n thành thẻ <br> của HTML
        echo "<h3>Nội dung bạn đã nhập:</h3>";
        echo nl2br(htmlspecialchars($noidung));

    } else {
        echo "Bạn chưa nhập nội dung nào!";
    }
}
?>