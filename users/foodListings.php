<?php
include("../connect.php");

$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';

// Query for Recipe Details
$queryRecipes = "
    SELECT recipes.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.*,
           foodSubcategories.*, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
          (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    LEFT JOIN images ON images.recipeID = recipes.recipeID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
";

$queryFourLatestRecipes = $queryRecipes . "ORDER BY recipes.createdAt DESC LIMIT 4";

// Query for counting the total number of filtered recipes
$queryCount = "
    SELECT COUNT(*) AS totalCount
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    LEFT JOIN images ON images.recipeID = recipes.recipeID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
";

// Queries for Filter  
if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
  $queryRecipes = $queryRecipes . " WHERE";
  $queryCount = $queryCount . " WHERE";


  if ($primaryCategoryFilter != '') {
    $queryRecipes = $queryRecipes . " primaryCategoryName='$primaryCategoryFilter'";
    $queryCount = $queryCount . " primaryCategoryName='$primaryCategoryFilter'";

  }

  if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
    $queryRecipes = $queryRecipes . " AND";
    $queryCount = $queryCount . " AND";

  }

  if ($subcategoryFilter != '') {
    $queryRecipes = $queryRecipes . " subcategoryName='$subcategoryFilter'";
    $queryCount = $queryCount . " subcategoryName='$subcategoryFilter'";

  }
}

$resultFourLatestRecipes = executeQuery($queryFourLatestRecipes);
$resultRecipes = executeQuery($queryRecipes);
$countResult = executeQuery($queryCount);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Food Listings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../shared/assets/css/foodListingsRecipe.css" />
  <link rel="stylesheet" href="../shared/assets/css/style.css">
</head>

