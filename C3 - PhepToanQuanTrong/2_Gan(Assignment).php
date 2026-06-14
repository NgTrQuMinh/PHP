<?php
// ==================== PHÉP TOÁN GÁN (ASSIGNMENT) TRONG PHP ====================
// Toán tử cơ bản: = (gán giá trị)
// Các toán tử gán kết hợp: +=, -=, *=, /=, %=, **=, .= (nối chuỗi)

echo "===== 1. GÁN CƠ BẢN (=) =====\n";
$x = 10;        // Gán giá trị 10 cho biến $x
$y = $x;        // Gán giá trị của $x (10) cho $y
echo "x = $x, y = $y\n";

$name = "Nguyễn Văn A";
echo "Tên: $name\n\n";

// 2. GÁN KẾT HỢP VỚI SỐ HỌC (cập nhật biến)
echo "===== 2. GÁN KẾT HỢP SỐ HỌC =====\n";
$a = 5;
$a += 3;   // tương đương $a = $a + 3;  => 8
echo "a += 3  => $a\n";

$a = 5;
$a -= 2;   // $a = $a - 2; => 3
echo "a -= 2  => $a\n";

$a = 5;
$a *= 4;   // $a = $a * 4; => 20
echo "a *= 4  => $a\n";

$a = 20;
$a /= 5;   // $a = $a / 5; => 4
echo "a /= 5  => $a\n";

$a = 17;
$a %= 5;   // $a = $a % 5; => 2 (phép chia lấy dư)
echo "a %= 5  => $a\n";

$a = 2;
$a **= 3;  // $a = $a ** 3; => 8 (lũy thừa)
echo "a **= 3 => $a\n";

// 3. GÁN KẾT HỢP VỚI CHUỖI (.=)
echo "\n===== 3. GÁN KẾT HỢP CHUỖI (.=) =====\n";
$str = "Xin chào";
$str .= " các bạn";   // nối thêm chuỗi
echo "str .= ' các bạn' => $str\n";

$ten = "Nguyễn";
$ten .= " Văn B";
echo "Ten: $ten\n";

// 4. GÁN THEO THAM CHIẾU (&) – quan trọng
echo "\n===== 4. GÁN THEO THAM CHIẾU (&) =====\n";
$original = 100;
$ref = &$original;   // $ref tham chiếu đến cùng vùng nhớ với $original
echo "original = $original, ref = $ref\n";

$ref = 200;          // thay đổi $ref cũng làm thay đổi $original
echo "Sau khi gán ref = 200:\n";
echo "original = $original, ref = $ref\n";

$original = 300;     // thay đổi original cũng ảnh hưởng ref
echo "Sau khi gán original = 300:\n";
echo "original = $original, ref = $ref\n";

// Hủy tham chiếu (không hủy biến gốc)
unset($ref);
echo "Sau unset(\$ref): original vẫn là $original\n";

// 5. GÁN NHIỀU BIẾN CÙNG LÚC
echo "\n===== 5. GÁN NHIỀU BIẾN =====\n";
$p = $q = $r = 5;   // cả 3 biến đều bằng 5
echo "p=$p, q=$q, r=$r\n";

list($a, $b, $c) = [10, 20, 30];  // gán mảng cho các biến
echo "list: a=$a, b=$b, c=$c\n";

// 6. GÁN CÓ ĐIỀU KIỆN (null coalescing)
echo "\n===== 6. GÁN CÓ ĐIỀU KIỆN =====\n";
$username = $_GET['user'] ?? 'khách'; // nếu không tồn tại thì gán 'khách'
echo "Username: $username\n";

// 7. GÁN TRONG BIỂU THỨC (ít dùng nhưng hợp lệ)
echo "\n===== 7. GÁN TRONG BIỂU THỨC =====\n";
$c = 1;
if (($c = 100) > 50) {
    echo "Phép gán trả về giá trị được gán (100), nên điều kiện đúng\n";
}
echo "c = $c\n";
?>