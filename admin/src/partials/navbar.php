<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo brand-logo text-info fw-bold " href="index.php"><img class="img-fluid me-2" src="../../../mainImg/earth (1).png" alt="" style="width: 50px;height:45px;">Travel Agency</a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="assets/images/adminPf.avif" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black fw-bold"><?php echo $_SESSION['admin_arr']['name']; ?></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown ms-lg-4" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="logout.php">
            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
      <?php
              $date = date("d");
              $sql = "SELECT count(bID) as total,DATE_FORMAT(bDate, '%d') AS booking_day
                    FROM booking 
                    WHERE bstatus = 'Pending' AND DATE_FORMAT(bDate, '%d') = $date
                    GROUP BY booking_day";

              $res = mysqli_query($con,$sql);
              if(mysqli_num_rows($res)>0){
                $row = mysqli_fetch_assoc($res);
                if($row['total'] > 0){
      
            ?>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count-symbol bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-calendar"></i>
              </div>
            </div>
            
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
              <p class="text-gray mb-0"> There are <?php echo $row['total']; ?> pending bookings awaiting your attention today.</p>
            </div>
           
          </a>
        </div>
      </li>
      <?php }
            } ?>

    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>