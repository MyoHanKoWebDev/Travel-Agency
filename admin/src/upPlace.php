<?php
include("connection/dbcon.php");
include("connection/auth.php");

if (isset($_POST["upPlace"])) {
  $upPlName = $_POST["plName"];
  $upPlId = $_POST["plId"];

  $placeName = strtolower($upPlName);
  $placeNameArr = str_split($placeName);
  $placeNameChar = strtoupper($placeNameArr[0]);

  for ($i = 1; $i < count($placeNameArr); $i++) {
    $placeNameChar  .= $placeNameArr[$i];
  }

  $sqltest = "SELECT plName FROM place WHERE plName = '$placeNameChar'";
  $resulttest = mysqli_query($con, $sqltest);
  if (mysqli_num_rows($resulttest) >= 1) {
    echo "<script>alert('Place Name ( " . htmlspecialchars($placeNameChar, ENT_QUOTES, 'UTF-8') . " ) already existed.Unavailable Update.');
        window.history.back();</script>";
  } else {
    $sqlUpPl = "UPDATE place SET plName = '$upPlName' WHERE plID = $upPlId";
    if (mysqli_query($con, $sqlUpPl)) {
      echo "<script>alert('Place Name updated successfully');
          window.location.replace('viewPlace.php');</script>";
    } else {
      echo "<script>alert('Cant't Update');
          window.history.back();</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Travel Agency</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("partials/navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title fs-4"> Update Places </h3>
            <!-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
              </ol> -->
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-info fs-5">Update Place Form</h4>
                  <?php
                  if (isset($_GET['upPl'])) {
                    $plId = $_GET["upPl"];
                    $sqlPl = "SELECT * FROM place WHERE plID = $plId";
                    $resultPl = mysqli_query($con, $sqlPl);
                    while ($rowPl = mysqli_fetch_array($resultPl)) {

                  ?>
                      <form class="forms-sample" method="post">

                        <div class="form-group">
                          <label for="exampleInputPlace">Place Name</label>
                          <input type="hidden" class="form-control" id="plId" placeholder="" value="<?php echo $rowPl['plID'] ?>" name="plId">
                          <input type="text" class="form-control" id="exampleInputPlace" placeholder="" value="<?php echo $rowPl['plName'] ?>" name="plName" Required>
                        </div>
                        <button type="submit" class="btn btn-gradient-info me-2" name="upPlace">Update</button>

                      </form>
                  <?php }
                  } else {
                    header("Location : index.php");
                  } ?>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("partials/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/select2/select2.min.js"></script>
  <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/file-upload.js"></script>
  <script src="assets/js/typeahead.js"></script>
  <script src="assets/js/select2.js"></script>
  <!-- End custom js for this page -->
</body>

</html>