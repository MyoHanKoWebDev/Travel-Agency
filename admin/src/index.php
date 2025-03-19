<?php
include("connection/dbcon.php");
include("connection/auth.php");
include("connection/backendcode.php");

date_default_timezone_set("Asia/Yangon"); //setting our timezone to fit with my leavedate

$currentDate = date("Y-m-d H:i");

$sqlUpdatePg = "UPDATE package 
                SET pgStatus = 'expired' 
                WHERE STR_TO_DATE(pgLeaveDate, '%Y-%m-%d : %H:%i') <= STR_TO_DATE('$currentDate', '%Y-%m-%d %H:%i') 
                AND pgStatus = 'active'";

if (mysqli_query($con, $sqlUpdatePg)) {
  // echo "Expired packages updated.";
} else {
  echo "Error: " . mysqli_error($con);
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="assets/js/codeChart.js"></script>
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
      <div class="main-panel" id="print">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-info text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <button type="button" class="btn btn-sm bg-white btn-icon-text border-3 ml-3 " onclick="printDashboard()">
                    <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Recently Popular Packages <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                  </h4>
                  <?php
                  $sqlPg = "SELECT COUNT(bd.bkID) AS total_packages
                  FROM package pg
                  JOIN bookingDetail bd ON pg.pgID = bd.pgID
                  JOIN booking b ON bd.bID = b.bID
                  WHERE b.bstatus = 'Confirmed' AND pg.pgStatus = 'active'
                  GROUP BY bd.bkID
                  HAVING SUM(bd.bkPQ) >= 10";
                  $resPg = mysqli_query($con, $sqlPg);
                  if (mysqli_num_rows($resPg) > 0) {
                    $rowPg = mysqli_fetch_assoc($resPg);
                  ?>
                    <h2 class=""><?php echo $rowPg['total_packages']; ?></h2>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Monthly Bookings <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                  </h4>
                  <?php
                  $sqlb = "SELECT DATE_FORMAT(b.bDate, '%Y-%m') AS booking_month, count(b.bID) AS total_bookings
                  FROM booking b
                  GROUP BY booking_month
                  ORDER BY booking_month DESC";
                  $resb = mysqli_query($con, $sqlb);
                  if (mysqli_num_rows($resPg) > 0) {
                    $rowb = mysqli_fetch_assoc($resb);
                  ?>
                    <h2 class=""><?php echo $rowb['total_bookings']; ?></h2>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Visitors Online <i class="fa fa-users fa-24px float-end"></i>
                  </h4>
                  <?php
                  $sqlCus = "SELECT count(cusID) as totalCus FROM customer";
                  $resCus = mysqli_query($con, $sqlCus);
                  if (mysqli_num_rows($resCus) > 0) {
                    $rowCus = mysqli_fetch_assoc($resCus);
                  ?>
                    <h2 class=""><?php echo $rowCus['totalCus']; ?></h2>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="row">
                      <h4 class="col-md-6 card-title float-start">Monthly Income Chart</h4>
                      <div class="col-md-6 form-group row ">
                        <p class="col-sm-6 text-sm-end fs-6 col-form-label">Filter By:</p>
                        <div class="col-sm-6 ">
                          <select id="yearSelect" class="form-control py-3 py-2 fw-bold text-info border-info">
                            <!-- Years will be added dynamically -->
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <canvas id="areaChart" style="max-height:400px;"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h4 class="col-md-6 card-title ">Diamond User List</h4>
                    <div class="col-md-6 form-group row ">
                      <label for="year" class="col-sm-6 text-sm-end fs-6 col-form-label">Filter By:</label>
                      <div class="col-sm-6 ">
                        <input type="number" class="form-control border-warning" name="year" id="year" min="2024" max="<?php echo $manYear = date("Y"); ?>" placeholder="Filter By Year" onkeydown="filterDiaUser(event,this)">
                      </div>
                    </div>
                  </div>
                  <script>
                    function filterDiaUser(event, input) {
                      if (event.key === "Enter") { // Check if Enter key is pressed
                        let curYear = <?php echo date("Y"); ?>;
                        let typeYear = parseInt(input.value);

                        if (typeYear < 2024) {
                          typeYear = 2024;
                        } else if (typeYear > curYear) {
                          typeYear = curYear;
                        }

                        window.location.href = "index.php?filterYear=" + typeYear;
                      }
                    }
                  </script>

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Customer </th>
                          <th> Total Booked People </th>
                          <th> Contact Number </th>
                          <th> Created Account </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        if (isset($_GET['filterYear'])) {
                          $filterYear = $_GET['filterYear'];
                        } else {
                          $filterYear = date('Y');
                        }

                        $sqlDia = "SELECT b.cusID, c.cusName, c.cusImg, c.cusPh, c.created, b.bDate,
                                    COUNT(b.bID) AS total_bookings, 
                                    SUM(bd.bkPQ) AS total_quantity
                                    FROM booking b
                                    JOIN customer c ON b.cusID = c.cusID
                                    JOIN bookingDetail bd ON b.bID = bd.bID
                                    WHERE YEAR(b.bDate) = $filterYear
                                    GROUP BY b.cusID
                                    HAVING total_bookings >= 5  
                                    ORDER BY total_bookings DESC";

                        $resDia = mysqli_query($con, $sqlDia);
                        if (mysqli_num_rows($resDia) > 0) {
                          while ($rowDia = mysqli_fetch_assoc($resDia)) {
                        ?>
                            <tr>
                              <td>
                                <img src="../../mainImg/<?php echo $rowDia['cusImg']; ?>" class="me-2" alt="image"> <?php echo $rowDia['cusName']; ?>
                              </td>
                              <td> <?php echo $rowDia['total_quantity']; ?> </td>
                              <td> <?php echo $rowDia['cusPh']; ?> </td>
                              <td> <?php echo timeAgo($rowDia['created']); ?> </td>
                              <td>
                                <label class="badge badge-gradient-warning py-2 fs-6"><i class="mdi mdi-diamond "></i> Diamond User</label>
                              </td>
                            </tr>
                        <?php }
                        }
                        ?>

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
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->


  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
  <script>
    $(function() {
      'use strict';

      function populateYearDropdown() {
        let currentYear = new Date().getFullYear();
        let select = $('#yearSelect');

        for (let i = currentYear; i >= currentYear - 5; i--) {
          select.append(`<option value="${i}">${i}</option>`);
        }

        select.val(currentYear); // Set default selection to current year
      }

      function fetchMonthlyIncome(year) {
        $.ajax({
          url: 'selectMmIncome.php', // Fetch income data
          type: 'GET',
          data: {
            year: year
          }, // Send selected year
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              updateChart(response.labels, response.data);
            } else {
              console.error("Failed to fetch data:", response.message);
            }
          },
          error: function(xhr, status, error) {
            console.error("Error fetching data:", error);
          }
        });
      }

      function updateChart(labels, data) {
        var ctx = $("#areaChart").get(0).getContext("2d");

        if (window.myChart) {
          window.myChart.destroy(); // Destroy previous chart to prevent duplication
        }

        var areaData = {
          labels: labels,
          datasets: [{
            label: 'Monthly Income',
            data: data,
            backgroundColor: 'rgba(51, 97, 224, 0.2)',
            borderColor: 'rgb(38, 99, 221)',
            borderWidth: 1,
            fill: true,
          }]
        };

        var areaOptions = {
          elements: {
            line: {
              tension: 0.4
            }
          },
          plugins: {
            filler: {
              propagate: true
            }
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        };

        window.myChart = new Chart(ctx, {
          type: 'line',
          data: areaData,
          options: areaOptions
        });
      }

      // Initialize dropdown and fetch default data
      populateYearDropdown();
      fetchMonthlyIncome($('#yearSelect').val());

      // Fetch new data when the year is changed
      $('#yearSelect').change(function() {
        fetchMonthlyIncome($(this).val());
      });
    });

    function printDashboard() {
      window.print(); // Opens print dialog to print the page
    }
  </script>

</body>

</html>