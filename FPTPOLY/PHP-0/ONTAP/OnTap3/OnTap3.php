<?php
$movies = [
    ["id" => 1, "title" => "Tom and Jerry", "duration" => 75, "genre" => "Cartoon", "year" => "2005"],
    ["id" => 2, "title" => "The Lion King", "duration" => 68, "genre" => "Cartoon", "year" => "1994"],
    ["id" => 3, "title" => "Toy Story", "duration" => 185, "genre" => "Cartoon", "year" => "1995"],
    ["id" => 4, "title" => "Frozen", "duration" => 122, "genre" => "Cartoon", "year" => "2013"],
    ["id" => 5, "title" => "Finding Nemo", "duration" => 142, "genre" => "Cartoon", "year" => "2003"],
];

// b. Thực hiện chức năng tìm kiếm phim (1đ)
function filterName($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $valueName = trim(mb_strtolower($value["title"]));
        $valueGendere = trim(mb_strtolower($value["genre"]));
        if (strpos($valueName, $input) !== false || strpos($valueGendere, $input) !== false) {
            $result[] = $value;
        }
    }
    return $result;
}

$eror = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["input"];
    $result = filterName($movies, $input);
    if ($input == "") {

    } else if (empty($result)) {
        $movies = [];
        $eror = "Không tìm thấy phim (Không hiển thị bảng)";
    } else {
        $movies = filterName($movies, $input);
    }
}

// c. Trong danh sách thêm 1 cột "Phân loại độ dài phim" (1đ)	
function Classify($duration) {
    if ($duration  >= 150) {
        echo "Phim dài";
    } else if ($duration < 150 && $duration >= 90) {
        echo "Phim trung bình";
    } else {
        echo "Phim ngắn";
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
            border: 1px solid black;
            padding: 5px 10px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Mã phim</th>
                <th>Tên phim</th>
                <th>Thời lượng</th>
                <th>Thể loại</th>
                <th>Năm phát hành</th>
                <th>Phân loại</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($eror)) { ?>
            <tr>
                <td colspan="5"><?php echo $eror ?></td>
            </tr>
            <?php } ?>
            <?php foreach ($movies as $value) { ?>
                <tr>
                    <td><?= $value["id"]; ?></td>
                    <td><?= $value["title"]; ?></td>
                    <td><?= $value["duration"] . "p"; ?></td>
                    <td><?= $value["genre"]; ?></td>
                    <td><?= $value["year"]; ?></td>
                    <td><?php Classify($value["duration"]) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="" method="post">
        <input type="text" name="input" id="input">
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>