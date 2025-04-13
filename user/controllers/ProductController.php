<?php

class ProductController
{
    //Hiển thị SP theo danh mục
    public function list()
    {
        $id             = $_GET['id']; //lấy id của danh mục trên url
        $products       = (new Product)->listProductInCategory($id);
        $category        = new Category;

        $categories     = (new Category)->all();
        $categoryName   = (new Category)->find($id)['categoryName'];
        // $title              =  $categoryName;
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
        $_SESSION['totalQuantity'] = (new CartController)->totalQuantity();
        include './views/users/clients/list.php';
    }

    // Chi tiết san phẩm
    public function show()
    {
        $id = $_GET['id'] ?? null; //id SP

        $products = (new Product)->find($id);
        if (!$id) {
            die("Lỗi: ID sản phẩm không hợp lệ.");
        }

        $title = $products['productName'];
        $categories = (new Category)->all();
        //  Lưu URI hiện tại vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
        $_SESSION['totalQuantity'] = (new CartController)->totalQuantity();
        
        include './views/clients/detail.php';
    }
}
