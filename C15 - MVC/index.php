<?php
// Đây là cổng vào (Entry Point) của toàn bộ trang web. Khi user truy cập trang web, file này sẽ chạy đầu tiên, gọi Controller lên làm việc.

// index.php

// Gọi file Controller vào
require_once 'App/controllers/BookController.php';

// Khởi tạo Controller và kích hoạt hành động hiển thị danh sách sách
$controller = new BookController();
$controller->index();
