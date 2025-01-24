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
  foreach ($input as $recipes) {
    $stmt->execute([
      'recipeID' => $recipes['recipeID'],
      'recipeTitle' => $recipes['recipeTitle'],
      'description' => $recipes['description'],
      'ingredients' => $recipes['ingredients'],
      'steps' => $recipes['steps'],
      'primaryCategoryID' => $recipes['primaryCategoryID'],
      'subcategoryID' => $recipes['subcategoryID'],
      'userID' => $recipes['userID'],
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

  foreach ($input as $recipe) {
    $stmt->execute([
      'recipeID' => $recipe['recipeID'],
      'recipeTitle' => $recipe['recipeTitle'],
      'description' => $recipe['description'],
      'ingredients' => $recipe['ingredients'],
      'steps' => $recipe['steps'],
      'primaryCategoryID' => $recipe['primaryCategoryID'],
      'subcategoryID' => $recipe['subcategoryID'],
    ]);
  }

  echo json_encode(['message' => 'Recipes updated successfully']);
}

function handleDelete($pdo, $input)
{
  $sql = "DELETE FROM recipes WHERE recipeID = :recipeID";
  $stmt = $pdo->prepare($sql);

  foreach ($input as $recipeID) {
    $stmt->execute(['recipeID' => $recipeID]);
  }

  echo json_encode(['message' => 'Recipes deleted successfully']);
}
?>