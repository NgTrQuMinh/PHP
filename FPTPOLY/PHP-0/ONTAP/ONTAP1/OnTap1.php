<?php

use BcMath\Number;

$products = [
    ["id" => 1, "name" => "Sp1", "price" => 150000, "category" => "1", "stock" => "200"],
    ["id" => 2, "name" => "Sp2", "price" => 250000, "category" => "2", "stock" => "500"],
    ["id" => 3, "name" => "Sp3", "price" => 200000, "category" => "3", "stock" => "100"],
    ["id" => 4, "name" => "Sp4", "price" => 150000, "category" => "1", "stock" => "120"],
    ["id" => 5, "name" => "Sp5", "price" => 120000, "category" => "4", "stock" => "50"],
];


// b. Thực hiện chức năng tìm kiếm sản phẩm
function filterNameCategory($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["name"]));
        $valueCategory = trim(mb_strtolower($value["category"]));
        if (strpos($valueName, $input) !== false || strpos($valueCategory, $input) !== false) {
            $result[] = $value;
        }
    }
    return $result;
}


$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $result = filterNameCategory($products, $input);

    if ($input == "") {
    } else if (empty($result)) {
        $products = []; // làm rỗng bảng
        $error = "Không tìm thấy sản phẩm!";
    } else {
        $products = $result;
    }
}

// c. Thêm cột Trạng thái kho
function renderStock($stock) {
    if ($stock > 50) {
        return "Còn nhiều";
    } else if ($stock > 10 && $stock < 50) {
        return "Còn ít";
    } else {
        return "Sắp hết";
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
            padding: 10px;
        }

        form input,
        button {
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- a. Hiển thị danh sách sản phẩm lên Table -->
    <table>
        <thead>
            <tr>
                <th>Mã hàng hóa</th>
                <th>Tên hàng hóa</th>
                <th>Giá</th>
                <th>Loại hàng hóa</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $value) { ?>
            <tr>
                <td><?php echo $value["id"]; ?></td>
                <td><?php echo $value["name"]; ?></td>
                <td><?php echo number_format($value["price"]); ?></td>
                <td><?php echo $value["category"]; ?></td>
                <td><?php echo $value["stock"]; ?></td>
                <td><?php echo renderStock($value["stock"]); ?></td>
            </tr>
            <?php } ?>

            <?php if (!empty($error)) { ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="" method="post">
        <input type="text" name="input">
        <button type="submit">Tim kiem</button>
    </form>
</body>

</html>