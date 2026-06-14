<?php
$books = [
    ["id" => 1, "title" => "Nhà Giả Kim", "author" => "Paulo Coelho", "price" => 79000, "pages" => 420, "category" => "Kỹ thuật"],
    ["id" => 2, "title" => "Đắc Nhân Tâm", "author" => "Dale Carnegie", "price" => 56000, "pages" => 500, "category" => "Văn học"],
    ["id" => 3, "title" => "Đi Tìm Lẽ Sống", "author" => "Viktor Frankl", "price" => 70000, "pages" => 200, "category" => "Kỹ thuật"],
    ["id" => 4, "title" => "Totto-chan: Cô Bé Bên Cửa Sổ", "author" => "Kuroyanagi Tetsuko", "price" => 96000, "pages" => 120, "category" => "Văn học"],
    ["id" => 5, "title" => "Hoàng Tử Bé", "author" => "Antoine de Saint-Exupéry", "price" => 34000, "pages" => 230, "category" => "Văn học"],

];

// b. Tìm kiếm sách (1đ)
function searchBook($arr, $input)
{
    $result = [];
    $input = trim(mb_strtolower($input));
    foreach ($arr as $value) {
        $titleValue = trim(mb_strtolower($value["title"]));
        $authorValue = trim(mb_strtolower($value["author"]));
        if (strpos($titleValue, $input) !== false || strpos($authorValue, $input) !== false) {
            $result[] = $value;
        }
    }
    return $result;
}

// c. Thêm cột "Phân loại độ dày" (1đ)
function classPage($value)
{
    if ($value >= 400) {
        echo "Sách dày";
    } else if ($value >= 150 && $value <= 399) {
        echo "Sách trung bình";
    } else {
        echo "Sách mỏng";
    }
}

// d. Lọc theo danh mục - Dropdown chọn danh mục để lọc danh sách sách, Có tùy chọn "Tất cả" để hiển thị lại toàn bộ
function category($arr, $dropdown) {
    $result = [];

}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["input"];
    $result = searchBook($books, $input);
    if ($input == "") {
        $books;
    } else if (empty($result)) {
        $books = [];
        $error = "NOT FOUND";
    } else {
        $books = searchBook($books, $input);
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
    <!-- a. Hiển thị danh sách sách lên Table (2đ) -->
    <table>
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Giá bán</th>
                <th>Số trang</th>
                <th>Danh mục</th>
                <th>Phân loại</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $value) { ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["title"]; ?></td>
                    <td><?php echo $value["author"]; ?></td>
                    <td><?php echo number_format($value["price"]); ?></td>
                    <td><?php echo $value["pages"]; ?></td>
                    <td><?php echo $value["category"]; ?></td>
                    <td><?php classPage($value["pages"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="" method="post">
        <input type="text" name="input" id="input">
        <select name="dropdown" id="dropdown">
            <option value="all">Tất cả</option>
            <option value="KyThuat">Kỹ thuật</option>
            <option value="VanHoc">Văn học</option>
        </select>
        <button type="submit">Tìm kiếm</button>
    </form>
</body>

</html>