<?php
require_once './configs/config.php';
require_once './models/Product.php';

// Tạo object Product và truyền PDO vào
$productModel = new Product($pdo);

// Lấy toàn bộ sản phẩm
$products = $productModel->all();

// Hiển thị dữ liệu
echo "<pre>";
print_r($products);
echo "</pre>";
?>
