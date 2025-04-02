<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/env.php';

    require_once __DIR__ . "/common/function.php";

    // models
    require_once __DIR__ . "/Model/BaseModel.php";
    require_once __DIR__ . "/Model/Category.php";
    require_once __DIR__ . "/Model/Product.php";

    // controllers
    require_once __DIR__ . "/Controller/HomeController.php";
    require_once __DIR__ . "/Controller/ProductController.php";
    require_once __DIR__ . "/Controller/SearchController.php";


    $ctl = $_GET['ctl'] ?? '';

    match ($ctl) {
        ''                  => (new HomeController)->index(),
        'category'          => (new ProductController)->list(),
        'detail'            => (new ProductController)->show(),
        'search'            => (new SearchController)->search(),
        
    };

?>

