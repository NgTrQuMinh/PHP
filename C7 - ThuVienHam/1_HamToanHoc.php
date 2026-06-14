<?php
// 1. Các hàm cơ bản thường dùng
// 1.1 Hàm lấy giá trị tuyệt đối: abs()
echo abs(-10);   // Kết quả: 10

// 1.2 Hàm tìm giá trị lớn nhất và nhỏ nhất: max() & min()
$prices = [1, 5, 3];
echo max($prices); // Kết quả: 5
echo min($prices); // Kết quả: 1

// 1.3 Hàm tính căn bậc hai: sqrt()
echo sqrt(25); // Kết quả: 5

// 1.4 Hàm lũy thừa: pow()
echo pow(2, 4); // Kết quả: 16 (tương đương 2 * 2 * 2 * 2)
echo 2 ** 4;    // Kết quả: 16 (cách viết hiện đại hơn)

// 1.5 Hàm lấy số Pi: pi()
$radius = 5;
$area = pi() * pow($radius, 2); // Tính diện tích hình tròn: πr²
echo $area; // Kết quả: 78.539816339745

// 2. Hàm làm tròn số
// 2.1 Hàm round() – Làm tròn tới số gần nhất
echo round(4.4);    // Kết quả: 4
echo round(4.5);    // Kết quả: 5
echo round(4.556, 2); // Kết quả: 4.56 (Giữ lại 2 chữ số thập phân)

// 2.2 Hàm ceil() – Làm tròn lên (Trần nhà)
echo ceil(4.1); // Kết quả: 5
echo ceil(4.9); // Kết quả: 5
echo ceil(-4.1); // Kết quả: -4 (Số nguyên lớn hơn -4.1 là -4)

// 2.3 Hàm floor() – Làm tròn xuống (Sàn nhà)
echo floor(4.9); // Kết quả: 4
echo floor(4.1); // Kết quả: 4
echo floor(-4.1); // Kết quả: -5 (Số nguyên nhỏ hơn -4.1 là -5)

// 3. Hàm tạo số ngẫu nhiên
// 3.1 Hàm mt_rand() – Lựa chọn tốt nhất
echo mt_rand();          // Tạo một số ngẫu nhiên bất kỳ
echo mt_rand(1, 10);     // Tạo một số ngẫu nhiên từ 1 đến 10
echo mt_rand(1000, 9999); // Thường dùng để tạo mã PIN/OTP 4 chữ số

// 3.2 Hàm random_int() – Bảo mật tuyệt đối
echo random_int(1, 100); // An toàn hơn mt_rand rất nhiều

// 3.3 Hàm lcg_value() – Ngẫu nhiên số thập phân
// echo lcg_value(); // Kết quả có thể là 0.423456...

// 4. Hàm lượng giác và Hằng số
// 4.1 Các hằng số toán học (Mathematical Constants)
echo M_PI; // 3.1415926535898

// 4.2. Các hàm lượng giác cơ bản
$degree = 90;
$radian = deg2rad($degree); // Chuyển từ độ sang radian
echo sin($radian);          // Kết quả: 1

// 5. Định dạng số (Number Formatting)
// 5.1 Cấu trúc hàm number_format()
// number_format($number, $decimals, $decimal_separator, $thousands_separator)
// A. Định dạng cơ bản (Kiểu Mỹ)
$n = 1234567.89;
echo number_format($n); 
// Kết quả: 1,234,568 (Tự động làm tròn lên vì .89 > .5)

// B. Định dạng tiền tệ Việt Nam (VNĐ)
$price = 1500000.5;
echo number_format($price, 0, ',', '.') . " VNĐ";
// Kết quả: 1.500.001 VNĐ

// C. Giữ lại số chữ số thập phân (Định dạng chuẩn quốc tế)
$pi = 3.14159265;
echo number_format($pi, 2); 
// Kết quả: 3.14


?>