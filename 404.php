<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Page</title>
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
    <link rel="stylesheet" href="shared/assets/css/style.css">
    <style>
      body {
        margin: 0;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: var(--clr-white);
      }

      .img-container img {
        max-width: 100%;
        height: auto;
        margin-bottom: 40px;
      }

      .text-container {
        text-align: center;
      }

      .word{
        color: var(--fc-primary-orange);
      }

      .header {
        font-size: var(--fs-header);
        font-family: var(--ff-title);
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
        justify-content: center;
      }

      .subheader {
        font-size: var(--fs-h5);
      }

      @media only screen and (max-width: 414px){
        .header {
        font-size: var(--fs-h5);
        font-family: var(--ff-title);
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
        justify-content: center;
      }

      .subheader {
        font-size: var(--fs-paragraph);
      }

      img{
        width: 120px;
        height: auto;
      }
      }
    </style>
  </head>

  <body>
    <div class="img-container">
      <img src="shared/assets/image/404 logo.png" alt="404 Image" />
    </div>
    <div class="text-container">
      <div class="header">
        <div class="word">404 &nbsp;</div>
        FILE NOT FOUND
      </div>
      <div class="subheader">
        Sorry, the page you’re looking for doesn’t exist.
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
