<?php 
// Ví dụ kinh điển: Tính Giai thừa ($n!$)
// n! = n * (n - 1) * (n - 2) * (n - 3) * ... * 1.

// Phân tích theo kiểu đệ quy:
// Điểm dừng: Nếu $n = 0$ hoặc $n = 1$, 
// kết quả là $1$. Công thức đệ quy: $n! = n * (n-1)!

function dequy($n) {
    // điểu kiên dưng.
    if ($n == 0) {
        return 1;
    }
    return $n * dequy($n - 1);  // 5 * (5 - 1) * (4 - 1) * (3 - 1) * (2 - 1) * 
    // (1 - 1 = 0) => return 1. =>  120 * 1 = 120. 
}

echo dequy(5);
?>