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
            <h3 class="page-title fs-4"> Update Package </h3>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-info fs-5">Update Package Form</h4>
                  <?php
                  if (isset($_GET['upPg'])) {
                    $upPgId = $_GET['upPg'];
                    $sqlPg = "SELECT * FROM package WHERE pgID = $upPgId";
                    $result = mysqli_query($con, $sqlPg);
                    while ($row = mysqli_fetch_array($result)) {
                  ?>
                      <form class="forms-sample" method="post" enctype="multipart/form-data" action="connection/backendcode.php">
                        <input type="hidden" class="form-control" id="upPgId" placeholder="" name="upPgId" value="<?php echo $row['pgID']; ?>">
                        <div class="form-group">
                          <label for="exampleInputTitle">Title</label>
                          <input type="text" class="form-control" id="exampleInputTitle" placeholder="" value="<?php echo $row['pgtitle']; ?>" name="upPgTt">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Price</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-gradient-info text-white">MMK</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $row['pgPrice'] ?>" name="upPgPrice">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputDuration">Duration:Day</label>
                          <input type="number" class="form-control" id="exampleInputDuration" placeholder="Duration" min="1" value="<?php echo $row['pgduration']  ?>" name="upPgDu">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNumPeo">Available People</label>
                          <input type="number" class="form-control" id="exampleInputNumPeo" placeholder="Available People" min="1" value="<?php echo $row['numOfPeo']; ?>" name="upPgNumOfPeo">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputCurImg">Current Image</label>
                          <input type="hidden" class="form-control" id="exampleInputCurImg" value="<?php echo $row['pgImg']; ?>" name="oldImg">
                          <img src="../../mainImg/<?php echo $row["pgImg"]; ?>" class="d-block w-25 h-25 rounded-3">
                        </div>
                        <div class="form-group">
                          <input type="file" name="upPgImg" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-info py-3" type="button">Upload</button>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputLeaDate">Leave Date and Time</label>
                          <?php $dateStr = explode(" : ", $row["pgLeaveDate"]);
                          $date = trim($dateStr[0]);
                          $time = trim($dateStr[1]); ?>
                          <input type="date" id="inputdate" class="form-control mb-3" id="exampleInputLeaDate" placeholder="" min="2024-12-31" value="<?php echo $date ?>" name="upPgDate">
                          <input type="time" class="form-control" id="exampleInputLeaveTime" placeholder="" value="<?php echo $time ?>" name="upPgTime">
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group ">
                              <label for="examplePlace">Place </label>
                              <select class="form-select" id="examplePlace" name="upPgPl">
                                <?php
                                $sql2 = "SELECT * FROM place WHERE plID=".$row['plID'];
                                $res2 = mysqli_query($con, $sql2);
                                $row6 = mysqli_fetch_assoc($res2);

                                $sql = "SELECT * FROM place";
                                $res = mysqli_query($con, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<option value='{$row6['plID']}' selected>{$row6['plName']}</option>";
                                  while ($row1 = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row1['plID']}'>{$row1['plName']}</option>";
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group ">
                              <label for="exampleCar">Car </label>
                              <select class="form-select" id="exampleCar" name="upPgCa">
                                <?php
                                $sql2 = "SELECT * FROM car WHERE carID=".$row['carID'];
                                $res2 = mysqli_query($con, $sql2);
                                $row7 = mysqli_fetch_assoc($res2);

                                $sql = "SELECT * FROM car";
                                $res = mysqli_query($con, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<option value='{$row7['carID']}' selected>{$row7['carType']}</option>";
                                  while ($row2 = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row2['carID']}'>{$row2['carType']}</option>";
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
                              <label for="exampleHotel">Hotel </label>
                              <select class="form-select" id="exampleHotel" name="upPgHo">
                                <?php
                                $sql2 = "SELECT * FROM hotel WHERE hotID=".$row['hotID'];
                                $res2 = mysqli_query($con, $sql2);
                                $row8 = mysqli_fetch_assoc($res2);

                                $sql = "SELECT * FROM hotel";
                                $res = mysqli_query($con, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<option value='{$row8['hotID']}' selected>{$row8['hoName']}</option>";
                                  while ($row3 = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row3['hotID']}'>{$row3['hoName']}</option>";
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleGuide">Guide </label>
                              <select class="form-select" id="exampleGuide" name="upPgGu">
                                <?php
                                $sql2 = "SELECT * FROM guide WHERE guID=".$row['guID'];
                                $res2 = mysqli_query($con, $sql2);
                                $row9 = mysqli_fetch_assoc($res2);

                                $sql = "SELECT * FROM guide";
                                $res = mysqli_query($con, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<option value='{$row9['guID']}'  selected>{$row9['guName']}</option>";
                                  while ($row4 = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row4['guID']}'>{$row4['guName']}</option>";
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="examplePackInfo">Detail Information<span> (Plese make information wiht list)</span></label>
                          <textarea class="form-control" id="examplePackInfo" rows="4" name="upPgDIn"><?php echo $row['pgInfo']; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-gradient-info me-2" name="upPg">Update</button>
                      </form>
                  <?php }
                  } else {
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