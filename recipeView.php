<?php
include("connect.php");
date_default_timezone_set('Asia/Manila');

$sortRecipeOption = isset($_GET['sort']) ? $_GET['sort'] : 'createdAt';
$sortRecipeText = 'Latest'; // Default sort option text

if ($sortRecipeOption == 'likesCount') {
  $sortRecipeText = 'Most Liked';
}
if ($sortRecipeOption == 'bookmarksCount') {
  $sortRecipeText = 'Most Bookmarked';
}
if ($sortRecipeOption == 'recipeTitle') {
  $sortRecipeText = 'Recipe Name';
}

$queryRecipes = "
    SELECT recipes.*, 
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
    ORDER BY $sortRecipeOption DESC
    ";

$resultRecipes = executeQuery($queryRecipes);
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
              Sort by: <?php echo $sortRecipeText; ?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?sort=createdAt" onclick="updateSortText('Latest')">Latest</a></li>
              <li><a class="dropdown-item" href="?sort=likesCount" onclick="updateSortText('Most Liked')">Most Liked</a>
              </li>
              <li><a class="dropdown-item" href="?sort=bookmarksCount" onclick="updateSortText('Most Bookmarked')">Most
                  Bookmarked</a></li>
              <li><a class="dropdown-item" href="?sort=recipeTitle" onclick="updateSortText('Recipe Name')">Recipe
                  Name</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Card -->
      <?php
      if (mysqli_num_rows($resultRecipes) > 0) {
        while ($recipesRow = mysqli_fetch_assoc($resultRecipes)) {
          ?>
          <div class="col-md-6 pt-5 pb-4">
            <div class="card recipe-card" style="padding: 20px 10px; height: 100%; overflow: hidden;">
              <img src="shared/assets/image/content-image/<?php echo $recipesRow['imageURL']; ?>"
                class="recipe-card-img-top" alt="Recipe Image" style="max-height: 400px; object-fit: cover; width: 100%;" />
              <div class="card-body">
                <a href="recipeOverview.php?recipeID=<?php echo $recipesRow['recipeID']; ?>" class="card-body no-underline">
                  <h5 class="card-title category-title"><?php echo $recipesRow['primaryCategoryName']; ?></h5>
                  <h3 class="card-title dish-title"><?php echo $recipesRow['recipeTitle']; ?></h3>
                  <p class="card-text recipe-description" style="margin-top: 10px;">
                    <?php echo strlen($recipesRow['description']) > 150
                      ? substr($recipesRow['description'], 0, 150) . '...'
                      : $recipesRow['description']; ?>
                  </p>
                </a>
                <div class="container">
                  <div class="button-col-6">
                    <button class="custom-like-btn"><i class="bi bi-hand-thumbs-up-fill"
                        style="color: var(--clr-light-orange)"></i></button>
                    <button class="custom-bookmark-btn"><i class="bi bi-bookmark-fill"
                        style="color: var(--clr-light-orange)"></i></button>
                    <button class="custom-report-btn" data-bs-toggle="modal" data-bs-target="#reportModal">
                      <i class="bi bi-flag-fill" style="color: var(--clr-light-orange)"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        echo "<p class='text-center'>No recipes available.</p>";
      }
      ?>
    </div>
  </div>

  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="reportForm">
            <p class="mb-3">Please select the reason for reporting this content:</p>

            <!-- Radio Options -->
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam" required>
              <label class="form-check-label" for="spam">Spam</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo" value="Wrong Information">
              <label class="form-check-label" for="wrongInfo">Wrong Information</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                value="Inappropriate Content">
              <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                value="Copyright Infringement">
              <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="reportReason" id="harassment"
                value="Harassment or Abuse">
              <label class="form-check-label" for="harassment">Harassment or Abuse</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="reportReason" id="others" value="Others">
              <label class="form-check-label" for="others">Others</label>
            </div>

            <!-- Textarea for 'Others' option -->
            <div class="form-group" id="othersTextArea" style="display: none;">
              <label for="otherReasonDetails" class="form-label">Please specify:</label>
              <textarea class="form-control" id="otherReasonDetails" rows="3" placeholder="Enter details..."></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="submitReport">Submit Report</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript to toggle the textarea visibility -->
  <script>
    const radioButtons = document.querySelectorAll('input[name="reportReason"]');
    const othersTextArea = document.getElementById('othersTextArea');

    radioButtons.forEach(button => {
      button.addEventListener('change', function () {
        if (this.value === 'Others' && this.checked) {
          othersTextArea.style.display = 'block';
        } else {
          othersTextArea.style.display = 'none';
        }
      });
    });
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>