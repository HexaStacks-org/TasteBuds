<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="shared/assets/css/login.css" />
        <link rel="stylesheet" href="shared/assets/css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
            rel="stylesheet">
</head>

<body class="login-body">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">
            <div class="col-md-6 d-none d-md-block">
                <img src="shared/assets/image/mockup-pic.png" alt="pic" class="img-fluid pic">
            </div>
            <div class="col-md-6 col-12">
                <div class="login-logo text-start">
                    <img src="shared/assets/image/Logo Combination 1.png" alt="logo" class="img-fluid">
                </div>
                <div class="text-start login">Login</div>
                <p class="text-start login-text">Access your account to view and manage your recipes.</p>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email here" id="email" name="email" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="************" id="password" name="password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="keepSignedIn">
                            <label class="form-check-label" for="keepSignedIn">
                                Keep me signed in
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-login"><p>LOGIN</p></button>
                </form>
                <p class="text-center txt-account mt-3">Don't have an account? <a href="signup.html">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>