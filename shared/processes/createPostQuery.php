<?php
include("connect.php"); 
session_start();

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    die("User not logged in.");
}

if (isset($_POST['postSubmit'])) {
    $caption = $_POST['caption'];
    $primaryCategoryID = $_POST['flexRadioPrimary'];
    $subcategoryID = $_POST['flexRadioSecondary'];
    $userID = $_SESSION['userID']; // Get the user ID from the session

    // Set isApproved based on userID or role
    $isApproved = 'No';
    if ($userID == 1) {
        $isApproved = 'Yes';
    } else {
        // Optional: Fetch role if needed
        $roleQuery = "SELECT role FROM users WHERE userID = '$userID'";
        $roleResult = $conn->query($roleQuery);
        if ($roleResult && $roleResult->num_rows > 0) {
            $role = $roleResult->fetch_assoc()['role'];
            if ($role === 'admin') {
                $isApproved = 'Yes';
            }
        }
    }

    // Insert gallery post
    if ($primaryCategoryID && $subcategoryID) {
        $insertGalleryQuery = "
            INSERT INTO galleryposts (caption, primaryCategoryID, subcategoryID, userID, isApproved, updatedAt) 
            VALUES ('$caption', '$primaryCategoryID', '$subcategoryID', '$userID', '$isApproved', NULL)
        ";
        if (!$conn->query($insertGalleryQuery)) {
            die("Error inserting gallery post: " . $conn->error);
        }
        $postID = $conn->insert_id; // Get the inserted postID
    }

    // Handle file uploads
    if (isset($_FILES['images'])) {
        $uploadDir = "../../shared/assets/image/content-image/";
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['images']['name'][$key];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $newFileName = uniqid("img_", true) . ".$fileExt";
                    if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
                        $conn->query("
                            INSERT INTO images (postID, imageURL) 
                            VALUES ('$postID', '$newFileName')
                        ");
                    }
                }
            }
        }
    }

    // Redirect after success
    header("Location: ../../users/gallery.php");
    exit();
}

// Display gallery posts
$query = "
    SELECT galleryposts.caption, images.imageURL, galleryposts.isApproved
    FROM galleryposts
    LEFT JOIN images ON galleryposts.postID = images.postID
";
$result = $conn->query($query);
?>
