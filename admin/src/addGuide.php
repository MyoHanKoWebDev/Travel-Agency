<?php
include("connection/dbcon.php");
include("connection/auth.php");

if (isset($_POST["addGuide"])) {
  $guideName = $_POST["gName"];
  $guideLan = $_POST["gLan"];

  $file = $_FILES['guideImg'];
  $fileName = $_FILES['guideImg']['name'];
  $fileTmpName = $_FILES['guideImg']['tmp_name'];

  $fileExt = explode(".", $fileName);
  $fileActExt = strtolower(end($fileExt));
  $allowedExt = array("png", "jpeg", "jpg", "pdf", "webp");

  $sqlTest = "SELECT * FROM guide WHERE guName = '$guideName' AND guLanguage = '$guideLan'";
  $resultTest = mysqli_query($con, $sqlTest);
  if (mysqli_num_rows($resultTest) > 0) {
    echo "<script> 
        alert('" . $guideName . " and ".$guideLan." already existed.');
        window.location.replace('addGuide.php');
        </script>";
  } else {
    if (in_array($fileActExt, $allowedExt)) {
      $fileNewName = uniqid('', true) . '.' . $fileActExt;
      $fileDestination = "../../mainImg/" . $fileNewName;
      move_uploaded_file($fileTmpName, $fileDestination);
      $sql = "INSERT INTO guide (guImg,guName,guLanguage) VALUES ('$fileNewName','$guideName','$guideLan')";
      $result = mysqli_query($con, $sql);
      if ($result) {
        echo "<script> 
      alert('Guide information inserted successfully.');
      window.location.replace('viewGuide.php');
      </script>";
      } else {
        echo "<script>alert('Error to add guide information: " . mysqli_error($con) . "');
                    window.location.replace('addGuide.php')
                     </script>";
      }
    } else {
      echo "<script>alert('Please upload jpg, png, jpeg, pdf, webp formats only');
          window.location.replace('addGuide.php');</script>";
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
            <h3 class="page-title fs-4"> Add New Guides </h3>
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
                  <h4 class="card-title text-info fs-5">Guide Form</h4>

                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputGuide">Guide Name</label>
                      <input type="text" class="form-control" id="exampleInputGuide" placeholder="Guide Name" name="gName" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputGuLa">Language</label>
                      <input type="text" class="form-control" id="exampleInputGuLa" placeholder="Language" name="gLan" required>
                    </div>
                    <div class="form-group">
                      <label>Guide Image</label>
                      <input type="file" name="guideImg" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-info py-3" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-info me-2" name="addGuide">Add Guide</button>
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