<?php
$employees = [
    ["id" => 1, "name" => "A", "salary" => 120000, "department" => 1, "age" => 21],
    ["id" => 2, "name" => "B", "salary" => 220000, "department" => 2, "age" => 22],
    ["id" => 3, "name" => "C", "salary" => 350000, "department" => 3, "age" => 21],
    ["id" => 4, "name" => "D", "salary" => 120000, "department" => 2, "age" => 25],
    ["id" => 5, "name" => "Em", "salary" => 450000, "department" => 4, "age" => 23],
];

// b. Thực hiện chức năng tìm kiếm sản phẩm
    function employeesName($employees, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input, "UTF-8"));
    foreach ($employees as $value) {
        $valueInput = trim(mb_strtolower($value["name"], "UTF-8"));
        if (str_contains($valueInput, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

// Tìm kiếm nhân viên theo phòng ban
function employeesDepartment($employees, $input)
{
    $result = [];
    foreach ($employees as $value) {
        if ($value["department"] == $input) {
            $result[] = $value;
        }
    }
    return $result;
}

// Lọc theo khoảng tuổi:
function minAgemax($employees, $min, $max)
{
    $result = [];
    foreach ($employees as $value) {
        if ($value["age"] >= $min && $value["age"] <= $max) {
            $result[] = $value;
        }
    }
    return $result;
}

$eror = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $result = employeesName($employees, $input);
    if ($input == "") {
        $employees;
    } else if (empty($result)) {    // neu function khong tim thay ket qua
        $employees = []; // làm rộng bảng
        $eror = "Không tìm thấy nhân viên (Không hiển thị bảng)";
    } else {
        $employees = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Lương</th>
                <th>Phòng ban</th>
                <th>Tuổi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($eror)) { ?>
                <tr>
                    <td><?php echo $eror ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($employees as $value) { ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo number_format($value["salary"], 2); ?></td>
                    <td><?php echo $value["department"]; ?></td>
                    <td><?php echo $value["age"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <form action="" method="POST">
        <h3>Tìm Tên</h3>
        <input type="text" name="input" id="input"><br><br>
        <h3>Lọc tuổi</h2>
            <input type="number" name="inputAgeMin" id="input">
            <input type="number" name="inputAgeMax" id="input"><br><br>
            <button type="submit">Tim kiếm</button>
    </form>
</body>

</html>