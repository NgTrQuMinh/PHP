<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Câu lệnh Include, include_once, require, require_once
    
    // 1. So sánh include và require (Cách xử lý lỗi)
    // Điểm khác biệt lớn nhất nằm ở chỗ chương trình sẽ làm gì nếu không tìm thấy file.
    
    // include: Chỉ đưa ra một cảnh báo (Warning). Script vẫn tiếp tục chạy các câu lệnh bên dưới. Hãy dùng nó khi file được chèn không quá quan trọng (ví dụ: file giao diện chân trang - footer).
    // require: Đưa ra một lỗi nghiêm trọng (Fatal Error). Script sẽ dừng lại ngay lập tức. Hãy dùng nó cho các file quan trọng (ví dụ: file kết nối database, file chứa hàm hệ thống).
    include "./10_Function.php"; // chèn bài 10 vào file này.
    require_once "./12_Function_AnDanh.php";
    // 2. So sánh đuôi _once (Số lần chèn file)
    // Khi bạn thêm hậu tố _once, PHP sẽ kiểm tra xem file đó đã được chèn trước đó chưa.
    
    // include / require: Chèn file bao nhiêu lần tùy ý. Nếu bạn gọi 3 lần, nội dung file đó sẽ xuất hiện 3 lần (có thể gây lỗi khai báo trùng hàm).
    // include_once / require_once: Chỉ chèn file duy nhất một lần trong suốt quá trình chạy script. Nếu file đã được chèn rồi, các lệnh gọi sau sẽ bị bỏ qua.
    
    // Lời khuyên thực tế: > * Hầu hết các lập trình viên hiện nay ưu tiên dùng require_once cho các file cấu hình, thư viện hoặc định nghĩa class để đảm bảo an toàn và tránh lỗi trùng lặp.
    // Dùng include khi bạn muốn chèn các thành phần giao diện (HTML) mà nếu lỡ mất thì trang web vẫn có thể hiển thị các phần khác.
    ?>
</body>

</html>