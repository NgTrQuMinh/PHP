<?php
// 1. Nhóm đo lường và cắt chuỗi ---------------------
// 1.1 Đếm độ dài chuỗi: strlen() và mb_strlen()
$str = "Xin chào";
echo strlen($str);    // Kết quả: 9 (vì chữ 'à' chiếm 2 byte)
echo mb_strlen($str); // Kết quả: 8 (đúng số ký tự)

// 1.2 Cắt chuỗi: substr() và mb_substr()
$id = "ORDER_12345";
echo substr($id, 0, 5); // Kết quả: "ORDER"

// 1.3 Tìm phần cuối của chuỗi: strrchr()
$filename = "hinh_anh_dep.jpg";
$extension = strrchr($filename, ".");
echo $extension; // Kết quả: ".jpg"

// 1.4 Tìm index: strpos() và strrpos()
$email = "admin@example.com";
echo strpos($email, "@"); // Kết quả: 5

// 2. Nhóm tìm kiếm và thay thế ------------------ 
// 2.1 Thay thế chuỗi: str_replace()
$text = "Chào mừng bạn đến với PHP. PHP là ngôn ngữ tuyệt vời.";
echo str_replace("PHP", "Javascript", $text);   // Kết quả: "Chào mừng bạn đến với Javascript. Javascript là ngôn ngữ tuyệt vời."

// 2.2 Thay thế không phân biệt hoa thường: str_ireplace()
$comment = "Đồ ngốc này!";
echo str_ireplace("ngốc", "***", $comment); //  "Đồ *** này!" (Dù người dùng viết Ngốc hay nGốc)

// 2.3 Tìm index xuất hiện: strpos() và strripos()
$email = "user@gmail.com";
$pos = strpos($email, "@");
if ($pos !== false) {
    echo "Email hợp lệ, dấu @ ở vị trí: " . $pos;
}

// 2.4 Thay thế một phần chuỗi theo index: substr_replace()
$phone = "0901234567";
echo substr_replace($phone, "****", 3, 4);  // Kết quả: "090****567"

// 3. Nhóm biến đổi định dạng ---------------
// 3.1 Xử lý khoảng trắng: trim(), ltrim(), rtrim()
$input = "   hello   ";
echo "[" . trim($input) . "]"; // Kết quả: [hello]

// 3.2 Chuyển đổi Hoa - Thường: strtolower() và strtoupper()
$email = "Admin@Example.Com";
echo strtolower($email); // Kết quả: admin@example.com

// 3.3 Viết hoa chữ cái đầu: ucfirst() và ucwords()
$name = "nguyen van an";
echo ucwords($name); // Kết quả: Nguyen Van An

// 3.4. Lặp chuỗi và Đảo ngược: str_repeat() và str_rev()   -------------
echo str_repeat("*", 5); // Kết quả: *****
echo strrev("ABC");      // Kết quả: CBA

// 4. Nhóm chuyển đổi giữa Mảng và Chuỗi    ----------
// 4.1 Tách Chuỗi thành Mảng: explode()
$str = "Đọc sách, Xem phim, Đá bóng";
$hobbies = explode(", ", $str);
print_r($hobbies);
/* Kết quả:
Array (
    [0] => Đọc sách
    [1] => Xem phim
    [2] => Đá bóng
) */

// 4.2 Gộp Mảng thành Chuỗi: implode()
$tags = ["PHP", "Laravel", "BackEnd"];
$tag_string = implode(" #", $tags);
echo "#" . $tag_string;// Kết quả: #PHP #Laravel #Backend

// 4.3 Tách chuỗi thành các ký tự đơn lẻ: str_split()
$str = "HELLO";
$arr = str_split($str); // Kết quả: ['H', 'E', 'L', 'L', 'O']


// 4.4 Chuyển chuỗi thành mảng các từ: str_word_count()
$str = "PHP rất tuyệt!";
$words = str_word_count($str, 1); // Tham số 1 để trả về mảng
// Kết quả: ['PHP', 'rất', 'tuyệt']


// 5. Ví dụ thực tế: Chuẩn hóa tên người dùng
$raw_name = "  nguYEn vAn aN  ";
// 1. Loại bỏ khoảng trắng thừa 2 đầu
$name = trim($raw_name);
// 2. Chuyển tất cả về chữ thường
$name = strtolower($name);
// 3. Viết hoa chữ cái đầu của mỗi từ
$name = ucwords($name);
echo $name; // Kết quả: "Nguyen Van An"
?>