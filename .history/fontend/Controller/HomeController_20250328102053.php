<?php

class HomeController {
    // Hiển thị ra trang chủ
    public function index() {
        $product         = new Product;
        $laptops         = $product->listProductInCategoryHome(10);   // Danh sách laptops(10) là id_cate
        $phones          = $product->listProductInCategoryHome(12);   // Danh sách phones
        $category        = new Category;
        // $bookCateName       = $category->cateName(7);   // Danh sách phones
        // $electronicCateName = $category->cateName(9);   // Danh sách phones
        // $laptopCateName     = $category->cateName(10);   // Danh sách phones
        // $phoneCateName      = $category->cateName(12);   // Danh sách phones

            // Tiêu đề
        $title ="TRANG CHỦ WEBSITE BÁN QUẦN ÁO";
        $categories     = (new Category)->all();

     
        include 'views/client/home.php';
    }
}
?>ssh-keygen -t rsa -b 4096 -C "newstudent418@gmail.com"
SHA256:B3cqeW3/AcdbMgb4PO0x7s6kxw6x8Vlqq39vmHm1Z2Q newstudent418@gmail.com
git remote set-url https://github.com/manhdepzi/Du_an_1__mdkt.git
git remote set-url origin https://github.com/manhdepzi/Du_an_1__mdkt.git

