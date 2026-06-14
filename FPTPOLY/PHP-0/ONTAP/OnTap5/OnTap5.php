<?php
$students = [
    ["id" => 1, "name" => "Minh", "math" => 9.5, "literature" => 8, "english" => 9.5, "class" => "IT1"],
    ["id" => 2, "name" => "Nhật", "math" => 7, "literature" => 7, "english" => 8, "class" => "IT2"],
    ["id" => 3, "name" => "Tuấn", "math" => 8, "literature" => 7, "english" => 8, "class" => "IT1"],
    ["id" => 4, "name" => "Quang", "math" => "7", "literature" => 9, "english" => 7, "class" => "IT2"],
    ["id" => 5, "name" => "Trường", "math" => 8, "literature" => 8, "english" => 8, "class" => "IT1"],
];

// a. Hiển thị bảng điểm (2đ) Hiển thị đủ cột, thêm cột "Điểm TB" (tính trung bình 3 môn, làm tròn 2 chữ số)
function Average($x, $y, $z)
{
    return ($x + $y + $z) / 3;
}

// b. Cột "Xếp loại" dựa vào điểm TB (1đ)
$cnt = 0;
function Ranking($score)
{
    if ($score > 8) {
        return "Giỏi";
    } else if ($score >= 6.5) {
        return "Khá";
    } else if ($score >= 5) {
        return "Trung bình";
    } else {
        return "Yếu";
    }
}

// c. Thống kê cuối bảng (1đ)
// Hiển thị: Tổng số SV, số SV Giỏi, Điểm TB cao nhất, Điểm TB thấp nhất
function Statistical($arr)
{
    $cnt = 0;
    $cnt_score = 0;
    $max = -1e9;
    $min = 1e9;
    foreach ($arr as $value) {
        $cnt++;
        $avg = Average($value["math"], $value["literature"], $value["english"]);
        if ($avg > 8) {
            $cnt_score++;
        }
        if ($avg > $max) {
            $max = $avg;
        }
        if ($avg < $min) {
            $min = $avg;
        }
    }

    echo "Tổng số sinh viên: " . $cnt . "<br>";
    echo "Số sinh viên giỏi: " . $cnt_score . "<br>";
    echo "Điểm TB cao nhất: " . number_format($max, 2) . "<br>";
    echo "Điểm TB thấp nhất: " . number_format($min, 2) . "<br>";
}

// d. Tìm kiếm theo tên hoặc lớp (1đ)
function Search($arr, $input) {
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["name"]));
        $valueClass = trim(mb_strtolower($value["class"]));
        if (strpos($valueName,$input) !== false || strpos($valueClass,$input) !== false)  {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $result = Search($students, $input);
    if ($input == "") {
        $students;
    } else if (empty($result)) {
        $students = [];
        $eror = "Không tìm thấy sinh viên (Không hiển thị bảng)";
    } else {
        $students = Search($students, $input);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px 10px;
            border-collapse: collapse;
        }

        .Statistical {
            padding: 10px 15px;
            border: 1px solid gray;
            width: fit-content;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Điểm Toán</th>
                <th>Điểm Lý</th>
                <th>Điểm Anh</th>
                <th>Phòng</th>
                <th>Điểm Trung Bình</th>
                <th>Xếp loại</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td>
                        <?= $student["id"] ?>
                    </td>
                    <td>
                        <?= $student["name"] ?>
                    </td>
                    <td>
                        <?= $student["math"] ?>
                    </td>
                    <td>
                        <?= $student["literature"] ?>
                    </td>
                    <td>
                        <?= $student["english"] ?>
                    </td>
                    <td>
                        <?= $student["class"] ?>
                    </td>
                    <td>
                        <?= number_format(Average($student["math"], $student["literature"], $student["english"]), 2) ?>
                    </td>
                    <td>
                        <?= Ranking(Average($student["math"], $student["literature"], $student["english"])) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="Statistical">
        <p><?php Statistical($students) ?></p>
    </div>
    <br>
    <form action="" method="post">
        <input type="text" name="input" id="input">
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>