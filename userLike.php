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

        </main>
    </div>

</body>

</html>