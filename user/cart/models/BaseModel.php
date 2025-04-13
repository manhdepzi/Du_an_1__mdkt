<?php
require_once __DIR__ . '/../configs/config.php'; // Kết nối với file cấu hình

class BaseModel {
    public $conn;

    public function __construct()
    {
        global $pdo; // Dùng PDO đã kết nối trong config.php
        $this->conn = $pdo;
    }
}
?>
