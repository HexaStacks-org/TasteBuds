<?php
include("connect.php");
session_start();
session_destroy();
session_start();

$error = "";

if (!empty($_SESSION['userID'])) {
    header("Location: users/index.php");
}

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = str_replace('\'', '', $email);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $loginResult = executeQuery($loginQuery);

    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $error = "";

            if ($user['role'] == "admin") {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: users/index.php");
            }
        }
    } else {
        $error = "NO USER";
    }
}

if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    $email = str_replace('\'', '', $email);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $loginResult = executeQuery($loginQuery);

    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == "admin") {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: users/index.php");
            }
        }
    } else {
        echo "Invalid session.";
    }
}

if (isset($_POST['keepSignedIn'])) {
    setcookie('email', $email, time() + (30 * 24 * 60 * 60), "/");  // 30 days
    setcookie('password', $password, time() + (30 * 24 * 60 * 60), "/");  // 30 days
} else {
    setcookie('email', '', time() - 3600, "/");
    setcookie('password', '', time() - 3600, "/");
}
?>