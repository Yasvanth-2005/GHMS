<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <style> 
      .main-form{
          margin: 10px;
          width: 98%;
          background-color: white;
          box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
          max-width: 400px;
      }
      form{
          padding: 10px 30px;
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

  <?php 
    include "repeats/header.php";
  ?>
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Faculty Registration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Faculty Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  
    <div class="main-form mx-auto">
      <form action="faculty-reg.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <label for="staff_pos" class="form-label">
                      Staff Position
                  </label>
                  <select name="staff_pos" id="staff_pos" class="form-select mb-3">
                      <option value="">None</option>
                      <option value="adsw">ADSW</option>
                      <option value="warden">Warden</option>
                      <option value="caretaker">Care Taker</option>
                  </select>
              </div>
              <div class="col-12">
                  <label for="staff_name" class="form-label">
                      Full Name
                  </label>
                  <input type="text" id="staff_name" name="staffName" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="username" class="form-label">
                      Username
                  </label>
                  <input type="text" id="username" name="username" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="doj" class="form-label">
                      Date of joining
                  </label>
                  <input type="date" id="doj" name="doj" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="dob" class="form-label">
                      Date of birth
                  </label>
                  <input type="date" id="dob" name="dob" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="staff_phno" class="form-label">
                      Phone Number
                  </label>
                  <input type="text" id="staff_phno" name="staff_phno" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="staff_mail" class="form-label">
                      Email
                  </label>
                  <input type="email" id="staff_mail" name="staff_mail" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="password" class="form-label">
                      password
                  </label>
                  <input type="password" id="password" name="password" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="c-password" class="form-label">
                      Confirm Password
                  </label>
                  <input type="password" id="c-password" name="password" class="form-control mb-3">
              </div>
              <div class="col-12">
                  <label for="file" class="form-label">
                      Photo
                  </label>
                  <input type="file" id="file" name="image" class="form-control mb-3" accept=".png,.jpg,.jpeg">
              </div>
          </div>
          <div id="error-msg" class="text-center" style="color:rgba(200,40,40);font-weight:600"></div>
          <div class="w-100">
              <input type="submit" value="Register" class="btn btn-primary w-50" style="margin:5px 25%" id="submit-btn">
          </div>
      </form>
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
      const staffPos = document.getElementById('staff_pos').value;
      const staffName = document.getElementById('staff_name').value;
      const username = document.getElementById("username").value;
      const doj = document.getElementById('doj').value;
      const dob = document.getElementById('dob').value;
      const phno = document.getElementById('staff_phno').value;
      const mail = document.getElementById('staff_mail').value;
      const password = document.getElementById('password').value;
      const Cpassword = document.getElementById('c-password').value;
      const file = document.getElementById('file').value;
      const errorMsg = document.getElementById('error-msg');
      let error = 0;
      if(staffPos === '' || staffName === '' || username === '' || doj === '' || dob === '' || phno === '' || mail === '' || password === '' || file === ''){
        errorMsg.innerHTML = 'All fields are required';
        error = 1;
      }
      else if(phno.length != 10){
        errorMsg.innerHTML = 'Enter Valid Mobile Number';
        error = 1;
      }
      else if(password !== Cpassword){
        errorMsg.innerHTML = 'passwords Dosen\'t Match';
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

  <script>
      const mainChange = document.querySelector('.facr');
      mainChange.classList.remove('collapsed');
  </script>



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IIIT-Nuzvid</span></strong>. All Rights Reserved
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