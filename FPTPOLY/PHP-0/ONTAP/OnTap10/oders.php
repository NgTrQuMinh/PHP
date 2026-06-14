<?php
session_start();

$oders = [
    ["id" => 1, "customer" => "Nguyễn Hương G", "total" => 130000, "status" => "pendding", "quantity" => 1],
    ["id" => 2, "customer" => "Trần Thị H", "total" => 400000, "status" => "shipping", "quantity" => 2],
    ["id" => 3, "customer" => "Nguyễn Kỳ D", "total" => 100000, "status" => "completed", "quantity" => 3],
    ["id" => 4, "customer" => "Nguyễn Văn Q", "total" => 450000, "status" => "pendding", "quantity" => 2],
    ["id" => 5, "customer" => "Nguyễn Trần Quang M", "total" => 180000, "status" => "completed", "quantity" => 5],
];
// echo "<pre>";
// print_r($oders);
// echo "</pre>";

// Tim Kiếm
function serchNameorStatus($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input), "UTF-8");
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["customer"]), "UTF-8");
        $valueStatus = trim(mb_strtolower($value["status"]), "UTF-8");
        if (str_contains($valueStatus, $input) || str_contains($valueName, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $inputForm = $_POST["inputSearch"] ?? $oders;
    $searchOders = serchNameorStatus($oders, $inputForm);
    if (empty($searchOders)) {
        $error = "Không có thông tin";
        $oders = [];
    } else {
        $oders = $searchOders;
    }
}

// Thêm cột phí vận chuyển
function quantityTotal($quantity)
{
    if ($quantity >= 5) {
        return 0;
    } else if ($quantity >= 3 && $quantity <= 4) {
        return 15000;
    } else {
        return 25000;
    }
}

// Thống kê
function Statistical($arr)
{
    $cnt = 0;
    $sum = 0;
    foreach ($arr as $value) {
        $sum += ($value["total"] * $value["quantity"]) + quantityTotal($value["quantity"]); // Tổng doanh thu + ship
        $cnt += $value["quantity"];
    }
    echo "Tổng doanh thu: " . $sum . "<br>";
    echo "Tổng số đơn hàng: " . $cnt . "<br>";
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
            border-collapse: collapse;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <h1><?php echo "Xin chào, " . $_SESSION["username"]; ?></h1>
    <table>
        <thead>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Giá Trị Đơn Hàng</th>
                <th>Trạng Thái</th>
                <th>Số Lượng</th>
                <th>Phi Vận Chuyển</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="5">
                        <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                    </td>
                </tr>
            <?php } ?>
            <?php foreach ($oders as $key => $value) { ?>
                <tr>
                    <td><?php echo htmlspecialchars_decode($value["id"]); ?></td>
                    <td><?php echo htmlspecialchars_decode($value["customer"]); ?></td>
                    <td><?php echo htmlspecialchars_decode(number_format($value["total"])); ?></td>
                    <td><?php echo htmlspecialchars_decode($value["status"]); ?></td>
                    <td><?php echo htmlspecialchars_decode($value["quantity"]); ?></td>
                    <td><?php echo htmlspecialchars_decode(number_format(quantityTotal($value["quantity"]))); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <div>
        <h2><?php Statistical($oders); ?></h2>
    </div>
    <br>
    <br>
    <form action="" method="post">
        <input type="text" name="inputSearch" id="inputSearch">
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>