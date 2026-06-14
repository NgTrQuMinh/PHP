<?php
session_start();
$products = array(
    // Sản phẩm 1
    array(
        'id' => 1,
        'name' => 'Smartphone Apple iPhone 13',
        'price' => 7990000,
        'category' => 'Điện tử',
        'stock' => 50
    ),

    // Sản phẩm 2
    array(
        'id' => 2,
        'name' => 'Dress Lady Diptyque Eau de Parfum',
        'price' => 375000,
        'category' => 'Thời trang',
        'stock' => 30
    ),

    // Sản phẩm 3
    array(
        'id' => 3,
        'name' => 'Microwave Ovens Bosch WM4091A',
        'price' => 2500000,
        'category' => 'Gia dụng',
        'stock' => 10
    ),

    // Sản phẩm 4
    array(
        'id' => 4,
        'name' => 'Waterproof Camera Sony Alpha 7R IV',
        'price' => 2890000,
        'category' => 'Điện tử',
        'stock' => 15
    ),

    // Sản phẩm 5
    array(
        'id' => 5,
        'name' => 'Bike Specialized Domane EVO 3 Disc',
        'price' => 890000,
        'category' => 'Gia dụng',
        'stock' => 20
    )
);

// b. Thực hiện chức năng tìm kiếm tương đối theo tên sản phẩm (1đ)
function searchName($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input), "UTF-8");
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value['name'], "UTF-8"));
        if (str_contains($valueName, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST["search"] ?? $products;
    $functionSearch = searchName($products, $input);
    if (!$functionSearch) {
        $error = "KO CO DU LIEU";
        $products = [];
    } else {
        $products = $functionSearch;
    }
}

// c. Thêm cột “Tổng giá trị tồn kho” (1đ)
function TotalPrice($price, $stock) {
    return $price * $stock;
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
        td,
        th {
            border: 1px solid gray;
            padding: 10px 20px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php if ($_SESSION["user"] ?? "") { ?>
        <h1>Xin chào, <?php echo $_SESSION["user"] ?></h1>
    <?php } ?>
    <!-- a. Hiển thị danh sách sản phẩm lên Table (2đ) -->
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Danh mục</th>
                <th>Số lượng tồn kho</th>
                <th>Tổng giá trị tồn kho</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="6" style="color: red; text-align: center;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($products as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo number_format($value['price']); ?></td>
                    <td><?php echo $value['category'] ?></td>
                    <td><?php echo $value['stock'] ?></td>
                    <td><?php echo number_format(TotalPrice($value['price'], $value['stock'])); ?></td>
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