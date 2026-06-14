<?php require_once 'inc/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // 1. Lấy tên trang từ URL, mặc định là 'home'
    $page = $_GET['page'] ?? 'home';

    // 2. Tạo một Whitelist các trang hợp lệ được phép truy cập
    $allowed_pages = [
        'home',
        'about',
        'contact',
        'products',
        'services',
        'news'
    ];

    // 3. Kiểm tra xem trang yêu cầu có nằm trong whitelist không
    if (in_array($page, $allowed_pages)) {
        $file_path = "pages/{$page}.php";

        // Cẩn thận kiểm tra file có thực sự tồn tại trên ổ đĩa không
        if (file_exists($file_path)) {
            require $file_path;
        } else {
            require 'pages/404.php';
        }
    } else {
        // Nếu không nằm trong whitelist, chuyển thẳng về trang 404
        require 'pages/404.php';
    }
}
?>

<?php require_once 'inc/footer.php'; ?>