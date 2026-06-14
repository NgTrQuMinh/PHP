<?php
session_start();    
$movieShowings = array(
    // Lịch chiếu 1
    array(
        'id' => 1,
        'movie_name' => 'The Matrix',
        'ticket_price' => 80000,
        'quantity' => 30,
        'show_time' => "23:45"
    ),

    // Lịch chiếu 2
    array(
        'id' => 2,
        'movie_name' => 'Interstellar',
        'ticket_price' => 120000,
        'quantity' => 20,
        'show_time' => "14:30"
    ),

    // Lịch chiếu 3
    array(
        'id' => 3,
        'movie_name' => 'Inception',
        'ticket_price' => 95000,
        'quantity' => 25,
        'show_time' => "19:45"
    ),

    // Lịch chiếu 4
    array(
        'id' => 4,
        'movie_name' => 'The Dark Knight',
        'ticket_price' => 110000,
        'quantity' => 22,
        'show_time' => "20:15"
    ),

    // Lịch chiếu 5
    array(
        'id' => 5,
        'movie_name' => 'The Matrix Resurrections',
        'ticket_price' => 85000,
        'quantity' => 35,
        'show_time' => "17:45"
    )
);
// 2. Thực hiện chức năng tìm kiếm (1đ)
// Tìm kiếm tương đối theo:
// Tên phim
// Hoặc giờ chiếu
// Không phân biệt chữ hoa/thường
function searchNameASTime($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $inputName = trim(mb_strtolower($value["movie_name"], "UTF-8"));
        $inputTime = trim(mb_strtolower($value["show_time"], "UTF-8"));
        if (str_contains($inputName, $input) || str_contains($inputTime, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST["serach"] ?? $movieShowings;
    $functionSearch = searchNameASTime($movieShowings, $input);
    if (!$functionSearch) {
        $error = "KO CO THONG TIN";
        $movieShowings = [];
    } else {
        $movieShowings = $functionSearch;
    }
}

// 3. Thêm cột “Khuyến mãi theo giờ” (1đ)
function getPromotion($showTime)
{
    $time = strtotime($showTime);

    $time0800 = strtotime("08:00");
    $time1200 = strtotime("12:00");
    $time1800 = strtotime("18:00");
    $time2200 = strtotime("22:00");

    if ($time >= $time0800 && $time <= $time1200) {
        return 20; // Giảm 20%
    } elseif ($time >= $time1800 && $time <= $time2200) {
        return 10; // Giảm 10%
    } else {
        return 0;  // 0%
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
        td,
        th {
            border: 1px solid gray;
            padding: 10px 20px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php if ($_SESSION["user"] ?? ""){ ?>
        <h1><?php echo $_SESSION["user"]; ?></h1>
    <?php } ?>
    <!-- 1. Hiển thị danh sách lịch chiếu lên Table (2đ) -->
    <table>
        <thead>
            <tr>
                <th>Mã phim</th>
                <th>Tên phim</th>
                <th>Giá vé</th>
                <th> Số vé đã bán</th>
                <th>Giờ chiếu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="6" style="color: red; text-align: center;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($movieShowings as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['movie_name'] ?></td>
                    <td><?php echo number_format($value['ticket_price']); ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo $value['show_time'] ?></td>
                    <td><?php echo getPromotion($value['show_time']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table><br><br>
    <form action="" method="post">
        <input type="text" name="serach" id="serach">
        <button type="submit">search</button>
    </form>
</body>

</html>