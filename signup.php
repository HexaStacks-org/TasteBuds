<?php
include("shared/processes/signupQuery.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    include("shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="shared/assets/css/signup.css" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="icon" type="image" href="shared/assets/image/TasteBuds_Icon.png">

</head>

<body class="signup-body">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">
            <div class="col-md-6 d-none d-md-block">
                <img src="shared/assets/image/mockup-pic2.png" alt="pic" class="img-fluid pic">
            </div>
            <div class="col-md-6 col-12">
                <div class="sign-up-logo text-start">
                    <img src="shared/assets/image/Logo Combination 1.png" alt="logo" class="img-fluid">
                </div>

                <?php if ($error == "PASSWORD UNMATCHED") { ?>
                    <div class="alert alert-danger mb-3 d-flex align-items-center justify-content-center" role="alert"
                        style="width: 450px">
                        Passwords does not match
                    </div>
                <?php } ?>

                <?php if ($error == "USER_EXISTS") { ?>
                    <div class="alert alert-warning d-flex align-items-center justify-content-center" role="alert"
                        style="width: 450px">
                        Email already exists.
                    </div>
                <?php } ?>

                <div class="create text-start">Create an account</div>
                <p class="sign-up text-start">Sign up to save and review your favorite recipes.</p>
                <form action="signup.php" method="POST">
                    <label for="fullname" class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" id="firstName"
                        name="firstName" required>
                    <label for="fullname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your last name" id="lastName"
                        name="lastName" required>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email"
                        required>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="************" id="password" name="password"
                        required>
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="************" id="confirm_password"
                        name="confirm_password" required>

                    <!-- New Checkbox Section -->
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="" id="legalAge" required>
                        <label class="form-check-label" for="legalAge">
                            I certify that I am over 18, I have read the
                            <a href="tastebudsOrg.php">Terms and Conditions</a>
                            and
                            <a href="tastebudsOrg.php">Privacy Notice</a>,
                            and I accept the use of my personal data in this content.
                        </label>
                    </div>

                    <button type="submit" name="btnSignUp" class="btn btnSignUp mt-4">
                        <p>SIGN UP</p>
                    </button>
                </form>
                <p class="mx-4 txt-account mt-3">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>