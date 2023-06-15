<?php include 'repeats/session.php'; ?>
<!DOCTYPE hmtl>
<hmtl lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Admin Dashboard</title>
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

  <style>
  thead{
      display: none;
   }
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

  <!-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
    include "repeats/header.php";
  ?>
  <script>
      const mainChange = document.querySelector('.ind');
      mainChange.classList.remove('collapsed');
  </script>
         

   <!-- Left side columns -->
   <main id="main" class="main">

<div class="pagetitle">
  <h1>Admin Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Admin Dashboard</li>
    </ol>
  </nav>
</div>

<div class="my-3 w-100 d-flex justify-content-center notify"><button class="btn btn-primary">Add New Notification</button></div>

<div class="main-form mx-auto active">
          <form action="notification-reg.php" method="POST" enctype="multipart/form-data">
            <h5 class="card-title">New Notifications</h5>
              <div class="row">
                  <div class="col-12 mt-3">
                      <label for="title" class="form-label">Notification Title *</label>
                      <input type="text" name="notificationTitle" id="title" class="form-control mb-3">
                  </div>
                  <div class="col-12">
                      <label for="short-desc" class="form-label">Short Description *</label>
                      <textarea name="shortDesc" id="short-desc" rows="3" class="form-control mb-3"></textarea>
                  </div>
                  <div class="col-12">
                      <label for="long-desc" class="form-label">Long Description *</label>
                      <textarea name="longDesc" id="long-desc" rows="20" class="form-control mb-3"></textarea>
                  </div>
                  <div class="col-12 mt-3">
                      <label for="links" class="form-label">Notification links</label>
                      <input type="text" name="notificationlinks" id="links" class="form-control mb-3">
                  </div>
                  <div class="col-12 mt-3">
                      <label for="doc_name" class="form-label">Notification File Name</label>
                      <input type="text" name="notificationdoc_name" id="doc_name" class="form-control mb-3">
                  </div>
                  <div class="col-12 mt-3">
                      <label for="docs" class="form-label">Notification File</label>
                      <input type="file" name="notificationdocs" id="docs" class="form-control mb-3">
                  </div>
              </div>
              <div id="error-msg" class="text-center mb-3" style="color:rgba(200,40,40);font-weight:600"></div>
              <div class="w-100">
                  <input type="submit" value="Send Notification" class="btn btn-primary w-50" style="margin:5px 25%" id="submit-btn">
              </div>
          </form>
</div>
<style> 
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
<script>
    const formBtn = document.querySelector('.notify button')
    const form = document.querySelector('.main-form');
    formBtn.addEventListener('click',function(){
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
        const title = document.getElementById('title').value;
        const shortDesc = document.getElementById('short-desc').value;
        const longDesc = document.getElementById("long-desc").value;
        let error = 0;
        if(title === '' || shortDesc === '' || longDesc === ''){
          errorMsg.innerHTML = 'All fields with * are required';
          error = 1;
        }
        else{
          errorMsg.innerHTML = '';
          error = 0;
        }
        return error;
      }
</script>

<div class="notice-board mx-auto mt-4">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Notice Board</h5>
            <table class="table table-borderless another-datatable">
                <thead><tr><th></th>
                <th></th></tr></thead>
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
                                  <h6 class="mt-3 ext<?php echo $s_no; ?>">External-links :-&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['links'];?>"><?php echo $row['links'];?></a></h6>
                                  <h6 class="mt-3 doc<?php echo $s_no; ?>">Files :-&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['docs'];?>" download><?php echo $row['doc_name'];?></a></h6>
                                  <script>
                                      var extlsec = document.querySelector('.ext<?php echo $s_no; ?>');
                                      <?php if ($row['links'] == null) { ?>
                                        extlsec.style.display = 'none';
                                      <?php } ?>

                                      var doclsec = document.querySelector('.doc<?php echo $s_no;?>');
                                      <?php if ($row['docs'] == null) {?>
                                         doclsec.style.display = 'none';
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

<link href="assets/css/main-table.css" rel="stylesheet">
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
  <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>