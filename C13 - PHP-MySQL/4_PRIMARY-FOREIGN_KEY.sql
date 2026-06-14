-- 1. Khóa chính (Primary Key - PK) là gì?
-- Đặc điểm của Khóa chính:
-- Duy nhất (Unique): Dữ liệu trong cột này không được phép trùng lặp.
-- Không được trống (Not NULL): Đã là khóa chính thì bắt buộc phải có giá trị.
-- Mỗi bảng chỉ có MỘT khóa chính duy nhất.

-- 2. Khóa ngoại (Foreign Key - FK) là gì?
-- Khóa ngoại là một cột trong bảng này nhưng lại trỏ đến Khóa chính của một bảng khác. Nó đóng vai trò như một sợi dây tơ hồng để tạo ra "mối quan hệ" giữa hai bảng với nhau.

-- 3. Lợi ích khổng lồ của việc dùng Khóa ngoại (Tính toàn vẹn dữ liệu)
-- MySQL không chỉ kết nối hai bảng cho vui, nó còn bảo vệ dữ liệu của bạn cực kỳ nghiêm ngặt nhờ cơ chế khóa ngoại:
-- Chặn dữ liệu "ma": Nếu bạn cố tình thêm một đơn hàng với khach_hang_id = 99 vào bảng don_hang, MySQL sẽ lập tức báo lỗi ngay! Lý do: Trong bảng khach_hang làm gì có ai có id = 99 đâu mà mua hàng.
-- Ràng buộc khi Xóa (ON DELETE CASCADE): Nếu bạn vô tình xóa khách hàng Nguyễn Văn A (id = 1) ở bảng cha, hệ thống có thể tự động xóa sạch toàn bộ các đơn hàng của ông A ở bảng con để tránh việc đơn hàng bị "mồ côi" (không biết của ai).

-- 4. Cách viết lệnh SQL để tạo Khóa chính và Khóa ngoại
-- Tạo Khóa chính khi tạo bảng:
CREATE TABLE khach_hang (
    id INT NOT NULL AUTO_INCREMENT,
    ho_ten VARCHAR(100),
    PRIMARY KEY (id) -- Chỉ định id là khóa chính
);

-- Tạo Khóa ngoại khi tạo bảng con:
CREATE TABLE don_hang (
    id_don_hang INT NOT NULL AUTO_INCREMENT,
    ten_san_pham VARCHAR(100),
    khach_hang_id INT, -- Cột này phải cùng kiểu dữ liệu INT với id bảng cha
    PRIMARY KEY (id_don_hang),
    
    -- Đoạn này để thiết lập khóa ngoại:
    FOREIGN KEY (khach_hang_id) REFERENCES khach_hang(id)
);
-- Tóm lại một câu cho dễ nhớ: Khóa chính giúp bảng tự định nghĩa chính mình, còn Khóa ngoại giúp bảng này "gọi tên" và liên kết với bảng khác!
