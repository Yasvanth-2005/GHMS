<?php 
  include "repeats/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
        .card{
          width: 100%;
          max-width: 350px;
          margin-left: 0;
        }
        .details{
          width: 100%;
        }
        .data{
          width: 100%;
        }
        .c-info{
          font-size:19px;
        }
      </style>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php include 'repeats/header.php';?>
    <script>
      const mainChange = document.querySelector('.con');
      mainChange.classList.remove('collapsed');     
    </script>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <!-- <li class="breadcrumb-item">Users</li> -->
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
      
      <div class="card px-3">
        <div class="card-header" style="border:none">
          <div class="text-left h3">DSW Office</div>
        </div>
        <div class="card-body d-flex justify-content-center align-items-center flex-column details">
          <div class="data d-flex">
            <div class="col-1 d-flex align-items-center"><i class="bi bi-buildings "></i></div>
            <div class="col-10 mx-2 py-1 c-info">I-3 Office</div>
          </div>
          <div class="data d-flex">
            <div class="col-1 d-flex align-items-center"><i class="bi bi-geo-alt "></i></div>
            <div class="col-10 mx-2 py-1 c-info">GF-47</div>
          </div>
          <div class="data d-flex">
            <div class="col-1 d-flex align-items-center"><i class="bi bi-envelope "></i></div>
            <div class="col-10 mx-2 py-1 c-info">user@gmail.com</div>
          </div>
          <div class="data d-flex">
            <div class="col-1 d-flex align-items-center"><i class="bi bi-telephone "></i></div>
            <div class="col-10 mx-2 py-1 c-info">+91 63037 38847</div>
          </div>
        </div>
      </div>
      


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RGUKT Nuzvid</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->
  <style>
    
    
  </style>
    
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>