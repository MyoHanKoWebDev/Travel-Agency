<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/adminPf.avif" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?php echo $_SESSION['admin_arr']['name']; ?></span>
          <span class="text-secondary text-small">Travel Agency Admin</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <span class="menu-title me-1">Check Booking </span>

        <?php
        $sql = "SELECT count(bID) as total FROM booking WHERE bstatus = 'Pending'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          echo $row['total'] > 0 ? '<span class="text-white bg-danger notispan">' . $row['total'] . '</span>' : "";

        ?>
          <i class="menu-arrow"></i>
          <i class="fa fa-ticket menu-icon "></i>

      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="penBook.php">Pending Booking <?php echo $row['total'] > 0 ? '<span class="ms-1 bg-danger rounded-circle px-1 py-1"></span>' : "";
                                                                  } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="conBook.php">Confirm Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rejBook.php">Reject Booking</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <span class="menu-title">Places</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-map-marker menu-icon "></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="addPlace.php">Add Places</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewPlace.php">View Places</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <span class="menu-title">Cars</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-car menu-icon "></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="addCar.php">Add Cars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewCar.php">View Cars</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#hotels" aria-expanded="false" aria-controls="hotels">
        <span class="menu-title">Hotels</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-university menu-icon"></i>
      </a>
      <div class="collapse" id="hotels">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="addHotel.php">Add Hotels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewHotel.php">View Hotels</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-title">Guides</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-user-circle-o menu-icon "></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="addGuide.php"> Add Guides </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewGuide.php"> View Guides </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Packages</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-suitcase menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="addPack.php">Add Packages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewPack.php">View Packages</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
        <span class="menu-title">Payments</span>
        <i class="menu-arrow"></i>
        <i class="fa fa-money menu-icon "></i>
      </a>
      <div class="collapse" id="forms">
        <ul class="nav flex-column sub-menu ">
          <li class="nav-item">
            <a class="nav-link" href="addPayment.php">Add Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewPayment.php">View Payments</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">
        <i class="mdi mdi-logout me-1 text-primary fs-5"></i>
        <span class="menu-title">Signout</span>
      </a>
    </li>
  </ul>
</nav>