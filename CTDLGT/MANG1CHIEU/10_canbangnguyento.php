<!-- [Mảng 1 chiều cơ bản]. Bài 10. Cân bằng nguyên tố
Cho mảng số nguyên A[] gồm N phần tử, hãy liệt kê các chỉ số i trong mảng thỏa
mãn : Tổng các phần tử bên trái i và tổng các phần tử bên phải i là các số nguyên
tố
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng;
Constraints
1<=N<=1000; 0<=A[i], X<=10^3;
Output Format
In ra các chỉ số thỏa mãn trên một dòng, các số cách nhau một khoảng trắng
Sample Input 0
5
53 5 69 47 19
Sample Output 0
3 -->

<?php 
$a = [53, 5, 69, 47, 19];
function PrimeNumber($n) {
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return 0;
        }
    }
    return $n > 1;
}

$length = count($a);
for ($i = 0; $i < $length; $i++) {
    $sumL = 0; $sumR = 0;
    for ($j = 0; $j < $i; $j++) {
        $sumL += $a[$j];
    }
    for ($j = $i + 1; $j < $length; $j++) {
        $sumR += $a[$j];
    }
    if (PrimeNumber($sumL) && PrimeNumber($sumR)) {
        echo ($i);
    }
}

?>