<?php
session_start();
$hotels = [
    [
        'id' => 1,
        'name' => 'Hotel A',
        'price' => 200000,
        'type' => 'Deluxe Room',
        'days' => 3
    ],
    [
        'id' => 2,
        'name' => 'Hotel B',
        'price' => 150000,
        'type' => 'Standard Room',
        'days' => 4
    ],
    [
        'id' => 3,
        'name' => 'Hotel C',
        'price' => 250000,
        'type' => 'Luxury Suite',
        'days' => 7
    ],
    [
        'id' => 4,
        'name' => 'Hotel D',
        'price' => 300000,
        'type' => 'Superior Room',
        'days' => 5
    ],
    [
        'id' => 5,
        'name' => 'Hotel E',
        'price' => 180000,
        'type' => 'Apartment',
        'days' => 6
    ]
];

// Tim kiem theo ten phong hoac loai phong
function search($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input), "UTF-8");
    foreach ($arr as $value) {
        $valuName = trim(mb_strtolower($value['name']), "UTF-8");
        $valueType = trim(mb_strtolower($value['type']), "UTF-8");
        if (str_contains($valuName, $input) || str_contains($valueType, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = trim($_POST['input']) ?? $hotels;
    $search = search($hotels, $input);
    if (empty($search)) {
        $error = "Khong co thong tin";
        $hotels = [];
    } else {
        $hotels = $search;
    }
}

// Them cot giam gia
function discount($days)
{
    if ($days >= 5) {
        return 0.1;
    } else if ($days >= 3 && $days <= 4) {
        return 0.05;
    } else {
        return 0;
    }
}

function SumMoney($price, $days)
{
    $discount = discount($days); // tim ra giam gia
    $sumdays = $price * $days;
    $daysDiscount = $sumdays * $discount; // tinh tong tien sau khi giam
    return $sumdays - $daysDiscount;
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
            padding: 10px 15px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1><?php if (isset($_SESSION)) {
        echo "Welcome " . $_SESSION['isLogin'];
    } ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
                <th>Days</th>
                <th>discount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $value) { ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo number_format($value['price']); ?></td>
                    <td><?php echo $value['type']; ?></td>
                    <td><?php echo $value['days']; ?></td>
                    <td><?php echo discount($value['days']) * 100 . "%"; ?></td>
                    <td><?php echo number_format(SumMoney($value['price'], $value['days'])); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <form action="" method="post">
        <input type="text" name="input" id="input">
        <button type="submit">Tìm kiếm</button>
    </form>

</body>

</html>