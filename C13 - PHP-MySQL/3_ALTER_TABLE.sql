-- 1. Nhóm thao tác thay đổi "Cấu trúc" của Bảng (Cột, Kiểu dữ liệu)
-- 1.1 Thêm một cột mới vào bảng
ALTER TABLE san_pham ADD han_su_dung DATE; 

-- 1.2 Xóa một cột khỏi bảng
ALTER TABLE san_pham DROP COLUMN mo_ta_ngan;

-- 1.3 Đổi tên hoặc đổi kiểu dữ liệu của cột
ALTER TABLE san_pham MODIFY COLUMN gia DECIMAL(10,2);

-- 2. Nhóm thao tác "Xóa sổ" Bảng
TRUNCATE TABLE san_pham; -- Lệnh TRUNCATE (Dọn rác - Xóa sạch ruột): Lệnh này giữ lại cái khung
DROP TABLE san_pham; -- Lệnh DROP (Đập nhà - Xóa sổ hoàn toàn): Lệnh này sẽ xóa mất tích cái bảng đó khỏi cơ sở dữ liệu.

-- 3. Nhóm thao tác với "Dữ liệu" bên trong Bảng (Nhắc lại nhanh)
INSERT INTO ten_bang (cac_cot) VALUES (cac_gia_tri); -- Thêm dòng mới:
SELECT * FROM ten_bang; -- Xem dữ liệu
UPDATE ten_bang SET cot = gia_tri_moi WHERE dieu_kien; -- Sửa dữ liệu
DELETE FROM ten_bang WHERE dieu_kien; -- Xóa dòng dữ liệu

-- 💡 Quy tắc "vàng" cần nằm lòng khi thao tác với Table
-- 4. Bảng nào cũng PHẢI có một Khóa Chính (Primary Key) và tự động tăng
-- Để khi bạn muốn Sửa (UPDATE) hoặc Xóa (DELETE), bạn chỉ cần chỉ đích danh WHERE id = 5. Chắc chắn hệ thống sẽ xử lý đúng dòng đó, không bao giờ sợ xóa nhầm người trùng tên.
-- Cách làm: Hãy luôn tạo cột đầu tiên là id, kiểu dữ liệu số nguyên INT, đặt làm PRIMARY KEY và bật tính năng tự động tăng AUTO_INCREMENT.
