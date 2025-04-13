<?php
require_once __DIR__ . '/../configs/config.php'; // Kết nối với file cấu hình

class BaseModel {
    public $conn;

    public function __construct()
    {
        global $pdo; // Sử dụng PDO đã kết nối trong config.php
        try {
            $this->conn = $pdo;
            if ($this->conn === null) {
                throw new PDOException("Không thể kết nối đến cơ sở dữ liệu.");
            }
        } catch (PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
            exit();
        }
    }
}