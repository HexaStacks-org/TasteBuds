<link rel="stylesheet" href="../shared/assets/css/style.css" />
<link rel="stylesheet" href="../shared/assets/css/navbar.css" />
<link rel="stylesheet" href="../shared/assets/css/createContent.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg" style="background-color: #ffebcd">
    <div class="container-fluid d-flex">
        <a class="navbar-brand logo" href="index.php">
            <img src="../shared/assets/image/Logo Combination 2.png" alt="Logo" width="120" height="48"
                class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">
                        <p class="nav-txt-clr">Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="foodListings.php">
                        <p class="nav-txt-clr">Food Listings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="foodgenerator.php">
                        <p class="nav-txt-clr">Generator</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="gallery.php">
                        <p class="nav-txt-clr">Gallery</p>
                    </a>
                </li>
            </ul>

            <div class="btn-nav d-flex justify-content-end">
                <button class="btn btn-search" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch"><a>
                        Search</a>
                </button>

                <div class="btn-group user-dropdown justify-content-end">
                    <button class="btn user-btn" type="button" id="userButton">
                        <p>User</p>
                    </button>
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split " data-bs-toggle="dropdown"
                        aria-expanded="false" aria-label="Toggle Dropdown">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu ">
                        <li><a class="dropdown-item" href="updateUser.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="userContent.php">Uploaded Contents</a></li>
                        <li><a class="dropdown-item" href="userLike.php">Likes</a></li>
                        <li><a class="dropdown-item" href="userBookmark.php">Bookmarks</a></li>
                        <li>
                            <form class="d-flex justify-content-center align-items-center" action="../login.php"
                                method="POST">
                                <button class="btn-logout" type="submit" name="logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="floating-btn-container">
                <button class="floating-btn rammetto-one" id="fab-main-btn">+</button>

                <button class="child-btn open-sans-text" id="fab-recipe-btn"
                    onclick="location.href='createRecipe.php'">Recipe</button>
                <button class="child-btn open-sans-text" id="fab-gallery-btn"
                    onclick="location.href='createPost.php'">Gallery</button>
            </div>

            <script>
                const fabMainBtn = document.getElementById('fab-main-btn');
                const fabRecipeBtn = document.getElementById('fab-recipe-btn');
                const fabGalleryBtn = document.getElementById('fab-gallery-btn');

                fabMainBtn.addEventListener('click', () => {
                    fabRecipeBtn.classList.toggle('show');
                    fabGalleryBtn.classList.toggle('show');
                });
            </script>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-top d-flex" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
    <div class="offcanvas-body">
        <div class="container-fluid d-flex align-items-center justify-content-start flex-wrap"
            style="--bs-gutter-x: 0;">

            <input type="text" class="search-input" placeholder="Enter a keyword" id="keyword">
            <button class="btn-enter-search">
                <p>Search</p>
            </button>

            <div class="btn-group btn-rec-gal" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-recipe" for="btnradio1">
                    <p>Recipe</p>
                </label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-gallery" for="btnradio2">
                    <p>Gallery</p>
                </label>
            </div>

            <div class="btn-group dropdown-center">
                <button type="button" class="btn btn-category dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-filter"></i> | <i class="bi bi-funnel-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-category">
                    <div>
                        <p>Primary Food Category</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioPrimary" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">Breakfast</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioPrimary" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">Lunch</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioPrimary" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">Dinner</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioPrimary" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">Snack</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioPrimary" id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">Dessert</label>
                        </div>

                        <p>Sub Food Category</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault6">
                            <label class="form-check-label" for="flexRadioDefault6">Vegan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault7">
                            <label class="form-check-label" for="flexRadioDefault7">Pork</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault8">Chicken</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault9">
                            <label class="form-check-label" for="flexRadioDefault9">Beef</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault10">Seafood</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">Others</label>
                        </div>
                        <hr>
                        <li class="divider"></li>
                        <p>Order By</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByAlphaAsc"
                                value="alphaAsc">
                            <label class="form-check-label" for="orderByAlphaAsc">A-Z</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByAlphaDesc"
                                value="alphaDesc">
                            <label class="form-check-label" for="orderByAlphaDesc">Z-A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByLikes"
                                value="likes">
                            <label class="form-check-label" for="orderByLikes">Most Liked</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByBookmarks"
                                value="bookmarks">
                            <label class="form-check-label" for="orderByBookmarks">Most Bookmarked</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByCreation"
                                value="creation">
                            <label class="form-check-label" for="orderByCreation">Latest Content</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="orderByOption" id="orderByUpdate"
                                value="update">
                            <label class="form-check-label" for="orderByUpdate">Latest Updated Content</label>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="../shared/assets/js/navbar.js"></script>