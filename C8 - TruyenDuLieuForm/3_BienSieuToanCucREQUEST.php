<?php 
// $_REQUEST là một biến siêu toàn cục (superglobal). Điều này có nghĩa là bạn có thể truy cập nó ở bất kỳ đâu trong mã nguồn 
// (trong hàm, lớp hay tệp tin khác) mà không cần khai báo global.

// 1. Bản chất của $_REQUEST
// $_REQUEST là một mảng liên kết (associative array) chứa dữ liệu được gửi đến server từ cả ba nguồn chính:
// $_GET: Dữ liệu từ URL (ví dụ: ?id=123).
// $_POST: Dữ liệu từ form HTML được gửi bằng phương thức POST.
// $_COOKIE: Dữ liệu từ các cookie được lưu trữ trên trình duyệt.
// Cơ chế hoạt động: Khi một request gửi đến, PHP sẽ tự động gộp nội dung của 3 biến trên vào $_REQUEST(bố).

// 2. Cách sử dụng cơ bản
// Giả sử URL là: profile.php?username=John
// Hoặc một form POST gửi username=John
// $name = $_REQUEST['username']; 
// echo "Xin chào, " . $name;
echo "<pre>";
if (!empty($_REQUEST)) {
    print_r($_REQUEST);
}

// if (!empty($_REQUEST)) {
//     echo $_REQUEST["username"] . "<br>";
//     echo htmlspecialchars($_REQUEST["email"] . "<br>"); 
//     echo htmlspecialchars($_REQUEST["password"]) . "<br>"; // bảo mật dữ liệu
// }
?>

<form action="result.php" method="post">
    <input type="text" name="username" id="username" placeholder="UserName">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit">Submit</button>
</form>