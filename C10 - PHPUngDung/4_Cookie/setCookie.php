<?php
// 1. Mảng chứa thông tin việc làm (ví dụ: việc làm vừa xem hoặc việc làm đã lưu)
$job_data = [
    "job_id" => 12345,
    "title" => "Lập trình viên PHP Fullstack",
    "company" => "Công ty Công nghệ X",
    "salary" => "20 - 30 triệu"
];

// 2. Chuyển đổi mảng thành chuỗi JSON để lưu được vào cookie
$cookie_value = json_encode($job_data, JSON_UNESCAPED_UNICODE);

// 3. Cấu hình cookie
$cookie_name = "last_viewed_job";
$expiry_time = time() + (86400 * 7); // 86400 giây = 1 ngày. Ở đây lưu trong 7 ngày.
$path = "/"; // Cookie có hiệu lực trên toàn bộ website

// 4. Thiết lập cookie (Khuyến nghị thêm httponly để tăng tính bảo mật)
setcookie($cookie_name, $cookie_value, [
    'expires' => $expiry_time,
    'path' => $path,
    'secure' => false,     // Chuyển thành true nếu trang web của bạn dùng HTTPS
    'httponly' => true,    // Chặn JavaScript truy cập cookie này (chống tấn công XSS)
    'samesite' => 'Lax'    // Bảo vệ khỏi tấn công CSRF
]);

echo "Đã lưu thông tin việc làm vào cookie thành công!";
