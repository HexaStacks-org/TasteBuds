<?php
include("../shared/processes/recipeResultQuery.php")
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
    include("../shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="../shared/assets/css/style.css" />
    <link rel="stylesheet" href="../shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="../shared/assets/css/searchResults.css" />
</head>

<body>
    <?php include '../shared/components/navbar.php'; ?>

    <div class="container-fluid content-bg mt-5">
        <h2 class="col result mt-5 mx-5">Search Results | Recipe</h2>

        <div class="row">
            <?php
            if (mysqli_num_rows($resultRecipes) > 0) {
                while ($recipesRow = mysqli_fetch_assoc($resultRecipes)) {
                    ?>
                    <div class="col-md-6 mt-5 mb-4">
                        <a href="recipeOverview.php?recipeID=<?php echo $recipesRow['recipeID']; ?>"
                            style="text-decoration: none; color: inherit;">
                            <div class="card mx-5">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="../shared/assets/image/content-image/<?php echo $recipesRow['imageURL'] ?>"
                                            class="img-fluid recipe-img" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-primary-category align-items-center justify-content-center">
                                                <?php echo $recipesRow['primaryCategoryName']; ?>
                                            </p>
                                            <p class="card-sub-category align-items-center justify-content-center">
                                                <?php echo $recipesRow['subcategoryName']; ?>
                                            </p>
                                            <h5 class="card-title pt-1"><?php echo $recipesRow['recipeTitle']; ?></h5>
                                            <p class="card-text">
                                                <?php echo substr($recipesRow['description'], 0, 150) . '...'; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center" style="color:red; font-weight: 900;">No Recipes Found</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>