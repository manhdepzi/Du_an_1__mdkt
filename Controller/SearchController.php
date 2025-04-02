<?php

class SearchController {
    public function search() {
        $keyword    = $_GET['keyword'] ?? '';
        $products   = (new Product)->searchProductName($keyword);
        $categories = (new Category)->all();

        if (empty($products)) {
            $message = "Không có sản phẩm nào cho từ khoá: " . htmlspecialchars($keyword);
        } else {
            $message = "Kết quả tìm kiếm cho từ khoá: " . htmlspecialchars($keyword);
        }   
    include './View/products/search.php';

    }
}
?>