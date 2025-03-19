<?php
include("connection/dbcon.php");
include("connection/loginCookies.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>26th street, between 90th and 91th streets, Mandalay, Myanmar</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+95 942589 9945</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>travelagencymdy@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <?php include('header.php') ?>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Packages</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Packages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="container position-absolute top-100 start-50 translate-middle">
            <form method="GET" action="" class="p-4 shadow rounded-3 bg-white animated slideInDown mb-5 mb-lg-0">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="destination" class="form-label">Destination</label>
                        <select id="destination" name="destination" class="form-select rounded-3">
                            <option value="">Select Duration</option>
                            <?php

                            $sql = "SELECT * FROM place";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $select = isset($_GET['destination']) && $_GET['destination'] == $row['plID'] ? 'selected' : '';
                                    echo "<option value='{$row['plID']}' {$select}>{$row['plName']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="duration" class="form-label">Duration</label>
                        <select id="duration" name="duration" class="form-select rounded-3">
                            <option value="" disabled selected>Select Duration</option>
                            <option value="0" <?php isset($_GET['duration']) && $_GET['duration'] == '0' ? 'selected' : ''; ?>>Less than 5 days</option>
                            <option value="1" <?php isset($_GET['duration']) && $_GET['duration'] == '1' ? 'selected' : ''; ?>>5-7 days</option>
                            <option value="2" <?php isset($_GET['duration']) && $_GET['duration'] == '2' ? 'selected' : ''; ?>>More than 7 days</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="budget" class="form-label">Budget</label>
                        <select id="budget" name="budget" class="form-select rounded-3">
                            <option value="" disabled selected>Select Budget</option>
                            <option value="low" <?php isset($_GET['budget']) && $_GET['budget'] == 'low' ? 'selected' : ''; ?>>Low</option>
                            <option value="medium" <?php isset($_GET['budget']) && $_GET['budget'] == 'medium' ? 'selected' : ''; ?>>Medium</option>
                            <option value="high" <?php isset($_GET['budget']) && $_GET['budget'] == 'high' ? 'selected' : ''; ?>>High</option>
                        </select>
                    </div>
                    <div class="text-center col-md-3">
                        <button type="submit" class="btn btn-primary w-100 py-3 rounded-3">
                            <i class="fas fa-search me-2"></i> Search Packages
                        </button>
                    </div>
                </div>

            </form>
        </section>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container mt-5 mt-md-5">
            <div class="text-center wow fadeInUp mt-5 mt-md-0" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-md-5 mb-3">Awesome Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php
                $destination = $_GET['destination'] ?? '';
                $duration  = $_GET['duration'] ?? '';
                $budget = $_GET['budget'] ?? '';

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
                WHERE pgStatus = 'active'";

                $packagesPerPage = 6; // Show 6 packages per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $packagesPerPage;

                $totalPackagesQuery = "SELECT COUNT(*) as total FROM package WHERE pgStatus = 'active'";
                $totalPackagesResult = mysqli_query($con, $totalPackagesQuery);
                $totalPackagesRow = mysqli_fetch_assoc($totalPackagesResult);
                $totalPackages = $totalPackagesRow['total'];

                $totalPages = ceil($totalPackages / $packagesPerPage);



                if ($destination) {
                    $sql .= " AND p.plID = '$destination'";
                }
                if ($duration !== '') {
                    if ($duration == '0') {
                        $sql .= " AND p.pgduration < 5";
                    } elseif ($duration == '1') {
                        $sql .= " AND p.pgduration BETWEEN 5 AND 7";
                    } elseif ($duration == '2') {
                        $sql .= " AND p.pgduration > 7";
                    }
                }

                if ($budget != '') {
                    if ($budget == 'low') {
                        $sql .= " AND p.pgPrice < '200,000'";
                    } elseif ($budget == 'medium') {
                        $sql .= " AND p.pgPrice BETWEEN '200,000' AND '400,000'";
                    } else {
                        $sql .= " AND p.pgPrice > '400,000'";
                    }
                }
                $sql .= " ORDER BY pgCreated DESC";
                $sql .= " LIMIT $packagesPerPage OFFSET $offset";


                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $wonDelay = 0.1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $wonDelay = $wonDelay + 0.2;
                ?>
                        <div class="col-lg-4 col-md-6 rounded-2 wow fadeInUp" data-wow-delay="<?php echo $wonDelay . 's'; ?>">
                            <div class="package-item">
                                <div class="img-con overflow-hidden">
                                    <img class=" img-fluid" src="../../mainImg/<?php echo $row["pgImg"]; ?>" alt="" onclick="myfun3(<?php echo $row['pgID'] ?>)">
                                    <!-- Ribbon inside the same container -->

                                    <?php
                                    if (isset($_SESSION['cusArr1']['cusID'])) {
                                        $cusId = $_SESSION['cusArr1']['cusID'];
                                        $pgId = $row['pgID'];

                                        $sqlStatus = "SELECT bd.pgID, bk.cusID , bk.bstatus , pg.pgtitle
                                                         FROM bookingdetail bd
                                                         LEFT JOIN booking bk ON bd.bID = bk.bID
                                                         LEFT JOIN package pg ON bd.pgID = pg.pgID
                                                         WHERE bd.pgID = $pgId AND bk.cusID = $cusId";
                                        $reSt = mysqli_query($con, $sqlStatus);
                                        $alerts = []; // Initialize the alerts array
                                        if (mysqli_num_rows($reSt) > 0) {
                                            $status = 'Pending';
                                            while ($rowSt = mysqli_fetch_assoc($reSt)) {
                                                $pgName = $rowSt['pgtitle'];
                                                if ($rowSt['bstatus'] == 'Pending') {
                                                    $status = "Pending";
                                    ?>
                                                    <div class="ribbon ribbon-top-left text-center"><span class="bg-warning text-white"><?php echo $rowSt["bstatus"]; ?></span></div>
                                                <?php       } else if ($rowSt['bstatus'] == 'Confirmed') {
                                                    $status = "Confirmed";
                                                ?>
                                                    <div class="ribbon ribbon-top-left text-center"><span class="bg-primary text-white"><?php echo $rowSt["bstatus"]; ?></span></div>
                                                <?php       } else if ($rowSt['bstatus'] == 'Rejected') {
                                                    $status = "Rejected";
                                                ?>
                                                    <div class="ribbon ribbon-top-left text-center"><span class="bg-danger text-white"><?php echo $rowSt["bstatus"]; ?></span></div>
                                    <?php }
                                                // Append to alerts array
                                                $alerts[] = [
                                                    'status' => $status,
                                                    'pgName' => $pgName
                                                ];
                                                echo "<script>
                                                            alerts.push({status: '$status', pgName: '$pgName'});</script>";
                                            }
                                        }
                                        echo "<script>
                                        let alerts = " . json_encode($alerts) . ";
                                      </script>";
                                    }
                                    ?>
                                </div>
                                <!-- The rest of your package item content -->
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row["plName"]; ?>
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $row["pgduration"]; ?> Days
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i class="fa fa-user text-primary me-2"></i><?php echo $row["numOfPeo"]; ?> People
                                    </small>
                                </div>
                                <div class="text-center p-4">
                                    <h4 class="mb-0 fs-5">MMK <?php echo $row["pgPrice"]; ?></h4>
                                    <div class="mb-3">
                                        <p><?php echo $row["pgtitle"]; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="readMorePack.php?reMorePg=<?php echo $row["pgID"]; ?>" class="btn btn-sm btn-primary px-5 py-2 border-end" style="border-radius: 30px 30px;">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                <?php }
                }
                ?>
                <?php
                if ($totalPages > 1) {
                    echo '<div class="d-flex justify-content-center mt-5">';
                    echo '<ul class="pagination">';

                    // Previous Button
                    if ($page > 1) {
                        echo '<li class="page-item me-2"><a class="page-link rounded-circle px-3 py-2 border-primary" href="?page=' . ($page - 1) . '" aria-label="Previous"><span class="fw-bold" aria-hidden="true">&laquo;</span></a></li>';
                    }

                    // Page Number Links
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = ($i == $page) ? 'active' : '';
                        echo '<li class="page-item  ' . $activeClass . ' me-2"><a class="page-link rounded-circle px-3 py-2 border-primary " href="?page=' . $i . '">' . $i . '</a></li>';
                    }

                    // Next Button
                    if ($page < $totalPages) {
                        echo '<li class="page-item"><a class="page-link rounded-circle px-3 py-2 border-primary" href="?page=' . ($page + 1) . '" aria-label="Next"><span class="fw-bold" aria-hidden="true">&raquo;</span></a></li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                }

                ?>
                <!-- Package End -->
                <div class="text-center">
                    <a href="package.php" class="btn btn-primary rounded-3 px-4 py-2">VIEW ALL PACKAGES</a>
                </div>

            </div>
        </div>
    </div>

    <?php
    if (!isset($_SESSION['cusArr1']['cusID'])) {
    ?>
        <div class="alert-container">
            <div class="alert alert-danger alert-dismissible fade show alert-con wow fadeInUp rounded-3" data-wow-delay="0.1s" role="alert">
                <p class="alert-heading text-dark fs-5 fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> Login or Register Required!</p>
                <hr>
                <p class="text-muted">You must login or register to view your package booking details.If you have booked!</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

    <?php
    }

    ?>

    <div id="alert-container" class="alert-container"></div>


    <?php include('footer.php') ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="js/code.js"></script>

    <script>
        function myfun3(id) {
            window.location.href = "readMorePack.php?reMorePg=" + id;
        }
    </script>

</body>

</html>