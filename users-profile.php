<?php 
  include "repeats/sessions.php";
  if(isset($_SESSION['error_message'])){
    echo "<script>alert('{$_SESSION['error_message']}')</script>";
    unset($_SESSION['error_message']);
  }
  if(isset($_SESSION['success_message'])){
    echo "<script>alert('{$_SESSION['success_message']}')</script>";
    unset($_SESSION['success_message']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Profile</title>
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


</head>

<body>

    <?php include 'repeats/header.php';?>
    <script>
      const mainChange = document.querySelector('.prof');
      mainChange.classList.remove('collapsed');     
    </script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <!-- <li class="breadcrumb-item">Users</li> -->
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src=" https://intranet.rguktn.ac.in/SMS/usrphotos/user/<?php echo $id_number;?>.jpg " alt="Profile" class="rounded-circle" />
              <h2 style="text-transform:capitalize;margin-bottom:10px;text-align:center;"><?php echo $name;?></h2>
              <h3><?php echo $id_number;?> | <?php echo $year;?></h3>
              <h3><?php echo $password;?></h3>
              </div>

          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">View Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Student Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label ">Full Name</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $name;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">I.D Number</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $id_number;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Email</div>
                    <div class="col-lg-9 col-sm-7" style="text-transform:lowercase"><?php echo $id_number;?>@rguktn.ac.in</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Class Room </div>
                    <div class="col-lg-9 col-sm-7"><?php echo $classroom;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Academic Block</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $academic_block;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Branch</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $branch;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Hostel Block</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $hostel_block;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Hostel Room</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $hostelroom;?></div>
                  </div>

                  <h5 class="card-title">Parent Details</h5>

                  
                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Father</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $father_name;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Mother</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $mother_name;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Guardian</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $gaurdian_name;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Mother Mobile</div>
                    <div class="col-lg-9 col-sm-7">+91 <?php echo $mother_phno;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Father Mobile</div>
                    <div class="col-lg-9 col-sm-7">+91 <?php echo $father_phno;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Gaurdian Mobile</div>
                    <div class="col-lg-9 col-sm-7">+91 <?php echo $gaurdian_phno;?></div>
                  </div>

                  <h5 class="card-title">Address</h5>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Door No/Street</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $street;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">village/town</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $village;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Mandal</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $mandal;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">District</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $district;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">State</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $state;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-sm-5 label">Pin Code</div>
                    <div class="col-lg-9 col-sm-7"><?php echo $pincode;?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="update-profile.php">

                    <div class="row mb-3">
                      <label for="className" class="col-sm-5 col-lg-3 col-form-label">Class</label>
                      <div class="col-sm-7 col-lg-9">
                        <input name="className" type="text" class="form-control" id="className" value="<?php echo $classroom;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="academicYear" class="col-sm-5 col-lg-3 col-form-label">Academic Year</label>
                      <div class="col-sm-7 col-lg-9">
                        <select name="academicYear" id="academicYear" class="form-select">
                            <option value="PUC-1">PUC 1</option>
                            <option value="PUC-2">PUC 2</option>
                            <option value="Engineering-1">Engg 1</option>
                            <option value="Engineering-2">Engg 2</option>
                            <option value="Engineering-3">Engg 3</option>
                            <option value="Engineering-4">Engg 4</option>
                        </select>
                      </div>
                    </div>
                    <script>
                       const selectBox1 = document.getElementById('academicYear');
                          for (let i = 0; i < selectBox1.options.length; i++) {
                            const optionValue1 = selectBox1.options[i].value;
                            if (optionValue1 == '<?php echo $year;?>') {
                              selectBox1.options[i].setAttribute('selected', true);
                            }
                          }
                    </script>
                    

                    <div class="row mb-3">
                      <label for="branch" class="col-sm-5 col-lg-3 col-form-label">Branch</label>
                      <div class="col-sm-7 col-lg-9">
                        <select name="branch" id="branch" class="form-select">
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
                    </div>
                    <script>
                       const selectBox2 = document.getElementById('branch');
                          for (let i = 0; i < selectBox2.options.length; i++) {
                            const optionValue2 = selectBox2.options[i].value;
                            if (optionValue2 == '<?php echo $branch;?>') {
                              selectBox2.options[i].setAttribute('selected', true);
                            }
                          }
                    </script>

                    <div class="row mb-3">
                      <label for="academicBlock" class="col-sm-5 col-lg-3 col-form-label">Academic Block</label>
                      <div class="col-sm-7 col-lg-9">
                        <select name="academicBlock" id="academicBlock" class="form-select mb-3">
                          <option value="AB-I">AB-I</option>
                          <option value="AB-II">AB-II</option>
                          <option value="AB-III">AB-III</option>
                        </select>
                      </div>
                    </div>
                    <script>
                       const selectBox3 = document.getElementById('academicBlock');
                          for (let i = 0; i < selectBox3.options.length; i++) {
                            const optionValue3 = selectBox3.options[i].value;
                            if (optionValue3 == '<?php echo $academic_block;?>') {
                              selectBox3.options[i].setAttribute('selected', true);
                            }
                          }
                    </script>

                    <div class="row mb-3">
                      <label for="hostelBlock" class="col-sm-5 col-lg-3 col-form-label">Hostel Block</label>
                      <div class="col-sm-6 col-lg-9">
                        <select name="hostelBlock" id="hostelBlock" class="form-select mb-3">
                          <option value="K2">K2</option>
                          <option value="K3">K3</option>
                          <option value="K4">K4</option>
                        </select>
                      </div>
                    </div>
                    <script>
                       const selectBox4 = document.getElementById('hostelBlock');
                          for (let i = 0; i < selectBox4.options.length; i++) {
                            const optionValue4 = selectBox4.options[i].value;
                            if (optionValue4 == '<?php echo $hostel_block;?>') {
                              selectBox4.options[i].setAttribute('selected', true);
                            }
                          }
                    </script>

                    <div class="row mb-3">
                      <label for="hostelRoom" class="col-sm-5 col-lg-3 col-form-label">Hostel Room</label>
                      <div class="col-sm-7 col-lg-9">
                        <input name="hostelRoom" type="text" class="form-control" id="hostelRoom" value="<?php echo $hostelroom;?>">
                      </div>
                    </div>
                   
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Detials</button>
                    </div>
                    
                  </form>
                  <!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
  <style>
    .row>*:nth-child(2){
      text-transform:capitalize;
    }
  </style>

</body>

</html>