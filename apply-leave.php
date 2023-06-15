<?php 
  include "repeats/sessions.php";
  if(isset($_SESSION['error_message'])){
    echo "<script>alert('{$_SESSION['error_message']}')</script>";
    unset($_SESSION['error_message']);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Apply Leave</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style> 
      .main-form{
          margin: 10px;
          width: 98%;
      }
      form{
          background-color: white;
          box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
          padding: 10px 30px;
          max-width:400px;
      }
      .instructions{
        background-color: white;
        box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
        padding: 20px;
        max-width:400px;
        height: fit-content;
      }
      .instructions .ins_title{
         font-size:26px;
         color: #012970;
         font-weight:550;
      }
      @media (max-width:992px){
        .ol-2{
          order:-1;
          margin-bottom: 20px;
        }
        .instructions{
          background: transparent;
          box-shadow: none;
          max-width: 100%;
        }
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
      const mainChange = document.querySelector('.double');
      mainChange.classList.add('show'); 
      const subActiveChange = document.querySelector('.subs1');
      subActiveChange.classList.add('active');
    </script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Apply Leave</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Leaves</li>
          <li class="breadcrumb-item active">Apply Leave</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="row">
      <div class="main-form mx-auto col col-12 col-lg-6 d-flex justify-content-center">
        <form action="leave-reg.php" name="leaves" method="POST">
            <div class="row">
                <div class="col-12">
                    <label for="leave-from" class="form-label">
                        Leave From
                    </label>
                    <input type="date" id="leave-from" name="leaveFrom" class="form-control mb-3">
                </div>
                <div class="col-12">
                    <label for="leave-to" class="form-label">
                        Leave To
                    </label>
                    <input type="date" id="leave-to" name="leaveTo" class="form-control mb-3">
                </div>
                <div class="col-12">
                    <label for="leave-type" class="form-label">
                        Leave Type
                    </label>
                    <select name="leaveType" id="leave-type" class="form-select mb-3">
                        <option value="">None</option>
                        <option value="outpass">Outpass</option>
                        <option value="sick-leave">Sick Leave</option>
                        <option value="normal-leave">Normal Leave</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea name="leaveReason" id="reason" rows="3" class="form-control mb-3"></textarea>
                </div>
            </div>
            <div id="error-msg" class="text-center" style="color:rgba(200,40,40);font-weight:600"></div>
            <div class="w-100">
                <input type="submit" value="Apply Leave" class="btn btn-primary w-50" style="margin:5px 25%" id="submit-btn">
            </div>
        </form>
      </div>
      <div class="col-12 col-lg-6 ol-2 d-flex justify-content-center">
            <div class="instructions">
              <div class="ins_title">Note :- </div>
              <p class="ins_points mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, fugit vero provident perspiciatis quaerat iusto repellendus? Officiis sed veniam nam.</p>
              <p class="ins_points">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nobis!</p>
            </div>
      </div>
    </div>
  

  <script>
    const submitBtn = document.getElementById('submit-btn');
    submitBtn.addEventListener('click',function(e){
    const errorCount = validateForm();
      if(errorCount != 0){
        e.preventDefault();
      }
    })
    function validateForm(){
      const leaveFrom = document.getElementById('leave-from').value;
      const leaveTo = document.getElementById('leave-to').value;
      const leaveType = document.getElementById("leave-type").value;
      const reason = document.getElementById('reason').value;
      const errorMsg = document.getElementById('error-msg');
      let error = 0;
      if(leaveFrom === '' || leaveTo === '' || leaveType === '' || reason === ''){
        errorMsg.innerHTML = 'All fields are required';
        error = 1;
      }
      else{
        errorMsg.innerHTML = '';
        error = 0;
      }
      return error;
    }
  </script>

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RGUKT Nuzvid</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

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