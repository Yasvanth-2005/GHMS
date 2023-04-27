<?php include 'repeats/session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Student Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <style>
      .slide.show{
        display: block;
      }
      .main-form{
          margin: 20px auto;
          width: 98%;
          padding: 10px 20px;
          background-color: white;
          box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
          max-width: 400px;
      }
      label{
        font-size:18px;
      }
      /* Register Slides */
      .slide{
        width: 100%;
        padding: 10px;
        display: none;
      }
      input{
        text-transform:capitalize;
      }
      .slide-heading{
        padding-left:5px;
        font-size:22px;
        font-weight: 600;
        text-transform: capitalize;
        border-left:4px solid #0d6efd;
      }
      .form_change_btns{
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row-reverse;
        margin-bottom: 10px;
      }
      .form_change_btns button,.form_change_btns input{
        padding: 3px 10px;
        font-size:18px;
      }
      .errormsg{
        font-size:18px;
        color:rgb(200,40,40);
        text-align:center;
        font-weight:600;
        padding-bottom: 10px;
      }
  </style>


</head>

<body>
  <?php 
    if(isset($_SESSION['error_message'])) {
      echo "<script>alert('{$_SESSION['error_message']}')</script>";
      unset($_SESSION['error_message']);
    }
  ?>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.str');
      mainChange.classList.remove('collapsed');
  </script>
         
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student Register</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Student Register</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="main-form mx-auto">
      <form method="post" action="reg-result.php" class="reg-form">
       <div class="row">
             <div class="slide show" data-id="1">
               <div class="slide-heading mb-3">Student Details</div>

                <div class="col-12">
                  <label for="sname" class="form-label">
                      Student Name
                  </label>
                  <input type="text" id="sname" name="student_name" class="form-control mb-3">
                </div>

                <div class="col-12">
                  <label for="idno" class="form-label">
                      Id Number
                  </label>
                  <input type="text" id="idno" name="Id_Number" class="form-control mb-3">
                </div>

                <div class="col-12">
                  <label for="stphno" class="form-label">
                      Student Phone Number
                  </label>
                  <input type="text" id="stphno" name="student_phno" class="form-control mb-3">
                </div>

                <div class="col-12">
                  <label for="aca_year" class="form-label">
                      Academic Year
                  </label>
                  <select id="aca_year" name="academic_year" class="form-select mb-3">
                    <option value="PUC-1">PUC 1</option>
                    <option value="PUC-2">PUC 2</option>
                    <option value="Engineering-1">Engg 1</option>
                    <option value="Engineering-2">Engg 2</option>
                    <option value="Engineering-3">Engg 3</option>
                    <option value="Engineering-4">Engg 4</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="branch" class="form-label">
                      Branch
                  </label>
                  <select name="branch" id="branch" class="form-select mb-3">
                    <option value="PUC">PUC</option>
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="MECH">MECH</option>
                    <option value="MME">MME</option>
                    <option value="CHEM">CHEM</option>
                    <option value="Civil">Civil</option>
                    <option value="EEE">EEE</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="academic_block" class="form-label">
                      Acadmeic Block
                  </label>
                  <select name="academic_block" id="academic_block" class="form-select mb-3">
                    <option value="AB-I">AB-I</option>
                    <option value="AB-II">AB-II</option>
                    <option value="AB-III">AB-III</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="classroom" class="form-label">
                      Class Room
                  </label>
                  <input type="text" id="classroom" name="classroom" class="form-control mb-3" placeholder="Eg.CS-06">
                </div>

                <div class="col-12">
                  <label for="hostel_block" class="form-label">
                      Hostel Block
                  </label>
                  <select name="hostel_block" id="hostel_block" class="form-select mb-3">
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="hostelroom" class="form-label">
                      Hostel Room
                  </label>
                  <input type="text" id="hostelroom" name="hostelroom" class="form-control mb-3" placeholder="Eg.FF-32">
                </div>

                <div class="col-12">
                  <label for="bloodgroup" class="form-label">
                      Blood Group
                  </label>
                  <input type="text" id="bloodgroup" name="bloodgroup" class="form-control mb-3" placeholder="Eg. B+">
                </div>

             </div>
             <div class="slide" data-id="2">
              <div class="slide-heading mb-3">Parent Details</div>

              <div class="col-12">
                <label for="mname" class="form-label">
                    Mother Name
                </label>
                <input type="text" id="mname" name="mother_name" class="form-control mb-3">
              </div>

              <div class="col-12">
                <label for="mphno" class="form-label">
                    Mother Phone Number
                </label>
                <input type="text" id="mphno" name="mother_phno" class="form-control mb-3">
              </div>

              <div class="col-12">
                <label for="fname" class="form-label">
                    Father Name
                </label>
                <input type="text" id="fname" name="father_name" class="form-control mb-3">
              </div>

              <div class="col-12">
                <label for="fphno" class="form-label">
                    Father Phone Number
                </label>
                <input type="text" id="fphno" name="father_phno" class="form-control mb-3">
              </div>

              <div class="col-12">
                <label for="gname" class="form-label">
                    Gaurdian Name
                </label>
                <input type="text" id="gname" name="gaurdian_name" class="form-control mb-3">
              </div>

              <div class="col-12">
                <label for="gphno" class="form-label">
                    Gaurdian Phone Number
                </label>
                <input type="text" id="gphno" name="gaurdian_phno" class="form-control mb-3">
              </div>

             </div>

             <div class="slide" data-id="3">
              <div class="slide-heading mb-3">Address</div>

              <div class="col-12">
                <label for="state" class="form-label">
                    State
                </label>
                <input type="text" id="state" name="state" class="form-control mb-3">
              </div>

             <div class="col-12">
              <label for="district" class="form-label">
                  District
              </label>
              <input type="text" id="district" name="district" class="form-control mb-3">
            </div>

           <div class="col-12">
            <label for="mandal" class="form-label">
                Mandal
            </label>
            <input type="text" id="mandal" name="mandal" class="form-control mb-3">
          </div>

          <div class="col-12">
            <label for="village" class="form-label">
                Village Name
            </label>
            <input type="text" id="village" name="village" class="form-control mb-3">
          </div>
         

         <div class="col-12">
          <label for="d-name" class="form-label">
              Door No./Street Name
          </label>
          <input type="text" id="d-name" name="d-name" class="form-control mb-3">
        </div>

        <div class="col-12">
          <label for="pin" class="form-label">
              PIN Code
          </label>
          <input type="text" id="pin" name="pin" class="form-control mb-3">
        </div>

       </div>
       </div>
          <div class="errormsg"></div>
          <div class="form_change_btns">
            <button class="next_btn btn btn-primary" type="button">Next</button>
            <input class="student_register_btn btn btn-success" type="submit" value="Register">
            <button class="prev_btn btn btn-primary" type="button">Previous</button>
          </div>
      </form>
  </div>
  <script>
    const slides = document.querySelectorAll('.slide');
    const nextBtn = document.querySelector('.next_btn');
    const prevBtn = document.querySelector('.prev_btn');
    const submitBtn = document.querySelector('.student_register_btn');
    
    let count = 1;
    prevBtn.style.display = 'none';
    submitBtn.style.display = 'none';
    

    nextBtn.addEventListener('click',function(){
      if(count<slides.length){
        count += 1;
        countSlide(count)
      }
    })

    prevBtn.addEventListener('click',function(){
      if(count != 1){
        count -= 1;
        countSlide(count)
      }
    })

    function countSlide(counter){
      slides.forEach(function(slide){
         if (slide.dataset.id == counter){
          slide.classList.add('show')
         }
         else{
          slide.classList.remove('show')
         }
         if(counter == slides.length){
          submitBtn.style.display = '';
          nextBtn.style.display = 'none';
         }
         else if(counter != 1){
          nextBtn.style.display = '';
          prevBtn.style.display = '';
          submitBtn.style.display = 'none';
         }
         else{
          prevBtn.style.display = 'none';
         }
      })
    }

  </script>
  <script>
    const form = document.querySelector('student_register_btn');
    submitBtn.addEventListener('click', (e) => {
      errorCount = validateForm();
      if(errorCount == 1){
        e.preventDefault();
      }
    });

    function validateForm(){
      const errorMsg = document.querySelector('.errormsg');
      var error = 0;

      const student_name = document.getElementsByName("student_name")[0].value;
      const id_number = document.getElementsByName("Id_Number")[0].value;
      const student_phno = document.getElementsByName("student_phno")[0].value;
      const academic_year = document.getElementsByName("academic_year")[0].value;
      const branch = document.getElementsByName("branch")[0].value;
      const academic_block = document.getElementsByName("academic_block")[0].value;
      const classroom = document.getElementsByName("classroom")[0].value;
      const hostel_block = document.getElementsByName("hostel_block")[0].value;
      const hostelroom = document.getElementsByName("hostelroom")[0].value;
      const bloodgroup = document.getElementsByName("bloodgroup")[0].value;

      const mother_name = document.getElementsByName("mother_name")[0].value;
      const mother_phno = document.getElementsByName("mother_phno")[0].value;
      const father_name = document.getElementsByName("father_name")[0].value;
      const father_phno = document.getElementsByName("father_phno")[0].value;
      const gaurdian_name = document.getElementsByName("gaurdian_name")[0].value;
      const gaurdian_phno = document.getElementsByName("gaurdian_phno")[0].value;

      const state = document.getElementsByName("state")[0].value;
      const district = document.getElementsByName("district")[0].value;
      const mandal = document.getElementsByName("mandal")[0].value;
      const village = document.getElementsByName("village")[0].value;
      const street = document.getElementsByName("d-name")[0].value;
      const pincode = document.getElementsByName("pin")[0].value;

      if(student_name === "" || id_number === "" || student_phno === "" ||academic_year === "" || branch === "" || academic_block === "" || classroom === "" || hostel_block === "" || hostelroom === "" || bloodgroup === "" || mother_name === "" || mother_phno === "" || father_name === "" || father_phno === "" || gaurdian_name === "" || gaurdian_phno === "" || state === "" || district === "" || mandal === "" || village === "" || street === "" || pincode === ""){
         errorMsg.innerHTML = 'All Fields are Required';
         error = 1;
      }
      else if(student_phno.length!=10 && mother_phno.length!=10 && father_phno.length!=10 && gaurdian_phno.length!=10){
        errorMsg.innerHTML = 'Enter Valid Phone Number';
        error = 1;
      }
      else if(id_number.length != 7){
        errorMsg.innerHTML = 'Enter Valid Id number';
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