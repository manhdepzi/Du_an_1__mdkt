<?php

    class ProductController {
        //Hiển thị SP theo danh mục
        public function list()  {
            $id             = $_GET['id']; //lấy id của danh mục trên url
            $products       = (new Product)->listProductInCategory($id);
            $category        = new Category;
        
            $categories     = (new Category)->all();
            $categoryName   = (new Category)->find($id)['categoryName'];
            $title              =  $categoryName;

            include './views/products/list.php';
        }

        // Chi tiết san phẩm
        public function show()
        {
            $id = $_GET['id']; //id SP
            
            $product = (new Product)->find($id); 
            $title = $product['productName'];
            $categories = (new Category)->all();
        
            include './views/products/detail.php';
        }
        

    }
?>