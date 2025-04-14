<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ cá nhân</title>
    <!-- Giữ nguyên link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        .profile-container {
            max-width: 550px;
            width: 100%;
            margin: 2rem auto;
            padding: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(0);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: linear-gradient(90deg, #74ebd5, #acb6e5);
            color: #fff;
            text-align: center;
            padding: 1.5rem;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .card-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            color: #333;
            font-weight: 600;
            position: relative;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #74ebd5;
            border-radius: 2px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .info-item:hover {
            background: rgba(116, 235, 213, 0.1);
        }

        .info-item strong {
            color: #555;
            font-weight: 600;
            min-width: 120px;
        }

        .info-item span {
            color: #333;
            font-weight: 400;
        }

        .btn-primary {
            background: linear-gradient(90deg, #74ebd5, #acb6e5);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            margin-bottom: 1rem;
        }

        .btn-secondary {
            background: linear-gradient(90deg, #d3cce3, #e9e4f0);
            color: #333;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Hiệu ứng particles nền */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Hiệu ứng avatar placeholder */
        .avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- Thêm canvas cho hiệu ứng particles -->
    <div id="particles-js"></div>

    <div class="container profile-container">
        <div class="card">
            <div class="card-header">
                <h2>Hồ sơ cá nhân</h2>
            </div>
            <div class="card-body">
                <!-- Thêm avatar placeholder -->
                <div class="avatar">
                    <?php echo strtoupper(substr($user['name'] ?? 'U', 0, 1)); ?>
                </div>
                <h5 class="card-title">Thông tin người dùng</h5>
                <div class="info-item">
                    <strong>Họ và tên:</strong>
                    <span><?= htmlspecialchars($user['name'] ?? 'Chưa cập nhật') ?></span>
                </div>
                <div class="info-item">
                    <strong>Email:</strong>
                    <span><?= htmlspecialchars($user['email']) ?></span>
                </div>
                <div class="info-item">
                    <strong>Địa chỉ:</strong>
                    <span><?= htmlspecialchars($user['shippingAddress'] ?? 'Chưa cập nhật') ?></span>
                </div>
                <div class="info-item">
                    <strong>Số điện thoại:</strong>
                    <span>0<?= htmlspecialchars($user['contactno'] ?? 'Chưa cập nhật') ?></span>
                </div>
                <!-- Giữ nguyên các link -->
                <a href="<?= ROOT_URL ?>?ctl=edit-profile" class="btn btn-primary">Chỉnh sửa hồ sơ</a>
                <a href="<?= ROOT_URL ?>?ctl=change-password" class="btn btn-primary">Đổi mật khẩu</a>
                <a href="<?= ROOT_URL ?>" class="btn btn-secondary">Quay về trang chủ</a> 
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Khởi tạo particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.4, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.3, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' } },
                modes: { repulse: { distance: 100 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    </script>
</body>
</html>