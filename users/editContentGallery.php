<?php
include("../connect.php");
include("classes.php");

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit;
}

// Get the current user ID
$userID = $_SESSION['userID'];

// Get the postID from the URL
if (!isset($_GET['postID']) || empty($_GET['postID'])) {
    echo "<div class='alert alert-danger'>No post ID specified.</div>";
    exit;
}
$postID = intval($_GET['postID']);

// Fetch post details
$queryGalleryContent = "SELECT galleryposts.caption, galleryposts.userID, images.imageURL 
          FROM galleryposts 
          LEFT JOIN images ON images.postID = galleryposts.postID 
          WHERE galleryposts.postID = $postID";
$resultGalleryContent = executeQuery($queryGalleryContent);

if (mysqli_num_rows($resultGalleryContent) == 0) {
    echo "<div class='alert alert-danger'>Post not found.</div>";
    exit;
}

// Group images and captions
$images = [];
$galleryRowContent = null;
while ($row = mysqli_fetch_assoc($resultGalleryContent)) {
    if (!$galleryRowContent) {
        $galleryRowContent = $row;
    }
    if (!empty($row['imageURL'])) {
        $images[] = $row;
    }
}

// Check if the logged-in user owns the post
if ($galleryRowContent['userID'] != $userID) {
    echo "<div class='alert alert-danger'>You are not authorized to edit this post.</div>";
    exit;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated caption
    $caption = mysqli_real_escape_string($conn, $_POST['caption']);

    // Validate the caption
    if (empty($caption)) {
        echo "<div class='alert alert-danger'>Caption cannot be empty.</div>";
    } else {
        // Update the caption in the database
        $currentTimestamp = date('Y-m-d H:i:s');
        $updateQuery = "UPDATE galleryposts 
                        SET caption = '$caption', updatedAt = '$currentTimestamp' 
                        WHERE postID = $postID AND userID = $userID";
        executeQuery($updateQuery);

        // Redirect to the post details page after successful update
        header("Location: galleryOverview.php?postID=$postID");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../shared/assets/css/style.css">
    <link rel="stylesheet" href="../shared/assets/css/createRecipe.css">
    <link rel="icon" type="image" href="../shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <div>
        <div class="container-fluid px-0">
            <div class="row g-0 align-items-start">
                <div class="col-md-6 col-12">
                    <div class="recipe-form mx-3 my-3 px-5">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <img src="../shared/assets/image/Logo Combination 1.png"
                                    class="logo d-inline-block align-text-top">
                            </div>
                            <div class="con-back col d-flex align-items-center">
                                <a href="index.php" id="back-btn" class="btn back-btn">BACK</a>
                            </div>
                        </div>
                        <h1 class="px-5">Edit a Post</h1>
                        <p class="recipe-description px-5">Update your gallery post details below.</p>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mx-5">
                                <label for="caption" class="form-label">Caption</label>
                                <textarea class="form-control py-3" id="caption" name="caption" rows="4"
                                    required><?php echo htmlspecialchars($galleryRowContent['caption']); ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Your Images</label>
                                <div class="d-flex flex-wrap">
                                    <?php
                                    if (!empty($images)) {
                                        foreach ($images as $image) {
                                            ?>
                                            <div class="me-2 mb-2">
                                                <img src="../shared/assets/image/content-image/<?php echo htmlspecialchars($image['imageURL']); ?>"
                                                    alt="Post Image" class="img-thumbnail"
                                                    style="width: 120px; height: 120px; object-fit: cover;">
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <p class="text-muted">No images available for this post.</p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="mx-5 my-5 btn-submit d-flex justify-content-center">
                                <button type="submit" name="postSubmit" class="btn btn-create"
                                    style="margin-left: -100px;">UPDATE POST</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 d-none d-md-block">
                    <div class="mockup-container">
                        <img src="../shared/assets/image/mockup-pic.png" alt="mockup" class="mockup-image">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../shared/assets/js/createPost.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>