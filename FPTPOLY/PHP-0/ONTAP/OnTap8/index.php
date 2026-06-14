<?php
$orders = array(
    array("id" => 1, "code" => "ORD001", "customerName" => "Alice Smith", "total" => 29.99, "status" => "Chờ xử lý", "date" => "23/4/2023"),
    array("id" => 2, "code" => "ORD002", "customerName" => "Bob Johnson", "total" => 19.99, "status" => "Đang giao", "date" => "17/5/2023"),
    array("id" => 3, "code" => "ORD003", "customerName" => "Charlie Brown", "total" => 59.99, "status" => "Hoàn thành", "date" => "28/6/2023"),
    array("id" => 4, "code" => "ORD004", "customerName" => "David Wilson", "total" => 9.99, "status" => "Đã huỷ", "date" => "5/7/2023"),
    array("id" => 5, "code" => "ORD005", "customerName" => "Eve Davis", "total" => 29.99, "status" => "Chờ xử lý", "date" => "12/8/2023")
);

function setClassStatus($status)
{
    if ($status == "Hoàn thành") {
        return "Complete";
    } else if ($status == "Đang giao") {
        return "Processing";
    } else if ($status == "Chờ xử lý") {
        return "Wait";
    } else {
        return "Cancelled";
    }
}

// b. Cột "Mức đơn hàng" (1đ)
// total ≥ 5,000,000 → "Đơn lớn"  |  ≥ 1,000,000 → "Đơn vừa"  |  < 1,000,000 → "Đơn nhỏ"
function OderAmount($total)
{
    if ($total >= 50.000) {
        return "Đơn lớn";
    } else if ($total >= 10.000) {
        return "Đơn vừa";
    } else {
        return "Đơn nhỏ";
    }
}

// c. Tìm kiếm & lọc (1đ)
// 1 ô input: tìm theo mã đơn hàng hoặc tên khách hàng
// Dropdown lọc theo trạng thái đơn hàng
function searchOrder($arr, $search)
{
    $result = [];
    $search = trim(mb_strtolower($search), "UTF-8");
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["customerName"]), "UTF-8");
        $valueCode = trim(mb_strtolower($value["code"]), "UTF-8");
        if (str_contains($valueName, $search) || str_contains($valueCode, $search)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $Search = $_POST["Search"];
    $SearchOder = searchOrder($orders, $Search);
    if ($Search == "") {
        $orders;
    } else if (empty($SearchOder)) {
        $orders = [];
        $error[] = "Ko co thong tin";
    } else {
        $orders = searchOrder($orders, $Search);
    }
}

// d. Thống kê tóm tắt (1đ)
// Tổng số đơn hàng, tổng doanh thu (chỉ đơn "Hoàn thành"), số đơn bị huỷ
function sumOder($arr) {
    $sum = 0; $cnt = 0;
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
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .Wait {
            color: yellow;
        }

        .Processing {
            color: greenyellow;
        }

        .Complete {
            color: green;
        }

        .Cancelled {
            color: red;
        }
    </style>
</head>

<body>
    <!-- // a. Hiển thị bảng đơn hàng (2đ) Hiển thị đủ cột; Tổng tiền định dạng VNĐ Cột "Trạng thái" có màu nền khác nhau theo từng trạng thái -->
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Mức đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="7" style="text-align: center; color: red;"><?php echo $error[0]; ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($orders as $value) { ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["code"] ?></td>
                    <td><?php echo  $value["customerName"]; ?></td>
                    <td><?php echo number_format($value["total"], 3); ?></td>
                    <td class="<?php echo setClassStatus($value["status"]); ?>">
                        <?php echo $value["status"]; ?>
                    </td>
                    <td><?php echo $value["date"]; ?></td>
                    <td><?php echo OderAmount($value["total"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <div>
        <p><strong><?php echo sumOder($orders); ?></strong></p>
    </div>
    <br><br>
    <form action="" method="post">
        <input type="text" name="Search" id="Search">
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>