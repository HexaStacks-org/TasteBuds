<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Recipe View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="shared/assets/css/recipeOverview.css" />
  <link rel="stylesheet" href="shared/assets/css/style.css" />
</head>

<body>
  <div class="container-recipe">
    <div class="col">
      <h2 class="recipe-title-view">Roast Chicken with Avocado Salad</h2>
      <span class="primary-category rounded-pill">Breakfast</span>
      <span class="sub-category rounded-pill">Chicken</span>
      <img src="shared/assets/image/test-pic.png" class="img-thumbnail recipe-image" alt="..." />
      <div class="col name-edit">
        <h6 class="name">JOMARI CASTILLO</h6>
      </div>
      <div class="row buttons">
        <div class="button-col-6">
          <button class="btn-like"><i class="bi bi-hand-thumbs-up-fill"
              style="color: var(--clr-light-orange)"></i></button>
          <button class="btn-bookmark"><i class="bi bi-bookmark-fill"
              style="color: var(--clr-light-orange)"></i></button>
          <button class="btn-report"><i class="bi bi-flag-fill" style="color: var(--clr-light-orange)"></i></button>
        </div>
      </div>
      <div class="col recipe-table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Description</th>
              <th scope="col">Ingredients</th>
              <th scope="col">Steps</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book. bawal po may mag isa na word.p> Lorem Ipsum is
                simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book.
              </td>
              <td>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book. bawal po may mag isa na word.p> Lorem Ipsum is
                simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book.
              </td>
              <td>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book. bawal po may mag isa na word.p> Lorem Ipsum is
                simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
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
              <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam" required>
              <label class="form-check-label" for="spam">Spam</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo" value="Wrong Information">
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var reportButtons = document.querySelectorAll('.btn-report');

      for (var i = 0; i < reportButtons.length; i++) {
        reportButtons[i].addEventListener('click', function () {
          var reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
          reportModal.show();
        });
      }

      document.getElementById('submitReport').addEventListener('click', function () {
        var selectedReason = document.querySelector('input[name="reportReason"]:checked');
        if (selectedReason) {
          alert('Report submitted for reason: ' + selectedReason.value);
          var reportModal = bootstrap.Modal.getInstance(document.getElementById('reportModal'));
          reportModal.hide();
        } else {
          alert('Please select a reason for reporting.');
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>