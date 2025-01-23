<?php
include("../connect.php");
include("classes.php");

// Initialize gallery posts array
$galleryPosts = [];

// Pagination variables
$postsPerPage = 5;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Default to page 1
$startIndex = ($page - 1) * $postsPerPage;

// Query to fetch total number of posts
$queryTotalPosts = "SELECT COUNT(DISTINCT galleryposts.postID) as total FROM galleryposts";
$resultTotalPosts = executeQuery($queryTotalPosts);
$totalPosts = mysqli_fetch_assoc($resultTotalPosts)['total'];

// Calculate total pages
$totalPages = ceil($totalPosts / $postsPerPage);

// Query to fetch paginated gallery posts
$queryGallery = "
    SELECT 
        galleryposts.*,
        users.firstName,
        users.lastName,
        primaryfoodcategories.primaryCategoryName,
        foodSubcategories.subcategoryName,
        GROUP_CONCAT(images.imageURL ORDER BY images.imageID) AS imageURLs,  -- Concatenate image URLs ordered by imageID
        GROUP_CONCAT(images.imageID ORDER BY images.imageID) AS imageIDs,  -- Concatenate image IDs ordered by imageID
        (SELECT COUNT(*) FROM likes WHERE postID = galleryposts.postID) AS likeCount,
        (SELECT COUNT(*) FROM bookmarks WHERE postID = galleryposts.postID) AS bookmarkCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
    WHERE galleryposts.isApproved = 'yes'
    GROUP BY galleryposts.postID
    ORDER BY galleryposts.postID
    LIMIT $startIndex, $postsPerPage";

$resultGallery = executeQuery($queryGallery);

// Process the fetched data into gallery posts
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
            'images' => explode(',', $rowGalleryData['imageURLs']),  // Convert the concatenated image URLs into an array
            'imageIDs' => explode(',', $rowGalleryData['imageIDs']), // Convert the concatenated image IDs into an array
            'likeCount' => $rowGalleryData['likeCount'],
            'bookmarkCount' => $rowGalleryData['bookmarkCount'],
        ];
    }
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
    <?php include ("../shared/components/fontEmbed.php"); ?>
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
            // Display paginated gallery posts
            foreach ($galleryPosts as $post) {
                echo $post->buildGalleryCard();
            }
            ?>
        </div>

        <?php include('../shared/components/reportModal.php'); ?>

        <div class="row card-row">
            <div class="d-flex my-5 align-items-center justify-content-between">
                <!-- Back Button -->
                <?php
                if ($page > 1) {
                    echo '<button class="btn back-btn btn-secondary" id="back-btn" 
                onclick="window.location.href=\'gallery.php?page=' . ($page - 1) . '\'">
                Back
            </button>';
                } else {
                    // Placeholder for Back Button to maintain alignment
                    echo '<div style="width: 100px;"></div>';
                }
                ?>

                <!-- Continue Button -->
                <button class="btn next-btn btn-primary" id="continue-btn" <?= $page >= $totalPages ? 'disabled' : ''; ?>
                    onclick="window.location.href='gallery.php?page=<?= $page + 1; ?>'">
                    Continue
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>