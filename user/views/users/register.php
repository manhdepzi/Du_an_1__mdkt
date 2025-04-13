<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <form method="post" action="../../index.php?ctl=register" class="w-50 mx-auto mt-5 p-4 border rounded shadow-sm">
        <h2 class="text-center mb-4">Đăng ký</h2>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Số điện thoại" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Đăng ký</button>

        <div class="text-center mt-3">
            <a href="http://localhost/test9/user/views/users/login.php" class="btn btn-primary">Chuyển sang trang Đăng nhập</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
