<?php
require_once __DIR__ . '/BaseModel.php';

class UserModel extends BaseModel {
    public function register($email, $contactno, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (email, contactno, password) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $contactno, $hashedPassword]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}