<?php
include("../shared/processes/session.php");
include("classes.php");
include('../shared/components/reportModal.php');


// Initialize gallery posts array
$galleryPosts = [];

// Check if an 'postID' is passed via URL
if (isset($_GET['postID'])) {
    $postID = $_GET['postID'];
    // Query to fetch specific gallery post based on the passed postID
    $queryGallery = "
        SELECT 
            galleryposts.*,
            users.firstName,
            users.lastName,
            primaryfoodcategories.primaryCategoryName,
            foodSubcategories.subcategoryName,
            GROUP_CONCAT(images.imageURL ORDER BY images.imageID) AS imageURLs,
            GROUP_CONCAT(images.imageID ORDER BY images.imageID) AS imageIDs,
            (SELECT COUNT(*) FROM likes WHERE postID = galleryposts.postID) AS likeCount,
            (SELECT COUNT(*) FROM bookmarks WHERE postID = galleryposts.postID) AS bookmarkCount
        FROM galleryposts
        LEFT JOIN users ON users.userID = galleryposts.userID
        LEFT JOIN images ON images.postID = galleryposts.postID
        LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
        LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
        WHERE galleryposts.isApproved = 'yes' AND galleryposts.postID = $postID
        GROUP BY galleryposts.postID
        LIMIT 1";  // Only fetch a single post

    $resultGallery = executeQuery($queryGallery);

    // Process the fetched data into a single post
    if ($rowGalleryData = mysqli_fetch_assoc($resultGallery)) {
        $postsData[$rowGalleryData['postID']] = [
            'postID' => $rowGalleryData['postID'],
            'caption' => $rowGalleryData['caption'],
            'firstName' => $rowGalleryData['firstName'],
            'lastName' => $rowGalleryData['lastName'],
            'isApproved' => $rowGalleryData['isApproved'],
            'createdAt' => $rowGalleryData['createdAt'],
            'updatedAt' => $rowGalleryData['updatedAt'],
            'primaryCategoryName' => $rowGalleryData['primaryCategoryName'],
            'subcategoryName' => $rowGalleryData['subcategoryName'],
            'images' => explode(',', $rowGalleryData['imageURLs']),
            'imageIDs' => explode(',', $rowGalleryData['imageIDs']),
            'likeCount' => $rowGalleryData['likeCount'],
            'bookmarkCount' => $rowGalleryData['bookmarkCount'],
        ];

        // Create a single GalleryPost object
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
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Post Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php include("../shared/components/fontEmbed.php"); ?>
    <link rel="stylesheet" href="../shared/assets/css/style.css" />
    <link rel="stylesheet" href="../shared/assets/css/gallery.css" />
    <link rel="stylesheet" href="../shared/assets/css/navbar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image" href="../shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <?php include '../shared/components/navbar.php'; ?>
    <div class="container align-items-center justify-content-center">
        <div class="row card-row" id="card-container">
            <?php
            // Display the single gallery post
            if (!empty($galleryPosts)) {
                // Only one post, so just display it
                echo $galleryPosts[0]->buildGalleryOverviewCard();  // Assuming the GalleryPost class has a method `buildGalleryCard()`
            } else {
                // No gallery posts found, display a message
                echo '
                <body style="margin: 0; background-color:rgb(254, 212, 145);"> <!-- Light Orange Background -->
                    <div class="container-fluid" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
                        <img src="../shared/assets/image/no-results-found.png" class="img-fluid"
                            style="max-width: 80%; max-height: 80%; object-fit: contain;">
                    </div>
                </body>';
            }
            ?>
        </div>
    </div>

    <script>
    // Toggle textarea visibility for 'Others' option
    const radioButtons = document.querySelectorAll('input[name="reportReason"]');
    const othersTextArea = document.getElementById('othersTextArea');
    radioButtons.forEach(button => {
      button.addEventListener('change', function () {
        othersTextArea.style.display = this.value === '6' ? 'block' : 'none';
      });
    });
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>