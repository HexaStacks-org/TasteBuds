<?php
include("shared/components/connect.php");
// Fetch non-restricted and restricted users
$getFullNameQuery = "SELECT * FROM users WHERE isRestricted = 'no'";
$getFullNameResult = executeQuery($getFullNameQuery);

$userRestricted = "SELECT * FROM users WHERE isRestricted = 'yes'";
$userRestrictedResult = executeQuery($userRestricted);

// Handle Restrict and Unrestrict actions
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
  $action = $_GET['action'] ?? ''; // Get the action from the URL

  // Restrict user
  if ($action === 'restrict') {
    $updateQuery = "UPDATE users SET isRestricted = 'yes' WHERE userID = ?";
  }
  // Unrestrict user
  elseif ($action === 'unrestrict') {
    $updateQuery = "UPDATE users SET isRestricted = 'no' WHERE userID = ?";
  }

  // Execute the action
  if (isset($updateQuery)) {
    if ($stmt = mysqli_prepare($conn, $updateQuery)) {
      mysqli_stmt_bind_param($stmt, 'i', $userID);
      if (mysqli_stmt_execute($stmt)) {
        // Redirect after successful update
        echo "<script>window.location.href = 'users.php';</script>";
        exit();
      } else {
        echo "Error updating user.";
      }
      mysqli_stmt_close($stmt);
    }
  }
} else {
  echo "";
}

mysqli_close($conn);
?>

<!-- Tables -->
<div class="container-fluid tables-chart">
  <div class="row">
    <div class="col-12">
      <div class="container-fluid">
        <h2 class="moderation">TasteBuds User's</h2>

        <!-- Non-restricted users table -->
        <div class="row text-center my-5">
          <div class="col">
            <h3 class="badge">User's Account</h3>
            <table class="table table-striped userManagementTable">
              <thead>
                <tr>
                  <th scope="col">FirstName</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($userRow = mysqli_fetch_assoc($getFullNameResult)) { ?>
                  <tr>
                    <td scope="row" style="background-color:pink"> <?php echo $userRow["firstName"] ?></td>
                    <td style="background-color:pink"> <?php echo $userRow["lastName"] ?></td>
                    <td style="background-color:pink"><?php echo $userRow["email"] ?></td>
                    <td style="background-color:pink"><?php echo $userRow["registeredAt"] ?></td>
                    <td style="background-color:pink">
                      <!-- Restrict button -->
                      <a href="users.php?userID=<?php echo $userRow['userID']; ?>&action=restrict"
                        class="btn image">Restrict</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Restricted users table -->
        <div class="row text-center my-5">
          <div class="col">
            <h3 class="badge">Restricted Account</h3>
            <table class="table table-striped userManagementTable">
              <thead>
                <tr>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($userRestrictedRow = mysqli_fetch_assoc($userRestrictedResult)) { ?>
                  <tr>
                    <td scope="row" style="background-color:pink"> <?php echo $userRestrictedRow["firstName"] ?></td>
                    <td style="background-color:pink"> <?php echo $userRestrictedRow["lastName"] ?></td>
                    <td style="background-color:pink"><?php echo $userRestrictedRow["email"] ?></td>
                    <td style="background-color:pink"><?php echo $userRestrictedRow["registeredAt"] ?></td>
                    <td style="background-color:pink">
                      <!-- Unrestrict button -->
                      <a href="users.php?userID=<?php echo $userRestrictedRow['userID']; ?>&action=unrestrict"
                        class="btn image">Unrestrict</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>