<?php 
include("connect.php");

session_start();

$_SESSION['userID'] = "";
$_SESSION['firstName'] = "";
$_SESSION['lastName'] = "";
$_SESSION['email'] = "";
$_SESSION['role'] = "";

$error = "";

if (isset($_POST['btnSignUp'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

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

        header("Location: users/index.php");
    } else {
        $error = "PASSWORD UNMATCHED";
    }
}
?>