<?php
include("connection/dbcon.php");
include("connection/auth.php");
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
            <h3 class="page-title fs-4"> Add New Packages </h3>
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
                  <h4 class="card-title text-info fs-5">Package Form</h4>

                  <form class="forms-sample" method="post" enctype="multipart/form-data" action="connection/backendcode.php">
                    <div class="form-group">
                      <label for="exampleInputTitle">Title</label>
                      <input type="text" class="form-control" id="exampleInputTitle" placeholder="Package Title" name="packTt" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Price</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-gradient-info text-white">MMK</span>
                        </div>
                        <input type="text" class="form-control" name="packPr" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDuration">Duration:Day</label>
                      <input type="number" class="form-control" id="exampleInputDuration" placeholder="Duration" min="1" name="packDu" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumPeo">Available People</label>
                      <input type="number" class="form-control" id="exampleInputNumPeo" placeholder="Available People" min="1" name="packAp" required>
                    </div>
                    <div class="form-group">
                      <label>Place Image</label>
                      <input type="file" name="packImg" class="file-upload-default" required>
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image"> 
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-info py-3" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLeaDate">Leave Date and Time</label>
                      <input type="date" id="inputdate" class="form-control mb-3" id="exampleInputLeaDate" placeholder="" min="2024-12-31" name="packDt" required>
                      <input type="time" class="form-control" id="exampleInputLeaveTime" placeholder="" name="packTime" required>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label for="examplePlace">Place</label>
                          <select class="form-select" id="examplePlace" name="packPl" required>
                            <?php
                            $sql = "SELECT * FROM place";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['plID']}'>{$row['plName']}</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label for="exampleCar">Car</label>
                          <select class="form-select" id="exampleCar" name="packCa" required>
                            <?php
                            $sql = "SELECT * FROM car"; 
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['carID']}'>{$row['carType']}</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label for="exampleHotel">Hotel</label>
                          <select class="form-select" id="exampleHotel" name="packHo" required>
                            <?php
                            $sql = "SELECT * FROM hotel";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['hotID']}'>{$row['hoName']}</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleGuide">Guide</label>
                          <select class="form-select" id="exampleGuide" name="packGu" required>
                            <?php
                            $sql = "SELECT * FROM guide";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['guID']}'>{$row['guName']}</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="examplePackInfo">Detail Information <span> (Plese make information wiht list)</span></label>
                      <textarea class="form-control" id="examplePackInfo" rows="4" name="packDIn" placeholder="Your Pakcage Details Information"></textarea>
                    </div>

                    <button type="submit" class="btn btn-gradient-info me-2" name="addPack">Add Package</button>
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
  <script>
    $(function() {
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10)
        month = '0' + month.toString();
      if (day < 10)
        day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;
      $('#inputdate').attr('min', maxDate);
    });
  </script>
</body>

</html>