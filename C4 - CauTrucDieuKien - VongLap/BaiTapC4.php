<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Tính tổng số chẵn từ 1 đến n(n > 2)
    $sumC = 0;
    for ($i = 2; $i <= 5; $i++) {
        if ($i % 2 === 0) {
            $sumC += $i;
        }
    }
    echo "Tổng từ 2 đến 10 là: " . $sumC;

    // TÍnh tổng nghịch đảo của các số chia hết cho 3 từ 3 đến n(n >= 3)
    $t2 = 0;
    for ($i = 3; $i <= $n; $i+=3) {
       $t2 += (1 / $i);
    }
    echo "tổng nghịch đảo của các số chia hết cho 3" . $t2;

    // Tính 1/2 + 1/3 + 1/4 + ... + n/n+1(n >= 1)
    $t3 = 0;
    for ($i = 1; $i <= $n; $i++) {
        $t3 += ($i/ ($i + 1));
    }
    echo $t3;

    // Giải phương trình bậc 2
    // ax^2 + bx + c = 0
    $a = 0; $b = 1; $c = 2;
    if ($a) {
        $delta = pow($b, 2) - 4 * $a * $c;
        if ($delta < 0) {
            echo "Pt vô nghiệm";
        } else if ($delta === 0) {
            $x = -$b/2 * $a;
            echo "Pt có nghiệm kép: x = {$x}";
        } else {
            $x1 = (-$b + sqrt($delta)) / 2 * $a;
            $x2 = (-$b + sqrt($delta)) / 2 * $a;
            echo "Pt có 2 nghiệm";
        }
    } else {
        echo "Đây ko phải pt bậc 2";
    }

    ?>
</body>
</html>