<?php
require_once('views/header.php');
require_once('config/database.php');
require_once('model/CRUD.php');

$database = new Database();
$db = $database->connect();
$model = new CRUD($db);

$EditNV = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['act']) && $_GET['act'] === 'delete') {
        $model->id = $_GET['id'] ?? '';
        $model->delete();
        header('Location: index.php');
        exit();
    } else if (!empty($_GET['act']) && $_GET['act'] === 'edit') {
        $model->id = $_GET['id'] ?? '';
        $EditNV = $model->read();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->id = $_POST['id'] ?? '';
    $model->ten = $_POST['name'] ?? '';
    $model->email = $_POST['email'] ?? '';
    $model->luong = $_POST['money'] ?? '';

    $model->img = $_POST['old_img'] ?? '';
    if (!empty($_FILES['anh_sp']['name'])) { // Nếu có chọn file ảnh mới
        $model->img = time() . '_' . $_FILES['anh_sp']['name']; // Đổi tên ảnh
        move_uploaded_file($_FILES['anh_sp']['tmp_name'], 'uploads/' . $model->img); // Lưu vào thư mục
    }

    if (!empty($_POST['id'])) {
        $model->update();
    } else {
        $model->create();
    }
    header('Location: index.php');
    exit();
}



$readAll = $model->readAll();
?>

<h1>DANH SÁCH NHÂN VIÊN</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $EditNV['id'] ?? ''; ?>">
    <input type="hidden" name="old_img" value="<?php echo $EditNV['img'] ?? ''; ?>">

    <input type="file" name="anh_sp" id="anh_sp"><br><br>
    <input type="text" name="name" id="name" value="<?php echo $EditNV['ten'] ?? ''; ?>" placeholder="Name"><br><br>
    <input type="text" name="email" id="email" value="<?php echo $EditNV['email'] ?? ''; ?>" placeholder="Email"><br><br>
    <input type="number" name="money" id="money" value="<?php echo $EditNV['luong'] ?? ''; ?>" min="0" placeholder="Money"><br><br>
    <input type="submit" value="Submit">
</form>
<br>
<hr><br>

<table style="padding: 10px 15px; text-align: center; border: 1px solid gray;">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Money/Month</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($readAll as $value) { ?>
            <tr>
                <td>
                    <img src="uploads/<?php echo $value['img']; ?>" width="100">
                </td>
                <td><?php echo $value['ten']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['luong']; ?></td>
                <td>
                    <a href="index.php?act=edit&id=<?php echo $value['id']; ?>" class="btn">Edit</a>
                    <a href="index.php?act=delete&id=<?php echo $value['id']; ?>" class="btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
require_once('views/footer.php');
?>