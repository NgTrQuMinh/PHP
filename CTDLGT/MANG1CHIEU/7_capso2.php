<!-- [Mảng 1 chiều cơ bản]. Bài 7. Cặp số 2
Cho mảng số nguyên A[] gồm N phần tử, hãy tìm độ chênh lệch nhỏ nhất giữa 2
phần tử trong mảng.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng;
Constraints
1<=N<=1000; 0<=A[i], X<=10^3;
Output Format
In ra độ chênh lệch nhỏ nhất giữa 2 phần tử bất kì trong mảng
Sample Input 0
8
69 96 93 27 84 32 78 56 
3
-->

<?php 
$arr = [69, 96, 93, 27, 84, 32, 78, 56];

$dem = count($arr);
$min = 1e9;
for ($i = 0; $i < $dem; $i++) {
    for ($j = 0; $j < $i; $j++) {
        if (abs($arr[$i] - $arr[$j]) < $min) {
            $min = abs($arr[$i] - $arr[$j]);
        }
    }
}
echo $min;
 

?>