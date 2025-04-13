<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../common/function.php';

class AuthController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $contactno = $_POST['phone'];
            $password = $_POST['password'];
            
            if ($this->model->register($email, $contactno, $password)) {
                echo 'Đăng ký thành công';
            }
        }
        include_once __DIR__ . '/../views/users/register.php'; 
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->login($email, $password);
            
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: http://localhost/test9/user/"); // Chuyển hướng đến trang home
                exit();
            } else {
                echo "Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.";
            }
        }
        include_once __DIR__ . '/../views/users/login.php';
    }

    public function logout(){
        unset($_SESSION['user']);
        header("Location: http://localhost/test9/user/"); 
        exit();
    }
}
