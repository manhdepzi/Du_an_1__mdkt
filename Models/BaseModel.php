<?php
class BaseModel{
    //lưu thông tin kết nối
    public $conn=null;
    //Khởi tạo
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=utf8; port=" . PORT, USERNAME, PASSWORD);
        } catch (PDOException $e) {
            echo 'lỗi kết nối CSDL: ' . $e->getMessage();
        }
    }
}