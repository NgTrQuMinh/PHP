<?php
include "views/header.php";
include "views/notification.php";
include "config/database.php";
include "model/Task.php";
session_start();

$database = new Database(); // 1. Tạo đối tượng kết nối CSDL
$db = $database->connect(); // 2. Lấy ra kết nối thực tế

$todo = new Task($db);      // 3. Đổ kết nối vào class Task như đã giải thích ở câu trước!

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Nếu người dùng vừa nhấn submit một form nào đó
    if (isset($_POST['add_task'])) {        // Nếu đúng là họ nhấn nút "Add Task"
        $todo->task = $_POST['task'];       // Lấy nội dung chữ họ gõ trong ô input gán vào thuộc tính $task
        $todo->create();                    // Gọi hàm create() để lưu vào Database thông qua bindParam
        $_SESSION['message'] = "Task added successfully!";
    } else if (isset($_POST['complete_task'])) {
        $todo->complete($_POST['id']);
        $_SESSION['message'] = "Task completed successfully!";
    } else if (isset($_POST['undo_complete_task'])) {
        $todo->undo_complete($_POST['id']);
        $_SESSION['message'] = "Task undo completed successfully!";
    } else if (isset($_POST['delete_task'])) {
        $todo->delete($_POST['id']);
        $_SESSION['message'] = "Task deleted successfully!";
    }
}

$tasks = $todo->read();
?>

<!-- notification -->
<?php if (!empty($_SESSION['message'])) { ?>
    <div class="notification-container">
        <div class="notification">
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); // Xoa session $_SESSION['message']; 
            ?>
        </div>
    </div>
<?php } ?>
<div class="container">
    <h1>Todo App</h1>

    <!-- Add Task Form -->
    <form method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required="">
        <button type="submit" name="add_task">Add Task</button>
    </form>

    <!-- Display Tasks -->
    <ul>
        <?php foreach ($tasks as $task) { ?>
            <li class="completed">
                <span class="<?php echo $task['is_completed'] ? "completed" : ""; ?>"><?php echo $task['task']; ?></span>
                <div>
                    <?php if (!$task['is_completed']) { ?>
                        <!-- Complete Task -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                            <button class="complete" type="submit" name="complete_task">Complete</button>
                        </form>
                    <?php } else { ?>
                        <!-- Undo Completed Task -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                            <button class="undo" type="submit" name="undo_complete_task">Undo</button>
                        </form>
                    <?php } ?>
                    <!-- Delete Task -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                        <button class="delete" type="submit" name="delete_task">Delete</button>
                    </form>
                </div>
            </li>
        <?php } ?>
        <li>
            <span>Another Task</span>
            <div>
                <!-- Complete Task -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="2">
                    <button class="complete" type="submit" name="complete_task">Complete</button>
                </form>

                <!-- Delete Task -->
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="2">
                    <button class="delete" type="submit" name="delete_task">Delete</button>
                </form>
            </div>
        </li>
    </ul>
</div>

<script>
    const del = document.querySelector('.delete');
    del.addEventListener('click', function() {
        return confirm('Are you sure you want to delete?');
    });
</script>

<?php include "views/footer.php"; ?>