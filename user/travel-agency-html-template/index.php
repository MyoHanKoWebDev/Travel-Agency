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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Experience the beauty and culture of Myanmar with our exclusive packages</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Service Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">Why Choose Our Travel Agency</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded-3 pt-3" style="height: 300px;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Explore Myanmar’s Beauty</h5>
                            <p>Discover breathtaking destinations across Myanmar, including Mandalay, Yangon, and Bagan, with our well-planned travel packages.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded-3 pt-3" style="height: 300px;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Seamless Booking & Stay</h5>
                            <p>Our online system allows hassle-free booking, ensuring smooth travel arrangements and comfortable accommodations for every journey.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded-3 pt-3" style="height: 300px;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>Experienced Travel Guides</h5>
                            <p>Our professional guides offer local expertise and ensure a safe, enjoyable, and informative journey tailored to your preferences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded-3 pt-3" style="height: 300px;">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                            <h5>Reliable Customer Support</h5>
                            <p>With our user-friendly platform and dedicated team, customers can access travel details, book trips, and receive support anytime, anywhere.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Destination Start -->
    <div class="container-xxl py-4 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Popular Destination</h1>
            </div>
            <div class="row g-3">
                <?php
                $sql = "SELECT pg.pgImg, pg.pgtitle, pg.pgID
                        FROM package pg
                        JOIN bookingDetail bd ON pg.pgID = bd.pgID
                        JOIN booking b ON bd.bID = b.bID
                        WHERE b.bstatus = 'Confirmed' AND bd.bkPQ >= 5 AND pg.pgStatus = 'active'
                        GROUP BY pg.pgID
                        ORDER BY COUNT(bd.bkPQ) DESC
                        LIMIT 4";

                $result = $con->query($sql);
                $popularPackages = $result->fetch_all(MYSQLI_ASSOC);

                ?>
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <?php foreach ($popularPackages as $index => $package): ?>
                            <?php if ($index == 0){
                            ?>
                                <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                    <a class="position-relative d-block overflow-hidden" href="readMorePack.php?reMorePg=<?php echo $package["pgID"]; ?>" >
                                        <img class="img-fluid" src="../../mainImg/<?php echo $package['pgImg']; ?>" alt="">
                                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                            <?php echo $package['pgtitle']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php }else if($index == 1 || $index==2){
                            ?>
                                <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.<?php $index * 2 + 1; ?>s">
                                    <a class="position-relative d-block overflow-hidden" href="readMorePack.php?reMorePg=<?php echo $package["pgID"]; ?>">
                                        <img class="img-fluid" src="../../mainImg/<?php echo $package['pgImg']; ?>" alt="">
                                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                            <?php echo $package['pgtitle']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if (isset($popularPackages[3])):
                ?>
                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="readMorePack.php?reMorePg=<?php echo $package["pgID"]; ?>" >
                            <img class="img-fluid position-absolute w-100 h-100" src="../../mainImg/<?php echo $popularPackages[3]['pgImg'] ?>" alt="" style="object-fit: cover;">
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                <?php echo htmlspecialchars($popularPackages[3]['pgtitle']); ?>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    <!-- Package Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-5">Latest Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
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
                ORDER BY p.pgCreated DESC
                LIMIT 3";

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
                                            }
                                        }
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
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="package.php" class="btn btn-primary rounded-3 px-4 py-2">VIEW ALL PACKAGES</a>
    </div>

    <!-- Package End -->

    <!-- Team Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
                <h1 class="mb-5">Meet Our Guide</h1>
            </div>
            <div class="row g-4">
                <?php
                $sql = "SELECT * FROM guide LIMIT 6";

                $res = mysqli_query($con, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $wonDelay = 0.1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $wonDelay = $wonDelay + 0.2

                ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $wonDelay . 's'; ?>">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="../../mainImg/<?php echo $row["guImg"]; ?>" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"><?php echo $row["guName"]; ?></h5>
                                    <small>Tour Explanation In : <?php echo $row["guLanguage"]; ?></small>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <?php
                $sql = "SELECT f.*, c.cusName 
                        FROM feedback f
                        LEFT JOIN customer c ON c.cusID = f.cusID 
                        ORDER BY fDate DESC
                        LIMIT 5";

                $res = mysqli_query($con, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $rate = "";
                        for ($i = 1; $i <= (int)$row['rate']; $i++) {
                            $rate .= "⭐";
                        }
                ?>

                        <div class="testimonial-item bg-white text-center border p-4">
                            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0"><?php echo $row['cusName']; ?></h5>
                            <p><?php echo $rate ?></p>
                            <p class="mb-0"><?php echo $row['comment']; ?></p>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
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
    <script>
        function myfun3(id) {
            window.location.href = "readMorePack.php?reMorePg=" + id;
        }
    </script>
</body>

</html>