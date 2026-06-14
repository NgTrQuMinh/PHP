<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="xuly_select.php" method="POST">
        <label>Chọn thành phố:</label>
        <select name="city">
            <option value="">--Vui lòng chọn--</option>
            <option value="hanoi">Hà Nội</option>
            <option value="saigon">TP. Hồ Chí Minh</option>
            <option value="danang">Đà Nẵng</option>
        </select>
        <button type="submit">Gửi</button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem người dùng đã chọn chưa
    if (!empty($_POST['city'])) {
        $selected_city = $_POST['city'];
        echo "Bạn đã chọn thành phố: " . htmlspecialchars($selected_city);
    } else {
        echo "Vui lòng chọn một thành phố!";
    }
}
?>