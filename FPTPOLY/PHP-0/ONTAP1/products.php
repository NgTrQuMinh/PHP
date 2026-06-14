<?php
$products = [
    [
        'id' => 1,
        'name' => 'Product A',
        'price' => 200,
        'category' => 'Electronics',
        'stock' => 50
    ],
    [
        'id' => 2,
        'name' => 'Product B',
        'price' => 300,
        'category' => 'Clothing',
        'stock' => 100
    ],
    [
        'id' => 3,
        'name' => 'Product C',
        'price' => 500,
        'category' => 'Electronics',
        'stock' => 20
    ],
    [
        'id' => 4,
        'name' => 'Product D',
        'price' => 700,
        'category' => 'Clothing',
        'stock' => 80
    ],
    [
        'id' => 5,
        'name' => 'Product E',
        'price' => 1000,
        'category' => 'Electronics',
        'stock' => 30
    ]
];

// b. Thực hiện chức năng tìm kiếm sản phẩm
function checkNameAsCategory($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input), "UTF-8");
    foreach ($arr as $value) {
        $NameValue = trim(mb_strtolower($value["name"]));
        $CategoryValue = trim(mb_strtolower($value["category"]));
        if (str_contains($NameValue, $input) || str_contains($CategoryValue, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST["search"] ?? $products;
    $functionSearch = checkNameAsCategory($products, $input);
    if (!$functionSearch) {
        $error = "NOT DEFINE";
        $products = [];
    } else {
        $products = $functionSearch;
    }
}

// c. Thêm cột Trạng thái kho
function AddCheckStock($stock) {
    if ($stock >= 50) {
        return "Còn nhiều";
    } else if ($stock >= 10) {
        return "Còn ít";
    } else {
        return "Sắp hết hàng";
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
            border: 1px solid gray;
            padding: 10px 25px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <!-- a. Hiển thị danh sách sản phẩm lên Table -->
    <table>
        <thead>
            <tr>
                <th> Mã sản phẩm</th>
                <th> Tên sản phẩm</th>
                <th> Giá  sản phẩm</th>
                <th>Danh mục </th>
                <th> Số lượng tồn kho</th>
                <th>Trạng thái kho</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)){ ?>
                <tr>
                    <td colspan="5" style="color: red; text-align: center;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($products as $value) { ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo number_format($value["price"]); ?></td>
                    <td><?php echo $value["category"]; ?></td>
                    <td><?php echo $value["stock"]; ?></td>
                    <td><?php echo AddCheckStock($value["stock"]); ?></td>
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