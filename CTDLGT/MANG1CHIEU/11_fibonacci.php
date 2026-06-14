<!-- [Mảng 1 chiều cơ bản]. Bài 11. Liệt kê và đếm số fibonacci.
Cho mảng số nguyên A[] gồm N phần tử, hãy liệt kê các số trong mảng là số
Fibonacci.
Input Format
Dòng đầu tiên là N : số lượng phần tử trong mảng; Dòng thứ 2 gồm N phần tử viết
cách nhau một khoảng trống.
Constraints
1<=N<=10^6; 0<=A[i]<=10^18
Output Format
In ra các số là số Fibonacci trong dãy theo thứ tự xuất hiện. Nếu trong mảng
không tồn tại số Fibonacci nào thì in ra "NONE".
Sample Input 0
6
1597 25358 7318 5878 0 2634
Sample Output 0
1597 0 -->

<?php
$arr = [1597, 25358, 7318, 5878, 0, 2634];

$F = [];
function fibo()
{
    global $F;
    $F[0] = 0;
    $F[1] = 1;
    for ($i = 2; $i <= 92; $i++) {
        $F[$i] = $F[$i - 1] + $F[$i - 2];
    }
}
function checkFibo($n)
{
    global $F;
    for ($i = 0; $i < 92; $i++) {
        if ($F[$i] === $n) {
            return true;
        }
    }
    return false;
}

fibo();
$found = false;
foreach ($arr as $value) {
    // Kiểm tra xem giá trị có tồn tại trong tập số Fibonacci không
    if (checkFibo($value)) {
        echo "$value ";
        $found = true;
    }
}

if (!$found) {
    echo "NONE";
}

?>