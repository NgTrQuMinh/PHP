<?php
function emptyForm()
{
    if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["phone"])) {
        return false;
    } else {
        return true;
    }
}

function validatePhoneNumber($phone)
{
    // Regex cho 10 số, bắt đầu bằng 0 (ví dụ: 0912345678)
    $pattern = '/^0[0-9]{9}$/';
    if (preg_match($pattern, $phone)) {
        return true;
    }
    return false;
}

function validateEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function checkPasswordStrength($password)
{
    // 1. Kiểm tra độ dài (ít nhất 8 ký tự)
    if (strlen($password) < 8) {
        return "Mật khẩu phải có ít nhất 8 ký tự.";
    }

    // 2. Phải có chữ hoa
    if (!preg_match("/[A-Z]/", $password)) {
        return "Mật khẩu phải chứa ít nhất một chữ cái viết hoa.";
    }

    // 3. Phải có chữ thường
    if (!preg_match("/[a-z]/", $password)) {
        return "Mật khẩu phải chứa ít nhất một chữ cái viết thường.";
    }

    // 4. Phải có ít nhất một con số
    if (!preg_match("/[0-9]/", $password)) {
        return "Mật khẩu phải chứa ít nhất một chữ số.";
    }

    // 5. Phải có ký tự đặc biệt (ví dụ: @, #, $, %,...)
    if (!preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $password)) {
        return "Mật khẩu phải chứa ít nhất một ký tự đặc biệt.";
    }

    return true; // Mật khẩu hợp lệ
}

$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (emptyForm()) {
        echo "Form khong dc de trong";
    } else {
        echo "Form da duoc nhap du thong tin";
    }

}


?>