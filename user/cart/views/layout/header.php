<?php
require_once __DIR__ . "/../../configs/config.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0yH0y6H+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .navbar {
            background-color: rgb(255, 75, 96) !important;
            width: 100%;
            padding: 10px 0;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #ffeb3b !important;
        }

        .search-bar {
            width: 300px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            width: 200px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-item {
            color: black !important;
            padding: 10px;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        /* Nút đăng nhập/đăng ký */
        .auth-buttons a {
            color: white;
            margin-left: 15px;
            font-weight: bold;
            text-decoration: none;
        }

        .auth-buttons a:hover {
            color: #ffeb3b;
        }

        /* Giỏ hàng */
        .cart {
            display: flex;
            align-items: center;
            background-color: #ffeb3b;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            margin-left: 20px;
            text-decoration: none;
            color: black;
        }

        .cart i {
            font-size: 22px;
            color: red;
            margin-right: 5px;
        }

        .cart:hover {
            background-color: #ffd600;
        }

        .search-button {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo, thêm link trang chủ -->
            <a class="navbar-brand" href="<?= ROOT_URL ?>">MDKT</a>

            <!-- Nút toggle cho mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Danh sách menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= ROOT_URL . '?ctl= ' ?>">Trang chủ</a>
                    </li>

                    <!-- Danh mục -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Danh mục</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Điện thoại</a></li>
                            <li><a class="dropdown-item" href="#">Laptop</a></li>
                        </ul>
                    </li>

                    <!-- Sản phẩm -->
                    <!-- Thêm link -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $cate): ?>
                                <li>
                                    <pre><? dd($categories) 
                                            ?></pre>
                                    <a class="dropdown-item"
                                        href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                        <?= isset($cate['categoryName']) ? $cate['categoryName'] : 'Tên danh mục' ?>
                                    </a>
                                </li>
                            <?php endforeach ?>

                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thông tin</a>
                    </li>
                </ul>

                <!-- Thanh tìm kiếm -->
                <form class="d-flex">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Tìm kiếm sản phẩm..."
                        aria-label="Search">
                    <button class="btn btn-warning search-button" type="submit">
                        <i class="bi bi-search"></i>Tìm kiếm
                    </button>
                </form>

                <!-- Nút Đăng nhập / Đăng ký -->
                <div class="auth-buttons ms-3">
                    <a href="#"><i class="bi bi-person-circle"></i> Đăng nhập</a>
                    <a href="#"><i class="bi bi-pencil-square"></i> Đăng ký</a>
                </div>

                <!-- Nút Giỏ hàng có thể click -->
                <a href="<?= ROOT_URL . '?ctl=view-cart' ?>" class="cart">
                    <i class="bi bi-cart3"></i>
                    <span>Giỏ hàng (<?= $_SESSION['totalQuantity'] ?? 0 ?>)</span>
                </a>


            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rbsA2VBKQX7l4tbxntx10tBzi9sTz5LWfSx6A/r9VVyz6R1gVX0yUoy60pU8F4Rn" crossorigin="anonymous"></script>
</body>

</html>