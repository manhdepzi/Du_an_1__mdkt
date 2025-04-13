<?php

class HomeController {
    // Hiển thị ra trang chủ
    public function index() {
        $product         = (new Product);
        $products        = $product->all();     // Danh sách tài liệu (10) là id_cate
        $laptops         = $product->listProductInCategoryHome(1);   // Danh sách laptops(10) là id_cate
        $phones          = $product->listProductInCategoryHome(2);   // Danh sách phones
        $category        = new Category;
        // $bookCateName       = $category->cateName(7);   // Danh sách phones
        // $electronicCateName = $category->cateName(9);   // Danh sách phones
        // $laptopCateName     = $category->cateName(10);   // Danh sách phones
        // $phoneCateName      = $category->cateName(12);   // Danh sách phones

            // Tiêu đề
        $title ="TRANG CHỦ WEBSITE BÁN QUẦN ÁO";
        $categories     = (new Category)->all();
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        include './views/clients/users/home.php';
    }
}
?>
