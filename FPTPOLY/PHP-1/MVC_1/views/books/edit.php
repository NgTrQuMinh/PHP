<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>✏️ SỬA SÁCH</h2>

<form action="index.php?act=update" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <input type="hidden" name="old_cover_image" value="<?= $book['cover_image'] ?>">

    <table>
        <tr>
            <td><label>Tiêu đề:</label></td>
            <td><input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required></td>
        </tr>
        <tr>
            <td><label>Hình ảnh:</label></td>
            <td>
                <?php if ($book['cover_image']): ?>
                    <img src="uploads/<?= $book['cover_image'] ?>" width="100" alt="ảnh bìa"><br>
                <?php endif; ?>
                <input type="file" name="cover_image">
                <small>(Để trống nếu không đổi ảnh)</small>
            </td>
        </tr>
        <tr>
            <td><label>Tác giả:</label></td>
            <td><input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required></td>
        </tr>
        <tr>
            <td><label>NXB:</label></td>
            <td><input type="text" name="publisher" value="<?= htmlspecialchars($book['publisher']) ?>" required></td>
        </tr>
        <tr>
            <td><label>Ngày xuất bản:</label></td>
            <td><input type="date" name="publish_date" value="<?= $book['publish_date'] ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">💾 Cập nhật</button>
                <a href="index.php?act=index">❌ Hủy</a>
            </td>
        </tr>
    </table>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>