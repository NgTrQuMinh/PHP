<?php
// Phương thức GET là một phương thức gửi dữ liệu từ client(trình duyệt) lên server, thông qua URL.
// Khi bạn gửi dữ liệu qua GET, các thông tin sẽ xuất hiện ngay trên thanh địa chỉ của trình duyệt.
// Ví dụ: https://example.com/search.php?keyword=iphone&color=black
// keyword và color là các biến (keys).
// iphone và black là giá trị (values).
// Dấu ? bắt đầu chuỗi truy vấn và dấu & dùng để ngăn cách các cặp dữ liệu.

// 2. Cách dùng trong PHP
// Dữ liệu gửi lên được PHP tự động đưa vào mảng liên kết toàn cục $_GET.
// Ví dụ:
// Nếu URL là index.php?id=10&user=admin
// $id = $_GET['id'];     // Kết quả: 10
// $user = $_GET['user']; // Kết quả: admin

// 3. Khi nào dùng?
// Tìm kiếm dữ liệu.
// Phân trang (?page=2).
// Lọc sản phẩm (theo màu sắc, giá cả).
// Các thao tác không làm thay đổi dữ liệu trên hệ thống (chỉ để xem).

// if (!empty($_GET)) {
//     echo $_GET["userName"];
//     echo $_GET["password"];
//     echo $_GET["search"];
// }

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// Kiểm tra submit form



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET)) {
        $userName = $_GET["userName"];
        $password = $_GET["password"];

        echo "$userName - $password";
    }
}
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
?>
<form method="get">
    <input type="text" name="userName" id="userName" placeholder="userName">
    <input type="password" name="password" id="password" placeholder="password">
    <button type="submit">Gửi</button>
</form>