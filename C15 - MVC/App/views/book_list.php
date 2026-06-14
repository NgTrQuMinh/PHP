<!-- File này thuần túy là giao diện. Nó sẽ nhận một biến tên là $books được Controller ném sang và lặp để hiển thị ra bảng HTML. -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý Sách - MVC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <h2>📚 Hệ thống quản lý sách (Mô hình MVC)</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sách</th>
                <th>Tác Giả</th>
                <th>Giá Bán</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><strong><?php echo $book['title']; ?></strong></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo number_format($book['price'], 0, ',', '.'); ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Hiện chưa có cuốn sách nào trong hệ thống!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>