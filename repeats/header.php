<!-- ======= Header ======= -->
<?php 
echo '
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between flex-change">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="" width="100px" height="100%">
    <!-- <span class="d-none d-lg-block">G.H.M.C</span> -->
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
';
echo '
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

      <a class="nav-link nav-profile d-flex align-items-center profile-padding" href="#" data-bs-toggle="dropdown">
        <img src="https://intranet.rguktn.ac.in/SMS/usrphotos/user/';?><?php echo $id_number;?><?php echo '.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">'?><?php echo $id_number;?><?php echo '</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6 style="text-transform:capitalize">'?><?php echo $name;?><?php echo '</h6>
          <span>';?><?php echo $year;?><?php echo '</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed ind" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

 

  <li class="nav-item">
    <a class="nav-link collapsed prof" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Leaves</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse double" data-bs-parent="#sidebar-nav">
      <li>
        <a href="apply-leave.php" class="subs1">
          <i class="bi bi-circle"></i><span>Apply Leave</span>
        </a>
      </li>
      <li>
        <a href="leave-status.php" class="subs2">
          <i class="bi bi-circle"></i><span>Leave Status</span>
        </a>
      </li>
    
    </ul>
  </li><!-- End Components Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed com" href="complaint.php">
      <i class="bi bi-question-circle"></i>
      <span>Complaints</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed con" href="contact.php">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->



</ul>

</aside><!-- End Sidebar-->
'
?>