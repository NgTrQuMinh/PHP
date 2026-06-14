<?php 
// ========== TOÁN TỬ MẢNG (ARRAY OPERATORS) ==========
// Các toán tử đặc biệt dùng cho mảng

$arr1 = ["a" => 1, "b" => 2];
$arr2 = ["b" => 3, "c" => 4];
$arr3 = ["a" => 1, "b" => 2];

echo "===== 1. HỢP NHẤT MẢNG (+) =====\n";
// Gộp mảng bên phải vào bên trái, nếu key trùng thì giữ key của mảng trái
$union = $arr1 + $arr2;
print_r($union);
// Kết quả: ["a"=>1, "b"=>2, "c"=>4] (giữ "b"=>2 của $arr1)

echo "\n===== 2. SO SÁNH BẰNG (==) =====\n";
// true nếu số lượng phần tử bằng nhau và từng cặp key-value bằng nhau (giá trị)
var_dump($arr1 == $arr3); // true
var_dump($arr1 == $arr2); // false (khác giá trị ở key "b")

echo "\n===== 3. SO SÁNH GIỐNG HỆT (===) =====\n";
// true nếu cùng key, cùng giá trị, cùng thứ tự và cùng kiểu
$arr4 = ["b" => 2, "a" => 1]; // thứ tự khác $arr1
var_dump($arr1 === $arr3); // true (thứ tự giống)
var_dump($arr1 === $arr4); // false (thứ tự khác nhau)

echo "\n===== 4. SO SÁNH KHÁC (!=, <>, !==) =====\n";
var_dump($arr1 != $arr2);  // true (khác giá trị)
var_dump($arr1 !== $arr4); // true (khác thứ tự)

echo "\n===== 5. TOÁN TỬ SPACESHIP (<=>) CHO MẢNG (PHP 7+) =====\n";
// So sánh từ trái sang phải, trả về -1, 0, 1
$arr5 = [1, 2, 3];
$arr6 = [1, 2, 4];
var_dump($arr5 <=> $arr6); // -1 (vì 3 < 4)
var_dump($arr5 <=> [1, 2, 3]); // 0 (bằng nhau)
var_dump($arr6 <=> $arr5); // 1 (4 > 3)
?>