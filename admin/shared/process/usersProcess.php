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
        header("Location: users.php");
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