<?php
session_start();
function createInvoice($id, $customer, $usage, $month, $rate)
{
    return [
        'id' => $id,
        'customer' => $customer,
        'usage' => $usage,
        'month' => $month,
        'rate' => $rate
    ];
}

// Dữ liệu hóa đơn
$invoices = [
    createInvoice(1, "Nguyễn Văn A", 230, "05/2023", 400),
    createInvoice(2, "Hoàng Thị B", 180, "06/2023", 500),
    createInvoice(3, "Trần Thi C", 350, "07/2023", 600),
    createInvoice(4, "Lê Văn D", 190, "08/2023", 700),
    createInvoice(5, "Nguyễn Thị E", 270, "09/2023", 800)
];

// b. Thực hiện chức năng tìm kiếm hóa đơn (2đ)
// ●	Tìm kiếm tương đối theo tên khách hàng hoặc tháng lập hóa đơn


function searchCustomerAsMonth($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $valueCustomer = trim(mb_strtolower($value["customer"], "UTF-8"));
        $valueMonth = trim(mb_strtolower($value["month"], "UTF-8"));
        if (str_contains($valueCustomer, $input) || str_contains($valueMonth, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchInput = $_POST["search"] ?? $invoices;
    $functionSearch = searchCustomerAsMonth($invoices, $searchInput);
    if (!$functionSearch) {
        $error = "Ko co du lieu";
        $invoices = [];
    } else {
        $invoices = $functionSearch;
    }
}

// c. Trong danh sách thêm 1 cột Tiền điện cơ bản (2đ)
// Tiền điện cơ bản = Số điện tiêu thụ * Đơn giá
// ●	Nếu số điện tiêu thụ >= 300 kWh: Tăng thêm 20% tiền điện cơ bản
// ●	Nếu số điện tiêu thụ >= 100 kWh: Tăng thêm 10% tiền điện cơ bản
// ●	Nếu số điện tiêu thụ < 100 kWh: Giảm 5% tiền điện cơ bản

function tinhtiendien($usage, $rate)
{
    $result = $usage * $rate;

    if ($usage >= 300) {
        $result += $result * 0.2;
    } else if ($usage >= 100) {
        $result += $result * 0.1;
    } else {
        $result -= $result * 0.05;
    }

    return $result;
}

// d. Trong danh sách thêm cột Tổng tiền phải trả (1đ)
// Xây dựng và sử dụng hàm tính Tổng tiền phải trả, với:
// ●	Tổng tiền phải trả = Tiền điện cơ bản (đã điều chỉnh theo mức tiêu thụ)
function tongtienphaitra($usage, $rate)
{
    return tinhtiendien($usage, $rate);
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
            padding: 10px 15px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1><?php echo $_SESSION['username'] ?></h1>
    <table>
        <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th> Tên khách hàng </th>
                <th>Số điện tiêu thụ </th>
                <th>Tháng lập hóa đơn </th>
                <th>Đơn giá </th>
                <th>Tiền điện cơ bản </th>
                <th>TTổng tiền phải trả </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: red;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($invoices as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['customer'] ?></td>
                    <td><?php echo number_format($value['usage']); ?></td>
                    <td><?php echo $value['month'] ?></td>
                    <td><?php echo $value['rate'] ?></td>
                    <td><?php echo number_format(tinhtiendien($value['usage'], $value['rate'])); ?></td>
                    <td><?php echo number_format(tongtienphaitra($value['usage'], $value['rate'])); ?></td>
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