<?php
include("connect.php");

// Initial query setup
$queryRecipes = "SELECT recipes.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.primaryCategoryName,
           foodSubcategories.subcategoryName, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
           (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    LEFT JOIN images ON images.recipeID = recipes.recipeID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID";

// Filters
$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';

if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
  $queryRecipes .= " WHERE";

  if ($primaryCategoryFilter != '') {
    $queryRecipes .= " primaryfoodcategories.primaryCategoryName='$primaryCategoryFilter'";
  }

  if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
    $queryRecipes .= " AND";
  }

  if ($subcategoryFilter != '') {
    $queryRecipes .= " foodSubcategories.subcategoryName='$subcategoryFilter'";
  }
}

$resultRecipes = mysqli_query($conn, $queryRecipes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Food Listings</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="shared/assets/css/foodListingsRecipe.css" />
  <link rel="stylesheet" href="shared/assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>

  <!-- Title Section -->
  <div class="text-center mt-4">
    <h1 class="title">FOOD LISTINGS OF RECIPES</h1>
    <h6 class="description">
      Explore delicious recipes for breakfast, dinner, snacks, and more perfect for any occasion!
    </h6>
  </div>

  <!-- Category Buttons -->
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-12 d-flex flex-wrap justify-content-center align-items-center">
        <div class="explore mb-2">EXPLORE</div>
        <div id="first-set" class="button-group">
          <button class="custom-btn" onclick="filterRecipes('Breakfast')">Breakfast</button>
          <button class="custom-btn" onclick="filterRecipes('Lunch')">Lunch</button>
          <button class="custom-btn" onclick="filterRecipes('Dinner')">Dinner</button>
          <button class="custom-btn" onclick="filterRecipes('Snacks')">Snacks</button>
          <button class="custom-btn" onclick="filterRecipes('Dessert')">Dessert</button>
        </div>
        <div id="second-set" class="button-group mt-3" style="display: none;">
          <button class="custom-btn" onclick="filterSubcategory('Vegan')">Vegan</button>
          <button class="custom-btn" onclick="filterSubcategory('Pork')">Pork</button>
          <button class="custom-btn" onclick="filterSubcategory('Chicken')">Chicken</button>
          <button class="custom-btn" onclick="filterSubcategory('Beef')">Beef</button>
          <button class="custom-btn" onclick="filterSubcategory('Seafood')">Seafood</button>
          <button class="custom-btn" onclick="filterSubcategory('Others')">Others</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Recipe Display -->
  <div class="container-fluid mt-5 content-bg">
    <div class="row">
      <?php if (mysqli_num_rows($resultRecipes) > 0) {
        while ($userRow = mysqli_fetch_assoc($resultRecipes)) { ?>
          <div class="col-md-6 pt-5">
            <div class="card">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="shared/assets/image/test-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <span class="category"><?php echo $userRow["primaryCategoryName"]; ?></span>
                    <h5 class="card-title"><?php echo $userRow["recipeTitle"]; ?></h5>
                    <p class="card-text"><?php echo $userRow["description"]; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }
      } else { ?>
        <p class="text-center">No recipes found.</p>
      <?php } ?>
    </div>
  </div>

  <script>
    // Handle Primary Category Click
    function filterRecipes(primaryCategory) {
      const url = new URL(window.location.href);
      url.searchParams.set('primaryCategoryName', primaryCategory);
      url.searchParams.delete('subcategoryName'); // Clear subcategory filter
      document.getElementById('first-set').style.display = 'none'; // Hide primary buttons
      document.getElementById('second-set').style.display = 'block'; // Show subcategory buttons
      window.location.href = url.toString(); // Reload the page with the new filter
    }

    // Handle Subcategory Click
    function filterSubcategory(subcategory) {
      const url = new URL(window.location.href);
      const primaryCategory = url.searchParams.get('primaryCategoryName');
      if (primaryCategory) {
        url.searchParams.set('subcategoryName', subcategory);
        window.location.href = url.toString(); // Reload the page with the new filter
      } else {
        alert('Please select a primary category first.');
      }
    }

    // Automatically Manage Button Visibility on Page Load
    window.onload = function() {
      const url = new URL(window.location.href);
      const primaryCategory = url.searchParams.get('primaryCategoryName');
      const subcategory = url.searchParams.get('subcategoryName');

      if (primaryCategory) {
        document.getElementById('first-set').style.display = 'none'; // Hide primary buttons
        document.getElementById('second-set').style.display = 'block'; // Show subcategory buttons
      } else {
        document.getElementById('first-set').style.display = 'block'; // Show primary buttons
        document.getElementById('second-set').style.display = 'none'; // Hide subcategory buttons
      }
    };
  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>