<?php
include("connect.php");
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
    <?php include("shared/components/fontEmbed.php"); ?>
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/gallery.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image" href="shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <?php include 'shared/components/notLoggedInNavbar.php'; ?>
    <div class="container align-items-center justify-content-center">
        <div class="row card-row" id="card-container">
            <?php
            // Display paginated gallery posts
            foreach ($galleryPosts as $post) {
                echo $post->buildGalleryCard();
            }
            ?>
        </div>

        <?php include('shared/components/reportModal.php'); ?>

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

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="loginModalLabel">Log In Required</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="lead text-muted">You need to log in to perform this action.</p>
                    <p>Don't have an account yet? You can easily create one and enjoy more features!</p>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <!-- Go to Login Button -->
                    <a href="login.php" class="btn btn-primary btn-lg px-4 rounded-pill">
                        Login
                    </a>
                    <!-- Close Button -->
                    <button type="button" class="btn btn-secondary btn-lg px-4 rounded-pill" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>