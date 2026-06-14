-- 1. Lệnh UPDATE (Chỉnh sửa dữ liệu)
UPDATE ten_bang
SET
    cot_1 = gia_tri_moi_1,
    cot_2 = gia_tri_moi_2
WHERE
    dieu_kien;

-- 🔴 LỜI CẢNH BÁO TỐI CAO: Nếu bạn lỡ tay chạy lệnh này mà quên mất khúc WHERE 
-- Toàn bộ sản phẩm trong cửa hàng của bạn đều đồng loạt biến thành giá ...

-- 2. Lệnh DELETE (Xóa dòng dữ liệu)
-- Lệnh này dùng để xóa bỏ hoàn toàn một hoặc nhiều dòng (bản ghi) ra khỏi bảng.
DELETE FROM ten_bang
WHERE dieu_kien;