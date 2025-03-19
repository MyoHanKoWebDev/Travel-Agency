<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-2 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a class="btn btn-link" href="index.php">Home</a>
                <a class="btn btn-link" href="about.php">About Us</a>
                <a class="btn btn-link" href="contact.php">Contact Us</a>
                <a class="btn btn-link" href="package.php">Packages</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>26th street, between 90th and 91th streets, Mandalay, Myanmar</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+95 942589 9945</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>travelagencymdy@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>

                <div class="row g-2 pt-2">
                    <?php
                    $sql = "SELECT pgImg FROM package
                                ORDER BY pgCreated DESC
                                LIMIT 6";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="../../mainImg/<?php echo $row["pgImg"]; ?>" alt="">
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Travel Agency</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->