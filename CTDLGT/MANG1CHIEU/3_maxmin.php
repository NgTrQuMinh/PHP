<!-- [Mảng 1 chiều cơ bản]. Bài 3. Số nhỏ nhất
Cho mảng số nguyên A[] gồm N phần tử, hãy đếm xem trong mảng của bạn có
bao nhiêu số có cùng giá trị nhỏ nhất. Ví dụ mảng A = {1, 2, 1, 3, 5} thì số nhỏ
nhất trong mảng là 1 xuất hiện 2 lần.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng
Constraints
1<=N<=1000; -10^3<=A[i]<=10^3;
Output Format
In ra đáp án của bài toán
Sample Input 0
5
-854 600 222 472 207  -->
<?php
$arr = [-854, 600, 222, 472, 207];

// 1. Tìm giá trị nhỏ nhất (Min)
$min = 1e9;
foreach ($arr as $value) {
    if ($value < $min) { 
        $min = $value;
    }
}

$cnt = 0;
foreach ($arr as $value) {
    if ($value == $min) {
        $cnt++;
    }
}

// 3. In ra kết quả (số lượng)
echo $cnt, $min;
?>