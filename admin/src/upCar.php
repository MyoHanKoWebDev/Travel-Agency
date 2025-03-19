<?php
include("connection/dbcon.php");
include("connection/auth.php");

if (isset($_POST["upCar"])) {
  $upCaName = $_POST["cName"];
  $upCaAvPeo = $_POST["caAvPeo"];
  $upCaId = $_POST["caId"];

  $sqlUpCa = "UPDATE car SET carType = '$upCaName',avaPeople = $upCaAvPeo WHERE carID = $upCaId";
  if (mysqli_query($con, $sqlUpCa)) {
    echo "<script>alert('Car Information updated successfully');
        window.location.replace('viewCar.php');</script>";
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
            <h3 class="page-title fs-4"> Update Cars </h3>
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
                  <h4 class="card-title text-info fs-5">Update Car Form</h4>
                  <?php
                  if(isset($_GET['upCar'])){
                    $caId = $_GET["upCar"];
                    $sqlCa = "SELECT * FROM car WHERE carID = $caId";
                    $resultCa = mysqli_query($con, $sqlCa);
                    while ($rowCa = mysqli_fetch_array($resultCa)) {           
                  ?>
                    <form class="forms-sample" method="post">
                      <input type="hidden" class="form-control" id="caId" placeholder="" value="<?php echo $rowCa['carID'] ?>" name="caId">
                      <div class="form-group">
                        <label for="exampleInputCar">Car Type Name</label>
                        <input type="text" class="form-control" id="exampleInputCar" placeholder="" value="<?php echo $rowCa['carType'] ?>" name="cName">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputAvPeo">Available People</label>
                        <input type="number" class="form-control" id="exampleInputAvPeo" placeholder="" value="<?php echo $rowCa['avaPeople'] ?>" name="caAvPeo">
                      </div>
                      <button type="submit" class="btn btn-gradient-info me-2" name="upCar">Update</button>
                    </form>
                  <?php } 
                  }else{
                    header("Location : index.php");
                  }
                    ?>
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