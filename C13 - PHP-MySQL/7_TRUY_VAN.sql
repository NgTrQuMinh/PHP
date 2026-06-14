-- 1. Lệnh SELECT - Truy vấn dữ liệu cơ bản
SELECT * FROM san_pham;
-- Lấy toàn bộ các cột và các dòng (Xem hết bảng)
SELECT ten_san_pham, gia FROM san_pham;
-- Chỉ lấy một vài cột cụ thể (Giúp nhẹ máy, chạy nhanh hơn):

-- 2. Sắp xếp dữ liệu với ORDER BY
-- ASC (Ascending): Sắp xếp Tăng dần (Từ nhỏ đến lớn, từ A đến Z). Đây là lựa chọn mặc định nếu bạn không ghi gì.
-- DESC (Descending): Sắp xếp Giảm dần (Từ lớn đến nhỏ, từ Z về A).
SELECT ten_san_pham, gia FROM san_pham ORDER BY gia ASC;

SELECT ten_san_pham, gia FROM san_pham ORDER BY gia DESC;

-- 3. Giới hạn kết quả với LIMIT
SELECT ten_san_pham, gia FROM san_pham ORDER BY gia DESC LIMIT 3;
-- Lấy ra 3 sản phẩm đắt nhất cửa hàng.

-- Tuyệt chiêu nâng cao: Phân trang (Pagination) với LIMIT và OFFSET
SELECT * FROM san_pham LIMIT 5;
-- Trang 1 (Lấy 5 sản phẩm đầu tiên)
SELECT * FROM san_pham LIMIT 5 OFFSET 5;
-- Trang 2 (Bỏ qua 5 ông đầu, lấy 5 ông tiếp theo)
SELECT * FROM san_pham LIMIT 5 OFFSET 10;
-- Trang 3 (Bỏ qua 10 ông đầu, lấy 5 ông tiếp theo)

-- 4. Tổng hợp thứ tự viết một câu lệnh SQL chuẩn chỉnh
-- bắt buộc phải viết theo đúng thứ tự dưới đây, nếu viết đảo lộn vị trí, MySQL sẽ báo lỗi cú pháp ngay lập tức
SELECT cot_1, cot_2
FROM ten_bang
WHERE
    dieu_kien -- (1. Lọc dữ liệu trước)
ORDER BY cot_nao ASC / DESC -- (2. Sắp xếp dữ liệu sau khi lọc)
LIMIT so_luong -- (3. Cắt lấy số dòng mong muốn)
OFFSET
    số_dòng_bỏ_qua;
-- (4. Bỏ qua bao nhiêu dòng nếu có)