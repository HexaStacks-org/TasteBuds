<?php
include("shared/processes/galleryResultProcess.php")
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
</head>

<body>
    <?php include 'shared/components/navbar.php'; ?>

    <div class="container-fluid content-bg mt-5">
        <h2 class="col result mt-5 mx-5">Search Results | Gallery</h2>

        <div class="row">
            <?php
            if (mysqli_num_rows($resultPosts) > 0) {
                while ($postsRow = mysqli_fetch_assoc($resultPosts)) {
                    ?>
                    <div class="col-md-6 mt-5 mb-4">
                        <div class="card mx-5">
                            <div class="row g-0">
                                <div class="col-md-4 recipe-img">
                                    <img src="shared/assets/image/test-pic.png" class="img-fluid d-block"
                                        style="object-fit: cover;" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body ps-5">
                                        <p class="card-primary-category d-flex align-items-center justify-content-center">
                                            <?php echo $postsRow['primaryCategoryName']; ?>
                                        </p>
                                        <p class="card-sub-category d-flex align-items-center justify-content-center">
                                            <?php echo $postsRow['subcategoryName']; ?>
                                        </p>
                                        <p class="card-text" style="font-weight: 700">
                                            <?php echo substr($postsRow['caption'], 0, 150) . '...'; ?>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 ps-5 w-100">
                                        <div>
                                            <button class="btn btn-like"><i class="bi bi-hand-thumbs-up-fill"
                                                    style="color: var(--clr-light-orange)"></i></button>
                                            <button class="btn btn-bookmark mx-1"><i class="bi bi-bookmark-fill"
                                                    style="color: var(--clr-light-orange)"></i></button>
                                        </div>
                                        <div class="report-btn d-flex mx-5">
                                            <button class="btn btn-report"><i class="bi bi-flag-fill"
                                                    style="color: var(--clr-light-orange)"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center" style="color:red; font-weight: 900;">No Recipes Found</p>';
            }
            ?>
        </div>
    </div>

    <?php include("shared/components/reportModal.php"); ?>

    <script src="shared/assets/js/galleryResult.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>