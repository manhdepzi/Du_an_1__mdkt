<?php

//Class BaseModel 
class BaseModel {
    public $conn = null;
    public function __construct()
    {
        try {
            // $this->conn = new PDO("mysql:host=" . HOST . "; dbaname=". DBNAME . ";charset=utf8; port=" . PORT, USERNAME, PASSWORD);
            $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8", USERNAME, PASSWORD);

        } catch (PDOException $e) {
      
            echo "Lỗi kết nối CSDL: ", $e->getMessage();
        }
        
    }
}