<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <p>Chọn giới tính của bạn:</p>
        <input type="radio" name="gender" value="Nam" id="male">
        <label for="male">Nam</label><br>

        <input type="radio" name="gender" value="Nữ" id="female">
        <label for="female">Nữ</label><br>

        <input type="radio" name="gender" value="Khác" id="other">
        <label for="other">Khác</label><br><br>

        <button type="submit" name="submit">Gửi dữ liệu</button>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    // Kiểm tra xem người dùng đã chọn radio button nào chưa
    if (isset($_POST['gender'])) {
        $selected_gender = $_POST['gender'];
        echo "Bạn đã chọn: " . $selected_gender;
    } else {
        echo "Vui lòng chọn một giới tính!";
    }
}
?>