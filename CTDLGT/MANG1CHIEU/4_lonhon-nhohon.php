<!-- [Mảng 1 chiều cơ bản]. Bài 4. Lớn hơn, nhỏ hơn
Cho mảng số nguyên A[] gồm N phần tử và số nguyên X, hãy đếm xem trong
mảng có bao nhiêu số lớn hơn X và bao nhiêu số nhỏ hơn X.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng; Dòng thứ 3 là số nguyên X
Constraints
1<=N<=1000; -10^3<=A[i], X<=10^3;
Output Format
Dòng 1 in ra các số nhỏ hớn X, dòng 2 in ra các số lớn hơn X
Sample Input 0
5
-798 183 434 850 555
135 -->

<?php 
$arr = [-798, 183, 434, 850, 555];
$x = 135;

$cnt_nhohon = 0;
$cnt_lonhon = 0;

foreach ($arr as $key => $value) {
    if ($value > $x) {
        ++$cnt_lonhon;
    } else if ($value < $x) {
        ++$cnt_nhohon;
    }
}
echo $cnt_lonhon, $cnt_nhohon;
?>