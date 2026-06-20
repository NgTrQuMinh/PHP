<?php
require_once __DIR__ . '/../model/bookmodel.php';

class bookcontroller
{
    private bookmodel $model;

    public function __construct($db)
    {
        $this->model = new bookmodel($db);
    }

    // Danh sách sách
    public function index()
    {
        $readAll = $this->model->readAll();
        require_once __DIR__ . '/../views/books/index.php';
    }

    // Xem chi tiết
    public function read($id)
    {
        $book = $this->model->read($id);
        require_once __DIR__ . '/../views/books/read.php';
    }

    // Hiện form thêm
    public function create()
    {
        require_once __DIR__ . '/../views/books/create.php';
    }

    // Xử lý POST thêm sách
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("Phương thức không hợp lệ!");

        $title        = trim($_POST['title']        ?? '');
        $author       = trim($_POST['author']       ?? '');
        $publisher    = trim($_POST['publisher']    ?? '');
        $publish_date =      $_POST['publish_date'] ?? '';
        $cover_image  = $this->handleUpload(null);  // ← dùng hàm upload chung

        // FIX: thứ tự đúng với model->create($title, $cover_image, $author, ...)
        $result = $this->model->create($title, $cover_image, $author, $publisher, $publish_date);

        if ($result) {
            header('Location: index.php?act=index');
            exit();
        }
        echo "Thêm thất bại!";
    }

    // Hiện form sửa
    public function edit($id)
    {
        $book = $this->model->read($id);
        if (!$book) die("Không tìm thấy sách ID: $id");
        require_once __DIR__ . '/../views/books/edit.php';
    }

    // Xử lý POST cập nhật sách
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("Phương thức không hợp lệ!");

        $id           = trim($_POST['id']           ?? '');
        $title        = trim($_POST['title']        ?? '');
        $author       = trim($_POST['author']       ?? '');
        $publisher    = trim($_POST['publisher']    ?? '');
        $publish_date =      $_POST['publish_date'] ?? '';
        $old_image    =      $_POST['old_cover_image'] ?? null;
        $cover_image  = $this->handleUpload($old_image); // giữ ảnh cũ nếu không upload mới

        $result = $this->model->update($id, $title, $cover_image, $author, $publisher, $publish_date);

        if ($result) {
            header('Location: index.php?act=index');
            exit();
        }
        echo "Cập nhật thất bại!";
    }

    // Xóa sách
    public function delete($id)
    {
        if (!$id) die("Thiếu ID sách!");

        // Xóa file ảnh nếu có
        $book = $this->model->read($id);
        if ($book && !empty($book['cover_image'])) {
            $file = __DIR__ . '/../uploads/' . $book['cover_image'];
            if (file_exists($file)) unlink($file);
        }

        $result = $this->model->delete($id);

        if ($result) {
            header('Location: index.php?act=index');
            exit();
        }
        echo "Xóa thất bại!";
    }

    // ── Hàm phụ: xử lý upload ảnh ──────────────────────────────────────────
    // Trả về tên file mới nếu upload thành công, ngược lại trả về $old_image
    private function handleUpload($old_image)
    {
        if (!empty($_FILES['cover_image']['name']) && $_FILES['cover_image']['error'] === 0) {
            $ext = strtolower(pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $file_name = time() . '_' . uniqid() . '.' . $ext;
                $dest      = __DIR__ . '/../uploads/' . $file_name;

                if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $dest)) {
                    return $file_name;  // upload thành công
                }
            }
        }
        return $old_image;  // giữ ảnh cũ (hoặc null nếu là thêm mới)
    }
}
