<?php
$cookie_name = "last_viewed_job";

// Kiểm tra xem cookie đó có tồn tại hay không
if (isset($_COOKIE[$cookie_name])) {

    // Lấy chuỗi JSON từ cookie
    $cookie_value = $_COOKIE[$cookie_name];

    // Giải mã chuỗi JSON ngược lại thành Mảng (Array) trong PHP
    $job_info = json_decode($cookie_value, true);

    // Hiển thị thông tin việc làm
    echo "<h3>Công việc bạn đã xem gần đây:</h3>";
    echo "Tên công việc: " . htmlspecialchars($job_info['title']) . "<br>";
    echo "Công ty: " . htmlspecialchars($job_info['company']) . "<br>";
    echo "Mức lương: " . htmlspecialchars($job_info['salary']) . "<br>";
} else {
    echo "Không tìm thấy lịch sử việc làm trong cookie.";
}
