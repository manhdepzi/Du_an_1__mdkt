<?php include_once ROOT_DIR . "fontend/Views/clients/header.php"; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Banner -->
<div class="container mt-4">
    <div class="banner bg-light text-center py-5">
        <h1 class="fw-bold text-uppercase">Banner</h1>
    </div>
</div>

<!-- Phần lọc sản phẩm -->
<div class="container mt-4">
    <h4 class="fw-bold">Lọc sản phẩm</h4>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Danh mục</label>
            <select class="form-select">
                <option value="">Tất cả</option>
                <option value="dien-thoai">Điện thoại</option>
                <option value="laptop">Laptop</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Giá</label>
            <select class="form-select">
                <option value="">Tất cả</option>
                <option value="duoi-5tr">Dưới 5 triệu</option>
                <option value="5-10tr">5 - 10 triệu</option>
                <option value="tren-10tr">Trên 10 triệu</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Sắp xếp</label>
            <select class="form-select">
                <option value="moi-nhat">Mới nhất</option>
                <option value="gia-thap-den-cao">Giá thấp đến cao</option>
                <option value="gia-cao-den-thap">Giá cao đến thấp</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary w-100">Lọc</button>
        </div>
    </div>
</div>

<!-- Sản phẩm bán chạy -->
<div class="container mt-5">
    <h2 class="fw-bold">SẢN PHẨM BÁN CHẠY</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- thêm vòng lặp foreach sau khi đã có sản phẩm trong admin -->
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="col">
                <div class="card border-0 shadow-sm">
                    <img src="#" class="card-img-top" alt="Product Image">
                    <div class="card-body text-center">
                        <h6 class="text-muted text-decoration-line-through">700,000$</h6>
                        <h5 class="text-danger fw-bold">500,000$</h5>
                        <p class="fw-semibold">Sản phẩm <?= $i ?></p>
                        <button class="btn btn-outline-primary w-100">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<!-- Vùng bao quanh Điện thoại & Máy tính -->
<div class="container mt-5">
    <div class="p-4 bg-light rounded shadow-sm">

        <!-- Danh mục Điện thoại -->
        <h3 class="fw-bold mt-4">ĐIỆN THOẠI</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- thêm vòng lặp foreach sau khi đã có sản phẩm trong admin -->
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <img src="#" class="card-img-top" alt="Product Image">
                        <div class="card-body text-center">
                            <h6 class="text-muted text-decoration-line-through">700,000$</h6>
                            <h5 class="text-danger fw-bold">500,000$</h5>
                            <p class="fw-semibold">Sản phẩm <?= $i ?></p>
                            <button class="btn btn-outline-primary w-100" type="submit">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Danh mục Máy tính -->
        <h3 class="fw-bold mt-5">MÁY TÍNH</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- thêm vòng lặp foreach sau khi đã có sản phẩm trong admin -->
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <img src="#" class="card-img-top" alt="Product Image">
                        <div class="card-body text-center">
                            <h6 class="text-muted text-decoration-line-through">700,000$</h6>
                            <h5 class="text-danger fw-bold">500,000$</h5>
                            <p class="fw-semibold">Sản phẩm <?= $i ?></p>
                            <button class="btn btn-outline-primary w-100">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "fontend/Views/clients/footer.php"; ?>