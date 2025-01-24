<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TasteBuds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../shared/assets/css/style.css" />
    <link rel="stylesheet" href="../shared/assets/css/footer.css" />
    <link rel="icon" type="image" href="../shared/assets/image/TasteBuds_Icon.png">

    <style>
        .about-container {
            background-color: var(--fc-light-orange);
            color: var(--fc-black);
            padding: 5rem 0;
        }

        .about-header {
            font-family: var(--ff-title);
            text-align: center;
            margin-bottom: 4rem;
        }

        .about-content p {
            font-family: var(--ff-text);
            font-size: var(--fs-paragraph);
            text-align: justify;
        }

        .profile-section {
            padding: 3rem 0;
            background-color: var(--fc-mid-orange);
        }

        .profile-card {
            background: white;
            border: 1px solid var(--clr-dark-orange);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s;
            height: 100%;
        }

        .profile-card h5 {
            font-size: var(--fs-h4);
            color: var(--fc-primary-orange);
            margin-top: 10px;
            font-family: var(--ff-text);
        }

        .profile-card p {
            font-family: var(--ff-text);
            font-size: var(--fs-paragraph);
            color: var(--fc-black);
            font-weight: bold;
        }

        .img-fluid{
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

    <section class="about-container">
        <div class="container">
            <h1 class="about-header rammetto-one" style="color: var(--fc-primary-orange);">About TasteBuds</h1>
            <div class="about-content">
                <p>
                    TasteBuds is an interactive and user-friendly website designed to transform the way users make food
                    choices. By blending information, entertainment, and community engagement, the platform serves as a
                    one-stop hub for food enthusiasts. With its extensive features, TasteBuds aims to inspire informed
                    and enjoyable food decisions while fostering a sense of culinary curiosity and social connection.
                </p>
                <h2 class="mt-4 rammetto-one text-center" style="color: var(--fc-dark-orange);">Your Ultimate Buddy
                    for Food Exploration and Choices</h2>
            </div>
        </div>
    </section>

    <section class="profile-section" id=#team>
        <div class="container">
            <h1 class="text-center rammetto-one mb-5" style="color: var(--fc-primary-orange);">Meet the Team</h1>
            <div class="row justify-content-center">
                <!-- Developer Card -->
                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <!-- Placeholder for the developer's image -->
                            <img src="../shared/assets/image/team-image/castillo.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Jomari Castillo</h5>
                        <p>Project Manager</p>
                        <p>Frontend Developer</p>
                        <p>UI/UX Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-section">
        <div class="container">
            <div class="row justify-content-center">
                <!-- First Row -->
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/gamana.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Kaye Gamana</h5>
                        <p>Proponent</p>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/marajas.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Loreen Marajas</h5>
                        <p>UI/UX Designer</p>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/uriarte.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Anyl Feboe Uriarte</h5>
                        <p>UI/UX Designer</p>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <!-- Second Row -->
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/ortiz.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>David Ortiz</h5>
                        <p>Fullstack Developer</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/vergara.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Neil Vergara</h5>
                        <p>Backend Developer</p>
                        <p>Database Administrator</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="../shared/assets/image/team-image/angeles.jpg" alt="Jomari Castillo" class="img-fluid">
                        </div>
                        <h5>Vincent Angeles</h5>
                        <p>Fullstack Developer</p>
                        <p>Database Administrator</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../shared/components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
