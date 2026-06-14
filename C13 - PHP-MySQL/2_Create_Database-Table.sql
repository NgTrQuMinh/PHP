-- 1. Lệnh tạo Cơ sở dữ liệu (Database)
CREATE DATABASE quan_ly_cua_hang;

-- 2. Lệnh tạo Bảng (Table)
CREATE TABLE san_pham (
    id INT NOT NULL AUTO_INCREMENT,
    ten_san_pham VARCHAR(255) NOT NULL,
    gia DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    so_luong INT NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);