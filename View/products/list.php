<?php include __DIR__ . "/../client/header.php"; ?>

<div class="container mt-5">

    <div class="row g-4">
        <?php if ($products) :  ?>
            <h2>Danh mục <strong><?= htmlspecialchars($category_name, ENT_QUOTES, 'UTF-8') ?></strong></h2>
            <?php foreach ($products as $product) : ?>
                <!-- BOX San pham -->
                <div class="col-md-3">
                    <div class="product-box">
                        <div class="card product-box shadow-sm border-0" style="transition: transform 0.3s ease-in-out, box-shadow 0.3s, background-color 0.3s; border-radius: 10px;"
                            onmouseover="this.style.transform='translateY(-5px) scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0, 0, 0, 0.2)'; this.style.backgroundColor='rgba(0, 128, 0, 0.1)'; this.querySelector('.product-name').style.color='green';"
                            onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.backgroundColor=''; this.querySelector('.product-name').style.color='';">

                            <img class="card-img-top p-3" style="height: 200px; object-fit: contain;" src="<?= $product['productImage1'] ?>" alt="Product Image"
                                class="productImage1">
                            <div class="product-info card-body">
                                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>" class="text-decoration-none text-dark">
                                    <h5 class="product-name mb-2 fw-bold"><?= $product['productName'] ?></h5>
                                </a>
                                <div>
                                    <span class="product-price text-success fw-bold h5">
                                        <?= ($product['productPrice']) ?>$
                                    </span>
                                </div>
                                <div class="product-buttons pt-2">
                                    <button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <h2>Danh mục <strong><?= htmlspecialchars($category_name, ENT_QUOTES, 'UTF-8') ?></strong> không có sản phẩm</h2>
        <?php endif ?>
    </div>
</div>
<br>
<br>



<?php include __DIR__  . "/../client/footer.php"; ?>