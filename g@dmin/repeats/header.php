<?php echo'
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between flex-change">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="" width="100px" height="100%">
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

      <a class="nav-link nav-profile d-flex align-items-center profile-padding" href="#" data-bs-toggle="dropdown">
        <img src="uploads/';?><?php echo $photo;?><?php echo '" alt="Profile" class="rounded-circle" />
        <span class="d-none d-md-block dropdown-toggle ps-2">';?><?php echo 'N210368';?><?php echo'</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>';?><?php echo $name;?><?php echo'</h6>
          <span class="text-uppercase">';?><?php echo $position; ?><?php echo '</span>
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
      </ul>
    </li>

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed ind" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Admin Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed adc rel" href="admin-complaints.php">
      <i class="bi bi-question-circle"></i>
      <span>Complaints</span>
        ';?>
          <?php 
           include "db_config.php";
           $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
           if(!$conn){
            die('connection error'.mysqli_connect_error());
           }
           else{
             $sql = "SELECT * FROM complaints WHERE complaint_status = 'Pending'";
             $result = mysqli_query($conn,$sql);
             $no_of_results = mysqli_num_rows($result);
             if($no_of_results != 0){
              ?><?php
              echo '<span class="side-float">';
              echo $no_of_results;
              echo '</span>';
             }
             mysqli_close($conn);
           }
          ?>
        <?php echo '
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed lea rel" href="leaves.php">
      <i class="bi bi-envelope"></i>
      <span>Leave Requests</span>
      ';?>
      <?php 
        include "db_config.php";
        $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
        if(!$conn){
          die('connection error'.mysqli_connect_error());
        }
        else{
          $sql = "SELECT * FROM leaves WHERE leave_status = 'Pending'";
          $result = mysqli_query($conn,$sql);
          $no_of_results = mysqli_num_rows($result);
          if($no_of_results != 0){
            ?><?php
            echo '<span class="side-float">';
            echo $no_of_results;
            echo '</span>';
           }
           mysqli_close($conn);
        }
        ?>
      <?php echo '
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed str" href="student-register.php">
      <i class="bi bi-person-circle"></i>
      <span>Student Registration</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed std" href="student-details.php">
      <i class="bi bi-person"></i>
      <span>Student Details</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed ha" href="hostel-attendance.php">
    <i class="bi bi-file-earmark-spreadsheet"></i>
      <span>Hostel Attendance</span>
    </a>
  </li>

  '?>
  <?php 
 if($_SESSION['staff_pos'] == 'dsw'){
  ?> 
  <?php echo '
  <li class="nav-item">
    <a class="nav-link collapsed facr" href="faculty-register.php">
      <i class="bi bi-people-fill"></i>
      <span>Staff Registarion</span>
    </a>
  </li>
  '?>
  <?php 
 }
  ?>

  <?php echo '

</ul>

</aside>';?>

<style>
  
.rel{
  position:relative;
}
.nav-link span.side-float{
    position: absolute;
    right: 25px;
    width: 30px;
    height: 30px;
    background-color: #efefef;
    color: black;
    border-radius: 50%;   
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 700;
}
</style>