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
                        <h3 class="page-title fs-4">Booking Table</h3>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-info fs-5">Pending Booking Table</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Package Title</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Number Of Pepole</th>
                                                <th scope="col">Booking Date</th>
                                                <th scope="col">Pyament Name</th>
                                                <th scope="col">Check Payment</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT bd.*, bk.*, pg.* 
                                            FROM bookingdetail bd
                                            LEFT JOIN booking bk ON bd.bID = bk.bID
                                            LEFT JOIN package pg ON bd.pgID = pg.pgID
                                            WHERE bstatus = 'Pending'
                                            ORDER BY bk.bDate DESC";

                                            $res = mysqli_query($con, $sql);
                                            $count = 1;

                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $modalId = "paymentModal_" . $row['bID']; // Unique modal ID
                                            ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $count++ ?></th>
                                                        <td><?php echo $row['pgtitle'] ?></td>

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
                                                        <td><?php echo !empty($row['bDate']) ? timeAgo($row['bDate']) : "No date available"; ?></td>

                                                        <?php
                                                        $sqlPy = "SELECT p.pyType, bk.bID FROM booking bk
                                                        LEFT JOIN payment p ON p.pyID = bk.pyID                                                   
                                                        WHERE bID = " . $row['bID'];
                                                        $resPy = mysqli_query($con, $sqlPy);
                                                        if (mysqli_num_rows($resPy) > 0) {
                                                            $rowPy = mysqli_fetch_assoc($resPy);
                                                        ?>
                                                            <td><?php echo $rowPy['pyType'] ?></td>
                                                            <td>
                                                                <!-- Use dynamic modal ID for each button -->
                                                                <button class="p-2 badge badge-success text-decoration-none"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#<?php echo $modalId; ?>">
                                                                    Click To Check
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="conBook.php?conID=<?php echo $row['bID'] ?>" class="me-1 p-2 badge badge-info text-decoration-none">Confirm</a>
                                                                <a href="rejBook.php?rejID=<?php echo $row['bID'] ?>" class="p-2 badge badge-danger text-decoration-none">Reject</a>
                                                            </td>

                                                            <!-- Unique Modal for each row -->
                                                            <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="<?php echo $modalId; ?>Label" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-info fs-4" id="<?php echo $modalId; ?>Label">Payment Details</h5>
                                                                            <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p class="fs-5 px-3 py-1 text-white badge-success d-inline-block rounded mb-3">
                                                                                <?php echo $rowPy['pyType'] ?>
                                                                            </p>
                                                                            <img src="../../mainImg/<?php echo $row['payimg'] ?>"
                                                                                alt="Payment Image"
                                                                                class="img-fluid"
                                                                                style="min-height: 550px;" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
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
    <!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        const paymentModal = document.getElementById('paymentModal');
        const modalImage = document.getElementById('modalImage');
        
        paymentModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget; // Button that triggered the modal
            const rowId = button.getAttribute('data-rowid'); // Extract row ID
            const imageUrl = `getPaymentImage.php?id=${rowId}`; // Replace with your PHP endpoint
            modalImage.src = imageUrl;
        });
    });
</script> -->
</body>

</html>