<?php
$employees = [
    ["id" => 1, "name" => "Nguyễn Văn A", "salary" => 5000000, "department" => "Phòng Kinh Doanh", "age" => 28],
    ["id" => 2, "name" => "Trần Thị B", "salary" => 6000000, "department" => "Phòng Nhân Sự", "age" => 30],
    ["id" => 3, "name" => "Lê Thị C", "salary" => 2000000, "department" => "Phòng Công nghệ", "age" => 29],
    ["id" => 4, "name" => "Nguyễn Anh D", "salary" => 8500000, "department" => "Phòng Kỹ thuật", "age" => 27],
    ["id" => 5, "name" => "Trần Quang E", "salary" => 3500000, "department" => "Phòng Tài chính", "age" => 31],
    ["id" => 6, "name" => "Lê Minh F", "salary" => 500000, "department" => "Phòng Marketing", "age" => 26]
];

// Thêm cột Phân loại nhân viên:
function AddChecksalary($salary)
{
    if ($salary >= 5000000) {
        return "Nhân viên cấp cao";
    } else if ($salary >= 1000000) {
        return "Nhân viên chính thức";
    } else {
        return "Thực tập / Mới vào";
    }
}

// b. Thực hiện chức năng tìm kiếm nhân viên
function SearchNameASDepartment($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["name"], "UTF-8"));
        $valueDepartment = trim(mb_strtolower($value["department"], "UTF-8"));
        if (str_contains($valueName, $input) || str_contains($valueDepartment, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST["search"] ?? $employees;
    $functionSearch = SearchNameASDepartment($employees, $input);
    if (!$functionSearch) {
        $error = "NOT DEFINE";
        $employees = [];
    } else {
        $employees = $functionSearch;
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
            padding: 10px 20px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <!-- a. Hiển thị danh sách nhân viên lên Table -->
    <table>
        <thead>
            <tr>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Lương </th>
                <th>Phòng ban </th>
                <th>Tuổi </th>
                <th>Phân loại nhân viên</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="6" style="color: red; text-align: center;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($employees as $value) { ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo number_format($value['salary']); ?></td>
                    <td><?php echo $value['department']; ?></td>
                    <td><?php echo $value['age']; ?></td>
                    <td><?php echo AddChecksalary($value["salary"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <form action="" method="post">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>
</body>

</html>