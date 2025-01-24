<?php
include("shared/processes/loggedOut/galleryResultQuery.php")
    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    include("shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="shared/assets/css/searchResults.css" />
    <link rel="icon" type="image" href="shared/assets/image/TasteBuds_Icon.png">
</head>

<body>
    <?php include 'shared/components/notLoggedInNavbar.php'; ?>

    <div class="container-fluid content-bg mt-5">
        <h2 class="col result mt-5 mx-5">Search Results | Gallery</h2>

        <div class="row">
            <?php
            if (mysqli_num_rows($resultPosts) > 0) {
                while ($postsRow = mysqli_fetch_assoc($resultPosts)) {
                    ?>
                    <div class="col-md-6 mt-5 mb-4">
                        <a href="galleryOverview.php?postID=<?php echo $postsRow['postID']; ?>"
                            style="text-decoration: none; color: inherit;">
                            <div class="card mx-5">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="shared/assets/image/content-image/<?php echo $postsRow['imageURL'] ?>"
                                            class="img-fluid recipe-img" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-primary-category">
                                                <?php echo $postsRow['primaryCategoryName']; ?>
                                            </p>
                                            <p class="card-sub-category">
                                                <?php echo $postsRow['subcategoryName']; ?>
                                            </p>
                                            <h5 class="card-title pt-1"><?php echo $postsRow['caption']; ?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <body style="margin: 0; background-color:rgb(254, 212, 145);"> <!-- Light Orange Background -->

                    <div class="container-fluid"
                        style="height: 80vh; display: flex; justify-content: center; align-items: center;">
                        <img src="shared/assets/image/no-results-found.png" class="img-fluid"
                            style="max-width: 80%; max-height: 80%; object-fit: contain;">
                    </div>
                </body>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- <script src="shared/assets/js/galleryResult.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>