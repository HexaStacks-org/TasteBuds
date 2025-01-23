<?php
include("../shared/components/navbar.php");
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Random Food Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../shared/assets/css/foodgenerator.css" />
  <link rel="stylesheet" href="../shared/assets/css/style.css">
  <link rel="stylesheet" href="../shared/assets/css/footer.css">
  <link rel="stylesheet" href="../shared/assets/css/navbar.css" />
  <style>
    .random-generator-card {
      position: relative;
      overflow: hidden;
    }

    .random-generator-img {
      width: 100%;
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .random-generator-card:hover .random-generator-img {
      opacity: 0.7;
      transform: scale(1.05);
    }

    .recipe-title {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* Makes the background cover the entire card */
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      font-size: 2em;
      font-family: 'Open Sans', sans-serif;
      font-weight: bold;
      color: white;
      background-color: rgba(0, 0, 0, 0.6);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .random-generator-card:hover .recipe-title {
      opacity: 1;
    }
  </style>
</head>

<body>

  <!-- navbar here (height: 80px)-->

  <div class="random-generator-container">
    <div class="row">
      <div class="col-lg-12">
        <div class="random-generator-header">RANDOM FOOD GENERATOR</div>
        <div class="random-generator-subheader">
          A fun and unpredictable food generator that serves up a surprise
          recipe every time, perfect for adventurous eaters!
        </div>
      </div>
    </div>
  </div>

  <div class="random-generator-img-container">
    <div class="row">
      <div class="col-12">
        <div class="random-generator-card">
          <img id="randomImage" class="random-generator-img" src="../shared/assets/image/test-pic.png" alt="Random Food" />
          <div id="recipeTitle" class="recipe-title"></div>
        </div>
      </div>
    </div>
    <div class="col-12 text-center">
      <button type="button" class="btn random-generator-btn mb-5" onclick="generateRandomRecipe()">GENERATE</button>
    </div>
  </div>

  <?php include '../shared/components/footer.php'; ?>

  <script>
    function generateRandomRecipe() {
      fetch('randomImage.php')
        .then(response => response.json())
        .then(data => {
          if (data.recipe) {
            // Update the image in the existing random-generator-card
            const randomImage = document.getElementById('randomImage');
            const recipeTitle = document.getElementById('recipeTitle');

            randomImage.src = `../shared/assets/image/content-image/${data.recipe.imageURL}`;
            randomImage.alt = data.recipe.recipeTitle;

            // Set the title text that will appear on hover
            recipeTitle.textContent = data.recipe.recipeTitle;
          } else {
            alert('No recipe found!');
          }
        })
        .catch(error => {
          console.error('Error fetching random recipe:', error);
        });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>