<?php

class Category extends BaseModel{
/**
 * Phương thức all: lấy ra toàn bộ dũ liệu bảng categories
 * 
 */
    public function all() {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function cateName($id) 
    {
        $sql = "SELECT * from  category
                WHERE id=:id
                limit 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /** 
     * PHƯƠNG THỨC CREATE: tao mới DL
      *  @data: là mảng DL cần thêm
     */

    public function create($data) {
        $sql = "INSERT INTO products(productName) VALUES(:productName)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    /**
     * Phương thức update: cập nhật dữ liệu
     * @id: mã danh mục
     * @data: mảng DL cập nhật
     */

    public function update($id, $data) {
        $sql = "UPDATE products SET productName=:productName WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        //Them id va data
        $data['id'] = $id;
        $stmt->execute($data);
    }


    /**
     * Phuong thuc find: Xoa DL
     * @id: ma danh muc
     */
    public function find($id) {
        $sql = "SELECT * FROM category WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
    
        // if (!$stmt) {
        //     die("❌ LỖI: Chuẩn bị truy vấn thất bại!");
        // }
    
        $stmt->execute(['id' => $id]); // KHÔNG ép kiểu nữa, thử nguyên gốc
    
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // if (!$category) {
        //     die("❌ Không tìm thấy danh mục có ID = " . $id);
        // }
    
        return $category;
    }
    


    /**
     * Phuong thuc delete: Xoa DL
     * @id: ma danh muc
     */

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

 
}