<!-- [Mảng 1 chiều cơ bản]. Bài 2. Trung bình cộng nguyên tố
Cho mảng số nguyên A[] gồm N phần tử, nhiệm vụ của bạn là tính trung bình
cộng của các số là số nguyên tố trong dãy. Dữ liệu đảm bảo có ít nhất 1 phần tử
là số nguyên tố trong dãy.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng
Constraints
1<=N<=1000; -10^3<=A[i]<=10^3;
Output Format
In ra đáp án của bài toán lấy 3 số sau dấu phẩy.
Sample Input 0
5
-911 234 151 347 231  -->

<?php 
function PrimeNumber($n) {
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return 0;
        }
    }
    return $n > 1;
}

$arr = [-911, 234, 151, 347, 231];

$sum = 0;
$cnt = 0;
foreach ($arr as $key => $value) {
    if (PrimeNumber($value)) {
        $sum += $value;
        ++$cnt;
        }
}
$result = (float)$sum / $cnt;
echo $result;

?>