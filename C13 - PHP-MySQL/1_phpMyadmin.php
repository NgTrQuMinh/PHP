<?php
// 1. Cách truy cập vào phpMyAdmin
// Trên Localhost (XAMPP/Laragon): 1. Mở phần mềm XAMPP/Laragon lên và kích hoạt hai dịch vụ Apache và MySQL.
// 2. Mở trình duyệt web và gõ đường dẫn: http://localhost/phpmyadmin
// 3. Tài khoản mặc định thường là: Username: root / Password: (để trống).

// 2. Làm quen với giao diện chính
// Khi đăng nhập thành công, bạn sẽ thấy giao diện chia làm 2 phần chính:
// Cột bên trái: Hiển thị danh sách tất cả các cơ sở dữ liệu (Database) đang có.
// Khu vực trung tâm: Hiển thị thông tin chi tiết, các tab chức năng (Structure, SQL, Export, Import...) để bạn thao tác.

// 3. Các thao tác cơ bản (Từng bước một)
// Bước 1: Tạo một Cơ sở dữ liệu (Database) mới
// Tại giao diện chính, chọn tab Databases (hoặc click vào chữ New ở cột bên trái).
// Tại ô Database name, nhập tên cơ sở dữ liệu (Ví dụ: ban_hang).
// Tại ô bên cạnh (Collation), chọn utf8mb4_general_ci (bảng mã này giúp website của bạn không bị lỗi font khi gõ tiếng Việt).
// Nhấn nút Create.

// Bước 2: Tạo Bảng (Table) bên trong Database
// Sau khi tạo xong Database, hệ thống sẽ tự động chuyển bạn đến giao diện tạo Bảng.
// Table name: Nhập tên bảng (Ví dụ: khach_hang).
// Number of columns: Nhập số lượng cột/trường dữ liệu bạn cần (Ví dụ: 4). Nhấn Create.
// Cấu hình các cột (Xem hình mẫu bên dưới để dễ hình dung):
// Cột 1 (ID): Name = id, Type = INT, tích chọn vào ô A_I (Auto Increment - Tự động tăng số thứ tự), hệ thống sẽ tự đặt đây là khóa chính (Primary Key).
// Cột 2 (Tên): Name = ho_ten, Type = VARCHAR, Length = 255.
// Cột 3 (Email): Name = email, Type = VARCHAR, Length = 100.
// Cột4 (Ngày tham gia): Name = ngay_tao, Type = TIMESTAMP, Default = CURRENT_TIMESTAMP.
// Kéo xuống dưới cùng và nhấn Save.

// Bước 3: Thêm dữ liệu vào bảng (Insert)
// Click vào tên bảng khach_hang ở cột bên trái.
// Chọn tab Insert ở thanh menu phía trên.
// Nhập dữ liệu vào cột Value (Bỏ qua dòng id vì nó tự tăng, bỏ qua dòng ngay_tao vì nó tự lấy giờ hiện tại).
// Ví dụ: ho_ten = Nguyễn Văn A, email = vana@gmail.com.
// Nhấn nút Go để lưu.

// Bước 4: Xem, Sửa và Xóa dữ liệu (Browse)
// Xem dữ liệu: Click vào tab Browse. Bạn sẽ thấy danh sách các khách hàng đã thêm.
// Sửa dữ liệu: Nhấp vào nút Edit (hình chiếc bút chì) ở đầu dòng của hàng dữ liệu đó, sửa lại thông tin rồi nhấn Go.
// Xóa dữ liệu: Nhấp vào nút Delete (hình thùng rác) ở đầu dòng để xóa hàng đó.

// 4. Cách Sao lưu (Export) và Khôi phục (Import) Dữ liệu
// Đây là tính năng cực kỳ quan trọng giúp bạn chuyển dữ liệu từ máy tính lên mạng (Hosting) hoặc sao lưu dự phòng.
// Cách Xuất dữ liệu (Export / Backup):
// Chọn Database bạn muốn sao lưu ở cột bên trái.
// Chọn tab Export ở menu phía trên.
// Giữ nguyên cài đặt mặc định (Quick - display only the minimal options / Format: SQL).
// Nhấn nút Export. Một file có đuôi .sql sẽ được tải về máy tính của bạn.
// Cách Nhập dữ liệu (Import / Restore):
// Tạo một Database mới hoàn toàn trống (hoặc chọn database cũ nhưng đã xóa hết các bảng bên trong).
// Chọn tab Import ở menu phía trên.
// Tại mục File to import, nhấn Choose File và chọn file .sql có sẵn trong máy của bạn.
// Kéo xuống dưới cùng và nhấn nút Import. Hệ thống sẽ tự động chạy lại toàn bộ dữ liệu cho bạn.

// 5. Chạy lệnh SQL trực tiếp (Nếu cần)
// Dù phpMyAdmin hỗ trợ bấm chuột, nhưng đôi khi bạn vẫn cần chạy các câu lệnh SQL cài đặt có sẵn từ các mã nguồn.
// Chọn Database hoặc Bảng cần thao tác.
// Chọn tab SQL.
// Ô trống hiện ra, bạn chỉ cần dán đoạn code SQL của mình vào đó (Ví dụ: SELECT * FROM khach_hang WHERE id = 1;).
// Nhấn Go để thực thi lệnh.

// 💡 Mẹo nhỏ cho người mới: Trước khi thực hiện các hành động "nguy hiểm" như xóa bảng (Drop) hoặc xóa dữ liệu hàng loạt (Delete), hãy luôn nhớ vào tab Export để tải một bản sao lưu về máy trước nhé!