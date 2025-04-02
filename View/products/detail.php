<?php include __DIR__ . "/../client/header.php"; ?>


<div class="container mt-5">
    <div class="row">
    

        <!-- Hinh anh SP -->
        <div class="col-md-5">
            <img class="img-fluid rounded" src="<?= $product['productImage1']?>" alt="<?= $product['productName']?> ">
        </div>
        <!-- Thong tin SP -->
        <div class="col-md-4">
            <h1 class="display-5">
                <?//php var_dump($product['productName']) ; die(); ?>
                <?= $product['productName']?></h1>
            
            <p class="text-muted">Trạng thái:
                <?php if($product['productAvailability'] > 0 ) : ?>
                    <span class="badge bg-success">Còn hàng</span>  <!-- Thay đổi theo trạng thái SP --> 
                <?php else : ?>
                    <span class="badge bg-danger">Hết hàng</span>   <!--Thay đổi theo trạng thái SP -->
                <?php endif ?>  
        

          <h3 class="text-danger">Giá: <?= $product['productPrice']?>$</h3> <!--gia-->
        
          <p><strong>Số lượng còn: <?=  $product['productAvailability']?></strong></p>    
        
          <p class="mt-4">
            <strong>Mô tả sản phẩm:</strong>
            <?php if (!empty($product['productDescription'])): ?>
                <?= substr($product['productDescription'], 0, 200) . '...' ?>
            <?php endif; ?>

            </p>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="btn btn-primary-btn-lg mt-4">
                <a href="#" class="btn btn-primary btn-lg mt-4">
                    <i class="bi bi-cart-plus"></i>Thêm vào giỏ hàng
                </a>
            </div>
        </div>
<br>
<br>
<br>
<br>

<!-- Thêm phần mô tả chi tiết (nếu cần) -->
<div class="row mt-5">
    <div class="col">
        <h2>Mô tả chi tiết</h2>
        <p>
            <?=  $product['productDescription'] ?>
        </p>
    </div>
</div>
</div>
</div>





<div class="container mt-5">

    <div class="row g-4">
        <h2><strong>  Sản phẩm liên quan</strong></h2>
        <?php foreach($productReleads as $product) : ?>
            <!-- BOX San pham -->
             <div class="col-md-3">
                <div class="product-box"><div class="card product-box shadow-sm border-0" style="transition: transform 0.3s ease-in-out, box-shadow 0.3s, background-color 0.3s; border-radius: 10px;"
                    onmouseover="this.style.transform='translateY(-5px) scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0, 0, 0, 0.2)'; this.style.backgroundColor='rgba(0, 128, 0, 0.1)'; this.querySelector('.product-name').style.color='green';"
                    onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.backgroundColor=''; this.querySelector('.product-name').style.color='';">
                
                    <img class="card-img-top p-3" style="height: 200px; object-fit: contain;" src="<?=$product['productImage1']?>" alt="Product Image"
                        class="productImage1">
                        <div class="product-info card-body">
                            <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>" class="text-decoration-none text-dark">
                                <h5 class="product-name mb-2 fw-bold"><?= $product['productName']?></h5>
                            </a>
                            <div>
                            <span class="product-price text-success fw-bold h5">
                                <?= ($product['productPrice'])?>$
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
       
    </div>
</div>
    <br>
    <br>



<?php include __DIR__  . "/../client/footer.php"; ?>
