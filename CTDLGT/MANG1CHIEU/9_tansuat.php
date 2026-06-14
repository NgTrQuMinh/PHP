<!-- [Mảng 1 chiều cơ bản]. Bài 9. Tần suất
Cho mảng số nguyên A[] gồm N phần tử, hãy liệt kê các giá trị xuất hiện trong
mảng kèm theo tần suất tương ứng, mỗi giá trị chỉ liệt kê một lần theo thứ tự
xuất hiện.
Gợi ý : Xét từng chỉ số i trong mảng, đối với mỗi chỉ số i sẽ duyệt các phần tử
đứng trước nó để xem nó đã xuất hiện trước đó hay chưa, nếu chưa xuất hiện thì
tiến hành duyệt các phần tử đứng sau chỉ số i và đếm xem có bao nhiêu phần tử
bằng với a[i]
Input Format
Dòng đầu tiên là số nguyên dương N; Dòng thứ 2 gồm N số nguyên viết cách
nhau một vài khoảng trắng;
Constraints
1<=N<=1000; 0<=A[i]<=10^3;
Output Format
In ra nhiều dòng, mỗi dòng gồm giá trị kèm theo tần suất tương ứng
Sample Input 0
7
4 2 6 3 0 7 7
Sample Output 0
4 1
2 1
6 1
3 1
0 1
7 2 -->
<?php
$a = [4, 2, 6, 3, 0, 7, 7];
$length = count($a);
for ($i = 0; $i < $length; $i++) {
    $check = 0;
    for ($j = $i + 1; $j < $length; $j++) {
        if ($a[$i] === $a[$j]) {
            $check = 1;
            break;
        }
    }
    if ($check === 0) {
        $cnt = 1;    
        for ($j = 0; $j < $i; $j++) {
            if ($a[$i] === $a[$j]) {
                ++$cnt;
            }
        }
        echo $a[$i], " ". $cnt ."<br>";
    }
}


?>