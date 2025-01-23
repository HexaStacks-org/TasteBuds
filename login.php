<?php
include("shared/processes/loginQuery.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared/assets/css/login.css" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <?php
    include("shared/components/fontEmbed.php");
    ?>
</head>

<body class="login-body">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">

            <?php if ($error == "NO USER") { ?>
                <div class="alert alert-danger mb-3 d-flex text-align-center justify-content-center" role="alert">
                    Invalid email or password
                </div>
            <?php } ?>

            <div class="col-md-6 d-flex d-md-block">
                <img src="shared/assets/image/mockup-pic2.png" alt="pic" class="img-fluid login-pic">
            </div>
            <div class="col-md-6 col-12">
                <div class="login-logo text-start">
                    <img src="shared/assets/image/Logo Combination 1.png" alt="logo" class="img-fluid">
                </div>
                <div class="text-start login">Login</div>
                <p class="text-start login-text">Access your account to view and manage your recipes.</p>
                <form action="login.php" method="POST">
                    <div class="mb-3 position-relative">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email here" id="email"
                            name="email" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="**********" id="password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="keepSignedIn">
                            <label class="form-check-label" for="keepSignedIn">
                                Keep me signed in
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login px-5" name="btnLogin">
                        <p>LOGIN</p>
                    </button>
                </form>
                <p class="mx-4 txt-account mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>