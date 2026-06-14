<?php
// ========== TOÁN TỬ ELVIS (?:) ==========
// Kiểm tra biến có giá trị "truthy" (khác false, null, 0, "", []...) không?
// Nếu có thì lấy nó, nếu không thì lấy giá trị mặc định

$name = "Nguyễn";
echo $name ?: "Khách";   // Kết quả: Nguyễn (vì $name có giá trị)

$name = "";
echo $name ?: "Khách";   // Kết quả: Khách (vì "" là falsy)

// ========== TOÁN TỬ NULL COALESCING (??) ==========
// Kiểm tra biến có tồn tại và KHÔNG phải null không?
// Nếu có (không null) thì lấy, nếu null thì lấy giá trị mặc định

$age = 25;
echo $age ?? 18;         // Kết quả: 25

$age = null;
echo $age ?? 18;         // Kết quả: 18

// $age chưa khai báo
echo $age2 ?? 18;        // Kết quả: 18 (không báo lỗi)

// ========== SO SÁNH NHANH ==========
$value = 0;

echo $value ?: "Mặc định";   // Kết quả: "Mặc định" (vì 0 là falsy)
echo $value ?? "Mặc định";   // Kết quả: 0 (vì 0 không phải null)

// Kết luận:
// - ?:  kiểm tra "có giá trị truthy không?" (rộng)
// - ?? kiểm tra "có phải null không?" (hẹp, an toàn hơn)
?>