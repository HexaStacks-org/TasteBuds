<?php
include("connect.php");

$queryRecipe = "
SELECT recipes.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.*, 
           foodSubcategories.*
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    LEFT JOIN images ON images.recipeID = recipes.recipeID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
";
$resultRecipe = executeQuery($queryRecipe);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Recipes</title>
  <link rel="stylesheet" href="shared/assets/css/foodListingsRecipe.css" />
  <link rel="stylesheet" href="shared/assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="recipe-title d-flex justify-content-between align-items-center">
          <h2 class="explore-recipe">Explore More Recipes</h2>
          <div class="dropdown">
            <button class="btn recipe-sortby dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Sort by
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Latest</a></li>
              <li><a class="dropdown-item" href="#">Most Liked</a></li>
              <li><a class="dropdown-item" href="#">Most Bookmarked</a></li>
              <li><a class="dropdown-item" href="#">Recipe Name</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Loop through each recipe fetched from the database -->
      <?php while ($recipeRow = mysqli_fetch_assoc($resultRecipe)) { ?>
        <div class="col-md-6 pt-5 pb-4">
          <a href="recipeOverview.php?recipeID=<?php echo $recipeRow['recipeID']; ?>" class="card-link no-underline">
            <div class="card recipe-card"
              style="padding: 20px 10px; height: 100%; overflow: hidden;">
              <!-- Dynamic Recipe Image -->
              <img src="shared/assets/image/content-image/<?php echo $recipeRow['imageURL']; ?>" class="recipe-card-img-top" alt="Recipe Image">
              <div class="card-body">
                <!-- Dynamic Category -->
                <h5 class="card-title category-title"><?php echo $recipeRow['primaryCategoryName']; ?></h5>
                <!-- Dynamic Recipe Title -->
                <h3 class="card-title dish-title"><?php echo $recipeRow['recipeTitle']; ?></h3>
                <!-- Dynamic Description -->
                <p class="card-text recipe-description" style="margin-top: 20px;">
                  <?php echo substr($recipeRow['description'], 0, 150); ?>... <!-- Truncated description -->
                </p>
                <div class="container">
                  <div class="button-col-6">
                    <button class="custom-like-btn"><i class="bi bi-hand-thumbs-up-fill"
                        style="color: var(--clr-light-orange)"></i></button>
                    <button class="custom-bookmark-btn"><i class="bi bi-bookmark-fill"
                        style="color: var(--clr-light-orange)"></i></button>
                    <button class="custom-report-btn"><i class="bi bi-flag-fill"
                        style="color: var(--clr-light-orange)"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- <div class="container">
    <div class="row">
      <div class="col">
        <button class="custom-viewall-btn">VIEW ALL RECIPES</button>
      </div>
    </div>
  </div> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>