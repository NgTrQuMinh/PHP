<?php
// Mảng (Array) trong PHP
// Trong PHP, mảng là một cấu trúc dữ liệu cho phép lưu trữ nhiều giá trị trong một biến duy nhất. 
// Mảng rất linh hoạt, có thể chứa dữ liệu thuộc nhiều kiểu khác nhau (số, chuỗi, đối tượng, thậm chí mảng khác).

// 1. Các loại mảng chính

// Loại	                                                       Đặc điểm
// Indexed array (mảng chỉ mục số)	                Khóa là số nguyên, bắt đầu từ 0
// Associative array (mảng liên kết)	            Khóa là chuỗi do người dùng định nghĩa
// Multidimensional array (mảng đa chiều)	        Mảng chứa một hoặc nhiều mảng bên trong

// 2. Cú pháp khởi tạo
// Cách cũ (dùng array())
$mang1 = array("Xe máy", "Ô tô", "Xe đạp");
$sinhvien = array("ten" => "Nguyễn Văn A", "tuoi" => 20);

// Cách hiện đại (dùng [] - PHP 5.4+)
$mang1 = ["Xe máy", "Ô tô", "Xe đạp"];
$sinhvien = [
    "ten" => "Nguyễn Văn A",
    "tuoi" => 20
];

// 3. Ví dụ cụ thể
// a) Mảng chỉ mục số (Indexed array)
$hoa = ["Hoa hồng", "Hoa cúc", "Hoa lan"];

echo $hoa[0]; // Hoa hồng
echo $hoa[2]; // Hoa lan

// Duyệt mảng
foreach ($hoa as $value) {
    echo $value . "<br>";
}

// b) Mảng liên kết (Associative array)
$sinhvien = [
    "ho_ten" => "Trần Thị B",
    "tuoi" => 21,
    "lop" => "CNTT-K12"
];

echo $sinhvien["ho_ten"]; // Trần Thị B
echo $sinhvien["tuoi"];   // 21

// Duyệt với cả key và value
foreach ($sinhvien as $key => $value) {
    echo "$key: $value <br>";
}

// c) Mảng đa chiều (Multidimensional array)
$truong_hoc = [
    "10A" => ["An", "Bình", "Chi"],
    "10B" => ["Dũng", "Lan", "Mai"]
];

echo $truong_hoc["10A"][1]; // Bình
echo $truong_hoc["10B"][0]; // Dũng

// Duyệt mảng 2 chiều
foreach ($truong_hoc as $lop => $ds_hs) {
    echo "Lớp $lop: " . implode(", ", $ds_hs) . "<br>";
}

?>