<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <!-- Giữ nguyên link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        .change-password-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .change-password-container:hover {
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
            background: #667eea;
            border-radius: 2px;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding: 0.75rem 2.5rem 0.75rem 0.5rem; /* Thêm padding bên phải để chừa chỗ cho icon */
            transition: border-color 0.3s ease;
            background: transparent;
        }

        .form-control:focus {
            border-bottom-color: #667eea;
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
            color: #667eea;
        }

        .btn-primary {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
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

        /* Icon hiển thị mật khẩu */
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #667eea;
            font-size: 1.2rem;
            user-select: none; /* Ngăn không cho icon bị bôi đen khi click */
        }

        /* Đảm bảo input không bị ảnh hưởng bởi icon */
        .password-field {
            position: relative;
        }
    </style>
</head>
<body>
    <!-- Thêm canvas cho hiệu ứng particles -->
    <div id="particles-js"></div>

    <!-- Form đổi mật khẩu -->
    <form method="POST" action="<?= ROOT_URL ?>?ctl=change-password" class="change-password-container">
        <h2>Đổi mật khẩu</h2>

        <div class="mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder=" " required>
            <label for="email" class="form-label">Email</label>
        </div>

        <div class="mb-3 password-field">
            <input type="password" name="old_password" id="old_password" class="form-control" placeholder=" " required>
            <label for="old_password" class="form-label">Mật khẩu cũ</label>
            <span class="password-toggle" onclick="togglePassword('old_password')">👁️</span>
        </div>

        <div class="mb-3 password-field">
            <input type="password" name="new_password" id="new_password" class="form-control" placeholder=" " required>
            <label for="new_password" class="form-label">Mật khẩu mới</label>
            <span class="password-toggle" onclick="togglePassword('new_password')">👁️</span>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
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

        // Kiểm tra mật khẩu mới (client-side)
        const newPasswordInput = document.getElementById('new_password');
        newPasswordInput.addEventListener('input', () => {
            const passwordValue = newPasswordInput.value;
            if (passwordValue.length < 6 && passwordValue !== '') {
                newPasswordInput.setCustomValidity('Mật khẩu mới phải có ít nhất 6 ký tự.');
            } else {
                newPasswordInput.setCustomValidity('');
            }
        });

        // Toggle hiển thị mật khẩu
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.nextElementSibling; // Lấy span chứa icon
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>