<?php
include("connect.php");
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
           foodSubcategories.subcategoryName
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
  <link rel="stylesheet" href="shared/assets/css/recipeOverview.css" />
  <link rel="stylesheet" href="shared/assets/css/style.css" />
</head>

<body>
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
          <img src="shared/assets/image/content-image/<?php echo $recipeOverview['imageURL']; ?>"
            class="img-thumbnail recipe-image" alt="Recipe Image" />
          <div class="col name-edit">
            <h6 class="name">
              <?php echo htmlspecialchars($recipeOverview['firstName'] . ' ' . $recipeOverview['lastName']); ?>
            </h6>
          </div>
          <div class="row buttons">
            <div class="button-col-6">
              <button class="btn-like"><i class="bi bi-hand-thumbs-up-fill"
                  style="color: var(--clr-light-orange)"></i></button>
              <button class="btn-bookmark"><i class="bi bi-bookmark-fill"
                  style="color: var(--clr-light-orange)"></i></button>
              <button class="btn-report" data-recipe-id="<?php echo htmlspecialchars($recipeOverview['recipeID']); ?>">
                <i class="bi bi-flag-fill" style="color: var(--clr-light-orange)"></i>
              </button>
            </div>
          </div>
          <div class="col recipe-table">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Description</th>
                  <th scope="col">Ingredients</th>
                  <th scope="col">Steps</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo htmlspecialchars($recipeOverview['description']); ?></td>
                  <td><?php echo htmlspecialchars($recipeOverview['ingredients']); ?></td>
                  <td><?php echo htmlspecialchars($recipeOverview['steps']); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php
      }
    } else {
      ?>
      <p>No recipes found.</p>
      <?php
    }
    ?>

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
                <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam" required>
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
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="submitReport">Submit Report</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const reportButtons = document.querySelectorAll('.btn-report');

      reportButtons.forEach(button => {
        button.addEventListener('click', function () {
          const recipeId = this.getAttribute('data-recipe-id');
          const reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
          reportModal.show();
          document.getElementById('submitReport').addEventListener('click', function () {
            const reason = document.querySelector('input[name="reportReason"]:checked');
            if (reason) {
              alert(`Recipe #${recipeId} reported for: ${reason.value}`);
              reportModal.hide();
            } else {
              alert('Please select a reason.');
            }
          });
        });
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>