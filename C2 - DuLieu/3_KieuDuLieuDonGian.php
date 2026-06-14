<?php
// KIỂU DỮ LIỆU ĐƠN GIẢN (SCALAR TYPES) TRONG PHP

// 1. Boolean (true/false)
$dang_nhap = true;
$da_xoa = false;
echo "1. Boolean: đăng nhập = " . ($dang_nhap ? 'true' : 'false') . "\n";

// 2. Integer (số nguyên)
$tuoi = 25;
$nhiet_do = -10;
echo "2. Integer: tuổi = $tuoi, nhiệt độ = $nhiet_do\n";

// 3. Float (số thực)
$pi = 3.14;
$gia_tri = 99.99;
echo "3. Float: pi = $pi, giá = $gia_tri\n";

// 4. String (chuỗi ký tự)
$ten = "Nguyễn Văn A";
$thong_bao = 'Xin chào';
echo "4. String: tên = $ten, thông báo = $thong_bao\n";

// Kiểm tra kiểu
echo "\n--- Kiểm tra kiểu ---\n";
var_dump($dang_nhap);
var_dump($tuoi);
var_dump($pi);
var_dump($ten);
?>