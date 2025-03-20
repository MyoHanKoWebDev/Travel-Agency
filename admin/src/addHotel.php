<?php
include("connection/dbcon.php");
include("connection/auth.php");

if (isset($_POST["addHotel"])) {
  $hotelName = $_POST["hoName"];
  $hotelAdd = $_POST["hoAdd"];
  $hotelRat = $_POST["hoRate"];

  $sqlTest = "SELECT * FROM hotel WHERE hoName = '$hotelName' AND hoAdd = '$hotelAdd'";
  $resultTest = mysqli_query($con, $sqlTest); 
  if (mysqli_num_rows($resultTest) > 0) {
    echo "<script> 
        alert('" . $hotelName . " already existed.');
        window.location.replace('addHotel.php');
        </script>";
  } else {
    $sql = "INSERT INTO hotel (hoName,hoAdd,hoRating) VALUES ('$hotelName','$hotelAdd','$hotelRat')";
    $result = mysqli_query($con, $sql);
    if ($result) {
      echo "<script> 
      alert('Hotel information inserted successfully.');
      window.location.replace('viewHotel.php');
      </script>";
    } else {
      echo "<script>alert('Error to add hotel information: " . mysqli_error($con) . "');
                    window.location.replace('addHotel.php')
                     </script>";
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
            <h3 class="page-title fs-4"> Add New Hotels </h3>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-info fs-5">Hotel Form</h4>

                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputHotel">Hotel Name</label>
                      <input type="text" class="form-control" id="exampleInputHotel" placeholder="Hotel Name" name="hoName" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputHoAd">Address</label>
                      <input type="text" class="form-control" id="exampleInputHoAd" placeholder="Hotel Address" name="hoAdd" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputHoRa">Rating : Stars</label>
                      <input type="number" class="form-control" id="exampleInputHoRa" placeholder="Hotel Rating" name="hoRate" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-info me-2" name="addHotel">Add Hotel</button>
                  </form>
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