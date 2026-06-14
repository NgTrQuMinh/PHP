<!-- [Mảng 1 chiều cơ bản]. Bài 1. Đếm chẵn lẻ, tổng chẵn lẻ
Cho mảng số nguyên A[] gồm N phần tử, nhiệm vụ của bạn là đếm xem trong 
mảng có bao nhiêu số chẵn, bao nhiêu số lẻ, tổng các phần tử là số chẵn, tổng 
các phần tử là số lẻ.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách 
nhau một vài khoảng trắng
Constraints
1<=N<=1000; -10^3<=A[i]<=10^3;
Output Format
Dòng đầu tiên in ra số lượng số chắn. Dòng thứ 2 in ra số lượng số lẻ. Dòng thứ 3 
in ra tổng các số chẵn. Dòng thứ 4 in ra tổng các số lẻ.
Sample Input 0
6-711 327 372 779 451 -864 
Sample Output 0
2
4
-492
846 -->
<?php 
$Arr = [-711, 327, 372, 779, 451, -864 ];
$cnt_C = 0;
$cnt_L = 0;
for ($i = 0; $i < count($Arr); $i++) {
    if ($Arr[$i] % 2 === 0) {
        ++$cnt_C;
    } else {
        ++$cnt_L;
    }
}
echo $cnt_C . "<br>" . "<br>" . $cnt_L;
?>