<?php
include("shared/components/connect.php");

session_start();

$_SESSION['userID'] = "";
$_SESSION['firstName'] = "";
$_SESSION['LastName'] = "";
$_SESSION['email'] = "";
$_SESSION['role'] = "";

$error = "";

if (isset($_POST['btnSignUp'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $signUpQuery = "SELECT * FROM users WHERE email = '$email'";
    $signUpResult = executeQuery($signUpQuery);

    if (mysqli_num_rows($signUpResult) > 0) {
        $error = "USER_EXISTS";
    } elseif ($password == $confirmPassword) {
        $lastInsertedId = mysqli_insert_id($conn);

        $userInsertQuery = "INSERT INTO users(firstName, lastName, email, password, role)  VALUES ('$firstName', '$lastName', '$email', '$password', 'user')";
        executeQuery($userInsertQuery);

        $lastInsertedId = mysqli_insert_id($conn);

        $_SESSION['userID'] = $lastInsertedId;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['role'] = "user";

        header("Location: landing.php");
    } else {
        $error = "PASSWORD UNMATCHED";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/signup.css" />
</head>


<body class="signup-body">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">
            <div class="col-md-6 d-none d-md-block">
                <img src="shared/assets/image/mockup-pic.png" alt="pic" class="img-fluid pic">
            </div>
            <div class="col-md-6 col-12">
                <div class="signup-logo text-start">
                    <img src="shared/assets/image/Logo Combination 1.png" alt="logo" class="img-fluid">
                </div>
                <!-- Error: Password Unmatched -->
                <?php if ($error == "PASSWORD UNMATCHED") { ?>
                    <div class="alert alert-danger mb-3" role="alert">
                        Passwords does not match
                    </div>
                <?php } ?>


                <!-- Error: Same email credential -->
                <?php if ($error == "USER_EXISTS") { ?>
                    <div class="alert alert-warning" role="alert">
                        Email already exists.
                    </div>
                <?php } ?>


                <div class="text-start signup-header">Create an account</div>
                <p class="text-start signup-text">Sign up to save and review your favorite recipes.</p>
                <form action="signup.php" method="POST">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstName" required>


                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastName" required>


                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>


                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>


                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirmPassword" required>


                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="1" id="legalAge" name="legalAge"
                            required>
                        <label class="form-check-label" for="legalAge">
                            I certify that I am over 18, I have read the
                            <a href="tastebudsOrg.php" target="_blank">Terms and Conditions</a>
                            and
                            <a href="tastebudsOrg.php" target="_blank">Privacy Notice</a>,
                            and I accept the use of my personal data in this content.
                        </label>
                    </div>


                    <button type="submit" name="btnSignUp" class="btn btn-signup mt-4">
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