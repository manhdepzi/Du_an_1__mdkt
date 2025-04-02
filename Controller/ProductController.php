<?php

    class ProductController {
        //Hiển thị SP theo danh mục
        public function list()  {
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0; // Ép kiểu số nguyên
            // var_dump($id); die(); // Kiểm tra giá trị ID

            // Kiểm tra xem ID có hợp lệ không
            if (!$id) {
                die("Danh mục không hợp lệ.");
            }

            $products       = (new Product)->listProductInCategory($id);
            $category       = new Category;
            $categories   = $category->all();

            $categoryData = (new Category)->find($id);
            // var_dump($categoryData); die(); // Xem dữ liệu trả về
            
            $category_name = $categoryData['categoryName'] ?? "Danh mục chưa xác định"; 
        
            $category_name   = (new Category)->find($id)['categoryName'];
            $title          = $category_name; // Dùng cho tiêu đề trang

            include './View/products/list.php';
        }

        // Chi tiết san phẩm
        public function show()
        {
            $id = $_GET['id']; //id SP
            
            $product = (new Product)->find($id); 
            $title = $product['productName'];
            $categories = (new Category)->all();
        
            // Danh sách sản phẩm liên quan
            $productReleads = (new Product)->listProductRelead($product['category_id'], $id);

            include './View/products/detail.php';
        }
        

    }
?>