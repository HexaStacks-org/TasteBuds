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
    }

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowedExts)) {
            $newFileName = date("YMdHisu") . "." . $fileExt;
            $uploadDir = "../../shared/assets/image/content-image/";

            if (is_writable($uploadDir) && move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFileName)) {
                $insertImageQuery = "
                    INSERT INTO images (postID, imageURL)
                    VALUES (
                        (SELECT postID FROM galleryposts 
                         WHERE primaryCategoryID = '$primaryCategoryID' AND subcategoryID = '$subcategoryID' LIMIT 1), 
                        '$newFileName'
                    )
                ";
                if (!$conn->query($insertImageQuery)) {
                    die("Error inserting image: " . $conn->error);
                }
            } else {
                die("Error moving the file or directory is not writable.");
            }
        } else {
            die("Invalid file type.");
        }
    }

    // Redirect after success
    header("Location: ../../recipeView.php");
    exit();
}

// Fetch and display gallery posts without recipe title
$query = "
    SELECT galleryposts.caption, images.imageURL
    FROM galleryposts
    LEFT JOIN images ON galleryposts.primaryCategoryID = images.postID
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