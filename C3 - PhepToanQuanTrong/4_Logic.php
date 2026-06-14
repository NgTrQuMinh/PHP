<?php
// ========== PHÉP TOÁN LOGIC (LOGICAL) ==========
// Dùng để kết hợp nhiều điều kiện, trả về boolean
echo "\n===== 6. VÍ DỤ THỰC TẾ =====\n";
$age = 18;
$hasID = true;

if ($age >= 18 && $hasID) {
    echo "Được vào cửa\n";
} else {
    echo "Không được vào\n";
}

$role = "admin";
$action = "delete";

if ($role == "admin" || $role == "moderator") {
    echo "Có quyền thực hiện $action\n";
}

// Kết hợp nhiều toán tử
if (($age >= 18 && $hasID) || ($role == "admin")) {
    echo "Điều kiện phức hợp đúng\n";
}


?>