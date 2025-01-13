<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Food Listings</title>
    <link rel="stylesheet" href="foodListingsRecipe.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>

    <!-- Title Section -->
    <div class="title">
      <h1 class="title">FOOD LISTINGS OF RECIPES</h1>
    </div>
    <div class="description">
      <h6 class="description">
        Explore delicious recipes for breakfast, dinner, snacks, and
        more—perfect for any occasion!
      </h6>
    </div>

    <!-- Category Buttons -->
    <div class="container">
      <div class="row justify-content-center">
        <div
          class="col-12-catbuttons d-flex flex-wrap justify-content-center align-items-center"
        >
          <div class="explore">EXPLORE</div>
          <button class="custom-btn" id="breakfast-btn">Breakfast</button>
          <button class="custom-btn" id="lunch-btn">Lunch</button>
          <button class="custom-btn" id="dinner-btn">Dinner</button>
          <button class="custom-btn" id="snacks-btn">Snacks</button>
          <button class="custom-btn" id="dessert-btn">Dessert</button>
        </div>
      </div>
    </div>

    <!-- Dynamic Content Area -->
    <div class="container-fluid mt-5 content-bg" id="content-area">
      <!-- Default cards for Breakfast, Lunch, Dinner -->
      <div class="row" id="recipe-card">
        <div class="col-md-6 pt-5 pb-4">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="shared/assets/image/mockup-pic.png"
                  class="img-fluid"
                  alt="..."
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <button class="card-sub-category">Breakfast</button>
                  <h5 class="card-title pt-1">Title of the dish</h5>
                  <p class="card-text">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. bawal po may mag isa na word.p>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-5 pb-4">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="shared/assets/image/mockup-pic.png"
                  class="img-fluid"
                  alt="..."
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <button class="card-sub-category">Lunch</button>
                  <h5 class="card-title pt-1">Title of the dish</h5>
                  <p class="card-text">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. bawal po may mag isa na word.p>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-5 pb-4">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="shared/assets/image/mockup-pic.png"
                  class="img-fluid"
                  alt="..."
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <button class="card-sub-category">Dinner</button>
                  <h5 class="card-title pt-1">Title of the dish</h5>
                  <p class="card-text">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. bawal po may mag isa na word.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-5 pb-4">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="shared/assets/image/mockup-pic.png"
                  class="img-fluid"
                  alt="..."
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <button class="card-sub-category">Dessert</button>
                  <h5 class="card-title pt-1">Title of the dish</h5>
                  <p class="card-text">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. bawal po may mag isa na word.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript for Dynamic Content -->
    <script>
      // Function to change the category
      function changeCategory(category) {
        const titleElement = document.querySelector(".title");
        const descriptionElement = document.querySelector(".description");
        const recipeCards = document.getElementById("recipe-card");

        if (category === "breakfast") {
          titleElement.innerText = "Breakfast Recipes";
          descriptionElement.innerText =
            "Start your day with exciting recipes that energize and inspire—think fluffy pancakes, hearty omelets, and vibrant smoothie bowls.";
        } else if (category === "lunch") {
          titleElement.innerText = "Lunch Recipes";
          descriptionElement.innerText =
            "Satisfy your hunger with delicious and healthy lunch options—perfect for a midday energy boost!";
        } else if (category === "dinner") {
          titleElement.innerText = "Dinner Recipes";
          descriptionElement.innerText =
            "End your day with a satisfying dinner—from hearty pastas to light salads and everything in between.";
        } else if (category === "snacks") {
          titleElement.innerText = "Snack Recipes";
          descriptionElement.innerText =
            "Looking for a quick and tasty bite? Explore easy-to-make snack ideas for any craving!";
        } else if (category === "dessert") {
          titleElement.innerText = "Dessert Recipes";
          descriptionElement.innerText =
            "Indulge in delightful desserts—perfect for satisfying your sweet tooth at any time of the day!";
        }

        // Remove the primary category buttons
        const categoryButtons = document.querySelectorAll(".custom-btn");
        categoryButtons.forEach((button) => (button.style.display = "none"));

        // Change the buttons to subcategories (Pork, Vegan, Chicken, etc.)
        const buttonsContainer = document.createElement("div");
        buttonsContainer.classList.add("explore-buttons-container");
        const categories = [
          "Pork",
          "Vegan",
          "Chicken",
          "Beef",
          "Seafood",
          "Others",
        ];

        buttonsContainer.innerHTML = categories
          .map(
            (cat) =>
              `<button class="custom-btn" onclick="changeRecipeCategory('${cat}')">${cat}</button>`
          )
          .join("");

        // Replace the category buttons with the new ones
        document.querySelector(".explore").innerHTML = "EXPLORE ";
        document
          .querySelector(".container .row .col-12-catbuttons")
          .appendChild(buttonsContainer);
      }

      // Function to change recipes based on subcategory
      function changeRecipeCategory(subcategory) {
        const recipeCards = document.getElementById("recipe-card");
        recipeCards.innerHTML = `  
          <div class="col-md-6 pt-5 pb-4">
            <div class="card mt-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="shared/assets/image/mockup-pic.png" class="img-fluid" alt="..." />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <button class="card-sub-category">${subcategory}</button>
                    <h5 class="card-title pt-1">Recipe for ${subcategory}</h5>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a
                    type specimen book. bawal po may mag isa na word.p></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `;
      }

      // Event Listeners for Category Buttons
      document
        .getElementById("breakfast-btn")
        .addEventListener("click", () => changeCategory("breakfast"));
      document
        .getElementById("lunch-btn")
        .addEventListener("click", () => changeCategory("lunch"));
      document
        .getElementById("dinner-btn")
        .addEventListener("click", () => changeCategory("dinner"));
      document
        .getElementById("snacks-btn")
        .addEventListener("click", () => changeCategory("snacks"));
      document
        .getElementById("dessert-btn")
        .addEventListener("click", () => changeCategory("dessert"));
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
