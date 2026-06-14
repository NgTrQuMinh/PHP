<?php
// ========== PHÉP TOÁN SO SÁNH (COMPARISON) ==========
// Kết quả trả về luôn là boolean (true/false)

$a = 10;
$b = "10";
$c = 20;

echo "===== 1. SO SÁNH CƠ BẢN =====\n";
var_dump($a == $b);   // true  - bằng giá trị, không quan tâm kiểu
var_dump($a === $b);  // false - bằng cả giá trị và kiểu (int vs string)
var_dump($a != $b);   // false - khác giá trị? (10 != "10" -> false)
var_dump($a !== $b);  // true  - khác kiểu hoặc giá trị (int !== string)
var_dump($a < $c);    // true  - nhỏ hơn
var_dump($a > $c);    // false - lớn hơn
var_dump($a <= $c);   // true  - nhỏ hơn hoặc bằng
var_dump($a >= $c);   // false - lớn hơn hoặc bằng

echo "\n===== 2. SO SÁNH ĐẶC BIỆT =====\n";
// Toán tử spaceship (<=>) - PHP 7+
// Trả về -1 nếu trái < phải, 0 nếu bằng, 1 nếu trái > phải
echo "10 <=> 20: " . (10 <=> 20) . "\n";  // -1
echo "20 <=> 10: " . (20 <=> 10) . "\n";  // 1
echo "10 <=> 10: " . (10 <=> 10) . "\n";  // 0

// So sánh với null
var_dump(null == 0);   // true  (null được chuyển thành 0)
var_dump(null === 0);  // false (khác kiểu)
var_dump(null == false); // true
var_dump(null === false); // false

echo "\n===== 3. SO SÁNH VỚI STRING =====\n";
var_dump("abc" > "abd");  // false (so sánh theo thứ tự từ điển)
var_dump("10" > 5);       // true  (string "10" chuyển thành int 10)
?>