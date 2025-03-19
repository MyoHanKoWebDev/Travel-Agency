<?php
include("connection/dbcon.php");
include("connection/auth.php");

if (isset($_POST["upHotel"])) {
  $upHoName = $_POST["hoName"];
  $upHoAdd = $_POST["hoAdd"];
  $upHoRate = $_POST["hoRate"]." Stars";
  $upHoId = $_POST["hoId"];

  $sqlUpHo = "UPDATE hotel SET hoName = '$upHoName',hoAdd = '$upHoAdd',hoRating = '$upHoRate' WHERE hotID = $upHoId";
  if (mysqli_query($con, $sqlUpHo)) {
    echo "<script>alert('Hotel Information updated successfully');
        window.location.replace('viewHotel.php');</script>";
  }else{
    echo "<script>alert('Cant't Update');
        window.location.back();</script>";
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
            <h3 class="page-title fs-4"> Update Hotel </h3>
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
                  <h4 class="card-title text-info fs-5">Update Hotel Form</h4>
                  <?php
                  if (isset($_GET['upHo'])) {
                  $hoId = $_GET["upHo"];
                  $sqlHo = "SELECT * FROM hotel WHERE hotID = $hoId";
                  $resultHo = mysqli_query($con, $sqlHo);
                  while ($rowHo = mysqli_fetch_array($resultHo)) {

                  ?>
                  <form class="forms-sample" method="post">
                  <input type="hidden" class="form-control" id="hoId" placeholder="" value="<?php echo $rowHo['hotID'] ?>" name="hoId">
                    <div class="form-group">
                      <label for="exampleInputHotel">Hotel Name</label>
                      <input type="text" class="form-control" id="exampleInputHotel" placeholder="" value="<?php echo $rowHo['hoName'] ?>" name="hoName">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputHoAd">Address</label>
                      <input type="text" class="form-control" id="exampleInputHoAd" placeholder="" value="<?php echo $rowHo['hoAdd'] ?>" name="hoAdd">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputHoRa">Rating : Stars</label>
                      <input type="number" class="form-control" id="exampleInputHoRa" placeholder="" value="<?php echo substr($rowHo['hoRating'],0,1); ?>" name="hoRate">
                    </div>
                    <button type="submit" class="btn btn-gradient-info me-2" name="upHotel">Update</button>
                  </form>
                  <?php }
                  }else{
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