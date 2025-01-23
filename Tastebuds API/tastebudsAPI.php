<?php
header("Content-Type: application/json");
include("../Tastebuds API/connect.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
  case 'GET':
    handleGet($pdo);
    break;
  case 'POST':
    handlePost($pdo, $input);
    break;
  case 'PUT':
    handlePut($pdo, $input);
    break;
  case 'DELETE':
    handleDelete($pdo, $input);
    break;
  default:
    echo json_encode(['message' => 'Invalid request method']);
    break;
}

function handleGet($pdo)
{
  $sql = "SELECT *
            FROM recipes
            LEFT JOIN images ON recipes.recipeID = images.recipeID";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
}

function handlePost($pdo, $input)
{
  $sql = "INSERT INTO recipes (recipeID, recipeTitle, description, ingredients, steps, primaryCategoryID, subcategoryID, userID) VALUES (:recipeID, :recipeTitle, :description, :ingredients, :steps, :primaryCategoryID, :subcategoryID, :userID)";
  $stmt = $pdo->prepare($sql);
  foreach ($input as $user) {
    $stmt->execute([
      'recipeID' => $user['recipeID'],
      'recipeTitle' => $user['recipeTitle'],
      'description' => $user['description'],
      'ingredients' => $user['ingredients'],
      'steps' => $user['steps'],
      'primaryCategoryID' => $user['primaryCategoryID'],
      'subcategoryID' => $user['subcategoryID'],
      'userID' => $user['userID'],
    ]);
  }

  echo json_encode(['message' => 'User created successfully']);
}

function handlePut($pdo, $input)
{
  $sql = "UPDATE recipes SET
  recipeTitle = :recipeTitle,
  description = :description,
  ingredients = :ingredients,
  steps = :steps,
  primaryCategoryID = :primaryCategoryID,
  subcategoryID = :subcategoryID
  WHERE recipeID = :recipeID";

  $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'recipeID' => $input['recipeID'],
      'recipeTitle' => $input['recipeTitle'],
      'description' => $input['description'],
      'ingredients' => $input['ingredients'],
      'steps' => $input['steps'],
      'primaryCategoryID' => $input['primaryCategoryID'],
      'subcategoryID' => $input['subcategoryID'],
    ]);
  echo json_encode(['message' => 'User updated successfully']);
}

function handleDelete($pdo, $input)
{
  $sql = "DELETE FROM recipes WHERE recipeID = :recipeID";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['recipeID' => $input['recipeID']]);
  echo json_encode(['message' => 'User deleted successfully']);
}
?>