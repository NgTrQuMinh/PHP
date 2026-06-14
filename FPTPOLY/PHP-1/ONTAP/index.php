<?php
require_once 'views/header.php';
require_once 'config/database.php';
require_once 'model/Books.php';

$database = new Database();
$db = $database->connect();
$modelBook = new Book($db);

// 1. XỬ LÝ XÓA (Dùng GET để bắt tham số từ thẻ <a> ở bảng)
if (isset($_GET['action']) && $_GET['action'] === 'del') {
    $modelBook->id = $_GET['id'];
    $modelBook->deleteBook();
}

// 2. XỬ LÝ LẤY DỮ LIỆU CŨ ĐỂ SỬA
$editBook = null;
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $modelBook->id = $_GET['id'];
    $editBook = $modelBook->readOne();
}

// 3. XỬ LÝ KHI SUBMIT FORM (THÊM / CẬP NHẬT)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelBook->title = $_POST['title'];
    $modelBook->author = $_POST['author'];
    $modelBook->publisher = $_POST['publisher'];
    $modelBook->publish_date = $_POST['publish_date'];
    $modelBook->cover_image = $_POST['old_cover_image'] ?? '';
}
?>

<h2>HỆ THỐNG QUẢN LÝ SÁCH (ALL-IN-ONE)</h2>
<div class="form-box">
    <h3><?= $editBook ? "Cập nhật mẫu sách" : "Thêm mẫu sách" ?></h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $editBook['id'] ?? '' ?>">
        <input type="hidden" name="old_cover_image" value="<?= $editBook['cover_image'] ?? '' ?>">

        <div class="form-group">
            <label>Tên sách:</label>
            <input type="text" name="title" value="<?= $editBook['title'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Hình ảnh bìa:</label>
            <?php if (!empty($editBook['cover_image'])): ?>
                <img src="uploads/<?= $editBook['cover_image'] ?>" width="60" style="display:block; margin-bottom:5px;">
            <?php endif; ?>
            <input type="file" name="cover_image">
        </div>
        <div class="form-group">
            <label>Tác giả:</label>
            <input type="text" name="author" value="<?= $editBook['author'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Nhà xuất bản:</label>
            <input type="text" name="publisher" value="<?= $editBook['publisher'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Ngày xuất bản:</label>
            <input type="date" name="publish_date" value="<?= $editBook['publish_date'] ?? '' ?>" required>
        </div>

        <button type="submit" class="btn" style="background: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            <?= $editBook ? "Cập nhật" : "Lưu lại" ?>
        </button>
        <a href="index.php" style="margin-left:10px;">Hủy bỏ</a>
    </form>
</div>

<br>
<?php $readBookAll = $modelBook->readAll(); ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sách</th>
            <th>Hình ảnh bìa</th>
            <th>Tác giả</th>
            <th>Nhà xuất bản</th>
            <th>Ngày xuất bản</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($readBookAll) && !empty($readBookAll)): ?>
            <?php foreach ($readBookAll as $value) { ?>
                <tr>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['title']; ?></td>
                    <td>
                        <?= !empty($value['cover_image']) ? "<img src='uploads/{$value['cover_image']}' width='50'>" : "Không ảnh" ?>
                    </td>
                    <td><?= $value['author']; ?></td>
                    <td><?= $value['publisher']; ?></td>
                    <td><?= $value['publish_date']; ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $value['id']; ?>" style="color: blue; text-decoration: none; margin-right: 10px;">Sửa</a>
                        <a href="index.php?action=del&id=<?= $value['id']; ?>" onclick="return confirm('Xóa không?')" style="color: red; text-decoration: none;">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">Chưa có dữ liệu.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once 'views/footer.php'; ?>