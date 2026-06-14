<?php
$cookie_name = "last_viewed_job";

if (isset($_COOKIE[$cookie_name])) {
    // Đặt thời gian hết hạn là 1 giờ trước
    setcookie($cookie_name, "", time() - 3600, "/");
    echo "Đã xóa lịch sử việc làm trong cookie!";
} else {
    echo "Không tìm thấy lịch sử việc làm trong cookie.";
}
?>