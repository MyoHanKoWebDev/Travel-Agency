<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><img class="img-fluid" src="../../mainImg/earth (1).png" alt="">
            Travel Agency</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link active1">Home</a>
            <a href="about.php" class="nav-item nav-link active1">About</a>
            <a href="package.php" class="nav-item nav-link active1">Packages</a>
            <a href="contact.php" class="nav-item nav-link active1">Contact</a>
        </div>
        <?php if (!isset($_SESSION["cusArr1"])) { ?>
            <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4 register">Register</a>
            <a href="login.php" class="btn btn-outline-primary rounded-pill py-2 px-4 ms-2 login">Login</a>
        <?php } else { ?>
            <div class="profile-container d-flex align-items-center" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                <a href="" class=""><img src="../../mainImg/<?php echo $_SESSION['cusArr1']['cusImg'] ?>" class="rounded-circle border border-white border-2" style="width: 45px; height:45px;"></a>
                <span class="nav-item text-primary ms-2 fs-5 pf-name dropdown-toggle"><?php echo $_SESSION['cusArr1']['cusName'] ?></span>
            </div>
            <div class="dropdown-menu dropdown-menu-lg-end shadow me-5 rounded-3 ms-4 ms-lg-0 " aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="logout.php">
                    <i class="fas fa-sign-out-alt me-2 text-primary"></i> Signout </a>
            </div>
        <?php } ?>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current page's URL
        const currentUrl = window.location.href;

        // Get all the navigation links
        const navLinks = document.querySelectorAll('.active1');

        // Loop through each link
        navLinks.forEach(link => {
            // If the link's href matches the current URL, add the 'active' class
            if (link.href === currentUrl) {
                link.classList.add('active');
            }
        });
    });
</script>