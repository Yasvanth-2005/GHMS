<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Admin Complaints</title>
  <meta http-equiv="refresh" content="300">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
      .success,.pending,.recieved{
        border-radius:5px;
        font-weight:540;
        padding: 2px 5px;
      }
      .success{
        background-color:rgba(0,252,0);
      }
      .pending{
        background-color:rgba(252,252,0);
      }
      .recieved{
        background-color:rgba(252,176,0);
      }
      .griddies{
        cursor:pointer;
        padding: 5px 0px;
        border-top: 0.5px solid #999;
      }
      .details-grid{
          width: 100%;
          margin:auto;
          display:grid;
          grid-template-columns:80px 200px 110px auto 110px;
      }
      .dataTable-table > tbody > tr > th{
           padding: 8px 10px;
      }
      @media(max-width:900px){
        .card-body{
          width: 900px;
          padding-right: 0;
        }
        }
        .bold{
          font-weight:540;
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


</head>

<body>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.adc');
      mainChange.classList.remove('collapsed');
  </script>

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin Complaints</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Admin Complaints</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <div class="col-11 mx-auto">
          <div class="card overflow-scroll">
            <div class="card-body mt-4 ">
              <table class="table table-borderless another-datatable">
                
                <?php
                    include "db_config.php";
                    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                    if(!$conn){
                      die('connection error'.mysqli_connect_error());
                    } else {
                      $stmt = $conn->prepare("SELECT * FROM `complaints` WHERE complaint_status != 'closed' ORDER BY created_at DESC");
                      $stmt->execute();
                      $result = $stmt->get_result();
                      $s_no = 1;
                      if(mysqli_num_rows($result) > 0){
                    ?>
                    <thead>
                      <tr class="details-grid">
                        <th>S.NO</th>
                        <th>Complaint Type</th>
                        <th>Room No</th>
                        <th>Complaint</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr class="details-grid griddies" data-bs-toggle="modal" data-bs-target="#c-modal<?php echo $s_no;?>">
                            <th scope='row'><?php echo $s_no;?></th>
                            <td><?php echo $row['complaint_type'];?></td>
                            <td><?php echo $row['rno'];?></td>
                            <td><?php echo $row['complaint_desc'];?></td>
                            <td><span class="
                              <?php if($row['complaint_status']=='Pending'){
                                echo 'recieved';}
                                else if($row['complaint_status']=='Verified'){
                                  echo 'pending';
                                }
                                else{
                                  echo 'success';
                                }
                              ?>
                            "><?php echo $row['complaint_status'];?></span></td>
                          </tr>
                           <!-- Modal -->
                          <div class="modal fade" id="c-modal<?php echo $s_no;?>">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                  <div class="modal-content">
                                  <form action="changeComplaints.php" method="POST" style="padding:0;">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Complaint</h5>
                                      <button class="btn-close" data-bs-dismiss="modal" onclick='event.preventDefault()'></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold ">ID Number</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['id_number'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Date of Request</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['date_of_request'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Complaint Type</div>
                                              <div class="col-12 col-sm-7 value">
                                                <?php if($row['complaint_type'] == 'Other'){?>
                                                <?php echo $row['other'];?>
                                                <?php }else{?>
                                                <?php echo $row['complaint_type'];?>
                                                <?php }?>
                                              </div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Hostel Block</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['hostel_block'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Room Number</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['rno'];?></div>
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Comlaint Desc</div>
                                              <div class="col-12 col-sm-7 value"><?php echo $row['complaint_desc'];?></div>
                                              <input type="text" style="display:none" value="<?php echo $row['created_at'];?>" name="time">
                                              <input type="text" style="display:none" value="<?php echo $row['id_number'];?>" name="id">
                                            </div>
                                            <div class="row mt-3">
                                              <div class="col-12 col-sm-5 bold">Complaint Status </div>
                                              <div class="col-12 col-sm-7" >
                                                <?php if($row['complaint_status'] != 'Closed'){?>
                                                <select name="compStatus" id="compStatus" class="form-select">
                                                  <option value="Pending">Pending</option>
                                                  <option value="Verified">Verified</option>
                                                </select>
                                                <?php }else{?>
                                                  <?php echo $row['complaint_status'];?>
                                                <?php }?>
                                              </div>
                                              <script>
                                                    const selectBox1 = document.getElementById('compStatus');
                                                    for (let i = 0; i < selectBox1.options.length; i++) {
                                                      const optionValue1 = selectBox1.options[i].value;
                                                      if (optionValue1 == '<?php echo $row['complaint_status'];?>') {
                                                        selectBox1.options[i].setAttribute('selected', true);
                                                      }
                                                    }
                                              </script>
                                            </div>
                                    </div>
                                    <div class="modal-footer d-flex align-items-center">
                                    <input type="submit" class="btn btn-success" data-bs-dismiss="modal" value="Confirm">
                                    <button class="btn btn-danger" data-bs-dismiss="modal" onclick='event.preventDefault()'>Close</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                          </div>
                          <?php
                                $s_no += 1;
                              }
                            }
                          }
                        ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </main>

    

    <?php include 'repeats/datatable.php';?>


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