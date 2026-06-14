<!-- [Mảng 1 chiều cơ bản]. Bài 6. Cặp số 1
Cho mảng số nguyên A[] gồm N phần tử, hãy đếm xem trong mảng A[] tồn tại
bao nhiêu cặp số A[i], A[j] với i khác j sao cho tổng của 2 phần tử này bằng số K
cho trước.
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng; Dòng thứ 3 là số nguyên K
Constraints
1<=N<=1000; 0<=A[i], X<=10^3;
Output Format
In ra số lượng cặp thỏa mãn
Sample Input 0
5
1 2 3 1 2
3
Sample Output 0
4 -->

<?php
$arr = [1, 2, 3, 1, 2];
$k = 3;
$n = count($arr);

$cnt = 0;
// Duyệt i từ đầu đến kế cuối
for ($i = 0; $i < $n - 1; $i++) {
    // Duyệt j luôn đứng sau i để tránh trùng vị trí và trùng cặp đã đếm
    for ($j = $i + 1; $j < $n; $j++) {
        if ($arr[$i] + $arr[$j] === $k) {
            // echo "Cặp tìm thấy: A[$i]({$arr[$i]}) + A[$j]({$arr[$j]}) = $k\n";
            $cnt++;
        }
    }
}

echo $cnt; // Kết quả Output: 4



?>