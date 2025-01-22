<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    include("shared/components/fontEmbed.php");
    ?>
    <link rel="stylesheet" href="shared/assets/css/style.css" />
    <link rel="stylesheet" href="shared/assets/css/gallery.css" />
    <link rel="stylesheet" href="shared/assets/css/navbar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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

    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        <p>Please select the reason for reporting this content:</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam"
                                required>
                            <label class="form-check-label" for="spam">Spam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo"
                                value="Wrong Information">
                            <label class="form-check-label" for="wrongInfo">Wrong Information</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                                value="Inappropriate Content">
                            <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                                value="Copyright Infringement">
                            <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="harassmentAbuse"
                                value="Harassment or Abuse">
                            <label class="form-check-label" for="harassmentAbuse">Harassment or Abuse</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reportReason" id="other" value="Other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel-report" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-submit-report" id="submitReport">Submit Report</button>
                </div>
            </div>
        </div>
    </div>

    <script src="shared/assets/js/gallery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>