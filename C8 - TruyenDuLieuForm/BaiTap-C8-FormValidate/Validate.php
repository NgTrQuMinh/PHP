<?php
/**
 * PHẦN 1: CÁC CÔNG CỤ KIỂM TRA (FUNCTIONS)
 */
function validatePhoneNumber($phone)
{
    return preg_match('/^0[0-9]{9}$/', $phone);
}

function checkPasswordStrength($password)
{
    if (strlen($password) < 8)
        return "Mật khẩu ít nhất 8 ký tự.";
    if (!preg_match("/[A-Z]/", $password))
        return "Cần ít nhất 1 chữ hoa.";
    if (!preg_match("/[0-9]/", $password))
        return "Cần ít nhất 1 chữ số.";
    if (!preg_match("/[!@#$%^&*()]/", $password))
        return "Cần ít nhất 1 ký tự đặc biệt.";
    return true;
}

/**
 * PHẦN 2: XỬ LÝ KHI NGƯỜI DÙNG GỬI FORM
 */
$errors = [];
$old_data = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Thu thập dữ liệu
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $phone = trim($_POST['phone'] ?? '');

    // Giữ lại dữ liệu cũ để người dùng không phải nhập lại
    $old_data = ['username' => $username, 'email' => $email, 'phone' => $phone];

    // Kiểm tra từng trường một (Validation)
    if (empty($username))
        $errors['username'] = "Tên không được để trống.";

    if (empty($email)) {
        $errors['email'] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không đúng định dạng.";
    }

    if (empty($password)) {
        $errors['password'] = "Mật khẩu không được để trống.";
    } else {
        $res = checkPasswordStrength($password);
        if ($res !== true)
            $errors['password'] = $res;
    }

    if (empty($phone)) {
        $errors['phone'] = "Số điện thoại không được để trống.";
    } elseif (!validatePhoneNumber($phone)) {
        $errors['phone'] = "SĐT phải 10 số, bắt đầu bằng số 0.";
    }

    // Nếu "Giỏ lỗi" trống rỗng -> Thành công
    if (empty($errors)) {
        echo "<script>alert('Đăng ký thành công!');</script>";
        $old_data = []; // Xóa trắng form
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    <style>
        /* CSS viết gọn lại cho dễ nhìn */
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            background: #f0f2f5;
        }

        .form-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input.is-invalid {
            border-color: red;
        }

        .error {
            color: red;
            font-size: 0.8rem;
            margin-top: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-card">
        <h2>Đăng Ký</h2>
        <form method="POST">
            <!-- Tên đăng nhập -->
            <div class="group">
                <label>Tên đăng nhập</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($old_data['username'] ?? ''); ?>"
                    class="<?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>">

                <?php if (isset($errors['username'])) { ?>
                    <div class="error"><?php echo $errors['username']; ?></div>
                <?php } ?>
            </div>

            <!-- Email -->
            <div class="group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($old_data['email'] ?? ''); ?>"
                    class="<?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>">

                <?php if (isset($errors['email'])) { ?>
                    <div class="error"><?php echo $errors['email']; ?></div>
                <?php } ?>
            </div>

            <!-- Mật khẩu -->
            <div class="group">
                <label>Mật khẩu</label>
                <input type="password" name="password"
                    class="<?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>">

                <?php if (isset($errors['password'])) { ?>
                    <div class="error"><?php echo $errors['password']; ?></div>
                <?php } ?>
            </div>

            <!-- Số điện thoại -->
            <div class="group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($old_data['phone'] ?? ''); ?>"
                    class="<?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>">

                <?php if (isset($errors['phone'])) { ?>
                    <div class="error"><?php echo $errors['phone']; ?></div>
                <?php } ?>
            </div>

            <button type="submit">Đăng Ký Ngay</button>
        </form>
    </div>

</body>

</html>