<body>
  <?php include("../shared/components/navbar.php") ?>

  <!-- Title Section -->
  <div class="container">
    <div class="row" id="titleContainer">
    </div>
  </div>

  <script>
    var titleAndDescription = [
      {
        category: "Breakfast",
        title: "BREAKFAST RECIPES",
        description: "Start your day with exciting recipes that energize and inspire—think fluffy pancakes, hearty omelets, and vibrant smoothie bowls that bring joy to your mornings."
      },
      {
        category: "Lunch",
        title: "LUNCH RECIPES",
        description: "Discover satisfying and flavorful lunch recipes to fuel your day—whether it's a wholesome salad, savory sandwiches, or delicious pasta dishes, these meals will keep you energized and content."
      },
      {
        category: "Dinner",
        title: "DINNER RECIPES",
        description: "End your day with comforting and flavorful dinner recipes—whether it's a hearty stew, flavorful stir-fry, or a cozy casserole, these dishes are perfect for winding down and enjoying a satisfying evening meal."
      },
      {
        category: "Snack",
        title: "SNACK RECIPES",
        description: "Discover delicious snack recipes that satisfy your cravings—whether you're in the mood for savory bites, sweet treats, or healthy options, these snacks are perfect for any time of day."
      },
      {
        category: "Dessert",
        title: "DESSERT RECIPES",
        description: "Indulge in mouthwatering dessert recipes that satisfy your sweet tooth—whether you're craving rich cakes, creamy puddings, or fresh fruit-based delights, these desserts are the perfect way to end any meal."
      }
    ];

    var titleContainer = document.getElementById('titleContainer');
    var categoryData = null;

    for (var i = 0; i < titleAndDescription.length; i++) {
      if (titleAndDescription[i].category == "<?php echo $primaryCategoryFilter; ?>") {
        categoryData = titleAndDescription[i];
        break; // Stop once the matching category is found in the array ("titleAndDescription")
      }
    }

    if (categoryData) {
      titleContainer.innerHTML = `
        <div class="text-center mt-4">
            <h1 class="title">${categoryData.title}</h1>
            <h6 class="description">
                ${categoryData.description}
            </h6>
        </div>
    `;
    } else {
      titleContainer.innerHTML = `
        <div class="text-center mt-4">
            <h1 class="title">FOOD LISTINGS OF RECIPES</h1>
            <h6 class="description">
                Explore delicious recipes for breakfast, dinner, snacks, and more perfect for any occasion!
            </h6>
        </div>
    `;
    }
  </script>

  <!-- Category Buttons -->
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-12 d-flex flex-wrap justify-content-center align-items-center">
        <div id="first-set" class="button-group">
          <button class="custom-btn" onclick="filterRecipes('Breakfast')">Breakfast</button>
          <button class="custom-btn" onclick="filterRecipes('Lunch')">Lunch</button>
          <button class="custom-btn" onclick="filterRecipes('Dinner')">Dinner</button>
          <button class="custom-btn" onclick="filterRecipes('Snack')">Snack</button>
          <button class="custom-btn" onclick="filterRecipes('Dessert')">Dessert</button>
        </div>

        <?php
        if ($primaryCategoryFilter != "Dessert" && $primaryCategoryFilter != "Snack") { ?>
          <div id="second-set" class="button-group mt-3" style="display: none;">
            <button class="custom-btn" onclick="filterSubcategory('Vegan')">Vegan</button>
            <button class="custom-btn" onclick="filterSubcategory('Pork')">Pork</button>
            <button class="custom-btn" onclick="filterSubcategory('Chicken')">Chicken</button>
            <button class="custom-btn" onclick="filterSubcategory('Beef')">Beef</button>
            <button class="custom-btn" onclick="filterSubcategory('Seafood')">Seafood</button>
            <button class="custom-btn" onclick="filterSubcategory('Others')">Others</button>
          </div>
          <?php
        } ?>
      </div>
    </div>
  </div>

  <!-- THIS DISPLAYS THE 4 LATEST RECIPES -->
  <?php if ($primaryCategoryFilter == '' && $subcategoryFilter == '') { ?>
    <!-- Recipe Display -->
    <div class="container-fluid mt-5 content-bg">
      <div class="row">

        <!--  The total count for results-->
        <div class="row mt-5 mb-5">
          <div class="col text-center" style="color:white;">
            <h4>CHECK OUT THESE LATEST RECIPES</h4>
          </div>
        </div>

        <?php if (mysqli_num_rows($resultFourLatestRecipes) > 0) {
          while ($rowFourLatestRecipes = mysqli_fetch_assoc($resultFourLatestRecipes)) { ?>

            <div class="col-md-6 mb-5">

              <a href="recipeOverview.php?recipeID=<?php echo $rowFourLatestRecipes['recipeID']; ?>"
                style="text-decoration: none; color: inherit;">
                <div class="card">
                  <div class="row" style="height: 300px;">
                    <div class="col-md-5" style="height: 300px;">
                      <img src="../shared/assets/image/content-image/<?php echo $rowFourLatestRecipes['imageURL']; ?>"
                        alt="<?php echo $rowFourLatestRecipes['recipeTitle']; ?>" class="img-fluid"
                        style="height: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body"
                        style="padding: 20px 10px; height: 100%; overflow: hidden; text-overflow: ellipsis;">
                        <div class="col" style=" flex: 0;">
                          <span class="primaryCategory"><?php echo $rowFourLatestRecipes["primaryCategoryName"]; ?></span>
                          <span class="subcategory"><?php echo $rowFourLatestRecipes["subcategoryName"]; ?></span>
                        </div>
                        <h5 class="card-title"><?php echo $rowFourLatestRecipes["recipeTitle"]; ?></h5>
                        <p class="card-text"
                          style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <?php echo $rowFourLatestRecipes["description"]; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>


          <?php }
        } else { ?>
          <div class="container">
            <div class="row">
              <div class="col d-flex justify-content-center" style="width: 100%;">
                <img src="../shared/assets/image/no-results-found.png"
                  style="max-width: 50%; height: auto; margin: 20px 0 40px 0" class="img-fluid">
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <!-- THIS DISPLAYS ALL OTHER RECIPES -->
  <?php if ($primaryCategoryFilter != '' || $subcategoryFilter != '') { ?>
    <!-- Recipe Display -->
    <div class="container-fluid mt-5 content-bg">
      <div class="row">

        <!--  The total count for results-->
        <div class="row mt-5 mb-5">
          <div class="col text-center" style="color:white;">
            <?php
            if (mysqli_num_rows($countResult) > 0) {
              while ($countResultRow = mysqli_fetch_assoc($countResult)) {
                ?>
                <h4>TOTAL RESULTS: <?php echo $countResultRow['totalCount'] ?></h4>
                <?php
              }
            } ?>
          </div>
        </div>

        <?php if (mysqli_num_rows($resultRecipes) > 0) {
          while ($recipesRow = mysqli_fetch_assoc($resultRecipes)) { ?>
            <div class="col-md-6 mb-5">

              <a href="recipeOverview.php?recipeID=<?php echo $recipesRow['recipeID']; ?>"
                style="text-decoration: none; color: inherit;">
                <div class="card">
                  <div class="row" style="height: 300px;">
                    <div class="col-md-5" style="height: 300px;">
                      <img src="../shared/assets/image/content-image/<?php echo $recipesRow['imageURL']; ?>"
                        alt="<?php echo $recipesRow['recipeTitle']; ?>" class="img-fluid"
                        style="height: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body"
                        style="padding: 20px 10px; height: 100%; overflow: hidden; text-overflow: ellipsis;">

                        <div class="col" style=" flex: 0;">
                          <span class="primaryCategory"><?php echo $recipesRow["primaryCategoryName"]; ?></span>
                          <span class="subcategory"><?php echo $recipesRow["subcategoryName"]; ?></span>
                        </div>


                        <h5 class="card-title"><?php echo $recipesRow["recipeTitle"]; ?></h5>
                        <p class="card-text"
                          style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                          <?php echo $recipesRow["description"]; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>


          <?php }
        } else { ?>
          <div class="container">
            <div class="row">
              <div class="col d-flex justify-content-center" style="width: 100%;">
                <img src="../shared/assets/image/no-results-found.png"
                  style="max-width: 50%; height: auto; margin: 20px 0 40px 0" class="img-fluid">
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

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
    window.onload = function () {
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

  <?php include '../shared/components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>