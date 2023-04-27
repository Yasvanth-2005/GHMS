<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Hostel Attendance</title>
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
        table.dataTable td a{
            color:black;
        }
        table.dataTable thead>tr>td.sorting:after,table.dataTable thead>tr>td.sorting:before{
            display: none;   
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
            grid-template-columns:80px 150px auto auto;
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
        .main-form{
            margin: 10px;
            width: 98%;
            background-color: white;
            box-shadow: 2px 2px 3px rgba(0,0,0,0.25);
            max-width: 400px;
        }
        .main-form.active{
            display: none;
        }
        form{
            padding: 10px 30px;
        }
   </style>


</head>

<body>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.ha');
      mainChange.classList.remove('collapsed');
  </script>

   <main id="main" class="main">
    <div class="pagetitle">
        <h1>Hostel Attendance</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Hostel Attendance</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="mt-3 mb-5 w-100 d-flex justify-content-center upload"><button class="btn btn-primary">Upload Hostel Attendance</button></div>

    <div class="main-form mx-auto active mb-5 mt-5">
            <form action="attendance-reg.php" method="POST" enctype="multipart/form-data">
                <h5 class="card-title">Upload Hotel Attendance</h5>
                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="hostel" class="form-label">Hostel</label>
                        <select class="form-select mb-3" name="hostel" id="hostel">
                            <option value="K1">K1</option>
                            <option value="K2">K2</option>
                            <option value="K3">K3</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control mb-3" name='file' id="file">
                    </div>
                </div>
                <div id="error-msg" class="text-center mb-3" style="color:rgba(200,40,40);font-weight:600"></div>
                <div class="w-100">
                    <input type="submit" value="Upload" class="btn btn-primary w-50" style="margin:5px 25%" id="submit-btn">
                </div>
            </form>
    </div>
    <script>
        const formBtn = document.querySelector('.upload button')
        const form = document.querySelector('.main-form');
        formBtn.addEventListener('click',function(){
            console.log('yash');
            form.classList.toggle('active');
        });

        const submitBtn = document.getElementById('submit-btn');
        const errorMsg = document.querySelector('#error-msg');
        submitBtn.addEventListener('click',function(e){
        const errorCount = validateForm();
            if(errorCount != 0){
            e.preventDefault();
            }
        })
        function validateForm(){
            const file = document.getElementById('file').value;
            let error = 0;
            if(file === ''){
            errorMsg.innerHTML = 'Please Choose a file';
            error = 1;
            }
            else{
            errorMsg.innerHTML = '';
            error = 0;
            }
            return error;
        }
    </script>

    <div class="col-11 mb-5 mx-auto">
        <div class="card leave-status overflow-scroll">
            <div class="card-body mt-4">
                <div class="pagetitle mb-4">
                    <h1 style="font-size:20px">K1 Attendence</h1>
                </div>
              <table class="table table-borderless another-datatable" style="width:100%">
                 <thead>
                    <tr class="details-grid">
                        <td>S.no</td>
                        <td>Date</td>
                        <td>Hostel</td>
                        <td>Attendance Sheet</td>
                    </tr>
                 </thead>
                 <?php 
                        include 'db_config.php';
                        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
                        $sql = "SELECT * FROM hostel_attendance WHERE hostel = 'K1' ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $s_no = 1;
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr class="details-grid griddies">
                                    <td><?php echo $s_no ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['hostel'] ?></td>
                                    <td><a href="sheets/<?php echo $row['attendance_sheet'];?>" download><span><i class="bi bi-cloud-download-fill" style="margin-right:10px;width:10px"></i></span>Download</a></td>
                                </tr>
                    <?php 
                                $s_no += 1;
                            }
                        }
                ?>
              </table>
            </div>
          </div>

        </div>
    </div>

    <div class="col-11 mb-5 mx-auto">
        <div class="card leave-status overflow-scroll">
            <div class="card-body mt-4">
                <div class="pagetitle mb-4">
                    <h1 style="font-size:20px">K2 Attendence</h1>
                </div>
              <table class="table table-borderless another-datatable" style="width:100%">
                 <thead>
                    <tr class="details-grid">
                        <td>S.no</td>
                        <td>Date</td>
                        <td>Hostel</td>
                        <td>Attendance Sheet</td>
                    </tr>
                 </thead>
                 <?php 
                        include 'db_config.php';
                        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
                        $sql = "SELECT * FROM hostel_attendance WHERE hostel = 'K2' ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $s_no = 1;
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr class="details-grid griddies">
                                    <td><?php echo $s_no ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['hostel'] ?></td>
                                    <td><a href="sheets/<?php echo $row['attendance_sheet'];?>" download><span><i class="bi bi-cloud-download-fill" style="margin-right:10px;width:10px"></i></span>Download</a></td>
                                </tr>
                    <?php 
                                $s_no += 1;
                            }
                        }
                ?>
              </table>
            </div>
          </div>

        </div>
    </div>

    <div class="col-11 mb-5 mx-auto">
        <div class="card leave-status overflow-scroll">
            <div class="card-body mt-4">
                <div class="pagetitle mb-4">
                    <h1 style="font-size:20px">K3 Attendence</h1>
                </div>
              <table class="table table-borderless another-datatable" style="width:100%">
                 <thead>
                    <tr class="details-grid">
                        <td>S.no</td>
                        <td>Date</td>
                        <td>Hostel</td>
                        <td>Attendance Sheet</td>
                    </tr>
                 </thead>
                 <?php 
                        include 'db_config.php';
                        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
                        $sql = "SELECT * FROM hostel_attendance WHERE hostel = 'K3' ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $s_no = 1;
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr class="details-grid griddies">
                                    <td><?php echo $s_no ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['hostel'] ?></td>
                                    <td><a href="sheets/<?php echo $row['attendance_sheet'];?>" download><span><i class="bi bi-cloud-download-fill" style="margin-right:10px;width:10px"></i></span>Download</a></td>
                                </tr>
                    <?php 
                                $s_no += 1;
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