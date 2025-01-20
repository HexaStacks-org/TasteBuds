<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            <form action="updateUser.php" method="POST">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your new first name">

                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your new last name">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your new password">

                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword"
                    placeholder="Confirm your new password">

                <button type="submit" class="btn-update">UPDATE</button>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-section">
            <img src="shared/assets/image/mockup-pic.png" alt="Profile Mockup" class="image-section">
        </div>
    </div>
</body>

</html>
