<?php 
  include "repeats/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Leave Status</title>
  <meta http-equiv="refresh" content="300">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
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
     .card-body{
        width: 100%;
      }
      .dataTable-sorter::after,.dataTable-sorter::before{
        display: none;
      }
      .dataTable-info{
        padding-top: 10px;
      }
      .dataTable-table > tbody > tr > td{
        line-height:40px;
        font-weight:500;
        text-transform:capitalize;
        font-size:15px;
      }
      .leave-status .dataTable-bottom{
        padding: 10px;
        padding-right: 0; 
      }
      .dataTable-wrapper.no-footer .dataTable-container{
        padding: 5px 0px;
      }
      .leave-status .dataTable-top{
        padding: 10px;
        padding-right: 0;
      }
      @media(max-width:960px){
        .card-body{
          width: 750px;
          padding-right: 0;
        }
       .dataTable-top,.dataTable-bottom{
          display: flex;
          flex-direction: column;
          width: 250px;
          position: sticky;
          left: 20px;
          height: 100px;
          padding: 0px 8px 20px 0px;
          }
       .dataTable-top>*,.dataTable-bottom>*{
          margin: 5px 0px;
        }
      }
      @media(max-width:700px){
        #main{
          padding: 20px 5px;
        }
        .card-body{
          width: 700px;
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
      const subActiveChange = document.querySelector('.subs2');
      subActiveChange.classList.add('active');
    </script>

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Leave Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Leaves</li>
          <li class="breadcrumb-item active">Leave Status</li>
        </ol>
        <div class="sub-text">
          <p style="font-weight:600">* represents Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, atque.</p>
        </div>
      </nav>
    </div><!-- End Page Title -->

      <!-- Leave status -->
      <div class="col-11 mx-auto">
        <div class="card leave-status overflow-scroll">
            <div class="card-body mt-4">
              <table class="table table-borderless datatable">
                <?php
                  include "db_config.php";
                  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                  if(!$conn){
                    die('connection error'.mysqli_connect_error());
                  } else {
                    $id_number = $_SESSION['id_number'];
                    $stmt = $conn->prepare("SELECT * FROM `leaves` WHERE id_number = ? ORDER BY created_at DESC");
                    $stmt->bind_param('s', $id_number);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $s_no = 1;
                    if(mysqli_num_rows($result) > 0){
                ?>
                    <thead>
                      <tr>
                        <th scope="col" id="thing">S.NO</th>
                        <th scope="col" id="thing">FROM</th>
                        <th scope="col" id="thing">TO</th>
                        <th scope="col" id="thing">LEAVE TYPE</th>
                        <th scope="col" id="thing">Status</th>
                      </tr>
                    </thead>
                <tbody>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <th scope="row" style="line-height:40px;font-size:16px;"><?php echo $s_no?></th>
                    <td><?php echo $row['leave_from'];?></td>
                    <td><?php echo $row['leave_to'];?></td>
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
                    "><?php echo $row['leave_status'];?></span></td>
                  </tr>
                  <?php
                    $s_no+=1;
                    }}}
                  ?>
                </tbody>
              </table>
            </div>

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