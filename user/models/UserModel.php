<?php
require_once __DIR__ . '/BaseModel.php';

class UserModel extends BaseModel
{
    public function register($email, $contactno, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (email, contactno, password) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $contactno, $hashedPassword]);
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function updateUser($id, $name, $email, $shippingAddress, $contactno)
    {
        $sql = "UPDATE users SET name = ?, email = ?, shippingAddress = ?, contactno = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $email, $shippingAddress, $contactno, $id]);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function isEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
    }
}