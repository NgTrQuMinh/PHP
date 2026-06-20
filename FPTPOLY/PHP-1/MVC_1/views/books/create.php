<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>➕ THÊM SÁCH MỚI</h2>

<form action="index.php?act=store" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label>Tiêu đề:</label></td>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <td><label>Hình ảnh:</label></td>
            <td><input type="file" name="cover_image"></td>
        </tr>
        <tr>
            <td><label>Tác giả:</label></td>
            <td><input type="text" name="author" required></td>
        </tr>
        <tr>
            <td><label>NXB:</label></td>
            <td><input type="text" name="publisher" required></td>
        </tr>
        <tr>
            <td><label>Ngày xuất bản:</label></td>
            <td><input type="date" name="publish_date" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">💾 Lưu sách</button>
                <a href="index.php?act=index">❌ Hủy</a>
            </td>
        </tr>
    </table>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>