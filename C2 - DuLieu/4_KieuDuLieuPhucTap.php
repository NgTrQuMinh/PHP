<?php
// KIỂU DỮ LIỆU PHỨC TẠP (COMPOSITE TYPES) TRONG PHP

// 1. MẢNG (ARRAY) - chứa nhiều giá trị
echo "=== 1. MẢNG (ARRAY) ===\n";
$mon_hoc = ["Toán", "Lý", "Hóa"];          // mảng chỉ số
$sinh_vien = [
    "ten" => "Nguyễn Văn A",
    "tuoi" => 20,
    "diem" => 8.5
];                                          // mảng kết hợp

echo "Môn học: ";
print_r($mon_hoc);
echo "Sinh viên: ";
print_r($sinh_vien);

echo "Tên sinh viên: " . $sinh_vien["ten"] . "\n";
echo "Số môn học: " . count($mon_hoc) . "\n";

// 2. ĐỐI TƯỢNG (OBJECT)
echo "\n=== 2. ĐỐI TƯỢNG (OBJECT) ===\n";
class Nguoi {
    public $ten;
    public $tuoi;
    
    function chao() {
        return "Xin chào, tôi là " . $this->ten;
    }
}

$user = new Nguoi();
$user->ten = "Trần Thị B";
$user->tuoi = 22;

echo $user->chao() . "\n";
echo "Tuổi: " . $user->tuoi . "\n";

// Kiểm tra kiểu
echo "\n--- Kiểm tra kiểu ---\n";
var_dump($mon_hoc);  // array
var_dump($user);     // object(Nguoi)
?>