<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Responsive Sidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <?php
  include("shared\components\fontEmbed.php");
  ?>
  <link rel="stylesheet" href="shared\assets\css\admin.css" />
</head>

<body>
  <!-- main container -->
  <div class="container-fluid">
    <div class="row">
      <!-- sidebar-->
      <?php
      include("shared\components\sidebar.php");
      ?>

      <div class="col-md-8 col-lg-10 p-0">
        <!-- offcanvas menu -->
        <?php
        include("shared\components\offcanvas.php");
        ?>

        <!-- content -->
        <div class="container-fluid tables-chart">
          <div class="row">
            <div class="col-12">


              <!-- tables -->

              <!-- table end -->
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>