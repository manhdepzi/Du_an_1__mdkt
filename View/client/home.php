<?php include __DIR__ . "/../client/header.php"; ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">  Laptop</h2>
    <div class="row g-4">
    <!-- Hiển thị các sản pẩm là laptop -->
        <?php foreach($laptops as $laptop) : ?>
            <div class="col-md-3">
                <div class="card product-box shadow-sm border-0" style="transition: transform 0.3s ease-in-out, box-shadow 0.3s, background-color 0.3s; border-radius: 10px;"
                    onmouseover="this.style.transform='translateY(-5px) scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0, 0, 0, 0.2)'; this.style.backgroundColor='rgba(0, 128, 0, 0.1)'; this.querySelector('.product-name').style.color='green';"
                    onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.backgroundColor=''; this.querySelector('.product-name').style.color='';">
                    <img src="<?=$laptop['productImage1']?>" alt="Product Image" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
                    <div class="card-body text-center">
                        <a href="<?= ROOT_URL . '?ctl=detail&id=' . $laptop['id'] ?>" class="text-decoration-none text-dark">
                            <h5 class="product-name mb-2 fw-bold" style="transition: color 0.3s;">
                                <?= $laptop['productName']?>
                            </h5>
                        </a>
                        <span class="product-price text-success fw-bold h5">
                            <?= number_format($laptop['productPrice'], 2) ?>$
                        </span>
                        <div class="mt-3">
                            <button class="btn btn-success w-100">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
    <br>
    <br>

<div class="container mt-5">
    <h2 class="text-center mb-4">Phone</h2>
    <div class="row g-4">
    <!-- Hiển thị các sản pẩm là phone -->
        <?php foreach($phones as $phone) : ?>
            <!-- BOX San pham -->
            <div class="col-md-3">
            <div class="card product-box shadow-sm border-0" style="transition: transform 0.3s ease-in-out, box-shadow 0.3s, background-color 0.3s; border-radius: 10px;"
                    onmouseover="this.style.transform='translateY(-5px) scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0, 0, 0, 0.2)'; this.style.backgroundColor='rgba(0, 128, 0, 0.1)'; this.querySelector('.product-name').style.color='green';"
                    onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.backgroundColor=''; this.querySelector('.product-name').style.color='';">
                        <img src="<?=$phone['productImage1']?>"
                        alt="Product Image" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
                        <div class="card-body text-center">
                                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $phone['id'] ?>" class="text-decoration-none text-dark">
                                    <h5 class="product-name mb-2 fw-bold" style="transition: color 0.3s;">
                                        <?= $phone['productName']?>
                                    </h5>
                                </a>                            
                                <span class="product-price text-success fw-bold h5">
                                    <?= ($phone['productPrice'])?>$
                                </span>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success w-100">Thêm vào giỏ hàng</button>
                            </div>
                    </div>
                </div>
            <?php endforeach ?>
    </div>
</div>


<?php include __DIR__  . "/../client/footer.php"; ?>
