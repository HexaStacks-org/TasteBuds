<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/gallery.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rammetto+One&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include 'shared/components/navbar.php'; ?>
    <div class="container align-items-center justify-content-center">
        <div class="row card-row" id="card-container">
            <!-- cards here -->
        </div>
        <div class="d-flex my-5 d-flex align-items-center justify-content-between">
            <button class="btn back-btn btn-secondary" id="back-btn" disabled>Back</button>
            <button class="btn next-btn btn-primary" id="continue-btn">Continue</button>
        </div>
    </div>

    <script src="shared/assets/js/gallery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>