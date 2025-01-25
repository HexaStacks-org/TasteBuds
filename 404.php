<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>404 Page</title>
  <base href="http://localhost/TasteBuds/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../shared/assets/css/style.css">
  <link rel="icon" type="image" href="shared/assets/image/TasteBuds_Icon.png">
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #faf9f6;
    }

    .img-container img {
      max-width: 100%;
      height: auto;
      margin-bottom: 40px;
    }

    .text-container {
      text-align: center;
    }

    .word {
      color: #f39c12;
    }

    .header {
      font-size: 2rem;
      font-family: 'Open Sans', sans-serif;
      margin-bottom: 10px;
    }

    .subheader {
      font-size: 1rem;
      color: #333;
    }

    .btn.go-back {
      background-color: #f39c12;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      margin-top: 20px;
      display: inline-block;
    }

    .btn.go-back:hover {
      background-color: #e67e22;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="img-container">
    <img src="shared/assets/image/404 logo.png" alt="404 Image" />
  </div>
  <div class="text-container">
    <div class="header">
      <span class="word">404</span> FILE NOT FOUND
    </div>
    <div class="subheader">
      Sorry, the page you’re looking for doesn’t exist.
    </div>
    <a href="index.php" class="btn go-back">Go Back</a>
  </div>
</body>

</html>
