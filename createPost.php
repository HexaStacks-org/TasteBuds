<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/createPost.css" />
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-start">
            <div class="col-md-6 col-12">
                <div class="post-form mx-3 my-3 px-5">
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <img src="shared/assets/image/Logo Combination 1.png"
                                class="logo d-inline-block align-text-top" />
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                            <button class="btn back-btn" id="back-btn">BACK</button>
                        </div>
                    </div>
                    <h1 class="px-5">Create a Post</h1>
                    <p class="post-description px-5">Share your new favorite and must-try post!</p>
                    <form action="create-post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mx-5">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter title of the post" required>
                        </div>

                        <div class="mb-3 mx-5">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control py-3" id="description" name="description" rows="4"
                                placeholder="Enter description of the post" required></textarea>
                        </div>

                        <div class="mb-3 mx-5">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>

                        <div class="mb-3 mx-5">
                            <p class="form-category">
                                Primary Category
                            </p>
                            <div class="mx-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Breakfast
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Lunch
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Dinner
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                        id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Snacks
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioPrimary"
                                        id="flexRadioDefault5">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Dessert
                                    </label>
                                </div>
                            </div>
                            <div>
                                <p class="form-category mt-3">
                                    Sub Category
                                </p>
                                <div class="mx-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault6">
                                        <label class="form-check-label" for="flexRadioDefault6">
                                            Vegan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioSecondary"
                                            id="flexRadioDefault7">
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
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-create">CREATE POST</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6 d-none d-md-block">
                <img src="shared/assets/image/mockup-pic2.png" alt="mockup" class="img-fluid mockup-image">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>