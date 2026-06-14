<?php
include "views/header.php";
include "config/database.php";
include "model/task.php";

$database = new Database();
$db = $database->connect();
$todo = new Task($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_task'])) {
        $todo->task_name = $_POST['task_name'];  // Gán đúng thuộc tính task_name
        $todo->create();
    } 
}

$task_list = $todo->read();
?>

<div class="container">
    <h2>Ghi Chú Công Việc</h2>

    <!-- FORM THÊM MỚI (CREATE) -->
    <form method="POST" class="form-group">
        <input type="text" name="task_name" placeholder="Nhập công việc..." required>
        <button type="submit" name="add_task">Thêm</button>
    </form>

    <!-- DANH SÁCH CÔNG VIỆC (READ) -->
    <div class="todo-list">

        <!-- Mẫu 1 việc: Chưa hoàn thành -->
        <?php foreach ($task_list as $task) { ?>
            <div class="todo-item">
                <div>
                    <!-- Link bấm vào để đổi trạng thái sang Đã hoàn thành (UPDATE status) -->
                    <a href="update_status.php?id=1&status=1" style="text-decoration: none; margin-right: 8px;">🔲</a>
                    <span><?php echo $task['task_name']; ?></span>
                </div>
                <div class="actions">
                    <a href="edit.php?id=1" class="btn-edit">Sửa</a>
                    <a href="delete.php?id=1" onclick="return confirm('Xóa việc này?')" class="btn-delete">Xóa</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include "views/footer.php";
?>