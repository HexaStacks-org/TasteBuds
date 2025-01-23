<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <?php
    include("shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="../admin/shared/assets/css/formPost.css" />
</head>

<body>
    <!-- main container -->
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar-->
            <?php
            include("shared/components/sidebar.php");
            ?>

            <div class="col-md-8 col-lg-10 p-0">
                <!-- offcanvas menu -->
                <?php
                include("shared/components/offcanvas.php");
                ?>

                <!-- content -->
                <div class="container-fluid tables-chart">
                    <div class="row">
                        <div class="col-12">
                            <div class="hey-admin-header">
                                Post Content
                            </div>
                            <!-- tables or chart -->
                            <div class="container mb-5" style="position: relative;">
                                <div class="row subheader d-flex justify-content-center">
                                    <div class="card subheader">
                                        Recipe
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="margin-top: -90px;">
                                <form action="../shared/processes/create-recipe.php" method="POST"
                                    enctype="multipart/form-data" class="w-100" style="max-width: 800px;">
                                    <div class="mb-3 mx-5">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter title of the dish" required>
                                    </div>

                                    <div class="mb-3 mx-5">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control py-3" id="description" name="description" rows="4"
                                            placeholder="Enter description of the recipe" required></textarea>
                                    </div>

                                    <div class="mb-3 mx-5">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                            required>
                                    </div>

                                    <div class="categories mx-5 align-items-center">
                                        <p class="form-category">Primary Category</p>
                                        <div class="form-check-container mx-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                                    id="flexRadioDefault1" value="1">
                                                <label class="form-check-label"
                                                    for="flexRadioDefault1">Breakfast</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                                    id="flexRadioDefault2" value="2">
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
                                        <div class="form-check-container mx-5">
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

                                    <div class="mb-3 mx-5">
                                        <label for="ingredients" class="form-label">Ingredients</label>
                                        <textarea class="form-control py-3" id="ingredients" name="ingredients" rows="6"
                                            placeholder="Enter ingredients of the recipe" required></textarea>
                                    </div>

                                    <div class="mb-3 mx-5">
                                        <label for="steps" class="form-label">Steps</label>
                                        <textarea class="form-control py-3" id="steps" name="steps" rows="6"
                                            placeholder="Enter steps of the recipe" required></textarea>
                                    </div>

                                    <div class="mb-3 mx-5">
                                        <div class="d-flex justify-content-center my-5">
                                            <button type="submit" name="btnSubmit" class="btn btn-create">CREATE
                                                POST</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid tables-chart">
                    <div class="row">
                        <div class="col-12">
                            <!-- tables or chart -->
                            <div class="container mb-5">
                                <div class="row subheader d-flex justify-content-center" style="margin-top: 80px;">
                                    <div class="card subheader mb-2">
                                        Gallery
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="margin-top: -90px;">
                                <form action="../shared/processes/create-post.php" method="POST"
                                    enctype="multipart/form-data" class="w-100" style="max-width: 800px;">
                                    <div class="container d-flex justify-content-center">
                                        <div class="col-12 col-md-8 col-lg-6">
                                            <div class="mb-3">
                                                <label for="caption" class="form-label">Caption</label>
                                                <textarea class="form-control py-3" id="caption" name="caption" rows="4"
                                                    placeholder="Enter description of the recipe" required></textarea>
                                            </div>

                                            <div class="mb-3 mx-5">
                                                <label for="image" class="form-label">Upload Images</label>
                                                <input type="file" class="form-control" id="image" name="images[]"
                                                    accept="image/*" multiple required>
                                            </div>

                                            <div class="categories align-items-center">
                                                <p class="form-category">Primary Category</p>
                                                <div class="form-check-container">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioPrimary" id="flexRadioDefault1" value="1">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault1">Breakfast</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioPrimary" id="flexRadioDefault2" value="2">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault2">Lunch</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioPrimary" id="flexRadioDefault3" value="3">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault3">Dinner</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioPrimary" id="flexRadioDefault4" value="4">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault4">Snacks</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioPrimary" id="flexRadioDefault5" value="5">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault5">Dessert</label>
                                                    </div>
                                                </div>

                                                <p class="form-category mt-3">Sub Category</p>
                                                <div class="form-check-container">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault6" value="1">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault6">Vegan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault7" value="2">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault7">Pork</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault8" value="3">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault8">Chicken</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault9" value="4">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault9">Beef</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault10" value="5">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault10">Seafood</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioSecondary" id="flexRadioDefault11" value="6">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault11">Others</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-center my-5">
                                                    <button type="submit" name="postSubmit"
                                                        class="btn btn-create">CREATE
                                                        POST</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="../shared/assets/js/createpost.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </div>
    </div>

    </div>
    <script src="../shared/assets/js/createRecipe.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>