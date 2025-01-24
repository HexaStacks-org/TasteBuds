<?php
include("../connect.php");

date_default_timezone_set('Asia/Manila');

// Get the recipeID from the query string
$recipeID = isset($_GET['recipeID']) ? (int) $_GET['recipeID'] : 0;

// Query to fetch the recipe details for the given recipeID
$queryOverviewRecipe = "
    SELECT recipes.recipeID, recipes.recipeTitle, recipes.description, recipes.ingredients, recipes.steps,
           recipes.isApproved, recipes.createdAt, recipes.updatedAt,
           users.firstName, users.lastName,
           images.imageURL,
           primaryfoodcategories.primaryCategoryName,
           foodSubcategories.subcategoryName, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
          (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount
    FROM recipes
    LEFT JOIN users ON users.userID = recipes.userID
    LEFT JOIN images ON images.recipeID = recipes.recipeID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID
    WHERE recipes.recipeID = $recipeID
";

$resultOverviewRecipe = executeQuery($queryOverviewRecipe);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Recipe View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../shared/assets/css/recipeOverview.css" />
  <link rel="stylesheet" href="../shared/assets/css/style.css" />
  <link rel="icon" type="image" href="../shared/assets/image/TasteBuds_Icon.png">
</head>

<body>

  <?php include("../shared/components/navbar.php") ?>
  <div class="container-recipe">
    <?php
    if (mysqli_num_rows($resultOverviewRecipe) > 0) {
      while ($recipeOverview = mysqli_fetch_assoc($resultOverviewRecipe)) {
        ?>
        <div class="col">
          <h2 class="recipe-title-view"><?php echo htmlspecialchars($recipeOverview['recipeTitle']); ?></h2>
          <span
            class="primary-category rounded-pill"><?php echo htmlspecialchars($recipeOverview['primaryCategoryName']); ?></span>
          <span class="sub-category rounded-pill"><?php echo htmlspecialchars($recipeOverview['subcategoryName']); ?></span>
          <img src="../shared/assets/image/content-image/<?php echo $recipeOverview['imageURL']; ?>"
            class="img-thumbnail recipe-image" alt="Recipe Image" />
          <div class="col name-edit">
            <h6 class="name">
              <?php echo htmlspecialchars($recipeOverview['firstName'] . ' ' . $recipeOverview['lastName']); ?>
            </h6>
          </div>
          <div class="row buttons">
            <div class="button-col-6">
              <!-- Like Button -->
              <form action="recipeButtonHandler.php" method="POST" style="display: inline;">
                <input type="hidden" name="recipeID" value="<?php echo $recipeOverview['recipeID']; ?>">
                <input type="hidden" name="action" value="like">
                <button type="submit" class="btn-like">
                  <i class="bi bi-hand-thumbs-up-fill" style="color: var(--clr-light-orange)"></i>
                </button>
              </form>

              <!-- Bookmark Button -->
              <form action="recipeButtonsHandler.php" method="POST" style="display: inline;">
                <input type="hidden" name="recipeID" value="<?php echo $recipeOverview['recipeID']; ?>">
                <input type="hidden" name="action" value="bookmark">
                <button type="submit" class="btn-bookmark">
                  <i class="bi bi-bookmark-fill" style="color: var(--clr-light-orange)"></i>
                </button>
              </form>
            </div>
          </div>



          <div class="count col mt-3 mb-2 mx-0">
            <span>Likes Count: <?php echo htmlspecialchars($recipeOverview['likesCount']); ?></span>
            <span>Bookmarks Count: <?php echo htmlspecialchars($recipeOverview['bookmarksCount']); ?></span>
          </div>

          <div class="tab-container">
            <div class="tab-links">
              <button class="tablink" onclick="openTab(event, 'Description')">Description</button>
              <button class="tablink" onclick="openTab(event, 'Ingredients')">Ingredients</button>
              <button class="tablink" onclick="openTab(event, 'Steps')">Steps</button>
            </div>

            <div id="Description" class="tab-content">
              <p><?php echo htmlspecialchars($recipeOverview['description']); ?></p>
            </div>

            <div id="Ingredients" class="tab-content" style="display: none;">
              <p><?php echo htmlspecialchars($recipeOverview['ingredients']); ?></p>
            </div>

            <div id="Steps" class="tab-content" style="display: none;">
              <p><?php echo htmlspecialchars($recipeOverview['steps']); ?></p>
            </div>
          </div>

        </div>
      </div>
      <?php
      }
    } else {
      ?>

    <body style="margin: 0; background-color:rgb(254, 212, 145);"> <!-- Light Orange Background -->
      <div class="container-fluid" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
        <img src="../shared/assets/image/no-results-found.png" class="img-fluid"
          style="max-width: 80%; max-height: 80%; object-fit: contain;">
      </div>
    </body>
    <?php
    }
    ?>


  </div>
  <?php include("../shared/components/reportModal.php"); ?>


  </div>

  <script src="../shared/assets/js/recipeOverview.js"></script>

  <?php include '../shared/components/footer.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>