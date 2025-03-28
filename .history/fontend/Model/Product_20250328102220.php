<?php

/**
 * Model Product: lam viec voi bang Products
 * 
 */

class Product extends BaseModel {
    // lấy toàn bộ DL
    public function all() {
        $sql = "SELECT p.*, c.categoryName 
                FROM products p 
                JOIN category c ON p.category_id = c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lấy SP theo Danh mục
    public function listProductInCategory($id) 
    {
        $sql = "SELECT p.*, c.categoryName 
                FROM products p 
                JOIN category c ON p.category_id = c.id
                WHERE c.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    
    //Lấy DL cho trsng chủ
    public function listProductInCategoryHome($id) 
    {
        $sql = "SELECT p.*, c.categoryName 
                FROM products p 
                JOIN category c ON p.category_id = c.id
                WHERE c.id=:id
                ORDER BY id DESC
                limit 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cateName($id) 
    {
        $sql = "SELECT * from  categories
                WHERE id=:id
                limit 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Them DL 
    public function create($data)  {
        $sql = "INSERT INTO  products(id,	category_id,	subCategory,	productName,	productCompany,	    productPrice,	productPriceBeforeDiscount, 	productDescription, 	productImage1,  	productImage2,  	productImage3,	shippingCharge,	    productAvailability,	postingDate,	updationDate	)
                             VALUES(:id,	:category_id,	:subCategory,	:productName,	:productCompany,	:productPrice,	:productPriceBeforeDiscount,	:productDescription,	:productImage1, 	:productImage2, 	:productImage3,	:shippingCharge,	:productAvailability,	:postingDate,	:updationDate	)
        )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // cập nhật DL
    public function update($id, $data) {
        $sql = "UPDATE  products SET    category_id=:category_id,	
                                        subCategory=:subCategory,	
                                        productName=:productName,	
                                        productCompany=:productCompany,	
                                        productPrice=:productPrice,	
                                        productPriceBeforeDiscount=:productPriceBeforeDiscount,	
                                        productDescription=:productDescription,	
                                        productImage1=:productImage1,	
                                        productImage2=:productImage2,	
                                        productImage3=:productImage3,	
                                        shippingCharge=:shippingCharge,	
                                        productAvailability=:productAvailability,	
                                        postingDate=:postingDate,	
                                        updationDate=:updationDate

        WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        // them vao mang data
        $data['id'] = $id;
        $stmt->execute($data);
       
    }
    
    //xoa DL 
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Lấy 1 sp theo ID
    public function find($id) {
        $sql = "SELECT p.*, c.categoryName FROM products p JOIN category c ON p.category_id = c.id WHERE p.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);       
        return $stmt->fetch(PDO::FETCH_ASSOC);        
    }

    //

}
