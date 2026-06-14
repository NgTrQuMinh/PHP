<?php
require_once 'views/header.php';
require_once 'config/database.php';
require_once 'model/CRUD.php';

// gọi class Database.
$database = new Database();
// kết nối với database với tên là $db
$db = $database->connect();

// gọi class Book + kết nối với Database với tên là $modelBook.
$modelBook = new Book($db);

// sử dùng REQUEST_METHOD === 'GET' để lấy tất cả thanh URL.
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $editBook = null;
    // nếu URL = index.php?act=delete&id=(?) 
    if (!empty($_GET['act']) && $_GET['act'] === 'delete') {
        $modelBook->id = $_GET['id']; // gán id từ click vào $modelBook['id].
        $modelBook->deleteBook(); // thực hiện câu lệnh SQL từ deleteBook().
        header('Location: index.php');
        exit();
    }
    // nếu URL = index.php?act=edit&id=(?) 
    else if (!empty($_GET['act']) && $_GET['act'] === 'edit') {
        $modelBook->id = $_GET['id']; // gán id từ click vào $modelBook['id].
        $editBook = $modelBook->readOne(); // thực hiện câu lệnh SQL từ readOne() đọc file.
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ Form gán vào class Book.
    $modelBook->title = $_POST['title'] ?? '';
    $modelBook->author = $_POST['author'] ?? '';
    $modelBook->publisher = $_POST['publisher'] ?? '';
    $modelBook->publish_date = $_POST['publish_date'] ?? '';

    $idToUpdate = $_POST['id'] ?? '';

    // Nếu Nếu ID không rỗng -> lấy $idToUpdate gán vào class Book với hàm updateBook.
    if (!empty($idToUpdate)) {
        $modelBook->id = $idToUpdate;
        $modelBook->updateBook();
    } else {
        // Ngược lại nếu ko có ID -> thực hiện INSERT INTO vào database bằng hàm addBook.
        $addBook = $modelBook->addBook();
    }
    header('Location: index.php');
    exit();
}
?>


<div class="form-box">

    <form action="" method="POST">
        <?php if (!empty($editBook)): ?>
            <input type="hidden" name="id" value="<?php echo $editBook['id']; ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Tên sách:</label>
            <input type="text" name="title" value="<?php echo $editBook['title'] ?? ''; ?>">
        </div>
        <div class=" form-group">
            <label>Tác giả:</label>
            <input type="text" name="author" value="<?php echo $editBook['author'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label>Nhà xuất bản:</label>
            <input type="text" name="publisher" value="<?php echo $editBook['publisher'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label>Ngày xuất bản:</label>
            <input type="date" name="publish_date" value="<?php echo $editBook['publish_date'] ?? ''; ?>">
        </div>
        <button type="submit">Lưu</button>
    </form>
</div>

<?php $RenderBook = $modelBook->readAll(); ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Nhà xuất bản</th>
            <th>Ngày xuất bản</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($RenderBook as $book) { ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['publisher']; ?></td>
                <td><?php echo $book['publish_date']; ?></td>
                <td>
                    <a href="index.php?act=edit&id=<?php echo $book['id']; ?>">Edit</a>
                    <a href="index.php?act=delete&id=<?php echo $book['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php
require_once 'views/footer.php';
?>