<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'env.php';  // Đảm bảo đường dẫn đúng

    require_once __DIR__ . "/env.php";
    require_once __DIR__ . "/common/function.php";

    // models
    require_once __DIR__ . __DIR__ . "/../Model/BaseModel.php";
    require_once __DIR__ . "/Model/Category.php";
    require_once __DIR__ . "/Model/Product.php";

    // controllers
    require_once __DIR__ . "/Controllers/HomeController.php";
    require_once __DIR__ . "/Controllers/ProductController.php";

    $ctl = $_GET['ctl'] ?? '';

    match ($ctl) {
        ''                  => (new HomeController)->index(),
        'category'          => (new ProductController)->list(),
        'detail'            => (new ProductController)->show(),


    };

?>

