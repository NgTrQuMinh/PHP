<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0px auto;
        }

        table {
            width: 50%;
            height: auto;
        }

        th,
        td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    function Check_Even($n)
    {
        if ($n % 2 === 0) {
            return true;
        }
        return false;
    }

    $B1 = 10;
    if (Check_Even($B1)) {
        echo "{$B1} là số nguyên chẵn<br>";
    } else {
        echo "Đây là số nguyên lẻ<br>";
    }

    function PrimeNumber($n)
    {
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return $n > 1;
    }

    function SumPrime($n)
    {
        $sum = 0;
        for ($i = 0; $i <= $n; $i++) {
            if (PrimeNumber($i)) {
                $sum += $i;
            }
        }
        return $sum;
    }
    $B2 = 50;
    echo "Tổng các số nguyên tố từ 0 đến 50 là: " . SumPrime($B2) . "<br>";


    $ArrB3 = [
        1 => ["ID" => "1", "Name" => "Minh", "Class" => "IT1"],
        2 => ["ID" => "2", "Name" => "Tuấn", "Class" => "IT2"],
        3 => ["ID" => "3", "Name" => "Nhật", "Class" => "IT3"]
    ];

    function GetId($id)
    {
        global $ArrB3;
        foreach ($ArrB3 as $student) {
            if (array_key_exists($id, $ArrB3)) {
                return $ArrB3[$id];
            }
            // // Kiểm tra xem giá trị ID trong mảng con có khớp với $id truyền vào không
            // if ($student['ID'] == $id) {
            //     return $student; // Trả về toàn bộ mảng thông tin sinh viên đó
            // }
        }
        return false; // Trả về false nếu không tìm thấy
    }

    $item = GetId(1);
    echo "<pre>";
    print_r($item);
    echo "</pre>";

    ?>
    <table>
        <thead>
            <tr>
                <th>MÃ SINH VIÊN</th>
                <th>TÊN</th>
                <th>LỚP</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ArrB3 as $student) { ?>
                <tr>
                    <td><?php echo $student['ID']; ?></td>
                    <td><?php echo $student['Name']; ?></td>
                    <td><?php echo $student['Class']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>