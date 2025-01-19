<!-- FILE UPDATED: 19-01-2025 2:22 PM-->
<!-- FILTER and SORT (GALLERY) -->

<?php
include("shared/components/connect.php");

$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';

// Queries for Gallery Post Details
$queryPosts = "
    SELECT galleryposts.*, 
           users.*, 
           images.*, 
           primaryfoodcategories.*,
           foodSubcategories.*, 
           (SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount,
          (SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
";

// Query for counting the total number of filtered recipes
$queryCount = "
    SELECT COUNT(*) AS totalCount
    FROM galleryposts
    LEFT JOIN users ON users.userID = galleryposts.userID
    LEFT JOIN images ON images.postID = galleryposts.postID
    LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID
    LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID
";

// Queries for Filter and Sort 
if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
  $queryPosts = $queryPosts . " WHERE";
  $queryCount = $queryCount . " WHERE";


  if ($primaryCategoryFilter != '') {
    $queryPosts = $queryPosts . " primaryCategoryName='$primaryCategoryFilter'";
    $queryCount = $queryCount . " primaryCategoryName='$primaryCategoryFilter'";

  }

  if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
    $queryPosts = $queryPosts . " AND";
    $queryCount = $queryCount . " AND";

  }

  if ($subcategoryFilter != '') {
    $queryPosts = $queryPosts . " subcategoryName='$subcategoryFilter'";
    $queryCount = $queryCount . " subcategoryName='$subcategoryFilter'";

  }
}

if ($sort != '') {
  $queryPosts = $queryPosts . " ORDER BY $sort";

  if ($order != '') {
    $queryPosts = $queryPosts . " $order";
  }
}

if (isset($_GET['btnReset'])) {
  header('Location: index.php');
}

