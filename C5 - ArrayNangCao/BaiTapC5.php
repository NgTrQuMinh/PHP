<?php
$Arr1 = [];
for ($i = 3; $i <= 150; $i++) {
    if ($i % 2 !== 0) {
        array_push($Arr1, $i);
    }
}

for ($i = 0; $i < count($Arr1); $i++) {
    echo "$Arr1[$i] ";
}
echo "<br>";
$Arr2 = [
    [
        "STT" => 1,
        "Field_Name" => "id",
        "Label" => "Mã Bài Viết",
        "Description" => "ID định danh duy nhất cho từng bài viết"
    ],
    [
        "STT" => 2,
        "Field_Name" => "post_title",
        "Label" => "Tiêu Đề",
        "Description" => "Tiêu đề chính của bài viết"
    ],
    [
        "STT" => 3,
        "Field_Name" => "post_content",
        "Label" => "Nội Dung",
        "Description" => "Nội dung chi tiết đầy đủ của bài viết"
    ],
    [
        "STT" => 4,
        "Field_Name" => "post_desc",
        "Label" => "Mô Tả Ngắn",
        "Description" => "Đoạn tóm tắt hoặc trích dẫn ngắn cho bài viết"
    ],
    [
        "STT" => 5,
        "Field_Name" => "cat_id",
        "Label" => "Mã Danh Mục",
        "Description" => "Liên kết đến ID của danh mục bài viết"
    ],
    [
        "STT" => 6,
        "Field_Name" => "post_thumb",
        "Label" => "Ảnh Đại Diện",
        "Description" => "Đường dẫn tệp tin hình ảnh của bài viết"
    ],
];

// foreach ($Arr2 as $index1 => $value1) {
//     foreach ($value1 as $key => $value) {
//         echo "- $key: $value <br>";
//     }
// }

$students = [
    ["STT" => 1, "Name" => "Minh", "Class" => "CNTT"],
    ["STT" => 2, "Name" => "Tuấn", "Class" => "CNTT"],
    ["STT" => 3, "Name" => "Nhật", "Class" => "CNTT"],
    ["STT" => 4, "Name" => "Trường", "Class" => "CNTT"],
    ["STT" => 5, "Name" => "Hòa", "Class" => "CNTT"],
]
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách cấu trúc bài viết</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h2>B2</h2>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Trường (Field)</th>
                <th>Nhãn (Label)</th>
                <th>Mô Tả Ý Nghĩa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Arr2 as $item) { ?>
                <tr>
                    <td><?php echo $item['STT']; ?></td>
                    <td><?php echo $item['Field_Name']; ?></td>
                    <td><strong><?php echo $item['Label']; ?></strong></td>
                    <td><?php echo $item['Description']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Bài 3</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $value){ ?>
                <tr>
                    <td><?php echo $value["STT"]; ?></td>
                    <td><?php echo $value["Name"]; ?></td>
                    <td><?php echo $value["Class"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>