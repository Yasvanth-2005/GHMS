<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Student Details</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
  <style>
        .side-heading{
          padding-left: 10px;
          font-size:22px;
          margin-top: 30px;
          border-left: 5px solid rgba(40,40,200);
        }
        .stu-name{
          font-size:24px;
        }
        .detail1{
          font-size:22px;
          margin-top: 10px;
          font-weight:550;
        }
        .detail2{
          margin-top: 15px;
          font-size:20px;
          font-weight:500;
        }
        .detail3{
          margin-top: 10px;
          font-size:19px;
          font-weight:540;
        }
        .detail4{
          margin-top: 10px;
          font-size:18px;
        }
        @media(max-width:576px){
          .stu-name,.detail1,.detail2{
            text-align:center;
            margin-top: 10px;
          }
        }
        .modal-dialog{
          width: 98%;
          max-width:1000px;
        }
        .modal-dialog-scrollable .modal-content{
          min-height:500px;
          max-height:80vh;
          border-radius:0;  
        }
        .modal-header{
          border-bottom: none;
        }
        .griddies{
          padding: 5px 0px;
          border-top:0.5px solid #999;
          border-bottom:0.5px solid #999;
        }
        .details-grid{
            width: 100%;
            margin:auto;
            display:grid;
            grid-template-columns:80px 150px auto 200px;
        }
        .dataTable-table > tbody > tr > th{
            padding: 8px 10px;
        }
        @media(max-width:960px){
        .card-body{
          width: 750px;
          padding-right: 0;
        }
        }
   </style>


</head>

<body>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.std');
      mainChange.classList.remove('collapsed');
  </script>

   <main id="main" class="main">
    <div class="pagetitle">
        <h1>Student Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Student Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-11 mx-auto">
        <div class="card leave-status overflow-scroll">
            <div class="card-body mt-4">
              <table class="table table-borderless another-datatable">
                 <thead>
                   <tr class="details-grid">
                      <th>S.no</th>
                      <th>Id Number</th>
                      <th>Student Name</th>
                      <th>Mobile Number</th>
                   </tr>
                 </thead>
                 <?php 
                  include 'db_config.php';
                  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                  if(!$conn){
                    die('connection error'.mysqli_connect_error());
                  }
                  else{
                    $s_no = 1;
                    $sql = "SELECT * FROM student_registrations";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                        ?>
                          <tr class="details-grid griddies" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#sd-modal<?php echo $s_no;?>">
                              <th><?php echo $s_no;?></th>
                              <td><?php echo $row['id_number'];?></td>
                              <td><?php echo $row['student_name']?></td>
                              <td><?php echo $row['student_phno']?></td>
                          </tr>
                          <!-- Modal -->
                          <div class="modal fade" id="sd-modal<?php echo $s_no;?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12 col-sm-4 col-md-3 d-flex justify-content-center align-item-center">
                                        <img src="https://intranet.rguktn.ac.in/SMS/usrphotos/user/<?php echo $row['id_number']?>.jpg" style="width:150px;height:200px;">
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                          <div class="row">
                                            <div class="col-12 stu-name"><b><?php echo $row['student_name']?></b></div>
                                            <div class="col-12 detail1"><?php echo $row['id_number']?></div>
                                            <div class="col-12 detail1">Password : <?php echo $row['password']?></div>
                                            <div class="col-6 col-sm-6 detail2"><?php echo $row['academic_year']?></div>
                                            <div class="col-6 col-sm-6 detail2"><?php echo $row['branch']?></div>
                                          </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="side-heading">
                                          Student Details
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Academic Block</div>
                                              <div class="col-12 detail4"><?php echo $row['academic_block']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Class room</div>
                                              <div class="col-12 detail4"><?php echo $row['class_room']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Hostel Block</div>
                                              <div class="col-12 detail4"><?php echo $row['hostel_block']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Hostel Room</div>
                                              <div class="col-12 detail4"><?php echo $row['hostel_room']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Blood group</div>
                                              <div class="col-12 detail4"><?php echo $row['blood_group']?></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="side-heading">
                                          Parents Details
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Mother Name</div>
                                              <div class="col-12 detail4"><?php echo $row['mother_name']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Father Name</div>
                                              <div class="col-12 detail4"><?php echo $row['father_name']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Gaurdian Name</div>
                                              <div class="col-12 detail4"><?php echo $row['gaurdian_name']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Mother Phone Number</div>
                                              <div class="col-12 detail4"><?php echo $row['mother_phno']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Father Phone Number</div>
                                              <div class="col-12 detail4"><?php echo $row['father_phno']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Gaurdian Phone Number</div>
                                              <div class="col-12 detail4"><?php echo $row['gaurdian_phno']?></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="side-heading">
                                          Address
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">State</div>
                                              <div class="col-12 detail4"><?php echo $row['state']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">District</div>
                                              <div class="col-12 detail4"><?php echo $row['district']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Mandal</div>
                                              <div class="col-12 detail4"><?php echo $row['mandal']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Village/Town</div>
                                              <div class="col-12 detail4"><?php echo $row['village']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Door No/Street</div>
                                              <div class="col-12 detail4"><?php echo $row['street']?></div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-lg-4 col-sm-6 mt-3">
                                            <div class="row">
                                              <div class="col-12 detail3">Pin code</div>
                                              <div class="col-12 detail4"><?php echo $row['pin_code']?></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php
                        $s_no += 1;
                      }
                    }
                  }
                 ?>
              </table>
            </div>

          </div>

        </div>
    </div>

   </main>

  
  <?php include 'repeats/datatable.php';?>
         


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
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>