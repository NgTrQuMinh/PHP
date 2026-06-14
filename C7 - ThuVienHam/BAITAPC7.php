<?php
// B1: Tính số phân trang $num_page hiển thị có tổng số bài $total_rows và số bài $num_per_page trên mỗi trang $num_per_page
$total_rows = 100;
$num_per_page = 25;

// Tính $num_page
$num_page = ceil($total_rows / $num_per_page);
echo $num_page . "<br>";

// B2: Xuất 1 mảng số nguyên chẵn từ 1 mảng số nguyên cho trc
$list_number = [2, 3, 4, 6, 1, 11, 21];
$list_even = [];
if (is_array($list_number) && !empty($list_number)) {
    foreach ($list_number as $value) {
        if ($value % 2 === 0) {
            array_push($list_even, $value);
        }
    }
}
foreach ($list_even as $value) {
    echo "$value ";
}

// B3: Hiển thị mảng danh mục theo đa cấp
// Giáo dục
// -- Khuyến học
// -- Du học
// -- THể thao
// -- Châu âu
// -- Châu á

$Arr = [
    1 => ["ID" => 1, "Title" => "Giáo dục", "Lever" => 0],
    2 => ["ID" => 2, "Title" => "Khuyến học", "Lever" => 1],
    3 => ["ID" => 3, "Title" => "Du học", "Lever" => 2],
    4 => ["ID" => 4, "Title" => "Thể thao", "Lever" => 3],
    5 => ["ID" => 5, "Title" => "Châu âu", "Lever" => 4],
    6 => ["ID" => 6, "Title" => "Châu á", "Lever" => 5],
]
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        th,
        td {
            width: 200px;
            padding: 10px;
            border: 1px solid gray;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Lever</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($Arr) && is_array($Arr)) {
                foreach ($Arr as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["ID"]; ?></td>
                        <td><?php echo $value["Title"]; ?></td>
                        <td><?php echo $value["Lever"]; ?></td>
                    </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>