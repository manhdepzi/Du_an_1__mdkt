<?php include_once __DIR__ . "/../layout/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-6 text-center">
            <img class="img-fluid rounded shadow-sm" 
                 src="<?= $products['productImage1'] ?>" 
                 alt="<?= htmlspecialchars($products['productName']) ?>" 
                 style="max-width: 100%; height: auto;">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="display-5 fw-bold"><?= htmlspecialchars($products['productName']) ?></h1>
            
            <h3 class="text-danger mt-3">Giá: <?= number_format($products['productPrice'], 0, ',', '.') ?>đ</h3>
            
            <!-- <p class="text-muted"><strong>Số lượng còn:</strong> <?= $products['quantity'] ?></p> -->

            <!-- <p>
                <strong>Trạng thái:</strong> 
                <?php if ($products['quantity'] > 0) : ?>
                    <span class="badge bg-success">Còn hàng</span>
                <?php else : ?>
                    <span class="badge bg-danger">Hết hàng</span>
                <?php endif ?>
            </p> -->

            <p class="mt-3">
                <strong>Mô tả sản phẩm:</strong> <br>
                <?= nl2br(htmlspecialchars($products['productDescription'])) ?>
            </p>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="mt-4">
                <a href="<?= ROOT_URL . '?ctl=add-to-cart&id=' . $products['id']?>" class="btn btn-success btn-lg">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Mô tả chi tiết -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Mô tả chi tiết</h2>
            <p><?= nl2br(htmlspecialchars($products['productDescription'])) ?></p>
        </div>
    </div>
</div>

<?php include_once __DIR__ . "/../layout/footer.php"; ?>
