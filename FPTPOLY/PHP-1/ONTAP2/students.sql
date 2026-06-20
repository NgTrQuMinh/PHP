CREATE DATABASE quanly_nhanvien;

USE quanly_nhanvien;

CREATE TABLE nhanvien (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    luong DECIMAL(10, 2) NOT NULL
);