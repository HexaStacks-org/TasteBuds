<?php
include("shared/components/connect.php");

// LIKE & BOOKMARK OF GALLERY
$galleryQuery = "SELECT galleryposts.*, users.*, images.*, primaryfoodcategories.*, foodSubcategories.*, 
(SELECT COUNT(likeID) FROM likes WHERE likes.postID = galleryposts.postID) AS likesCount, 
(SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.postID = galleryposts.postID) AS bookmarksCount FROM galleryposts 
LEFT JOIN users ON users.userID = galleryposts.userID LEFT JOIN images ON images.postID = galleryposts.postID 
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = galleryposts.primaryCategoryID 
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = galleryposts.subcategoryID";

// QUERIES FOR FILTER AND SORT OF GALLERY POST
$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';

if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
    $galleryQuery = $galleryQuery . " WHERE";

    if ($primaryCategoryFilter != '') {
        $galleryQuery = $galleryQuery . " primaryCategoryName='$primaryCategoryFilter'";
    }

    if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
        $galleryQuery = $galleryQuery . " AND";
    }

    if ($subcategoryFilter != '') {
        $galleryQuery = $galleryQuery . " subcategoryName='$subcategoryFilter'";
    }
}

if ($sort != '') {
    $galleryQuery = $galleryQuery . " ORDER BY $sort";

    if ($order != '') {
        $galleryQuery = $galleryQuery . " $order";
    }
}

if (isset($_GET['btnReset'])) {
    header('Location: insightsAnalytics copy.php');
}

$galleryResult = executeQuery($galleryQuery);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);

// LIKE & BOOKMARK OF RECIPE
$recipeQuery = "SELECT recipes.*, users.*, images.*,  primaryfoodcategories.*, foodSubcategories.*, 
(SELECT COUNT(likeID) FROM likes WHERE likes.recipeID = recipes.recipeID) AS likesCount,
(SELECT COUNT(bookmarkID) FROM bookmarks WHERE bookmarks.recipeID = recipes.recipeID) AS bookmarksCount FROM recipes
LEFT JOIN users ON users.userID = recipes.userID
LEFT JOIN images ON images.recipeID = recipes.recipeID
LEFT JOIN primaryfoodcategories ON primaryfoodcategories.primaryCategoryID = recipes.primaryCategoryID
LEFT JOIN foodSubcategories ON foodSubcategories.subcategoryID = recipes.subcategoryID";

