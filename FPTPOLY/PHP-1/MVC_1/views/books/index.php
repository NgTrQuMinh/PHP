<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>📚 DANH SÁCH SÁCH</h2>
<a href="index.php?act=create">➕ Thêm sách mới</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ảnh bìa</th>
            <th>Tác giả</th>
            <th>NXB</th>
            <th>Ngày XB</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($readAll as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td>
                <?php if ($book['cover_image']): ?>
                    <img src="uploads/<?= $book['cover_image'] ?>" width="60" alt="ảnh bìa">
                <?php else: ?>
                    Không có ảnh
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['publisher']) ?></td>
            <td><?= $book['publish_date'] ?></td>
            <td>
                <a href="index.php?act=read&id=<?= $book['id'] ?>">📖 Xem</a> |
                <a href="index.php?act=edit&id=<?= $book['id'] ?>">✏️ Sửa</a> |
                <a href="index.php?act=delete&id=<?= $book['id'] ?>"
                   onclick="return confirm('Xóa sách này?')">🗑️ Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
