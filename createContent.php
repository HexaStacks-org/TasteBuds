<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TasteBuds Floating Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        /* Global Variables */
        :root {
            --fs-h6: 19.2px;
            --fs-small: 13.33px;

            --fc-primary-orange: #f1950c;
            --fc-dark-orange: #d4830b;
            --fc-light-orange: #ffebcd;

            --ff-title: "Rammetto One", serif;
            --ff-text: "Open Sans", sans-serif;
        }

        .rammetto-one {
            font-family: var(--ff-title);
            font-weight: 400;
            font-style: normal;
        }

        .open-sans-text {
            font-family: var(--ff-text);
            font-optical-sizing: auto;
            font-style: normal;
            font-variation-settings: "wdth" 100;
        }

        .floating-btn-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .floating-btn {
            background-color: var(--fc-primary-orange);
            color: var(--fc-light-orange);
            font-family: var(--ff-title);
            font-size: var(--fs-h6);
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .child-btn {
            background-color: var(--fc-dark-orange);
            color: var(--fc-light-orange);
            font-family: var(--ff-text);
            font-size: var(--fs-small);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            position: absolute;
            bottom: 0;
            right: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .child-btn.show {
            opacity: 1;
            visibility: visible;
        }

        .child-btn#recipe-btn.show {
            transform: translate(-70px, -10px);
        }

        .child-btn#gallery-btn.show {
            transform: translate(-140px, -20px);
        }
    </style>
</head>

<body>
    <!-- Floating Button Container -->
    <div class="floating-btn-container">
        <!-- Main Floating Button -->
        <button class="floating-btn rammetto-one" id="main-btn">+</button>

        <!-- Child Buttons -->
        <button class="child-btn open-sans-text" id="recipe-btn"
            onclick="location.href='recipe-creation.html'">Recipe</button>
        <button class="child-btn open-sans-text" id="gallery-btn"
            onclick="location.href='gallery-creation.html'">Gallery</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        const mainBtn = document.getElementById('main-btn');
        const recipeBtn = document.getElementById('recipe-btn');
        const galleryBtn = document.getElementById('gallery-btn');

        mainBtn.addEventListener('click', () => {
            recipeBtn.classList.toggle('show');
            galleryBtn.classList.toggle('show');
        });
    </script>
</body>

</html>