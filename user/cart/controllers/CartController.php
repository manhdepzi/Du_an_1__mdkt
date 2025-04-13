<?php

require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/Category.php";

class CartController
{
    public function addToCart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("ID sản phẩm không hợp lệ.");
        }

        $product = (new Product)->find($id);
        if (!$product) {
            die("Sản phẩm không tồn tại.");
        }

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'name' => $product['productName'],
                'price' => $product['productPrice'],
                'image' => $product['productImage1'],
                'quantity' => 1
            ];
        }

        header("Location: " . ($_SESSION['URI'] ?? ROOT_URL));
        exit();
    }


    // Tính tổng số lượng sản phẩm 
    public function totalQuantity()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }

    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $sumPrice = (new CartController)->sumPrice();
        $categories = (new Category)->all();
        return view('clients.cart', compact('carts', 'categories', 'sumPrice'));
    }


    public function sumPrice()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
    }

    public function deleteProductInCart()
    {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        $_SESSION['totalQuantity'] = (new CartController)->totalQuantity();
        return header("Location: " . ROOT_URL . "?ctl=view-cart");
    }

    public function updateCart()
    {
        $quantities = $_POST['quantity'];
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        return header("Location: " . ROOT_URL . "?ctl=view-cart");
    }

    public function viewCheckout()
    {
        $carts = $_SESSION['cart'] ?? [];
        $sumPrice = (new CartController)->sumPrice();
        // if (!isset($_SESSION['user'])) {
        //     return header("Location: " . ROOT_URL . "?ctl=login");
        // }
        // $user = $_SESSION['user'];
        // $carts = $_SESSION['cart'];
        return view('clients.checkout', compact('carts', 'sumPrice'));
    }
}
