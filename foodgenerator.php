
<?php include 'shared/components/createContent.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Random Food Generator</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="shared/assets/css/foodgenerator.css" />
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <link rel="stylesheet" href="shared/assets/css/footer.css">
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
            <img class="random-generator-img" src="shared/assets/image/Paleo Grilled Chicken Cobb Salad.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="col-12">
        <button type="button" class="btn random-generator-btn mb-5">GENERATE</button>
      </div>
    </div>

    <?php include 'shared/components/footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

  </body>
</html>
