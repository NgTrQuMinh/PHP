<?php
$oders = [
    ["id" => 1, "customer" => "Nguyễn Hương G", "total" => 130000, "status" => "pendding", "quantity" => 1],
    ["id" => 2, "customer" => "Trần Thị H", "total" => 400000, "status" => "shipping", "quantity" => 2],
    ["id" => 3, "customer" => "Nguyễn Kỳ D", "total" => 100000, "status" => "completed", "quantity" => 3],
    ["id" => 4, "customer" => "Nguyễn Văn Q", "total" => 450000, "status" => "pendding", "quantity" => 2],
    ["id" => 5, "customer" => "Nguyễn Trần Quang M", "total" => 180000, "status" => "completed", "quantity" => 5],
];

function TimKiem_TenKH_TT($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input), "UTF-8");
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["customer"], "UTF-8"));
        $valueStatus = trim(mb_strtolower($value["status"], "UTF-8"));
        if (str_contains($valueStatus, $input) || str_contains($valueName, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['search'] ?? "";
    $searchOders = TimKiem_TenKH_TT($oders, $input);
    if (empty($searchOders)) {
        $err = "Không có thông tin";
        $oders = [];
    } else {
        $oders = $searchOders;
    }
}

function AddPhiVanChuyen($quantity)
{
    if ($quantity >= 5) {
        return 0;
    } else if ($quantity >= 3 && $quantity <= 4) {
        return 15000;
    } else {
        return 25000;
    }
}

function TongDonHang($oders)
{
    $sum = 0;
    $cnt = 0;
    foreach ($oders as $value) {
        $sum += ($value["total"] * $value["quantity"]) + AddPhiVanChuyen($value["quantity"]);
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
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Số lượng</th>
                <th>Phí vận chuyển</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($oders as $item) { ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['customer'] ?></td>
                    <td><?php echo number_format($item['total']) ?></td>
                    <td><?php echo $item['status'] ?></td>
                    <td><?php echo $item['quantity'] ?></td>
                    <td><?php echo number_format(AddPhiVanChuyen($item['quantity'])) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <hr>
    <form action="" method="post">
        <input type="text" name="search" id="search">
        <button type="submit">Tìm kiếm</button>
    </form>
    <hr>

    <div id="ThongKe">
        <h3><?php TongDonHang($oders) ?></h3>
    </div>
</body>

</html>