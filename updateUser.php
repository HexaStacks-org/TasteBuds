<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Manila');


// Check if the user is logged in
if (empty($_SESSION['userID'])) {
    // Redirect to login if no session is found
    header("Location: login.php");
    exit;
}

// Get the userID from the session
$userID = $_SESSION['userID'];

// Fetch user details for pre-population in the form
$queryProfile = "SELECT * FROM users WHERE userID = $userID";
$resultProfile = executeQuery($queryProfile);

if (mysqli_num_rows($resultProfile) > 0) {
    // Get the current user details
    $user = mysqli_fetch_assoc($resultProfile);
} else {
    header("Location: login.php");
}

if (isset($_POST['btnUpdate'])) {
    // Get the updated form values
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    // Build the update query
    $updateUserQuery = "UPDATE users SET firstName = '$firstName', lastName = '$lastName'";

    if (!empty($newPassword) || !empty($confirmNewPassword)) {
        // If either password field is filled, validate the passwords
        if ($newPassword === $confirmNewPassword) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateUserQuery .= ", password = '$hashedPassword'";
        } else {
            $errorMessage = "Passwords do not match!";
        }
    }

    if (!isset($errorMessage)) {
        // Execute the update query only if there are no errors
        $updateUserQuery .= " WHERE userID = $userID";
        executeQuery($updateUserQuery);

        // Redirect after successful update
        header('Location: userContent.php?userID=' . $userID); // Redirect to the user's profile
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/updateUser.css">

</head>

<body>
    <div class="edit-profile-container">
        <!-- Form Section -->
        <div class="form-section">
            <a href="landing.php"> <button class="btn-back mb-3" type="button">BACK</button></a>
            <h1>EDIT PROFILE</h1>
            <?php if (isset($errorMessage)) { ?>
                <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
            <?php } ?>

            <form method="post">
                <label for="firstName" class="form-label">First Name</label>
                <input value="<?php echo htmlspecialchars($user['firstName']); ?>" type="text" class="form-control"
                    id="firstName" name="firstName" required placeholder="Enter your new first name">

                <label for="lastName" class="form-label">Last Name</label>
                <input value="<?php echo htmlspecialchars($user['lastName']); ?>" type="text" class="form-control"
                    id="lastName" name="lastName" required placeholder="Enter your new last name">

                <label for="newPassword" class="form-label">New Password (optional)</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter your new password">

                <label for="confirmNewPassword" class="form-label">Confirm New Password (optional)</label>
                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm your new password">

                <button type="submit" name="btnUpdate" class="btn-update">UPDATE</button>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-section">
            <img src="shared/assets/image/mockup-pic.png" alt="Profile Mockup" class="image-section">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>