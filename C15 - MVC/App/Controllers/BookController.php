<?php
// Thằng trung gian điều phối. Nó gọi BookModel để lấy dữ liệu, lưu vào biến $books, sau đó nạp file book_list.php (View) vào để hiển thị.
// app/controllers/BookController.php

// Gọi file Model vào để sử dụng
require_once __DIR__ . '/../model/BookModel.php';

class BookController
{

    public function index()
    {
        // 1. Khởi tạo đối tượng Model
        $bookModel = new BookModel();

        // 2. Lấy dữ liệu từ Model bỏ vào biến $books
        $books = $bookModel->getAllBooks();

        // 3. Gọi file View vào. 
        // Vì file View nằm chung một luồng chạy, nó sẽ tự nhận được biến $books ở trên.
        require_once 'App/views/book_list.php';
    }
}
