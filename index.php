<?php 
  include "repeats/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
        .offcanvas-footer{
          display: flex;
          justify-content:flex-end;
          padding: 10px;
        }
        .call_it{
          font-size:20px;
        }
        .offcanvas a{
          color:blue;
        }
        .offcanvas a:hover{text-decoration:underline}
        .datatable tr td a {
            font-size:16px;
            font-weight: 600;
            line-height:20px;
        }
        .dataTable-table > thead > tr > th{
          border-bottom: none;
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
  <link rel="stylesheet" href="assets/css/main-table.css">


</head>

<body>

  <!-- ======= Header ======= -->
    <?php include 'repeats/header.php';?>
    <script>
      const mainChange = document.querySelector('.ind');
      mainChange.classList.remove('collapsed');
    </script>

        <!-- Left side columns -->
          <main id="main" class="main">

            <div class="pagetitle">
              <h1>Dashboard</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </nav>
            </div>

            <div class="notice-board mx-auto mt-4">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Notice Board</h5>
            <table class="table table-borderless datatable">
                <?php 
                    include 'db_config.php';
                    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                    $sql = "SELECT * FROM notifications ORDER BY created_at DESC";
                    $res_not = mysqli_query($conn,$sql);
                    $s_no = 1;
                    if(mysqli_num_rows($res_not) > 0){
                    while($row = mysqli_fetch_assoc($res_not)){
                  ?>
                    <tr data-bs-toggle="offcanvas" href="#offcanvas<?php echo $s_no;?>" style="cursor:pointer">
                    <td><a><?php echo $row['short_desc'];?></a></td>
                    <td><?php echo $row['date'];?></td>
                    </tr>
                              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas<?php echo $s_no;?>">
                                <div class="offcanvas-header">
                                  <h5 class="offcanvas-title"><?php echo $row['title'];?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                 <div class="notice-title">
                                    <h1 class='call_it'><?php echo $row['short_desc'];?></h1>
                                  </div>
                                  <div style="font-size:16px" class="my-4">
                                  <?php
                                    $structure = $row['long_desc'];
                                    $values = explode(',', $structure);
                                    foreach($values as $value) {
                                        echo $value . "<br/>";
                                    }
                                  ?>
                                  </div>
                                  <h6 class="mt-3 ext<?php echo $s_no; ?>">External-links :<a href="<?php echo $row['links'];?>"><?php echo $row['links'];?></a></h6>
                                  <script>
                                      var extlsec = document.querySelector('.ext<?php echo $s_no; ?>');
                                      <?php if ($row['links'] == null) { ?>
                                        extlsec.style.display = 'none';
                                      <?php } ?>
                                  </script>
                                </div>
                                <div class="offcanvas-footer">
                                  <button class="btn btn-danger" data-bs-dismiss="offcanvas">Close</button>
                                </div>
                              </div>  
                              <?php 
                                  $s_no += 1;
                                  };
                                }
                              ?>                      
                           </table>
                          </div>
                        </div>
      </div>


            <style>
          .card{
              width: 100%;
              max-width:1000px;
              margin:auto;
          }
          .griddies{
            border-top:0.5px solid #999;
          }
          @media(max-width:600px){
            .card-body{
              width: 600px;
              padding-right: 0;
          }
          }
    </style>
      </main>

     

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