<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create an account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="shared/assets/css/signup.css" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
</head>

<body class="sign-up-body">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">
            <div class="col-md-6 d-none d-md-block">
                <img src="shared/assets/image/mockup-pic.png" alt="pic" class="img-fluid pic">
            </div>
            <div class="col-md-6 col-12">
                <div class="sign-up-logo text-center">
                    <img src="shared/assets/image/Logo Combination 1.png" alt="logo" class="img-fluid">
                </div>
                <h1 class="text-start create">Create an account</h1>
                <p class="text-start sign-up">Sign up to save and review your favorite recipes.</p>
                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter your first name here" id="firstName"
                            name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter your last name here" id="lastName"
                            name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email here" id="email"
                            name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="************" id="password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="keepSignedIn" required>
                            <label class="form-check-label" for="keepSignedIn">
                                Keep me signed in
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="legalAge" required>
                            <label class="form-check-label" for="legalAge">
                                I certify that I am over 18, I have read the Terms and Conditions and Privacy Notice and
                                I accepted the use of my personal data in this content.
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sign-up">
                        <p>SIGN UP</p>
                    </button>
                </form>
                <p class="text-start txt-account mt-3">Already have an account? <a href="login.html">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>