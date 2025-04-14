<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa hồ sơ</title>
    <!-- Giữ nguyên link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        .edit-profile-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .edit-profile-container:hover {
            transform: translateY(0);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
            font-weight: 700;
            position: relative;
            margin-bottom: 2rem;
            text-align: center;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: #ff9a9e;
            border-radius: 2px;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding: 0.75rem 0.5rem;
            transition: border-color 0.3s ease;
            background: transparent;
        }

        .form-control:focus {
            border-bottom-color: #ff9a9e;
            box-shadow: none;
            background: transparent;
        }

        .form-label {
            color: #555;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            color: #ff9a9e;
        }

        .btn-primary {
            background: linear-gradient(90deg, #ff9a9e, #fad0c4);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-secondary {
            background: linear-gradient(90deg, #e0e0e0, #f5f5f5);
            color: #333;
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Hiệu ứng loading khi submit */
        .btn-primary.loading::after {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Hiệu ứng particles nền */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Hiệu ứng input animation */
        .mb-3 {
            position: relative;
        }

        .form-control:valid,
        .form-control:focus {
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Thêm canvas cho hiệu ứng particles -->
    <div id="particles-js"></div>

    <!-- Form chỉnh sửa hồ sơ -->
    <form method="post" action="<?= ROOT_URL ?>?ctl=edit-profile" class="edit-profile-container">
        <h2>Chỉnh sửa hồ sơ</h2>
        
        <div class="mb-3">
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($user['name']?? '') ?>" required>
            <label for="name" class="form-label">Họ và tên</label>
        </div>
        <div class="mb-3">
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            <label for="email" class="form-label">Email</label>
        </div>
        <div class="mb-3">
            <input type="text" id="address" name="address" class="form-control" value="<?= htmlspecialchars($user['shippingAddress'] ?? '') ?>" required>
            <label for="address" class="form-label">Địa chỉ</label>
        </div>
        <div class="mb-3">
            <input type="text" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($user['contactno'] ?? '') ?>" required>
            <label for="phone" class="form-label">Số điện thoại</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-2">Cập nhật</button>
        <a href="<?= ROOT_URL ?>?ctl=profile" class="btn btn-secondary w-100">Quay về trang hồ sơ</a>
    </form>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Khởi tạo particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 70, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' } },
                modes: { repulse: { distance: 100 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });

        // Hiệu ứng loading khi submit
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            const button = form.querySelector('button');
            button.classList.add('loading');
            button.disabled = true;
            setTimeout(() => {
                button.classList.remove('loading');
                button.disabled = false;
            }, 2000); // Giả lập thời gian xử lý
        });

        // Kiểm tra định dạng số điện thoại (client-side)
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', () => {
            const phoneValue = phoneInput.value;
            const phoneRegex = /^[0-9]{10,11}$/;
            if (!phoneRegex.test(phoneValue) && phoneValue !== '') {
                phoneInput.setCustomValidity('Số điện thoại phải có 10-11 chữ số.');
            } else {
                phoneInput.setCustomValidity('');
            }
        });
    </script>
</body>
</html>