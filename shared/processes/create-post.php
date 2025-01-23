<?php
include("../../connect.php");

if (isset($_POST['postSubmit'])) {
    $caption = $_POST['caption'];
    $primaryCategoryID = $_POST['flexRadioPrimary'];
    $subcategoryID = $_POST['flexRadioSecondary'];

    // Insert gallery post
    if ($primaryCategoryID && $subcategoryID) {
        $insertGalleryQuery = "
            INSERT INTO galleryposts (caption, primaryCategoryID, subcategoryID) 
            VALUES ('$caption', '$primaryCategoryID', '$subcategoryID')
        ";
        if (!$conn->query($insertGalleryQuery)) {
            die("Error inserting gallery post: " . $conn->error);
        }
        $postID = $conn->insert_id; // Get the inserted postID
    }

    // Handle file uploads
    if (isset($_FILES['images'])) {
        $uploadDir = "../../shared/assets/image/content-image/";
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['images']['name'][$key];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (in_array($fileExt, $allowedExts)) {
                    $newFileName = date("YMdHisu") . "_$key." . $fileExt;

                    if (is_writable($uploadDir) && move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
                        $insertImageQuery = "
                            INSERT INTO images (postID, imageURL)
                            VALUES ('$postID', '$newFileName')
                        ";
                        if (!$conn->query($insertImageQuery)) {
                            die("Error inserting image: " . $conn->error);
                        }
                    } else {
                        die("Error moving the file or directory is not writable.");
                    }
                } else {
                    die("Invalid file type for file: $fileName");
                }
            }
        }
    }

    // Redirect after success
    header("Location: ../../gallery.php");
    exit();
}

// Fetch and display gallery posts without recipe title
$query = "
    SELECT galleryposts.caption, images.imageURL
    FROM galleryposts
    LEFT JOIN images ON galleryposts.postID = images.postID
";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Caption: " . htmlspecialchars($row['caption'], ENT_QUOTES, 'UTF-8') . "<br>";

        if ($row['imageURL']) {
            echo "<img src='../../shared/assets/image/content-image/" . htmlspecialchars($row['imageURL'], ENT_QUOTES, 'UTF-8') . "' alt='Recipe Image' style='max-width: 100%; height: auto;'><br>";
        }

        echo "<hr>";
    }
} else {
    echo "No posts found.<br>";
}
?>
