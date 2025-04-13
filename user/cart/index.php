<?php

session_start();
require_once __DIR__ . "/configs/config.php";
require_once __DIR__ . "/common/function.php";

// Import các Controller
require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/CartController.php";
require_once __DIR__ . "/controllers/ProductController.php";

// Lấy tham số 'ctl' từ URL, nếu không có thì mặc định là Home
$ctl = $_GET['ctl'] ?? '';

// Điều hướng dựa vào tham số 'ctl'
match ($ctl) {
    ''                  => (new HomeController())->index(),
    'view-product'      => (new ProductController())->show(),
    'add-to-cart'       => (new CartController())->addToCart(),
    'view-cart'         => (new CartController())->viewCart(),
    'delete-cart'       => (new CartController())->deleteProductInCart(),
    'update-cart'       => (new CartController())->updateCart(),
    'category'      => (new ProductController())->list(),
    'checkout'          => (new CartController())->viewCheckout(),
};
