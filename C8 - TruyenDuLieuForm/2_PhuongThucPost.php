<?php
// Phương thức Post là phương thức gửi dữ liệu từ client(trình duyệt) đến server thông qua http, ko hiển thị lên URL
// $_POST - Tườn tự như biến $_GET
// Ưu điểm của POST: dữ liệu ẩn trong request, bảo mật tốt hơn, ko giới hạn kí tự(gửi nhiều dữ liệu tùy server)
// Nhược điểm: ko thể kiểm tra nhanh bằng URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST)) {
        echo $_POST["username"] . "<br>";
        echo htmlspecialchars($_POST["email"] . "<br>");
        echo htmlspecialchars($_POST["password"]) . "<br>"; // bảo mật dữ liệu
    }
}
echo "<pre>";
print_r($_POST);
echo "</pre>";

?>

<form action="" method="post">
    <input type="text" name="username" id="username" placeholder="UserName">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit">Submit</button>
</form>