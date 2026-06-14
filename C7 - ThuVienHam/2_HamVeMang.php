<?php
// 1. Nhóm thêm và xóa phần tử
// 1.1 Thêm vào cuối mảng: array_push()
$fruits = ["Táo", "Chuối"];
array_push($fruits, "Cam", "Xoài"); // ["Táo", "Chuối", "Cam", "Xoài"]

// 1.2 Xóa phần tử cuối cùng: array_pop()
$stack = ["Sách A", "Sách B", "Sách C"];
$last_book = array_pop($stack); // ["Sách A", "Sách B"]

// 1.3 Thêm vào đầu mảng: array_unshift()
$queue = ["Người 2", "Người 3"];
array_unshift($queue, "Người 1");   //  ["Người 1", "Người 2", "Người 3"]

// 1.4 Xóa phần tử đầu tiên: array_shift()
$queue = ["Ưu tiên 1", "Ưu tiên 2", "Bình thường"];
$first = array_shift($queue);   // ["Ưu tiên 2", "Bình thường"]

// 2. Nhóm tìm kiếm và kiểm tra
// 2.1 Kiểm tra giá trị tồn tại ?: in_array()
$user = ["id" => 1, "name" => "Nam", "role" => "Admin"];
if (array_key_exists("role", $user)) {
    echo "Người dùng này có phân quyền: " . $user['role'];
}

// 2.2 Kiểm tra Khóa (Key) tồn tại ko?: array_key_exists()
$user = ["id" => 1, "name" => "Nam", "role" => "Admin"];
if (array_key_exists("role", $user)) {
    echo "Người dùng này có phân quyền: " . $user['role'];
}

// 2.3 Tìm vị trí của giá trị: array_search()
$colors = ["red", "blue", "green"];
$index = array_search("blue", $colors); // Kết quả: 1

// 2.4 Đếm số phần tử: count()
$orders = [101, 102, 103, 104];
echo "Bạn có " . count($orders) . " đơn hàng mới."; // Kết quả: 4


// 3. Nhóm biến đổi và lọc (Rất quan trọng)
// 3.1 Gộp mảng: array_merge()
$array1 = ["Táo", "Chuối"];
$array2 = ["Cam", "Xoài"];
$result = array_merge($array1, $array2);    // ["Táo", "Chuối", "Cam", "Xoài"]

// 3.2 Lấy cột dữ liệu từ mảng đa chiều: array_column()
$users = [
    ['id' => 1, 'name' => 'An'],
    ['id' => 2, 'name' => 'Bình'],
    ['id' => 3, 'name' => 'Chi']
];
$names = array_column($users, 'name');  // ["An", "Bình", "Chi"]

// 3.3 Loại bỏ phần tử trùng lặp: array_unique()
$input = [1, 2, 2, 3, 4, 4, 5];
$result = array_unique($input); // [1, 2, 3, 4, 5]

// 3.4 Áp dụng hàm cho từng phần tử: array_map()
$fruits = ["apple", "banana"];
$result = array_map('strtoupper', $fruits); // ["APPLE", "BANANA"]

// 3.5 Lọc mảng theo điều kiện: array_filter()
$numbers = [5, 12, 8, 20, 3];
$result = array_filter($numbers, function ($n) {
    return $n > 10; //  [12, 20]
});

// 4. Nhóm sắp xếp (Sorting)
// 4.1 Sắp xếp theo Giá trị (Value) : sort
$numbers = [5, 2, 8, 1];
sort($numbers);     // [1, 2, 5, 8]

// 4.2 Sắp xếp giữ nguyên cặp Key - Value : asort
$ages = ["Nam" => 25, "An" => 20, "Bình" => 22];
asort($ages);   // ["An" => 20, "Bình" => 22, "Nam" => 25] (An vẫn là 20)

// 4.3 Sắp xếp theo Khóa (Key) : ksort
$data = ["b" => "Chuối", "a" => "Táo", "c" => "Cam"];
ksort($data);   // ["a" => "Táo", "b" => "Chuối", "c" => "Cam"]

// 4.4 Sắp xếp mảng đa chiều : usort()
$products = [
    ['name' => 'Tivi', 'price' => 500],
    ['name' => 'Loa', 'price' => 200]
];

usort($products, function ($a, $b) {
    return $a['price'] <=> $b['price']; // Toán tử Spaceship (PHP 7+)
});
// Mảng sẽ được sắp xếp theo giá tăng dần


















?>