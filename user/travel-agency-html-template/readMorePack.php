<?php
include("connection/dbcon.php");
include("connection/loginCookies.php");
$ernop = '';

if (isset($_POST['chgBook'])) {
    $pgId = $_POST['pgId'];
    $nOfPeo = trim($_POST['nOfPeo']); // Trim to remove any whitespace

    if (!empty($pgId) && !empty($nOfPeo)) {
        $_SESSION['noInfo']['pgId'] = $pgId;
        $_SESSION['noInfo']['nOfPeo'] = $nOfPeo;
        echo "<script>window.location.replace('booking.php?');</script>";
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    } else {
        $ernop = "Please fill in the number of persons";
        // Optionally, save the error in session to display on the redirected page
        $_SESSION['error'] = $ernop;
        echo "<script>window.location.replace('readMorePack.php?reMorePg=$pgId');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
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
        <?php include('header.php');
        if (!isset($_GET["reMorePg"])) {
            echo "<script>
                    window.location.replace('package.php')</script>";
            exit();
        } else {
            $pgId = $_GET["reMorePg"];
            $sqlmore = "SELECT 
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
                        WHERE p.pgID = " . $pgId;

            $result = mysqli_query($con, $sqlmore);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dateStr = explode(" : ", $row["pgLeaveDate"]);
                    $date = trim($dateStr[0]);
                    $time = trim($dateStr[1]);
                    $timeAr = explode(':', $time);
                    $timeStr = "";
                    $timeRes = $timeAr[0] - 12;
                    if ($timeRes >= 0) {
                        $timeStr = $timeRes . ":" . $timeAr[1] . " Pm";
                    } else {
                        $timeStr = $timeRes . ":" . $timeAr[1] . " Am";
                    }

        ?>

                    <!-- Banner Section -->
                    <div class="banner">
                        <img class="img-fluid" src="../../mainImg/<?php echo $row["pgImg"]; ?>" alt="">
                    </div>

                    <!-- Package Details -->
                    <div class="container mt-5">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-8">
                                <h3 class="fw-bold"><?php echo $row["pgtitle"]; ?></h3>
                                <div class="d-flex border-bottom my-4 shadow-sm py-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row["plName"]; ?></small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-hotel text-primary me-2"> </i><?php echo $row["hoName"]; ?></small>
                                    <small class="flex-fill text-center py-2"></i><i class="fas fa-car text-primary me-2"></i><?php echo $row["carType"]; ?></small>
                                </div>
                                <!-- <div class="d-flex border-bottom my-4 shadow-sm py-2 mb-5 wow fadeInUp" data-wow-delay="0.3s">
                                    <small class="flex-fill text-center border-end py-2"><i class="bi bi-calendar-range-fill text-primary me-2"></i><?php echo $row["pgduration"]; ?> Days</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $date ?></small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-clock text-primary me-2"></i><?php echo $timeStr ?></small>
                                </div> -->

                                <!-- Additional Information Section -->
                                <div class="my-4 wow fadeInUp" data-wow-delay="0.5s">
                                    <h5 class="fw-bold mb-3">Amazing Adventure</h5>
                                    <p>
                                        <i class="bi bi-calendar-range-fill text-primary me-2"></i>Duration:<strong> <?php echo $row["pgduration"]; ?> Days</strong>
                                    </p>
                                    <p>
                                        <i class="fa fa-clock text-primary me-2"></i>Departure Time: <strong> <?php echo $timeStr ?></strong>
                                    </p>
                                    <p>
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>Departure Date:<strong> <?php echo $date ?></strong>
                                    </p>
                                </div>

                                <!-- Additional Information Section -->
                                <div class="mb-3 wow fadeInUp" data-wow-delay="0.7s">
                                    <h5 class="fw-bold">Additional Information</h5>
                                    <ul class="list-unstyled">
                                        <li><?php echo nl2br($row["pgInfo"]); ?></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-4">
                                <div class="card shadow-lg rounded-3 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="card-body p-4">
                                        <h5 class="card-title text-center fs-4 fw-bold border-bottom pb-3">
                                            MMK <?php echo $row["pgPrice"]; ?>
                                            <small class="text-primary fs-6"> / per traveler</small>
                                        </h5>
                                        <p>
                                            <i class="fas fa-solid fa-user-check text-primary me-2"></i>Available People:<strong> <?php echo $row["numOfPeo"]; ?> </strong>
                                        </p>
                                        <p>
                                            <?php
                                            $sqlAvNum = "SELECT SUM(bk.bkPQ) AS totalPQ FROM bookingDetail bk
                                                        LEFT JOIN booking b ON bk.bID = b.bID
                                                        WHERE bk.pgID = $pgId and b.bstatus= 'Confirmed'";
                                            $resultAv = mysqli_query($con, $sqlAvNum);

                                            if ($resultAv) {
                                                $rowAv = mysqli_fetch_assoc($resultAv);
                                                $remainingSeats = $row["numOfPeo"] - $rowAv["totalPQ"];
                                                if ($remainingSeats != 0) {
                                            ?>
                                                    <i class="fas fa-solid fa-couch text-primary me-2"></i>Availability:
                                                    <strong><span class="text-primary"> ( <?php echo $remainingSeats; ?> out of <?php echo $row["numOfPeo"]; ?> )</span> seats remaining</strong>
                                                <?php } else { ?>
                                                    <i class="fas fa-solid fa-couch text-primary me-2 text-danger"></i><strong class="text-danger">All seats are fully booked.</strong>
                                        </p>
                                    <?php } ?>
                                    </p>
                                    <p class="border-bottom pb-2">
                                        <i class="fa fa-user text-primary me-2"></i> Guide: <strong><?php echo $row["guName"]; ?></strong>
                                    </p>
                                    <form action="" method="POST">
                                        <input type="hidden" name="pgId" value="<?php echo $row["pgID"]; ?>">
                                        <label class="form-label text-muted">Please Fill<strong> (Number Of People)</strong></label>
                                        <div class="form-floating">
                                            <input type="number" class="form-control bg-transparent rounded-3" id="numOfPeo" placeholder="Number Of People" min="1" max="<?php echo $remainingSeats; ?>" name="nOfPeo" oninput="checkSeats(this)">
                                            <label for="numOfPeo">No. Of Persons</label>
                                            <p id="seatWarning" style="display: none;" class="text-danger my-2">Can't book, <?php echo $remainingSeats > 0 ? $remainingSeats : "No"; ?> seats available!</p>
                                        </div>
                                        <?php if (isset($_SESSION['error'])) { ?>
                                            <p class="text-danger m-0"><?php echo  $_SESSION['error']; ?></p>
                                        <?php } ?>
                                        <button type="submit" name="chgBook" class="btn btn-primary w-100 rounded-3 py-2 fs-5 mt-2">Book Now</button>
                                    </form>
                                <?php }
                                ?>
                                <script>
                                    function checkSeats(input) {
                                        let remainingSeats = <?php echo $remainingSeats; ?>;
                                        let selectedSeats = parseInt(input.value);

                                        if (selectedSeats > remainingSeats) {
                                            document.getElementById("seatWarning").style.display = "block";
                                            input.value = remainingSeats > 0 ? remainingSeats : "";
                                        } else {
                                            document.getElementById("seatWarning").style.display = "none";
                                        }

                                        if (remainingSeats == 0) {
                                            input.value = "";
                                            document.getElementById("seatWarning").style.display = "block";
                                        }
                                    }
                                </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php }
            }
        } ?>
    </div>
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
</body>

</html>