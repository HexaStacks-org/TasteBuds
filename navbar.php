<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
</head>

<body class="nav-body">
    <nav class="navbar navbar-expand-lg" style="background-color: #ffebcd">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">
                <img src="shared/assets/image/Logo Combination 2.png" alt="Logo" width="120" height="48"
                    class="d-inline-block align-text-top" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">
                            <p class="nav-txt-clr">Food Listings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            <p class="nav-txt-clr">Generator</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            <p class="nav-txt-clr">Gallery</p>
                        </a>
                    </li>
                </ul>
                <div class="btn-nav d-flex flex-wrap justify-content-end">
                    <button class="btn btn-search" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch"><a>
                            Search</a>
                    </button>

                    <div class="btn-group user-dropdown justify-content-end">
                        <button class="btn user-btn">
                            <p>User</p>
                        </button>
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu user-dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#">Uploaded Contents</a></li>
                            <li><a class="dropdown-item" href="#">Likes</a></li>
                            <li><a class="dropdown-item" href="#">Bookmarks</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-top d-flex" tabindex="-1" id="offcanvasSearch"
        aria-labelledby="offcanvasSearchLabel">
        <div class="offcanvas-body">
            <div class="container-fluid d-flex align-items-center justify-content-start flex-wrap"
                style="--bs-gutter-x: 0;">

                <input type="text" class="search-input" placeholder="Enter a keyword">
                <a href="#" class="btn-enter-search">
                    <p>Search</p>
                </a>
                <div class="btn-group btn-rec-gal" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                    <label class="btn btn-recipe" for="btnradio1">
                        <p>Recipe</p>
                    </label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-gallery" for="btnradio2">
                        <p>Gallery</p>
                    </label>
                </div>
                <div class="btn-group dropdown-center">
                    <button type="button" class="btn btn-category">
                        <p>CATEGORY</p>
                    </button>
                    <button type="button" class="btn btn-category-split dropdown-toggle dropdown-toggle-split "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-category">
                        <div class="    ">
                            <p>
                                Primary Food Category
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Breakfast
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Lunch
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                    id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Dinner
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                    id="flexRadioDefault4" checked>
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Snacks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                    id="flexRadioDefault5" checked>
                                <label class="form-check-label" for="flexRadioDefault5">
                                    Dessert
                                </label>
                            </div>
                            <div>
                                <p>
                                    Sub Food Category
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault6">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        Vegan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault7" checked>
                                    <label class="form-check-label" for="flexRadioDefault7">
                                        Pork
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault8">
                                    <label class="form-check-label" for="flexRadioDefault8">
                                        Chicken
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault9">
                                    <label class="form-check-label" for="flexRadioDefault9">
                                        Beef
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label" for="flexRadioDefault10">
                                        Seafood
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                        id="flexRadioDefault11">
                                    <label class="form-check-label" for="flexRadioDefault11">
                                        Others
                                    </label>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="shared/assets/js/navbar.js"></script>
</body>

</html>