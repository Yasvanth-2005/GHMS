<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Leave Requests</title>
  <meta http-equiv="refresh" content="300">
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
        tbody tr td{
          vertical-align:middle;
          font-weight:550;
        }
          .danger,.success,.pending{
            border-radius:5px;
            font-weight:540;
            padding: 2px 5px;
          }
          .danger{
            background-color:rgba(252,90,90);
          }
          .success{
            background-color:rgba(0,252,0);
          }
          .pending{
            background-color:rgba(252,252,0);
            color:black;
          }
          .card{
              width: 100%;
              max-width:1000px;
              margin:auto;
          }
          .griddies{
            border-top:0.5px solid #999;
          }
          .griddies:hover{
            transform:scale(1.01);
          }
          @media(max-width:600px){
            .card-body{
              width: 600px;
              padding-right: 0;
          }
          }
          .bold{
            font-weight:600;
            font-size:19px;
           }
         .value{
           font-size:18px;
         }
         .modal-footer{
           justify-content:flex-end;
           gap:20x;
          }
    </style>

</head>

<body>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.lea');
      mainChange.classList.remove('collapsed');
  </script>

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Leave Requests</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Leave Requests</li>
            </ol>
            <p style="font-weight:600">* represents Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, atque.</p>
        </nav>
        </div><!-- End Page Title -->

        

        <!-- Leave status -->
        <div class="col-11 mx-auto">
            <div class="card leave-status overflow-scroll">
                <div class="card-body mt-4">
                <table class="table table-borderless another-datatable">
                    <?php
                    include "db_config.php";
                    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                    if(!$conn){
                        die('connection error'.mysqli_connect_error());
                    } else {
                        $stmt = $conn->prepare("SELECT * FROM `leaves` ORDER BY created_at DESC");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $s_no = 1;
                        if(mysqli_num_rows($result) > 0){
                    ?>
                        <thead>
                          <tr>
                                  <th>S.NO</th>
                                  <th>Id Number</th>
                                  <th>LEAVE TYPE</th>
                                  <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr class="griddies" data-bs-toggle="modal" data-bs-target="#l-modal<?php echo $s_no;?>" style="cursor:pointer;">
                                    <th scope="row" style="line-height:40px;font-size:16px;"><?php echo $s_no?></th>
                                    <td><?php echo $row['id_number'];?></td>
                                    <td><?php echo $row['leave_type'];?></td>
                                    <td><span  class="
                                      <?php if($row['leave_status']=='Rejected'){
                                          echo 'danger';}
                                          else if($row['leave_status']=='Granted*'){
                                            echo 'success';
                                          }else{
                                            echo 'pending';
                                          }
                                        ?>
                                      "><?php echo $row['leave_status'];?></span>
                                    </td>
                                </tr>
                                <div class="modal fade" id="l-modal<?php echo $s_no;?>">
                                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                          <form action="changeLeave.php" method="post">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Leave Request</h5>
                                            <button class="btn-close" data-bs-dismiss="modal" onclick='event.preventDefault()'></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">ID Number</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['id_number'];?></div>
                                              <input type="text" style="display:none" value="<?php echo $row['id_number'];?>" name="id">
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Date of Request</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['date_of_request'];?></div>                                              
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Leave From</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['leave_from'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Leave To</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['leave_to'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Leave Type</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['leave_type'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Reason</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['reason'];?></div>
                                              <input type="text" style="display:none" value="<?php echo $row['created_at'];?>" name="time">
                                            </div>
                                            <?php if($row['leave_status'] == 'Pending'){?>
                                            <div class="row mt-3 mb-3">
                                              <div class="col-12 col-sm-5 bold">Leave Status</div>
                                              <div class="col-12 col-sm-7 value">
                                                <select name="leaveStatus" id="leaveStatus" class="form-select">
                                                        <option value="pending">Pending</option>
                                                        <option value="granted*">Granted</option>
                                                        <option value="rejected">Rejected</option>
                                                </select>
                                              </div>
                                            <?php }else{?>
                                              <div class="row mt-3">
                                                <div class="col-12 col-sm-5 bold">Leave Status :</div>
                                                <div class="col-12 col-sm-7 value"><?php echo $row['leave_status'];?></div>
                                              </div>
                                            <?php }?>
                                          </div>
                                          <div class="modal-footer d-flex align-items-center">
                                            <input type="submit" class="btn btn-success" value="Ok">
                                            <button class="btn btn-danger" type="button" onclick='event.preventDefault()' data-bs-dismiss="modal">Close</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                </div>
                            <?php $s_no+=1; }}} ?>
                        </tbody>

                </table>
                </div>

            </div>

            </div>
        </div>



    </main>
    <!-- End #main -->

    <?php include 'repeats/datatable.php'; ?>
    
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
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>