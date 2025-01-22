<?php
include("connect.php");

$queryGalleryReports = "SELECT * FROM reports LEFT JOIN reasons ON reasons.reasonID = reports.reasonID LEFT JOIN users ON users.userID = reports.userID WHERE reports.postID IS NOT NULL";
$resultGalleryReports = executeQuery($queryGalleryReports);

$queryRecipeReports = "SELECT * FROM reports LEFT JOIN reasons ON reasons.reasonID = reports.reasonID LEFT JOIN users ON users.userID = reports.userID WHERE reports.recipeID IS NOT NULL";
$resultRecipeReports = executeQuery($queryRecipeReports);

if (isset($_GET['deletePostID'])) {
  $postID = intval($_GET['deletePostID']); // Ensure the post ID is sanitized as an integer

  // Query to delete the post from the database
  $deleteQuery = "DELETE FROM reports WHERE postID = ?";

  // Prepare the statement to prevent SQL injection
  if ($stmt = mysqli_prepare($conn, $deleteQuery)) {
    mysqli_stmt_bind_param($stmt, 'i', $postID); // Bind the post ID as an integer
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to refresh the page after the post is deleted
      header("Location: reports.php");
      exit(); // Ensure no further code is executed after redirect
    } else {
      echo "Error deleting post.";
    }
    mysqli_stmt_close($stmt);
  }
}

if (isset($_GET['deleteRecipeID'])) {
  $postID = intval($_GET['deleteRecipeID']); // Ensure the post ID is sanitized as an integer

  // Query to delete the post from the database
  $deleteQuery = "DELETE FROM reports WHERE recipeID = ?";

  // Prepare the statement to prevent SQL injection
  if ($stmt = mysqli_prepare($conn, $deleteQuery)) {
    mysqli_stmt_bind_param($stmt, 'i', $postID); // Bind the post ID as an integer
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to refresh the page after the post is deleted
      header("Location: reports.php");
      exit(); // Ensure no further code is executed after redirect
    } else {
      echo "Error deleting post.";
    }
    mysqli_stmt_close($stmt);
  }
}

// Check if a report needs to be deleted
if (isset($_GET['deleteReportID'])) {
  $reportID = intval($_GET['deleteReportID']); // Sanitize input to ensure it's an integer

  // Query to delete the report from the reports table
  $deleteReportQuery = "DELETE FROM reports WHERE reportID = ?";

  // Prepare the statement to prevent SQL injection
  if ($stmt = mysqli_prepare($conn, $deleteReportQuery)) {
    mysqli_stmt_bind_param($stmt, 'i', $reportID); // Bind the report ID as an integer
    if (mysqli_stmt_execute($stmt)) {
      // Redirect to refresh the page after the report is deleted
      header("Location: reports.php");
      exit(); // Ensure no further code is executed after redirect
    } else {
      echo "Error deleting report.";
    }
    mysqli_stmt_close($stmt);
  }
}
?>

<!-- TABLE  -->
<div class="container-fluid tables-chart">
    <div class="row">
        <div class="col-12">

            <!-- tables and chart -->
            <div class="container-fluid">
                <h2 class="moderation">Reports from Users</h2>
                <div class="row text-center my-5">
                    <div class="col">
                        <div>
                            <h3 class="badge">Gallery Report</h3>
                        </div>
                        <table class="table table-striped reportTable">
                            <thead>
                                <tr>
                                    <th scope="col">Post ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Other Reason</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($resultGalleryReports) > 0) {
                                    while ($reportRow = mysqli_fetch_assoc($resultGalleryReports)) {
                                ?>
                                        <tr>
                                            <td scope="row" style="background-color:pink">
                                                <?php echo $reportRow["postID"] ? $reportRow["postID"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["firstName"] . " " . $reportRow['lastName'] ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["reason"] ? $reportRow["reason"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["otherReason"] ? $reportRow["otherReason"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink"><?php echo $reportRow["status"] ?></td>
                                            <td style="background-color:pink">
                                                <button type="button" class="btn label">Review</button>
                                                <button type="button" class="btn label">
                                                    <a href="reports.php?deletePostID=<?php echo $reportRow['postID']; ?>" style="text-decoration:none; color:black;">Delete Post</a>
                                                </button>
                                                <button type="button" class="btn label">
                                                    <a href="reports.php?deleteReportID=<?php echo $reportRow['reportID']; ?>" style="text-decoration:none; color:black;">Delete Report</a>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h2 class="moderation">Reports from Users</h2>
                <div class="row text-center my-5">
                    <div class="col">
                        <div>
                            <h3 class="badge">Recipe Report</h3>
                        </div>
                        <table class="table reportTable">
                            <thead>
                                <tr>
                                    <th scope="col">Recipe ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Other Reason</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($resultRecipeReports) > 0) {
                                    while ($reportRow = mysqli_fetch_assoc($resultRecipeReports)) {
                                ?>
                                        <tr>
                                            <td scope="row" style="background-color:pink">
                                                <?php echo $reportRow["recipeID"] ? $reportRow["recipeID"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["firstName"] . " " . $reportRow['lastName'] ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["reason"] ? $reportRow["reason"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink">
                                                <?php echo $reportRow["otherReason"] ? $reportRow["otherReason"] : 'NULL' ?>
                                            </td>
                                            <td style="background-color:pink"><?php echo $reportRow["status"] ?></td>
                                            <td style="background-color:pink">
                                                <button type="button" class="btn label">Review</button>
                                                <button type="button" class="btn label">
                                                    <a href="reports.php?deleteRecipeID=<?php echo $reportRow['recipeID']; ?>" style="text-decoration:none; color:black;">Delete Recipe</a>
                                                </button>
                                                <button type="button" class="btn label">
                                                    <a href="reports.php?deleteReportID=<?php echo $reportRow['reportID']; ?>" style="text-decoration:none; color:black;">Delete Report</a>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>