<?php
include("connection/dbcon.php");
include("connection/loginCookies.php");
include("connection/auth.php");

if (isset($_POST['makePay'])) {
    $pgTt = $_POST['pgTt'];
    $payId = $_POST['payType'];
    $created = date("Y-m-d H:i:s");

    $file = $_FILES['payImg'];
    $fileName = $_FILES['payImg']['name'];
    $fileTmpName = $_FILES['payImg']['tmp_name'];

    $fileExt = explode(".", $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowedExt = array("png", "jpeg", "jpg", "pdf", "webp","avif");

    if (in_array($fileActExt, $allowedExt)) {
        $fileNewName = uniqid('', true) . '.' . $fileActExt;
        $fileDestination = "../../mainImg/" . $fileNewName;

        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "<script>alert('Failed to upload image. Please check folder permissions.');
                  window.location.replace('booking.php');</script>";
            exit;
        }

        if (isset($_SESSION['cusArr1']) && isset($_SESSION['noInfo']['nOfPeo']) &&  $pgId = $_SESSION['noInfo']['pgId']) {
            $cusId = $_SESSION['cusArr1']['cusID'];
            $bkPq = $_SESSION['noInfo']['nOfPeo'];
            $pgId = $_SESSION['noInfo']['pgId'];

            $sqlBook = "INSERT INTO booking (bDate, bstatus, pyID, cusID) VALUES 
                        ('$created','Pending',$payId,$cusId)";

            if (mysqli_query($con, $sqlBook)) {
                // Get the last inserted recipe ID
                $lid = mysqli_insert_id($con);

                $sqlBoDe = "INSERT INTO bookingdetail (payimg, bkPQ, bID, pgID) VALUES ('$fileNewName',$bkPq,$lid,$pgId)";
                if (!mysqli_query($con, $sqlBoDe)) {
                    // Debugging ingredient insert error
                    echo "<script>alert('Error inserting booking detail data: " . mysqli_error($con) . "');
                              window.location.replace('booking.php');</script>";
                    exit;
                }

                echo "<script>window.location.replace('package.php');</script>";
            } else {
                // Debugging main insert error
                echo "<script>alert('Error to add booking data: " . mysqli_error($con) . "');
                      window.location.replace('booking.php');</script>";
            }
        }
    } else {
        echo "<script>alert('Please upload jpg, png, jpeg, pdf, webp, avif formats only');
              window.location.replace('booking.php');</script>";
        exit;
    }
}

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
                        <h1 class="display-3 text-white animated slideInDown">Booking</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Booking and Making Payment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Process Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="text-center pt-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
                <h1 class="mb-5">Book and Payment</h1>
            </div>
            <div class="col-lg-12 ">
                <h4 class="text-primary">Check Voucher</h4>

                <table class="table table-striped wow fadeInUp" data-wow-delay="0.1s">
                    <thead>
                        <tr>
                            <th scope="col">Package Name</th>
                            <th scope="col">Number of People</th>
                            <th scope="col">Price per Traveler (MMK)</th>
                            <th scope="col">Total Amount (MMK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!isset($_SESSION['noInfo'])) {
                            echo "<script>window.location.replace('readMorePack.php');</script>";
                            exit();
                        } else {
                            $pgId = $_SESSION['noInfo']['pgId'];
                            $nOfPeo = $_SESSION['noInfo']['nOfPeo'];

                            $sql = "SELECT * FROM package WHERE pgID = " . (int)$pgId;

                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $priceInt = (int)str_replace(",", "", $row['pgPrice']);  // Step 1: Remove commas from input
                                    $priceFinal = $priceInt * $nOfPeo;
                                    $priceCur = number_format($priceFinal, 0, '', ','); //para,how many deci place,separate deci point char,thousand point char
                                    $serviceChg = $priceFinal * 0.03; // 3/100 reduce 3%
                                    $serviceNum = number_format($serviceChg, 0, '', ',');
                        ?>
                                    <tr>
                                        <th scope="row">
                                            <img src="../../mainImg/<?php echo $row['pgImg'] ?>" alt="image" />
                                            <span class="ms-2"><?php echo $row['pgtitle'] ?></span>
                                        </th>
                                        <td><?php echo $nOfPeo ?></td>
                                        <td><?php echo $row['pgPrice'] ?></td>
                                        <td><?php echo $priceCur ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" class="text-end">Sub Total</th>
                                        <td>MMK <?php echo $priceCur ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" class="text-end">Service Charge</th>
                                        <td>MMK <?php echo $serviceNum ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" class="text-end text-dark">Total Amount</th>
                                        <td class="text-dark">MMK <?php echo number_format($serviceChg + $priceFinal, 0, '', ',') ?></td>
                                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Process Start -->

    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp " data-wow-delay="0.5s">
        <div class="container">
            <div class="booking p-5 rounded-3" style="background: linear-gradient(rgba(15, 23, 43, .7), rgba(15, 23, 43, .7)),url(../../mainImg/<?php echo $row['pgImg'] ?>); background-position: center center;background-repeat: no-repeat;background-size: cover;">
    <?php }
                            }
                        } ?>
    <div class="row g-5 align-items-center">
        <div class="col-md-6 text-white">
            <h6 class="text-white text-uppercase">Booking and Making Payment</h6>
            <h1 class="text-white mb-4">Online Booking</h1>

            <?php
            if (isset($_SESSION['cusArr1']['cusName']) && isset($_SESSION['cusArr1']['cusEmail']) && isset($_SESSION['noInfo']['pgId'])) {
                $customerName = $_SESSION['cusArr1']['cusName'];
                $customerEmail = $_SESSION['cusArr1']['cusEmail'];
                $pgId = $_SESSION['noInfo']['pgId'];

                $sql = "SELECT pgtitle FROM package WHERE pgID = " . (int)$pgId;
                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $packageTitle = $row['pgtitle'];

                    echo "<p class='mb-4'>- Hello, <strong class='text-primary'>$customerName!</strong> You are booking the <strong class='text-primary'>$packageTitle</strong> package.</p>";
                    echo "<p class='mb-4'>- A confirmation will be sent to <strong class='text-primary'>$customerEmail</strong> after payment verification.</p>";
                    echo "<p class='mb-4'>- Please proceed with the payment and upload your proof.</p>";
                    echo "<p class='mb-4'>- Account Name:<strong> Myo Han Ko</strong></p>";
                    echo "<p class='mb-4'>- Number:<strong> 09975099842</strong></p>";
                }
            }
            ?>

            <a class="btn btn-outline-light py-3 px-5 mt-2 rounded-3" href="">Read More</a>
        </div>
        <div class="col-md-6">
            <h1 class="text-white mb-4">Book And Make Payment </h1>
            <form enctype="multipart/form-data" method="POST">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-transparent rounded-3" id="name" placeholder="Your Name" value="<?php echo $_SESSION['cusArr1']['cusName'] ?>" name="cusName">
                            <label for="name">Your Name</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" class="form-control bg-transparent rounded-3" id="email" placeholder="Your Email" value="<?php echo $_SESSION['cusArr1']['cusEmail'] ?>" name="cusEmail">
                            <label for="email">Your Email</label>
                        </div>
                    </div>

                    <?php
                    if (!isset($_SESSION['noInfo'])) {
                        echo "<script>window.location.replace('readMorePack.php');</script>";
                        exit();
                    } else {
                        $pgId = $_SESSION['noInfo']['pgId'];

                        $sql = "SELECT * FROM package WHERE pgID = " . (int)$pgId;

                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent rounded-3" id="destination" placeholder="Destination" value="<?php echo $row['pgtitle'] ?>" name="pgTt">
                                        <label for="destination">Destination</label>
                                    </div>
                                </div>
                    <?php   }
                        }
                    } ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="payImg" class="form-label text-white">Upload Your Payment History</label>
                            <input type="file" name="payImg" class="file-upload-default" required>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info bg-transparent" disabled placeholder="Upload Image" style="border-radius: 5px 0px 0px 5px;">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary py-3 px-3 px-lg-4" type="button" style="border-radius: 0px 5px 5px 0px;">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label class="form-label fw-bold text-white">Select Payment Method:</label>
                        <div class="d-flex justify-content-around">
                            <!-- Payment Option 1 -->
                            <?php
                            $sql = "SELECT * FROM payment";
                            $res = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($res) > 0) {

                                while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                    <div class="form-check text-center">
                                        <input class="form-check-input" type="radio" name="payType" id="<?php echo 'payment' . $count++; ?>" value="<?php echo $row['pyID']; ?>" required>
                                        <label class="form-check-label" for="<?php echo 'payment' . $count++; ?>">
                                            <img class="rounded-3" src="../../mainImg/<?php echo $row['pyImg']; ?>" alt="<?php echo $row['pyType']; ?>" style="width:50px; height:50px;">
                                        </label>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-outline-light w-100 py-3 rounded-3" type="submit" name="makePay">Make Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
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
        (function($) {
            'use strict';
            $(function() {
                $('.file-upload-browse').on('click', function() {
                    var file = $(this).parent().parent().parent().find('.file-upload-default');
                    file.trigger('click');
                });
                $('.file-upload-default').on('change', function() {
                    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                });
            });
        })(jQuery);
    </script>
</body>

</html>