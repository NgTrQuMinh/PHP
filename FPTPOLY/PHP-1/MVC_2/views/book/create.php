<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Thêm Sách Mới</h2>
<a href="index.php?act=index">← Quay lại danh sách</a>

<br><br>
<form action="index.php?act=store" method="post">

    <label>Tiêu đề:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Link ảnh bìa:</label><br>
    <input type="text" name="cover_image"><br><br>

    <label>Tác giả:</label><br>
    <select name="author_id" required>
        <option value="">-- Chọn tác giả --</option>
        <?php foreach ($authors as $author): ?>     <!-- ← FIX: dropdown từ DB -->
        <option value="<?= $author['id'] ?>">
            <?= htmlspecialchars($author['name']) ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>NXB:</label><br>
    <input type="text" name="publisher"><br><br>

    <label>Ngày xuất bản:</label><br>
    <input type="date" name="publish_date"><br><br>

    <button type="submit">Thêm sách</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