$resultPosts = executeQuery($queryPosts);
$countResult = executeQuery($queryCount);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>16-1-25 Gallery Posts Filter and Sort</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">

    <!--Filter Primary Categories and Subcategories-->
    <h2 class="text-center mb-4">GALLERY POSTS - Filter for Primary Categories and Subcategories</h2>

    <div class="row mt-3 mb-5">
      <div class="col">
        <form>
          <div class="card p-4 rounded-5">
            <div class="container text-center">
              <div class="row">

                <!-- FILTER configurations for Primary Cat-->
                <div class="col-md-4 py-3">
                  <div class="h6 optionsTitle">FILTER</div>

                  <div class="row">
                    <div class="col-md-6 d-flex align-items-center py-2">
                      <label for="primaryCategorySelect" style="font-size: 0.8rem;">PRIMARY CATEGORIES</label>
                      <select id="primaryCategorySelect" name="primaryCategoryName" class="form-control mx-2">
                        <option value="">Any</option>
                        <?php
                        if (mysqli_num_rows($primaryCategoryResults) > 0) {
                          while ($primaryCategoryRow = mysqli_fetch_assoc($primaryCategoryResults)) {
                            ?>

                            <option <?php if ($primaryCategoryFilter == $primaryCategoryRow['primaryCategoryName']) {
                              echo "selected";
                            } ?> value="<?php echo $primaryCategoryRow['primaryCategoryName'] ?>">
                              <?php echo $primaryCategoryRow['primaryCategoryName'] ?>
                            </option>

                            <?php
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <!-- FILTER configurations for Subcat-->

                    <div class="col-md-6 d-flex align-items-center py-2">
                      <label for="subcategorySelect" style="font-size: 0.8rem">SUBCATEGORIES</label>
                      <select id="subcategorySelect" name="subcategoryName" class="form-control mx-2">
                        <option value="">Any</option>
                        <?php
                        if (mysqli_num_rows($subcategoryResults) > 0) {
                          while ($subcategoryRow = mysqli_fetch_assoc($subcategoryResults)) {
                            ?>

                            <option <?php if ($subcategoryFilter == $subcategoryRow['subcategoryName']) {
                              echo "selected";
                            } ?> value="<?php echo $subcategoryRow['subcategoryName'] ?>">
                              <?php echo $subcategoryRow['subcategoryName'] ?>
                            </option>

                            <?php
                          }
                        }
                        ?>
                      </select>
                    </div>

                  </div>
                </div>

                <!-- SORT configurations -->
                <div class="col-md-4 py-3">
                  <div class="h6 pb-2 optionsTitle">SORT BY</div>
                  <select id="sort" name="sort" class="form-control mx-auto">
                    <option value="">None</option>
                    <option <?php if ($sort == "createdAt") {
                      echo "selected";
                    } ?> value="createdAt">Creation DateTime
                    </option>

                    <option <?php if ($sort == "likesCount") {
                      echo "selected";
                    } ?> value="likesCount">
                      Likes Count</option>

                    <option <?php if ($sort == "bookmarksCount") {
                      echo "selected";
                    } ?> value="bookmarksCount">
                      Bookmarks Count</option>

                    <option <?php if ($sort == "caption") {
                      echo "selected";
                    } ?> value="caption">
                      Post Caption</option>

                    <option <?php if ($sort == "firstName") {
                      echo "selected";
                    } ?> value="firstName">
                      Creator's First Name</option>

                    <option <?php if ($sort == "lastName") {
                      echo "selected";
                    } ?> value="lastName">
                      Creator's Last Name</option>

                  </select>
                </div>

                <div class="col-md-4 py-3">
                  <div class="h6 pb-2 optionsTitle">ORDER BY</div>
                  <select id="order" name="order" class="form-control mx-auto">
                    <option <?php if ($order == "ASC") {
                      echo "selected";
                    } ?> value="ASC">Ascending</option>
                    <option <?php if ($order == "DESC") {
                      echo "selected";
                    } ?> value="DESC">Descending</option>
                  </select>
                </div>

                <div class="text-center">
                  <button class="badge rounded-pill text-bg-primary mt-3 mx-2"
                    style="width: fit-content">SUBMIT</button>
                  <button class="badge rounded-pill text-bg-danger mt-3 mx-2" style="width: fit-content"
                    name="btnReset">RESET</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--  The total count for results-->
    <div class="row mb-3">
      <div class="col text-center">
        <?php
        if (mysqli_num_rows($countResult) > 0) {
          while ($countResultRow = mysqli_fetch_assoc($countResult)) {
            ?>
            <h4>Total Results: <?php echo $countResultRow['totalCount'] ?></h4>
            <?php
          }
        } ?>
      </div>
    </div>


    <!-- Food Gallery Posts table -->
    <div class="row mt-1 mb-1">
      <div class="col">
        <div class="card p-4 rounded-5">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead style="font-family: 'Montserrat', sans-serif;">
                <tr>
                  <th scope="col">Post ID</th>
                  <th scope="col">Image URL</th>
                  <th scope="col">Caption</th>
                  <th scope="col">(userID) Creator</th>
                  <th scope="col">Is Approved</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Primary Category</th>
                  <th scope="col">Subcategory</th>
                  <th scope="col">Likes Count</th>
                  <th scope="col">Bookmarks Count</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php
                if (mysqli_num_rows($resultPosts) > 0) {
                  while ($postsRow = mysqli_fetch_assoc($resultPosts)) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $postsRow['postID'] ?></th>
                      <td><?php echo $postsRow['imageURL'] ?></td>
                      <td><?php echo $postsRow['caption'] ?></td>
                      <td> <?php echo $postsRow['firstName'] . " " . $postsRow['lastName'] ?></td>
                      <td><?php echo $postsRow['isApproved'] ?></td>
                      <td><?php echo $postsRow['createdAt'] ?></td>

                      <td><?php echo $postsRow['updatedAt'] ? $postsRow['updatedAt'] : 'NULL'; ?></td>

                      <td><?php echo $postsRow['primaryCategoryName'] ?></td>
                      <td><?php echo $postsRow['subcategoryName'] ?></td>
                      <td><?php echo $postsRow['likesCount'] ?></td>
                      <td><?php echo $postsRow['bookmarksCount'] ?></td>
                    </tr>
                    <?php
                  }
                } else { ?>
                  <div class="col">
                    <h3 class="text-center my-5" style="color:red; font-weight: 900;">NO RESULTS FOUND</h3>
                    <tr>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                      <td>-----</td>
                    </tr>
                  </div>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>