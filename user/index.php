<?php

session_start();
require_once __DIR__ . "/configs/config.php";
require_once __DIR__ . "/common/function.php";

// Import các Controller
require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/CartController.php";
require_once __DIR__ . "/controllers/ProductController.php";
require_once __DIR__ . "/controllers/AuthController.php";

// Import Model
require_once __DIR__ . "/models/UserModel.php";

// Khởi tạo các controller cần thiết
$userModel = new UserModel();
$authController = new AuthController($userModel);

// Lấy tham số 'ctl' từ URL, nếu không có thì mặc định là Home
$ctl = $_GET['ctl'] ?? '';

// Điều hướng dựa vào tham số 'ctl'
match ($ctl) {
    '',                     => (new HomeController())->index(),
    'view-product'          => (new ProductController())->show(),
    'add-to-cart'           => (new CartController())->addToCart(),
    'view-cart'             => (new CartController())->index(),
    'delete-cart'           => (new CartController())->deleteProductInCart(),
    'update-cart'           => (new CartController())->updateCart(),
    'category'              => (new ProductController())->list(),
    'checkout'              => (new CartController())->viewCheckout(),

    // Các route liên quan đến đăng ký, đăng nhập
    'register'              => $authController->register(),
    'login'                 => $authController->login(),
    'logout'                => $authController->logout(),
    'profile'               => $authController->profile(),
    'edit-profile'          => $authController->editProfile(), 
    'change-password'       => $authController->changePassword(),

    default                 => print "Hành động không hợp lệ."
};
