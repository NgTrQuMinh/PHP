<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 3 kỹ thuật cơ bản nhất để bạn nhúng PHP vào HTML -->
    <!-- 1. Xuất biến (Dùng thẻ rút gọn) -->
    <?php $username = "Nguyễn Văn A"; ?>

    <h1>Chào mừng,
        <?= $username ?>!
    </h1>
    <p>Bạn đang ở trang chủ.</p>

    <!-- 2. Câu lệnh điều kiện (If/Else) -->
    <?php $is_admin = true; ?>

    <?php if ($is_admin): ?>
        <div class="admin-panel">
            <p>Chào sếp! Đây là bảng điều khiển hệ thống.</p>
        </div>
    <?php else: ?>
        <div class="user-panel">
            <p>Chào bạn! Chúc bạn xem web vui vẻ.</p>
        </div>
    <?php endif; ?>

    <!-- 3. Vòng lặp (Hiển thị danh sách) -->
    <?php
    $mon_hoc = ["Toán", "Lý", "Hóa", "Sinh"];
    ?>

    <h3>Danh sách môn học:</h3>
    <ul>
        <?php foreach ($mon_hoc as $ten_mon): ?>
            <li>
                <?= $ten_mon ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>