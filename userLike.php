<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - TasteBuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="shared/assets/css/activityLog.css">
</head>

<body>
    <div class="profile-page">
        <header class="profile-header">
            <img src="shared/assets/image/Logo.png" alt="TasteBuds Logo">
            <h1>User Profile</h1>
        </header>
        <main>
            <!-- Uploaded Content Section -->
            <section class="content-section">
                <h2>Uploaded Content</h2>
                <div class="content-container">
                    <!-- Recipes Section -->
                    <div class="category">
                        <h3>Recipes</h3>
                        <div class="item-list" id="uploaded-recipes">
                            <a href="post_detail.html?id=1" class="item d-flex align-items-center">
                                <span class="me-2">Recipe 1</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg>
                            </a>
                            <a href="post_detail.html?id=2" class="item d-flex align-items-center">
                                <span class="me-2">Recipe 1</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- Gallery Section -->
                    <div class="category">
                        <h3>Gallery</h3>
                        <div class="item-list" id="uploaded-gallery">
                            <a href="post_detail.html?id=3" class="item">
                                <span>Gallery Image 1</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg>
                            </a>
                            <a href="post_detail.html?id=4" class="item">
                                <span>Gallery Image 2</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Liked Content Section -->
            <section class="content-section">
                <h2>Liked Content</h2>
                <div class="content-container">
                    <div class="category">
                        <h3>Recipes</h3>
                        <div class="item-list" id="liked-recipes">
                            <a href="post_detail.html?id=5" class="item">
                                <span>Liked Recipe 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="category">
                        <h3>Gallery</h3>
                        <div class="item-list" id="liked-gallery">
                            <a href="post_detail.html?id=6" class="item">
                                <span>Liked Gallery Image 1</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Bookmarked Content Section -->
            <section class="content-section">
                <h2>Bookmarked Content</h2>
                <div class="content-container">
                    <div class="category">
                        <h3>Recipes</h3>
                        <div class="item-list" id="bookmarked-recipes">
                            <a href="post_detail.html?id=7" class="item">
                                <span>Bookmarked Recipe 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="category">
                        <h3>Gallery</h3>
                        <div class="item-list" id="bookmarked-gallery">
                            <a href="post_detail.html?id=8" class="item">
                                <span>Bookmarked Gallery Image 1</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>

</html>