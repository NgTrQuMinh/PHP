<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Sửa Sách</h2>
<a href="index.php?act=index">← Quay lại danh sách</a>

<br><br>
<form action="index.php?act=update" method="post">      <!-- ← FIX: act=update riêng -->

    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    <label>Tiêu đề:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>

    <label>Link ảnh bìa:</label><br>
    <input type="text" name="cover_image" value="<?= htmlspecialchars($book['cover_image']) ?>"><br><br>

    <label>Tác giả:</label><br>
    <select name="author_id" required>
        <option value="">-- Chọn tác giả --</option>
        <?php foreach ($authors as $author): ?>     <!-- ← FIX: dropdown từ DB -->
        <option value="<?= $author['id'] ?>"
            <?= $author['id'] == $book['author_id'] ? 'selected' : '' ?>>   <!-- ← giữ đúng tác giả hiện tại -->
            <?= htmlspecialchars($author['name']) ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>NXB:</label><br>
    <input type="text" name="publisher" value="<?= htmlspecialchars($book['publisher']) ?>"><br><br>

    <label>Ngày xuất bản:</label><br>
    <input type="date" name="publish_date" value="<?= $book['publish_date'] ?>"><br><br>

    <button type="submit">Lưu thay đổi</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
