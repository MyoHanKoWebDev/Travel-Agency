<?php
include("connection/dbcon.php");
include("connection/auth.php");
include("connection/backendcode.php");

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
        <!-- partial:partials/_navbar.html -->
        <?php include("partials/navbar.php"); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include("partials/sidebar.php"); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title fs-4"> View Packages</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-info fs-5">Packages Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> # </th>
                                                    <th scope="col"> Place Image </th>
                                                    <th scope="col"> Package Title </th>
                                                    <th scope="col"> Price</th>
                                                    <th scope="col"> Duration </th>
                                                    <th scope="col"> Leave Date and Time</th>
                                                    <th scope="col"> Available People</th>
                                                    <th scope="col"> Created </th>
                                                    <th scope="col"> Updated </th>
                                                    <th scope="col"> Place </th>
                                                    <th scope="col"> Hotel </th>
                                                    <th scope="col"> Guide </th>
                                                    <th scope="col"> Car </th>
                                                    <th scope="col"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "SELECT 
                                                        p.*, 
                                                        pl.plName, 
                                                        g.guName, 
                                                        c.carType, 
                                                        h.hoName 
                                                        FROM package p
                                                        LEFT JOIN place pl ON p.plID = pl.plID
                                                        LEFT JOIN guide g ON p.guID = g.guID
                                                        LEFT JOIN car c ON p.carID = c.carID
                                                        LEFT JOIN hotel h ON p.hotID = h.hotID
                                                        WHERE pgStatus = 'active'
                                                        ORDER BY p.pgCreated DESC";

                                                $result = mysqli_query($con, $sql);
                                                $counter = 1;

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $counter++; ?></th>
                                                            <td class="py-1">
                                                                <img src="../../mainImg/<?php echo $row["pgImg"]; ?>" alt="image" />
                                                            </td>
                                                            <td><?php echo $row["pgtitle"]; ?></td>
                                                            <td>MMK <?php echo $row["pgPrice"]; ?></td>
                                                            <td><?php echo $row["pgduration"]; ?> Days</td>
                                                            <td><?php echo $row["pgLeaveDate"]; ?></td>
                                                            <td><?php echo $row["numOfPeo"]; ?></td>
                                                            <td><?php echo timeAgo($row["pgCreated"]); ?></td>
                                                            <td><?php
                                                                $updated = $row["pgUpdated"] == Null ? "Not yet updated" : timeAgo($row["pgUpdated"]);

                                                                echo $updated ?></td>
                                                            <td><?php echo $row["plName"]; ?></td>
                                                            <td><?php echo $row["hoName"]; ?></td>
                                                            <td><?php echo $row["guName"]; ?></td>
                                                            <td><?php echo $row["carType"]; ?></td>
                                                            <td>
                                                                <a href="upPack.php?upPg=<?php echo $row["pgID"]; ?>" class="me-1 p-2 badge badge-info text-decoration-none">Update</a>
                                                                <a href="delete.php?dePg=<?php echo $row["pgID"]; ?>" class="p-2 badge badge-danger text-decoration-none" onclick="return confirm('Do you really want to Delete?');">Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>