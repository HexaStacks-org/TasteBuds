<?php include("../shared/processes/session.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../shared/assets/css/style.css" />
    <link rel="stylesheet" href="../shared/assets/css/createRecipe.css" />
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
                                    class="logo d-inline-block align-text-top" />
                            </div>
                            <div class="con-back col d-flex align-items-center">
                                <a href="index.php" id="back-btn" class="btn back-btn">BACK</a>
                            </div>
                        </div>
                        <h1 class="px-5">Create a Post</h1>
                        <p class="recipe-description px-5">Share your new favorite and must-try recipe!</p>
                        <form action="../shared/processes/createPostQuery.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mx-5">
                                <label for="description" class="form-label">Caption</label>
                                <textarea class="form-control py-3" id="caption" name="caption" rows="4"
                                    placeholder="Enter description of the recipe" required></textarea>
                            </div>

                            <div class="mb-3 mx-5">
                                <label for="image" class="form-label">Upload Images</label>
                                <input type="file" class="form-control" id="image" name="images[]" accept="image/*"
                                    multiple required>
                            </div>

                            <div class="categories mx-5 align-items-center">
                                <p class="form-category">Primary Category</p>
                                <div class="form-check-container mx-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                            id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">Breakfast</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                            id="flexRadiDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">Lunch</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                            id="flexRadioDefault3" value="3">
                                        <label class="form-check-label" for="flexRadioDefault3">Dinner</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                            id="flexRadioDefault4" value="4">
                                        <label class="form-check-label" for="flexRadioDefault4">Snacks</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                            id="flexRadioDefault5" value="5">
                                        <label class="form-check-label" for="flexRadioDefault5">Dessert</label>
                                    </div>
                                </div>

                                <p class="form-category mt-3">Sub Category</p>
                                <div class="form-check-container mx-5" id="subcategory-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault6" value="1">
                                        <label class="form-check-label" for="flexRadioDefault6">Vegan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault7" value="2">
                                        <label class="form-check-label" for="flexRadioDefault7">Pork</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault8" value="3">
                                        <label class="form-check-label" for="flexRadioDefault8">Chicken</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault9" value="4">
                                        <label class="form-check-label" for="flexRadioDefault9">Beef</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault10" value="5">
                                        <label class="form-check-label" for="flexRadioDefault10">Seafood</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault11" value="6">
                                        <label class="form-check-label" for="flexRadioDefault11">Others</label>
                                    </div>
                                </div>
                            </div>


                            <div class="mx-5 my-5 btn-submit d-flex justify-content-center">
                                <button type="submit" name="postSubmit" class="btn btn-create"
                                    style="margin-left: -100px;">CREATE POST</button>
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
    <script></script>
</body>

</html>