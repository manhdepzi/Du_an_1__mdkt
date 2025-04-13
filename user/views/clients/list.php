<?php include_once __DIR__ . "/../layout/header.php"; ?>

<div class="container mt-5">
    <h1><?php echo htmlspecialchars($categoryName ?? "Danh mục chưa xác định", ENT_QUOTES, 'UTF-8'); ?></h1>
    <? //php foreach($categories as $cate): 
    ?>
    <!-- <? //php var_dump($categories); die(); 
            ?> -->
    <!-- <h3 class="dropdown-item" > -->
    <? //= ROOT_URL . '?ctl=category&id=' . $cate['id'] 
    ?>
    <!-- <//?= isset($cate['id']) ? $cate['id'] : 'Tên danh mục' ?> -->
    </h3>
    <? //= isset($cate['categoryName']) ? $cate['categoryName'] : 'Tên danh mục' 
    ?>
    <? //php endforeach; 
    ?>
    <div class="row g-4">
        <?php if ($products) :  ?>
            <?php foreach ($products as $product) : ?>
                <?php
                // echo "<pre>";
                // print_r($products);
                // echo "</pre>";
                // die(); // Dừng chương trình để kiểm tra
                ?>
                <!-- BOX San pham -->
                <div class="col-md-3">
                    <div class="product-box">
                        <img width="150px" height="150px" src="<?= $product['productImage1'] ?>" alt="Product Image"
                            class="productImage1">
                        <div class="product-info">
                            <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>">
                                <h5 class="product-name"><?= $product['productName'] ?></h5>
                            </a>
                            <div>
                                <span class="product-price"><?= ($product['productPrice']) ?>$</span>
                            </div>
                            <div class="mt-4">
                                <a href="<?= ROOT_URL . '?ctl=add-to-cart&id=' . $product['id'] ?>" class="btn btn-success btn-lg">
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                            <div class="mt-1">
                                <a href="<?= ROOT_URL . '?ctl=view-product&id=' . $product['id'] ?>" class="btn btn-primary btn-lg"><i class="bi bi-eye"></i> Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div>Danh mục <strong><?= $categories['categoryName'] ?></strong> không có sản phẩm</div>

            <?php foreach ($categories as $cate): ?>
                <!-- <?php var_dump($categories);
                        die(); ?> -->
                <h3 class="dropdown-item">
                    <?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>
                    <?= isset($cate['id']) ? $cate['id'] : 'Tên danh mục' ?>
                </h3>
                <?= isset($cate['categoryName']) ? $cate['categoryName'] : 'Tên danh mục' ?>
            <?php endforeach; ?>

        <?php endif ?>
    </div>
</div>
<br>
<br>



<!-- <?php include_once __DIR__ . "/../layout/footer.php"; ?> -->