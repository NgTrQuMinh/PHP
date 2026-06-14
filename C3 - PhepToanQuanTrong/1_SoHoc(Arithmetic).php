<?php
// ==================== PHÉP TOÁN SỐ HỌC TRONG PHP ====================
// Các toán tử: + - * / % ** (cộng, trừ, nhân, chia, chia lấy dư, lũy thừa)

$a = 15;
$b = 4;

echo "Ví dụ với a = $a, b = $b\n\n";

// 1. PHÉP CỘNG (+)
$cong = $a + $b;
echo "1. Cộng (+) : $a + $b = $cong\n";

// 2. PHÉP TRỪ (-)
$tru = $a - $b;
echo "2. Trừ (-)  : $a - $b = $tru\n";

// 3. PHÉP NHÂN (*)
$nhan = $a * $b;
echo "3. Nhân (*) : $a * $b = $nhan\n";

// 4. PHÉP CHIA (/)
// Kết quả là số thực (float) nếu không chia hết
$chia = $a / $b;
echo "4. Chia (/)  : $a / $b = $chia (kiểu: " . gettype($chia) . ")\n";

// 5. PHÉP CHIA LẤY DƯ (%)
// Chỉ áp dụng cho số nguyên, kết quả là số dư
$du = $a % $b;
echo "5. Chia lấy dư (%): $a % $b = $du\n";

// 6. PHÉP LŨY THỪA (**)
$luy_thua = $a ** $b;
echo "6. Lũy thừa (**): $a ** $b = $luy_thua\n";

// 7. THỨ TỰ ƯU TIÊN (giống toán học)
$bieu_thuc = 2 + 3 * 4;      // = 14 (nhân trước)
$bieu_thuc2 = (2 + 3) * 4;   // = 20 (ngoặc trước)
echo "\n7. Thứ tự ưu tiên:\n";
echo "   2 + 3 * 4 = $bieu_thuc\n";
echo "   (2 + 3) * 4 = $bieu_thuc2\n";

// 8. PHÉP TOÁN VỚI SỐ ÂM
$so_am = -10;
$tri_tuyet_doi = abs($so_am);  // hàm trị tuyệt đối
echo "\n8. Số âm: $so_am, trị tuyệt đối: $tri_tuyet_doi\n";

// 9. PHÉP TOÁN VỚI SỐ THỰC (float)
$c = 10.5;
$d = 3.2;
echo "\n9. Số thực: $c + $d = " . ($c + $d) . "\n";
echo "   Chú ý: Phép chia lấy dư (%) với số thực có thể gây lỗi (chỉ dùng cho int)\n";

// 10. MỘT SỐ HÀM SỐ HỌC HỮU ÍCH
echo "\n10. Hàm số học hữu ích:\n";
echo "   round(3.14159, 2) = " . round(3.14159, 2) . " (làm tròn)\n";
echo "   ceil(4.2) = " . ceil(4.2) . " (làm tròn lên)\n";
echo "   floor(4.9) = " . floor(4.9) . " (làm tròn xuống)\n";
echo "   sqrt(16) = " . sqrt(16) . " (căn bậc 2)\n";
echo "   pow(2, 5) = " . pow(2, 5) . " (lũy thừa, tương tự **)\n";
echo "   max(3, 7, 2, 9) = " . max(3, 7, 2, 9) . " (lớn nhất)\n";
echo "   min(3, 7, 2, 9) = " . min(3, 7, 2, 9) . " (nhỏ nhất)\n";
echo "   rand(1, 100) = " . rand(1, 100) . " (số ngẫu nhiên)\n";
?>