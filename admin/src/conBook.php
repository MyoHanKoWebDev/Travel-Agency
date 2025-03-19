<?php
include("connection/dbcon.php");
include("connection/auth.php");
include("connection/backendcode.php");

if (isset($_GET['conID'])) {
    $conId = $_GET['conID'];
    $sqlCon = "UPDATE booking SET bstatus = 'Confirmed' WHERE bID = $conId";
    if (mysqli_query($con, $sqlCon)) {
        echo "<script>
        window.location.replace('conBook.php')
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
    <title>Travel Agency</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
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
                        <h3 class="page-title">Booking Table</h3>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-info fs-5">Confrimed Booking Table</h4>
                                <form method="GET" action="" class="bg-white my-3 pb-3 border-bottom">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-3">
                                            <label for="plTitle" class="form-label">Place Title</label>
                                            <input type="text" id="plTitle" name="plTitle" class="form-control rounded-3" placeholder="Search By Customer Name" value="<?php $_GET['plTitle'] ?? '' ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="destination" class="form-label">Destination</label>
                                            <select id="destination" name="destination" class="form-select rounded-3">
                                                <option value="" disabled selected>Select Destination</option>
                                                <?php
                                                $sql = "SELECT * FROM place";
                                                $res1 = mysqli_query($con, $sql);
                                                if (mysqli_num_rows($res1) > 0) {
                                                    while ($row1 = mysqli_fetch_assoc($res1)) {
                                                        $select = isset($_GET['destination']) && $_GET['destination'] == $row1['plID'] ? 'selected' : '';
                                                        echo "<option value='{$row1['plID']}' {$select}>{$row1['plName']}</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="filter" class="form-label">Filter By Row Number</label>
                                            <input type="number" id="filter" name="filter" placeholder="Type Row Number" class="form-control rounded-3" value="<?php $_GET['filter'] ?? '' ?>">
                                        </div>
                                        <div class="text-center col-md-3">
                                            <button type="submit" class="btn btn-gradient-info w-100 py-3 rounded-3">
                                                <i class="fa fa-search me-2"></i> Search Packages
                                            </button>
                                        </div>
                                        <div class="text-center col-md-3">
                                            <a href="conBook.php" class="btn btn-gradient-info btn-end w-100 py-3 rounded-3">
                                                <i class="fa fa-search me-2"></i> View All
                                            </a>
                                        </div>
                                    </div>

                                </form>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Package Title</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Number Of Pepole</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Booking Date</th>
                                                <th scope="col">PackageStatus</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $plTitle = $_GET['plTitle'] ?? '';
                                            $destination = $_GET['destination'] ?? '';
                                            $filter = $_GET['filter'] ?? '';
                                            $order = $_GET['order'] ?? 'descend';

                                            $sql = "SELECT bd.*, bk.*, pg.* 
                                            FROM bookingdetail bd
                                            LEFT JOIN booking bk ON bd.bID = bk.bID
                                            LEFT JOIN package pg ON bd.pgID = pg.pgID
                                            WHERE bstatus = 'Confirmed'";

                                            if ($plTitle) {
                                                $sql .= " AND pg.pgtitle LIKE '%$plTitle%'";
                                            }
                                            if ($destination) {
                                                $sql .= " AND pg.plID = $destination";
                                            }

                                            $sql .= " ORDER BY bk.bDate DESC";
                                            if ($filter) {
                                                $sql .= " LIMIT $filter";
                                            }

                                            $res = mysqli_query($con, $sql);
                                            $count = 1;

                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count++; ?></th>
                                                        <td><?php echo $row['pgtitle']; ?></td>
                                                        <?php
                                                        $sqlCus = "SELECT c.cusName, bk.bID FROM booking bk
                                                        LEFT JOIN customer c ON c.cusID = bk.cusID                                                   
                                                        WHERE bID = " . $row['bID'];
                                                        $resCus = mysqli_query($con, $sqlCus);
                                                        if (mysqli_num_rows($resCus) > 0) {
                                                            $rowCus = mysqli_fetch_assoc($resCus);
                                                        ?>
                                                            <td><?php echo $rowCus['cusName'] ?></td>
                                                        <?php } ?>
                                                        <td><?php echo $row['bkPQ'] ?></td>
                                                        <td>MMK <?php
                                                            $priceInt = (int)str_replace(",", "", $row['pgPrice']);  // Step 1: Remove commas from input
                                                            $priceFinal = $priceInt * $row['bkPQ'];
                                                            $priceCur = number_format($priceFinal, 0, '', ','); //para,how many deci place,separate deci point char,thousand point char
                                                            $serviceChg = $priceFinal * 0.03; // 3/100 reduce 3%
                                                            $serviceNum = number_format($serviceChg, 0, '', ',');
                                                            echo number_format($serviceChg + $priceFinal, 0, '', ',') ?></td>
                                                        <td><?php echo timeAgo($row['bDate']) ?></td>
                                                        <?php echo $row['pgStatus'] == 'active' ? '<td class = "text-success">Active</td>' : '<td class = "text-danger">Expired</td>'; ?>
                                                        <td class="text-success fw-bold"><?php echo $row['bstatus'] ?></td>
                                                    </tr>

                                            <?php
                                                } // End of while loop
                                            } // End of if condition 
                                            ?>
                                        </tbody>
                                    </table>
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
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <!-- Show modal with row -->
</body>

</html>