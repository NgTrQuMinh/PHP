<?php
session_start();
$movies = [
    ["id" => 1, "title" => "Interstellar", "duration" => 169, "genre" => "Sci-Fi", "year" => 2014],
    ["id" => 2, "title" => "Inception", "duration" => 148, "genre" => "Sci-Fi", "year" => 2010],
    ["id" => 3, "title" => "The Dark Knight", "duration" => 152, "genre" => "Action", "year" => 2008],
    ["id" => 4, "title" => "Forrest Gump", "duration" => 142, "genre" => "Drama", "year" => 1994],
    ["id" => 5, "title" => "The Matrix", "duration" => 136, "genre" => "Sci-Fi", "year" => 1999]
];

// b. Thực hiện chức năng tìm kiếm phim (1đ)
// Tìm kiếm tương đối theo:
// Tên phim
// Hoặc thể loại
function TimKiemPhim($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input, "UTF-8"));
    foreach ($arr as $value) {
        $TenPhim = trim(mb_strtolower($value['title'], "UTF-8"));
        $TheLoai = trim(mb_strtolower($value['genre'], "UTF-8"));
        if (str_contains($TenPhim, $input) || str_contains($TheLoai, $input)) {
            $result[] = $value;
        }
    }
    return $result;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['search'] ?? $movies;
    $functionSearch = TimKiemPhim($movies, $input);
    if (!$functionSearch) {
        $error = "NOT DEFINE";
        $movies = [];
    } else {
        $movies = $functionSearch;
    }
}

// c. Trong danh sách thêm 1 cột "Phân loại độ dài phim" (1đ)	
// Nếu duration >= 150 → "Phim dài"
// Nếu duration từ 90 đến 149 → "Phim trung bình"
// Nếu < 90 → "Phim ngắn"
function PhanLoai($duration)
{
    if ($duration >= 150) {
        return "Phim dài";
    } else if ($duration >= 90 && $duration <= 149) {
        return "Phim trung bình";
    } else {
        return "Phim ngắn";
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
            border: 1px solid gray;
            padding: 10px 25px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php if ($_SESSION['user'] ?? "") { ?>
        <h1><?php echo $_SESSION['user']; ?></h1>
    <?php } ?>

    <!-- a. Hiển thị danh sách phim lên Table (2đ) -->
    <table>
        <thead>
            <tr>
                <th>Mã phim</th>
                <th>Tên phim</th>
                <th>Thời lượng</th>
                <th>Thể loại</th>
                <th>Năm phát hành</th>
                <th>Phân loại độ dài phim</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($error)) { ?>
                <tr>
                    <td colspan="6" style="color: red; text-align:center;"><?php echo $error ?></td>
                </tr>
            <?php } ?>
            <?php foreach ($movies as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['duration'] . "p"; ?></td>
                    <td><?php echo $value['genre'] ?></td>
                    <td><?php echo $value['year'] ?></td>
                    <td><?php echo PhanLoai($value['duration']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <form action="" method="post">
        <input type="text" name="search" id="serch" placeholder="Timkiem">
        <button type="submit">TimKiem</button>
    </form>
</body>

</html>