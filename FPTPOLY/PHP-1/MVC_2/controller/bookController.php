<?php
require_once __DIR__ . '/../model/bookModel.php';
require_once __DIR__ . '/../model/authorModel.php';

class BookController
{
    private BookModel   $bookModel;
    private AuthorModel $authorModel;

    public function __construct($db)
    {
        $this->bookModel   = new BookModel($db);
        $this->authorModel = new AuthorModel($db);
    }

    // Danh sách tất cả sách
    public function index()
    {
        $books = $this->bookModel->readAll();   // ← FIX: 2 biến riêng, không ghi đè
        require_once __DIR__ . '/../views/book/index.php';
    }

    // Xem chi tiết 1 cuốn sách
    public function read($id)
    {
        $book = $this->bookModel->read($id);
        require_once __DIR__ . '/../views/book/read.php';
    }

    // Hiện form thêm sách
    public function create()
    {
        $authors = $this->authorModel->readAll();  // ← truyền authors vào view
        require_once __DIR__ . '/../views/book/create.php';
    }

    // Xử lý POST thêm sách mới
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Phương thức không hợp lệ!");
        }

        $title        = trim($_POST['title']        ?? '');
        $cover_image  = trim($_POST['cover_image']  ?? '');
        $author_id    = trim($_POST['author_id']    ?? '');
        $publisher    = trim($_POST['publisher']    ?? '');
        $publish_date =      $_POST['publish_date'] ?? '';

        $this->bookModel->create($title, $cover_image, $author_id, $publisher, $publish_date);

        header('Location: index.php?act=index');
        exit;
    }

    // Hiện form sửa sách
    public function edit($id)
    {
        $book    = $this->bookModel->read($id);
        $authors = $this->authorModel->readAll();  // ← dropdown tác giả
        require_once __DIR__ . '/../views/book/edit.php';
    }

    // Xử lý POST cập nhật sách
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Phương thức không hợp lệ!");
        }

        $id           =      $_POST['id']           ?? null;
        $title        = trim($_POST['title']        ?? '');
        $cover_image  = trim($_POST['cover_image']  ?? '');
        $author_id    = trim($_POST['author_id']    ?? '');
        $publisher    = trim($_POST['publisher']    ?? '');
        $publish_date =      $_POST['publish_date'] ?? '';

        $this->bookModel->update($id, $title, $cover_image, $author_id, $publisher, $publish_date);

        header('Location: index.php?act=index');
        exit;
    }

    // Xoá sách
    public function delete($id)
    {
        $this->bookModel->delete($id);
        header('Location: index.php?act=index');
        exit;
    }
}
