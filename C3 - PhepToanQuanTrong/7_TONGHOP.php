<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 1. Toán tử Số học (Arithmetic Operators)
    // "   +   -   *   /  **    %   "
    $Result1 = 2 + 2 - 1 * 2 / 2;
    printf("Kết quả: %.2f <br>", $Result1); // 3
    $Result2 = $Result1 % 2;
    printf("Lấy Dư: %.2f <br>", $Result2);

    // 2. Toán tử Gán (Assignment Operators)
    $a = 10;
    $b = 5;

    $a += $b;    // Tương đương 10 + 5 và gán vào a.
    echo "{$a} <br><br>";

    // 3. Toán tử So sánh (Comparison Operators)
    $x = 100;
    $y = "100";

    var_dump($x == $y);  // true (Vì giá trị đều là 100)
    var_dump($x === $y); // false (Vì một cái là số Integer, một cái là Chuỗi String)
    echo "<br> <br>";

    // 4. Toán tử Tăng/Giảm (Increment/Decrement)
    $m = 5;
    echo ++$m, "<br>"; 
    // 6 (Tăng rồi mới in)
    $n = 5;
    echo $n++, "<br>"; 
    // 5 (In rồi mới tăng, sau dòng này $y mới bằng 6)

    // 5. Toán tử Logic (Logical Operators) &&
    $username = "admin";
    $password = "12345";

    if ($username == "admin" && $password == "12345") {
        echo "Đăng nhập thành công!";
    } else {
        echo "Sai thông tin!";
    }

    // 6. Toán tử Nối chuỗi (String Operators) -> . để nối chuỗi
    $firstName = "Nguyễn";
    $lastName = "Văn A";

    echo $firstName . " " . $lastName; 
    // Nguyễn Văn A
    $txt = "Học PHP ";
    $txt .= "rất dễ!"; // Nối thêm vào biến $txt
    echo $txt; // Học PHP rất dễ!
    ?>
</body>

</html>