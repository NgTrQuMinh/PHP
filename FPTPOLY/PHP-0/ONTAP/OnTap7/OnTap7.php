<?php
$orders = [
    [
        "id" => "ORD001",
        "customer" => "Nguyễn Văn A",
        "total" => 550000,
        "status" => "Hoàn thành",
        "date" => "15/04/2026"
    ],
    [
        "id" => "ORD002",
        "customer" => "Trần Thị B",
        "total" => 1200000,
        "status" => "Đang giao",
        "date" => "14/04/2026"
    ],
    [
        "id" => "ORD003",
        "customer" => "Lê Văn C",
        "total" => 300000,
        "status" => "Chờ xử lý",
        "date" => "13/04/2026"
    ],
    [
        "id" => "ORD004",
        "customer" => "Phạm Minh D",
        "total" => 750000,
        "status" => "Đã huỷ",
        "date" => "12/04/2026"
    ],
    [
        "id" => "ORD005",
        "customer" => "Hoàng Thị E",
        "total" => 2100000,
        "status" => "Hoàn thành",
        "date" => "11/04/2026"
    ]
];
function getStatusClass($status)
{
    if ($status == "Hoàn thành") {
        return "text-success";
    } elseif ($status == "Đang giao") {
        return "text-primary";
    } elseif ($status == "Chờ xử lý") {
        return "text-warning";
    } else {
        return "text-danger";
    }
}

function orderAmount($orders)
{
    if ($orders >= 5000000) {
        return "Đơn lớn";
    } else if ($orders >= 1000000) {
        return "Đơn vừa";
    } else {
        return "Đơn nhỏ";
    }
}

function SeachIDandName($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $value_id = trim(mb_strtolower($value["id"]));
        $value_name = trim(mb_strtolower($value["customer"]));
        if (str_contains($value_id, $input) || str_contains($value_name, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["input"];
    $Search = SeachIDandName($orders, $input);
    if (isset($_POST["input"])) {
        if ($input == "") {
            $orders;
        } else if (empty($Search)) {
            $orders = [];
        } else {
            $orders = SeachIDandName($orders, $input);
        }
    }
}


function Sumcustomer($arr)
{
    $sum = 0;
    $cnt = 0;
    foreach ($arr as $value) {
        if ($value["status"] === "Hoàn thành") {
            $sum += $value["total"];
        }
        ++$cnt;
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
            padding: 5px 10px;
            border-collapse: collapse;
        }

        .text-success {
            color: green;
            font-weight: bold;
        }

        .text-primary {
            color: blue;
        }

        .text-warning {
            color: orange;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td>Mã đơn hàng</td>
                <td>Tên khách hàng</td>
                <td>Tổng tiền</td>
                <td>Trạng thái</td>
                <td>Ngày đặt hàng</td>
                <td>Mức đơn hàng</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $value) { ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["customer"]; ?></td>
                    <td><?php echo number_format($value["total"]); ?></td>

                    <td class="<?php echo getStatusClass($value["status"]); ?>">
                        <?php echo $value["status"]; ?>
                    </td>

                    <td><?php echo $value["date"]; ?></td>
                    <td><?php echo orderAmount($value["total"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <p><?php Sumcustomer($orders) ?></p>
    </div>
    <br>
    <form action="" method="post">
        <input type="text" name="input" id="input">
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>