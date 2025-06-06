<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Giữ nguyên link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .login-container:hover {
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
            background: #6e8efb;
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
            border-bottom-color: #6e8efb;
            box-shadow: none;
            background: transparent;
        }

        .form-label {
            color: #555;
            font-weight: 500;
        }

        .btn-primary {
            background: linear-gradient(90deg, #6e8efb, #a777e3);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(110, 142, 251, 0.4);
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #6e8efb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #a777e3;
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
    </style>
</head>
<body>
    <!-- Thêm canvas cho hiệu ứng particles -->
    <div id="particles-js"></div>

    <!-- Form đăng nhập -->
    <form method="post" action="../../index.php?ctl=login" class="login-container">
        <h2>Đăng nhập</h2>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
        
        <!-- Thêm link quên mật khẩu -->
        <a href="#" class="forgot-password">Quên mật khẩu?</a>
    </form>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Khởi tạo particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
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
    </script>
</body>
</html>