<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once '../env.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="<?= ROOT_URL ?>/images/img/logo/logoTron.png"  type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS (đặt trước </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <style>
        .header{
            background: rgb(255, 30, 86) !important;
            font-size: small;

        }
        .navbar {
            background: rgb(255, 30, 86) !important;
            color: white            !important;
            position: relative;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .search-container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 400px;
            border-radius: 2px;
            padding: 2px;
            /* background: rgba(217, 11, 63, 0.82); */
        }

        .search-input {
            /* flex: 1; */
            border: none;
            outline: none;
            padding: 6px 6px;
            font-size: 18px;
            border-radius:  0 0 2px;
        }

        .input-search {
            height: 70px;
        }

        .search-btn {
            background: rgb(255, 173, 30);
            height: 70px;
            color: black;
            border: none;
            padding: 8px 8px;
            cursor: pointer;
            border-radius: 5px 5px ;
        }

        .search-btn:hover {
            background: rgb(255, 223, 107);
            height: 70px;
        }

        .search-btn i {
            font-size: 18px;
        }

        .cart-btn {
            background: rgb(255, 173, 30);
            height: 70px;
            width: 170px;
            color: white;
            border: none;
            padding: 16px 16px;
            cursor: pointer;
            border-radius:  30px;
            position: absolute;
            top:17;
            right: 5;
        }

        .cart-btn:hover {
            background: rgb(255, 223, 107);
        }

        .bi {
            padding: 5px;
        }

        .nav-link {
            color: white            !important;

        }

        .btn-dangki {
            position: absolute;
            top:17;
            right: 100;
        }

        .cart-btn{
            color: black !important ; 
            font-weight: bold;
        }
        .cart-btn i {
            color: red !important; 
        }

    </style>
 <?//php var_dump(ROOT_DIR); ?>
<div class="header">
 <div class="container mt-5">
 <div class="text-center mb-4">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

    <a class="navbar-brand" aria-current="page" href="<?= ROOT_URL ?>">
        <img src="./images/img/logo/logo.png" style="width: 60px; height: 60px;"  alt="">
    </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>">Trang chủ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Danh mục
                    <ul class="dropdown-menu">
                        <?php foreach($categories as $cate): ?>
                            <li>
                                <a class="dropdown-item" 
                                    href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                <?= isset($cate['categoryName']) ? $cate['categoryName'] : 'Tên danh mục' ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                   
                </a>
            </li>

               
            </li>
            <li class="nav-item">
                 <a  class="nav-link" href="#">Liên hệ</a>
            </li> 
            <li class="nav-item">
                 <a  class="nav-link" href="#">Thông tin</a>
            </li>
        <form  role="search" class="search-container d-flex">
            <input class="input-search form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" id="keyword">
            <button class="search-btn btn btn-outline-success" data-bs-toggle="search" type="button" id="btnSearch">
                <i class="bi bi-search"></i>Tìm kiếm
            </button>
        </form>


        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>">
                <i class="bi bi-person"></i>Đăng nhập
            </a>
            </li><ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active"  aria-current="page" href="<?= ROOT_URL ?>">
                    <i class="bi bi-pencil-square"></i>Đăng kí
                </a>
            </li>
        </ul>






        <button class="cart-btn  btn btn-outline-success" type="submit">
            <i class="bi bi-cart"></i>Giỏ hàng
        </button>


            <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
       
            </div>
    </div> 
    </div> 
       
        </div>
    </div>
    </nav>