<?php
// 1. Nhóm Xử lý Chuỗi (String)
// strlen($s): Đếm độ dài.
// str_replace($search, $replace, $s): Thay thế nội dung.
// substr($str, $start, $cntchar): Cắt chuỗi.
// explode($del, $s): Biến chuỗi thành mảng.
// trim($s): Xóa khoảng trắng 2 đầu.

// 2. Nhóm Xử lý Số (Number)
// is_numeric($n): Kiểm tra có phải số không.
// round($n, $p): Làm tròn (thường).
// ceil($n) / floor($n): Làm tròn lên / xuống.
// rand($min, $max): Lấy số ngẫu nhiên.
// number_format($n): Định dạng số (ví dụ: 1,000,000).

// 3. Nhóm Xử lý Mảng (Array)
// is_array($a): kiểm tra có phải mảng ko
// count($a): Đếm phần tử.
// array_push($a, $v): Thêm vào cuối mảng.
// in_array($v, $a): Kiểm tra giá trị có trong mảng không.
// array_merge($a1, $a2): Gộp mảng.
// array_keys($a) / array_values($a): Lấy danh sách khóa hoặc giá trị.

// 4. Nhóm Kiểm tra & Thời gian
// isset($v): Kiểm tra biến có tồn tại và khác NULL.
// empty($v): Kiểm tra biến có trống (0, "", NULL, false).
// date($format): Lấy/định dạng ngày tháng.
// time(): Lấy dấu thời gian (timestamp) hiện tại.

// 5. Nhóm Hệ thống & Bảo mật
// include / require: Chèn file khác vào.
// header("Location: ..."): Chuyển hướng trang.
// password_hash($p, PASSWORD_DEFAULT): Mã hóa mật khẩu.
// password_verify($p, $hash): Kiểm tra mật khẩu.
// htmlspecialchars($s): Chống tấn công XSS khi hiển thị dữ liệu.


$price = "250000"; // Chuỗi số từ Form
$qty = 2;

if (is_numeric($price)) {
    $total = (int) $price * $qty;
    $msg = "Tổng tiền: " . number_format($total) . " VNĐ";
}

$log = "[" . date("Y-m-d H:i:s") . "] " . $msg . "\n";
// Ghi log vào file
file_put_contents("orders.log", $log, FILE_APPEND);

echo $msg;
// Kết quả: Tổng tiền: 500,000 VNĐ (và lưu vào file log)

?>