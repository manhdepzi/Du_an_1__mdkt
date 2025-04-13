<?php include_once __DIR__ . "/../layout/header.php";

// Kiểm tra nếu giỏ hàng trống
if (empty($_SESSION['cart'])) {
    echo "<div class='container mt-5 text-center'><h3>Giỏ hàng của bạn đang trống.</h3><a href='index.php' class='btn btn-primary mt-3'>Tiếp tục mua sắm</a></div>";
    exit();
}

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">💳 Thanh toán</h2>
    <form action="process_checkout.php" method="POST">
        <div class="row">
            <!-- Thông tin khách hàng -->
            <div class="col-md-6">
                <h4>Thông tin người nhận</h4>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>
            </div>
            
            <!-- Chi tiết đơn hàng -->
            <div class="col-md-6">
                <h4>Đơn hàng của bạn</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $totalPrice += $subtotal;
                        ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($subtotal) ?> VND</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Tổng tiền:</strong></td>
                            <td><strong><?= number_format($totalPrice) ?> VND</strong></td>
                        </tr>
                    </tfoot>
                </table>
                
                <!-- Phương thức thanh toán -->
                <div class="mb-3">
                    <h5>Chọn phương thức thanh toán</h5>
                    <select name="paymentMethod" class="form-select" required>
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="vnpay">Chuyển khoản ngân hàng vnpay</option>
                        <option value="momo">Ví MoMo</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success w-100">Xác nhận đặt hàng</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>