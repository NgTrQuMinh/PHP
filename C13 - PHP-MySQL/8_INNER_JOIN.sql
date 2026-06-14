-- 1. Khái niệm INNER JOIN (Giao giữa hai tập hợp)
-- Nó sẽ đối chiếu dữ liệu giữa Bảng A và Bảng B dựa trên một cột chung (thường là cặp Khóa chính - Khóa ngoại)
-- Chỉ những dòng nào thỏa mãn điều kiện và xuất hiện ở cả hai bảng thì mới được giữ lại trong kết quả hiển thị.

-- 2. Ví dụ thực tế (Dễ hiểu ngay)
-- Bảng 1: khach_hang (id là Khóa chính)
-- id,                             ho_ten
-- 1,                          Nguyễn Văn A
-- 2,                          Trần Thị B
-- 3,                          "Phạm Văn C (Ông này mới đăng ký tài khoản, chưa mua gì)"

-- -- Bảng 2: don_hang (khach_hang_id là Khóa ngoại)
-- id_don_hang,                    ten_san_pham,                   khach_hang_id
-- 101,                         Áo thun nam,                     1 (Đơn của ông A)
-- 102,                         Váy nữ,                          2 (Đơn của bà B)
-- 103,                         Giày thể thao,                   1 (Đơn của ông A)
-- 104,                         Sạc dự phòng,                    99 (Đơn ma hoặc khách vãng lai không cần tài khoản)

-- In ra danh sách gồm: Tên khách hàng và Tên sản phẩm họ đã mua.
SELECT khach_hang.ho_ten, don_hang.ten_san_pham
FROM khach_hang
    INNER JOIN don_hang ON khach_hang.id = don_hang.khach_hang_id;  -- ON là từ dùng để thiết lập điều kiện kết nối giữa hai bảng.

-- Kết quả hiển thị:
-- ho_ten                              ten_san_pham
-- Nguyễn Văn A,                   Áo thun nam
-- Trần Thị B,                     Váy nữ
-- Nguyễn Văn A,                   Giày thể thao


-- 3. Cú pháp viết gọn bằng biệt danh (Alias)
SELECT kh.ho_ten, dh.ten_san_pham
FROM khach_hang AS kh
    INNER JOIN don_hang AS dh ON kh.id = dh.khach_hang_id;
-- (Trong câu lệnh trên, khach_hang được viết tắt là kh, và don_hang được viết tắt là dh).

-- 4. Kết hợp INNER JOIN với bộ lọc WHERE và ORDER BY
SELECT kh.ho_ten, dh.ten_san_pham
FROM khach_hang kh
    INNER JOIN don_hang dh ON kh.id = dh.khach_hang_id
WHERE
    kh.ho_ten = 'Nguyễn Văn A'
ORDER BY dh.ten_san_pham ASC;