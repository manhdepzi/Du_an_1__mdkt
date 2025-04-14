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

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $contactno = $_POST['phone'];
            $password = $_POST['password'];

            // Kiểm tra xem email đã tồn tại chưa
            if ($this->model->isEmailExists($email)) {
                // Hiển thị thông báo nếu email đã tồn tại
                echo "<script>
                    alert('Tài khoản với email này đã tồn tại!');
                    window.history.back(); // Quay lại trang đăng ký
                  </script>";
                exit();
            }

            // Nếu email chưa tồn tại, thực hiện đăng ký
            if ($this->model->register($email, $contactno, $password)) {
                echo "<script>
                    alert('Đăng ký thành công!');
                    window.location.href = '" . ROOT_URL . "?ctl=login';
                  </script>";
                exit();
            } else {
                echo "<script>
                    alert('Đăng ký thất bại. Vui lòng thử lại!');
                  </script>";
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
                include_once __DIR__ . '/../views/clients/home.php';
                exit();
            } else {
                echo "Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.";
            }
        }
        include_once __DIR__ . '/../views/users/login.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: http://localhost/Du_an_1__mdkt/user/");
        exit();
    }
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            header("Location: " . ROOT_URL . "?ctl=login");
            exit();
        }

        // Lấy thông tin người dùng từ session
        $user = $_SESSION['user'];

        // Hiển thị view hồ sơ
        include_once __DIR__ . '/../views/users/profile.php';
    }

    public function editProfile()
    {
        if (!isset($_SESSION['user'])) {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            header("Location: " . ROOT_URL . "?ctl=login");
            exit();
        }

        $user = $_SESSION['user'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            // Gọi model để cập nhật thông tin
            if ($this->model->updateUser($user['id'], $name, $email, $address, $phone)) {
                // Cập nhật lại thông tin trong session
                $_SESSION['user'] = $this->model->getUserById($user['id']);
                echo "Cập nhật thông tin thành công!";
            } else {
                echo "Cập nhật thông tin thất bại!";
            }
        }

        // Hiển thị view chỉnh sửa hồ sơ
        include_once __DIR__ . '/../views/users/edit-profile.php';
    }
    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];

            // Kiểm tra email và mật khẩu cũ
            $user = $this->model->login($email, $oldPassword);
            if ($user) {
                // Cập nhật mật khẩu mới
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $this->model->conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                if ($stmt->execute([$hashedPassword, $email])) {
                    echo "<script>
                    alert('Đổi mật khẩu thành công!');
                    window.location.href = '" . ROOT_URL . "?ctl=profile';
                  </script>";
                    exit();
                } else {
                    echo "<script>alert('Đổi mật khẩu thất bại!');</script>";
                }
            } else {
                echo "<script>alert('Email hoặc mật khẩu cũ không đúng!');</script>";
            }
        }

        // Hiển thị form đổi mật khẩu
        include_once __DIR__ . '/../views/users/change-password.php';
    }
}
