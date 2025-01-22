<?php
include("shared/processes/recipe-result.php")
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="shared/assets/css/searchResults.css" />
</head>

<body>
    <?php include 'shared/components/navbar.php'; ?>

    <div class="container-fluid content-bg mt-5">
        <h2 class="col result mt-5 mx-5">Search Results | Recipe</h2>

        <div class="row">
            <?php
            if (mysqli_num_rows($resultRecipes) > 0) {
                while ($recipesRow = mysqli_fetch_assoc($resultRecipes)) {
                    ?>
                    <div class="col-md-6 mt-5 mb-4">
                        <div class="card mx-5">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo $recipesRow['imageURL'] ?>" class="img-fluid recipe-img h-100"
                                        style="object-fit: fill;" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-primary-category d-flex align-items-center justify-content-center">
                                            <?php echo $recipesRow['primaryCategoryName']; ?>
                                        </p>
                                        <p class="card-sub-category d-flex align-items-center justify-content-center">
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