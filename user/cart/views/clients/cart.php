<?php include_once __DIR__ . "/../layout/header.php"; ?>
<?php
require_once realpath(__DIR__ . "/../../controllers/CartController.php");

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">🛒 Giỏ hàng của bạn</h2>
        <?php if (empty($_SESSION['cart'])) : ?>
            <p class="text-center">Chưa có sản phẩm nào trong giỏ hàng.</p>
        <?php else : ?>
            <form action="<?= ROOT_URL . '?ctl=update-cart' ?>" method="POST">
                <table class="table table-bordered text-center mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalPrice = 0;
                        

                        foreach ($_SESSION['cart'] as $item): 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $totalPrice += $subtotal;
                        ?>
                        <tr>
                            <td><img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="50"></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= number_format($item['price']) ?> VND</td>
                            <td>
                                <input type="number" name="quantity[<?= $item['id'] ?>]" class="form-control text-center" 
                                       value="<?= $item['quantity'] ?>" min="1">
                            </td>
                            <td><?= number_format($subtotal) ?> VND</td>
                            <td>
                                <a href="<?= ROOT_URL . '?ctl=delete-cart&id=' . $item['id'] ?>" class="btn btn-danger btn-sm">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                            <td colspan="2"><strong><?= number_format($totalPrice) ?> VND</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="update-cart" class="btn btn-primary">Cập nhật giỏ hàng</button>
                    <a href="<?= ROOT_URL . '?ctl=checkout' ?>" class="btn btn-success">Thanh toán</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>

<?php include_once __DIR__ . "/../layout/footer.php"; ?>