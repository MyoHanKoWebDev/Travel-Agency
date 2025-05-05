<?php
session_start();
if (isset($_POST['signIn'])) {
    $adName = $_POST['adminname'];
    $adPass = $_POST['adminpass'];

    if ($adName == "Myo Han Ko" && $adPass == "Admin123") {
        $admin_arr1 = array("name" => $adName, "pass" => $adPass);
        $_SESSION['admin_arr'] = $admin_arr1;
        header("location:index.php");
    } else if ($adName != "Myo Han Ko") {
        echo "<script>
                alert('Username is not correct!');
                window.history.back();
                    </script>";
    } else {
        echo "<script>
            alert('Password is not correct!');
            window.history.back();
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        .login-bg {
            background: url('assets/images/loginbg.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>

</head>

<body>
    <div class="container-scroller ">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth login-bg">
                <div class="row flex-grow">
                    <div class="col-lg-5 mx-auto ">
                        <div class="auth-form-light text-left p-5 rounded-5 border border-dark-subtle">
                            <div class="brand-logo">
                                <p class="brand-logo brand-logo text-info fs-3 fw-bold text-center"><img class="img-fluid me-2" src="../../mainImg/earth (1).png" alt="" style="width: 50px;height:45px;">Travel Agency</p>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="adminname">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="adminpass">
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="signIn">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
</body>

</html>