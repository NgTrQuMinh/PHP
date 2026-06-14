<?php

// Dữ liệu giả định cho đơn hàng
$orders = array(
    array('id' => 'ORD001', 'code' => 'ORD001-2023-10-05', 'customer' => 'John Doe', 'total' => 789.45, 'status' => 'Hoàn thành', 'date' => '2023-10-05'),
    array('id' => 'ORD002', 'code' => 'ORD002-2023-10-06', 'customer' => 'Jane Smith', 'total' => 45.99, 'status' => 'Chờ xử lý', 'date' => '2023-10-06'),
    array('id' => 'ORD003', 'code' => 'ORD003-2023-10-07', 'customer' => 'Alice Johnson', 'total' => 987.50, 'status' => 'Đang giao', 'date' => '2023-10-07'),
    array('id' => 'ORD004', 'code' => 'ORD004-2023-10-08', 'customer' => 'Bob Brown', 'total' => 1500.00, 'status' => 'Hoàn thành', 'date' => '2023-10-08'),
    array('id' => 'ORD005', 'code' => 'ORD005-2023-10-09', 'customer' => 'Charlie Davis', 'total' => 499.99, 'status' => 'Đã huỷ', 'date' => '2023-10-09'),
);

// Nếu có dữ liệu từ database, bạn sẽ thay thế $orders bằng kết quả truy vấn

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn hàng</title>
    <style>
        .success {
            background-color: #4CAF50;
        }

        /* Các màu nền khác cho từng trạng thái */
        .pending {
            background-color: #f2cc1c;
        }

        .delivered {
            background-color: #ffa500;
        }

        .cancelled {
            background-color: #FF6347;
        }
    </style>
</head>

<body>

    <h1>Quản lý Đơn hàng</h1>

    <?php
    function displayOrders($orders)
    {
        ?>
        <form method="GET">
            <input type="text" name="search" placeholder="Tìm theo mã đơn hàng hoặc tên khách hàng">
            <select name="status">
                <option value="">All</option>
                <option value="Chờ xử lý">Chờ xử lý</option>
                <option value="Đang giao">Đang giao</option>
                <option value="Hoàn thành">Hoàn thành</option>
                <option value="Đã huỷ">Đã huỷ</option>
            </select>
            <button type="submit">Tìm kiếm</button>
        </form>

        <?php
        if (!empty($orders)) {
            ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Tổng Tiền (VNĐ)</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) { ?>
                        <tr class="<?php echo $order['status'] == 'Hoàn thành' ? 'success' : ''; ?>">
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['code']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer']); ?></td>
                            <td><?php echo number_format($order['total'], 0, ',', '.'); ?> VNĐ</td>
                            <td style="background-color: <?php echo $order['status'] == 'Chờ xử lý' ? '#f2cc1c' : ($order['status'] == 'Đang giao' ? '#ffa500' :
                                ($order['status'] == 'Hoàn thành' ? '#4CAF50' : '#FF6347')); ?>">
                                <?php echo htmlspecialchars($order['status']); ?>
                            </td>
                            <td><?php echo date('d/m/Y', strtotime($order['date'])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php
        } else {
            ?>
            <p>Không có đơn hàng để hiển thị.</p>
            <?php
        }
    }

    function getTotalAmountCompletedOrders($orders)
    {
        $total = 0;
        foreach ($orders as $order) {
            if ($order['status'] == 'Hoàn thành') {
                $total += $order['total'];
            }
        }
        return number_format($total, 0, ',', '.');
    }

    function getNumberOfCancelledOrders($orders)
    {
        $count = 0;
        foreach ($orders as $order) {
            if ($order['status'] == 'Đã huỷ') {
                $count++;
            }
        }
        return $count;
    }

    if (isset($_GET['search']) || isset($_GET['status'])) {
        // Thực hiện tìm kiếm hoặc lọc
        $filteredOrders = array();

        if (!empty($_GET['search'])) {
            $searchTerm = $_GET['search'];
            foreach ($orders as $order) {
                if (stripos($order['code'], $searchTerm) !== false || stripos($order['customer'], $searchTerm) !== false) {
                    $filteredOrders[] = $order;
                }
            }
        } else {
            $filteredOrders = $orders;
        }

        if (!empty($_GET['status'])) {
            $statusFilter = $_GET['status'];
            foreach ($filteredOrders as $key => $order) {
                if ($order['status'] != $statusFilter) {
                    unset($filteredOrders[$key]);
                }
            }
        }

        displayOrders($filteredOrders);
    } else {
        // Hiển thị tất cả đơn hàng
        displayOrders($orders);

        // Thống kê tóm tắt
        echo "<h2>Thống kê Tóm tắt</h2>";
        echo "Tổng số đơn hàng: " . count($orders) . "<br>";
        echo "Tổng doanh thu (đơn Hoàn thành): " . getTotalAmountCompletedOrders($orders) . " VNĐ<br>";
        echo "Số đơn bị huỷ: " . getNumberOfCancelledOrders($orders);
    }

    ?>

</body>

</html>