// QUERIES FOR FILTER AND SORT OF RECIPE POST
$primaryCategoryFilter = isset($_GET['primaryCategoryName']) ? $_GET['primaryCategoryName'] : '';
$subcategoryFilter = isset($_GET['subcategoryName']) ? $_GET['subcategoryName'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';

if ($primaryCategoryFilter != '' || $subcategoryFilter != '') {
    $recipeQuery = $recipeQuery . " WHERE";

    if ($primaryCategoryFilter != '') {
        $recipeQuery = $recipeQuery . " primaryCategoryName='$primaryCategoryFilter'";
    }

    if ($primaryCategoryFilter != '' && $subcategoryFilter != '') {
        $recipeQuery = $recipeQuery . " AND";
    }

    if ($subcategoryFilter != '') {
        $recipeQuery = $recipeQuery . " subcategoryName='$subcategoryFilter'";
    }
}

if ($sort != '') {
    $recipeQuery = $recipeQuery . " ORDER BY $sort";

    if ($order != '') {
        $recipeQuery = $recipeQuery . " $order";
    }
}

if (isset($_GET['btnReset'])) {
    header('Location: insightsAnalytics.php');
}

$recipeResult = executeQuery($recipeQuery);

$primaryCategoryQuery = "SELECT DISTINCT(primaryCategoryName) FROM primaryFoodCategories";
$primaryCategoryResults = executeQuery($primaryCategoryQuery);

$subcategoryQuery = "SELECT DISTINCT(subcategoryName) FROM foodSubcategories";
$subcategoryResults = executeQuery($subcategoryQuery);
?>

<!-- TABLES  -->
<div class="container-fluid">
    <h2 class="moderation">Like & Bookmark Records</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Gallery Post</h3>
            </div>
            <!-- FILTER || SORT || ORDER  -->
            <div class="col">
                <form>
                    <div class="card p-4 mt-4 rounded-5">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-ml-4 py-3">
                                    <div class="h6 optionsTitle">FILTER</div>
                                    <div class="row">
                                        <label for="primaryCategorySelect" style="font-size: 0.8rem;">PRIMARY CATEGORIES</label>
                                        <select id="primaryCategorySelect" name="primaryCategoryName" class="form-control mx-auto">
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
                                        <label for="subcategorySelect" style="font-size: 0.8rem">SUBCATEGORIES</label>
                                        <select id="subcategorySelect" name="subcategoryName" class="form-control mx-auto">
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
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="col-md-4 py-3 mx-5">
                                        <div class="h6 optionsTitle">SORT BY</div>
                                        <div class="row">
                                            <select id="sort" name="sort" class="form-control mx-auto">
                                                <option value="">None</option>
                                                <option <?php if ($sort == "createdAt") {
                                                            echo "selected";
                                                        } ?> value="createdAt">Creation DateTime
                                                </option>
                                                <option <?php if ($sort == "updatedAt") {
                                                            echo "selected";
                                                        } ?> value="updatedAt">
                                                    Update DateTime</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-3 mx-5">
                                        <div class="h6 optionsTitle">ORDER BY</div>
                                        <div class="row">
                                            <select id="order" name="order" class="form-control mx-auto">
                                                <option <?php if ($order == "ASC") {
                                                            echo "selected";
                                                        } ?> value="ASC">Ascending</option>
                                                <option <?php if ($order == "DESC") {
                                                            echo "selected";
                                                        } ?> value="DESC">Descending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger" name="btnReset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped galleryTable">
        <thead>
            <tr>
                <th scope="col">Post ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Post</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Primary</th>
                <th scope="col">Sub-Category</th>
                <th scope="col">Likes Count</th>
                <th scope="col">Bookmarks Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($galleryResult) > 0) {
                while ($galleryRow = mysqli_fetch_assoc($galleryResult)) {
            ?>
                    <tr>
                        <td scope="row" style="background-color:pink"> <?php echo $galleryRow["postID"]  ? $galleryRow["postID"] : 'NULL' ?></td>
                        <td style="background-color:pink"> <?php echo $galleryRow["firstName"] . " " . $galleryRow['lastName'] ?></td>
                        <td style="background-color:pink">
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn gallery-image-btn" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $galleryRow['postID']; ?>">
                                View
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="imageModal<?php echo $galleryRow['postID']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $galleryRow['postID']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?php echo !empty($galleryRow['imageURL']) ? htmlspecialchars($galleryRow['imageURL']) : 'default-placeholder.jpg'; ?>" class="img-fluid rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="background-color:pink"><?php echo $galleryRow["caption"]  ? $galleryRow["caption"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $galleryRow["createdAt"]  ? $galleryRow["createdAt"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $galleryRow["primaryCategoryName"]  ? $galleryRow["primaryCategoryName"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $galleryRow["subcategoryName"]  ? $galleryRow["subcategoryName"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $galleryRow["likesCount"]  ? $galleryRow["likesCount"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $galleryRow["bookmarksCount"]  ? $galleryRow["bookmarksCount"] : 'NULL' ?></td>
                    </tr>
                <?php
                }
            } else { ?>
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
                </tr>
            <?php
            }
            ?>
            <tr>
        </tbody>
    </table>
</div>

<!-- LIKE & BOOKMARK (RECIPE) -->
<div class="container-fluid">
    <h2 class="moderation">Like & Bookmark Record</h2>
    <div class="row text-center my-5">
        <div class="col">
            <div>
                <h3 class="badge">Recipe Post</h3>
            </div>
        </div>
    </div>
    <table class="table table-striped recipeTable">
        <thead>
            <tr>
                <th scope="col">Recipe ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Post</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Primary</th>
                <th scope="col">Sub-Category</th>
                <th scope="col">Likes Count</th>
                <th scope="col">Bookmarks Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($recipeResult) > 0) {
                while ($recipeRow = mysqli_fetch_assoc($recipeResult)) {
            ?>
                    <tr>
                        <td scope="row" style="background-color:pink"> <?php echo $recipeRow["recipeID"]  ? $recipeRow["recipeID"] : 'NULL' ?></td>
                        <td style="background-color:pink"> <?php echo $recipeRow["firstName"] . " " . $recipeRow['lastName'] ?></td>
                        <td style="background-color:pink">
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn recipe-image-btn" data-bs-toggle="modal" data-bs-target="#recipeImageModal<?php echo $recipeRow['recipeID']; ?>">
                                View
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="recipeImageModal<?php echo $recipeRow['recipeID']; ?>" tabindex="-1" aria-labelledby="recipeImageModalLabel<?php echo $recipeRow['recipeID']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?php echo !empty($recipeRow['imageURL']) ? htmlspecialchars($recipeRow['imageURL']) : 'default-placeholder.jpg'; ?>" class="img-fluid rounded" alt="Recipe Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="background-color:pink"><?php echo $recipeRow["recipeTitle"]  ? $recipeRow["recipeTitle"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $recipeRow["createdAt"]  ? $recipeRow["createdAt"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $recipeRow["primaryCategoryName"]  ? $recipeRow["primaryCategoryName"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $recipeRow["subcategoryName"]  ? $recipeRow["subcategoryName"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $recipeRow["likesCount"]  ? $recipeRow["likesCount"] : 'NULL' ?></td>
                        <td style="background-color:pink"><?php echo $recipeRow["bookmarksCount"]  ? $recipeRow["bookmarksCount"] : 'NULL' ?></td>
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