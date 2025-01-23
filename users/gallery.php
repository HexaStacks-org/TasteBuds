<?php
include("../connect.php");
include("classes.php");


$galleryPosts = [];

$queryGallery = "
    SELECT 
        galleryposts.*,
        users.firstName,
        users.lastName,
        primaryfoodcategories.primaryCategoryName,
        foodSubcategories.subcategoryName,
        images.imageURL,
        (SELECT COUNT(*) FROM likes WHERE postID = galleryposts.postID) AS likeCount,
        (SELECT COUNT(*) FROM bookmarks WHERE postID = galleryposts.postID) AS bookmarkCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
    ORDER BY galleryposts.postID, images.imageID";

$resultGallery = executeQuery($queryGallery);

// Organize data into gallery posts
$postsData = [];
while ($rowGalleryData = mysqli_fetch_assoc($resultGallery)) {
    $postID = $rowGalleryData['postID'];
    if (!isset($postsData[$postID])) {
        $postsData[$postID] = [
            'postID' => $rowGalleryData['postID'],
            'caption' => $rowGalleryData['caption'],
            'firstName' => $rowGalleryData['firstName'],
            'lastName' => $rowGalleryData['lastName'],
            'isApproved' => $rowGalleryData['isApproved'],
            'createdAt' => $rowGalleryData['createdAt'],
            'updatedAt' => $rowGalleryData['updatedAt'],
            'primaryCategoryName' => $rowGalleryData['primaryCategoryName'],
            'subcategoryName' => $rowGalleryData['subcategoryName'],
            'images' => [],
            'likeCount' => $rowGalleryData['likeCount'],
            'bookmarkCount' => $rowGalleryData['bookmarkCount'],
        ];
    }
    $postsData[$postID]['images'][] = $rowGalleryData['imageURL'];
}

// Create GalleryPost objects
foreach ($postsData as $data) {
    $galleryPosts[] = new GalleryPost(
        $data['postID'],
        $data['caption'],
        $data['firstName'],
        $data['lastName'],
        $data['isApproved'],
        $data['createdAt'],
        $data['updatedAt'],
        $data['primaryCategoryName'],
        $data['subcategoryName'],
        $data['images'],
        $data['likeCount'],
        $data['bookmarkCount']
    );
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
    include("../shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="../shared/assets/css/style.css" />
    <link rel="stylesheet" href="../shared/assets/css/gallery.css" />
    <link rel="stylesheet" href="../shared/assets/css/navbar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include '../shared/components/navbar.php'; ?>
    <div class="container align-items-center justify-content-center">
        <div class="row card-row" id="card-container">
            <?php
            // Loop through the galleryPosts array and display each post using the buildGalleryCard method
            foreach ($galleryPosts as $post) {
                echo $post->buildGalleryCard();
            }
            ?>
        </div>
        <?php include('../shared/components/reportModal.php'); ?>

        <div class="row card-row">
            <div class="d-flex my-5 d-flex align-items-center justify-content-between">
                <button class="btn back-btn btn-secondary" id="back-btn" disabled>Back</button>
                <button class="btn next-btn btn-primary" id="continue-btn">Continue</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>