<?php
include("connect.php");

header('Content-Type: application/json');

$sql = "SELECT r.recipeTitle, i.imageURL 
        FROM recipes r 
        JOIN images i ON r.recipeID = i.recipeID 
        ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'recipe' => [
            'recipeTitle' => $row['recipeTitle'],
            'imageURL' => $row['imageURL']
        ]
    ]);
} else {
    echo json_encode(['error' => 'No recipes found.']);
}

$conn->close();
?>
