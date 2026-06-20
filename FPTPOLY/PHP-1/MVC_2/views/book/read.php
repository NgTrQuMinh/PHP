<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Chi tiết Sách</h2>
<a href="index.php?act=index">← Quay lại danh sách</a>

<table border="1" cellpadding="8">
    <tr><th>Tiêu đề</th>     <td><?= htmlspecialchars($book['title']) ?></td></tr>
    <tr><th>Ảnh bìa</th>     <td><img src="<?= htmlspecialchars($book['cover_image']) ?>" width="100" alt="ảnh bìa"></td></tr>
    <tr><th>Tác giả</th>     <td><?= htmlspecialchars($book['author_name']) ?></td></tr>  <!-- ← FIX: tên thay vì id -->
    <tr><th>NXB</th>         <td><?= htmlspecialchars($book['publisher']) ?></td></tr>
    <tr><th>Ngày XB</th>     <td><?= $book['publish_date'] ?></td></tr>
</table>

<br>
<a href="index.php?act=edit&id=<?= $book['id'] ?>">Sửa</a> |
<a href="index.php?act=delete&id=<?= $book['id'] ?>"
   onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</a>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
