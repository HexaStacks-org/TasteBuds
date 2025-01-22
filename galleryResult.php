<?php
include("shared/processes/gallery-result.php")
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="shared/assets/css/searchResults.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
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
    
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        <p>Please select the reason for reporting this content:</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam"
                                required>
                            <label class="form-check-label" for="spam">Spam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo"
                                value="Wrong Information">
                            <label class="form-check-label" for="wrongInfo">Wrong Information</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                                value="Inappropriate Content">
                            <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                                value="Copyright Infringement">
                            <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="harassmentAbuse"
                                value="Harassment or Abuse">
                            <label class="form-check-label" for="harassmentAbuse">Harassment or Abuse</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="other" value="Other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel-report" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-submit-report" id="submitReport">Submit Report</button>
                </div>
            </div>
        </div>
    </div>

    <script src="shared/assets/js/galleryResult.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>