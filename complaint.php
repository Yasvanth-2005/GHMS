<?php 
  include "repeats/sessions.php";
   if(isset($_SESSION['error_message'])){
    echo "<script>alert('{$_SESSION['error_message']}')</script>";
    unset($_SESSION['error_message']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Complaints</title>
  <meta http-equiv="refresh" content="300">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
    .dataTable-table > thead > tr > th{
      border-bottom:none;
    }
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
    .bold{
      font-size:19px;
      font-weight:540;
    }
    .value{
      font-size: 18px;
    }
     .card-body{
        width: 100%;
      }
      .datatable tr td {
            font-size:16px;
            font-weight: 500;
            line-height:20px;
      }
      .dataTable-sorter::after,.dataTable-sorter::before{
        display: none;
      }
      .dataTable-info{
        padding-top: 30px;
      }
      .dataTable-wrapper.no-footer .dataTable-container{
        padding: 5px 0px;
      }
      .main-form {
        margin: 10px;
        width: 98%;
        background-color: white;
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.25);
        max-width: 400px;
        margin-bottom: 70px;
      }

      form {
        padding: 10px 30px;
      }

      .hide-other {
        display: none;
      }

      .hide-other.active {
        display: block;
      }

      .main-form {
        display: none;
      }

      .main-form.active {
        display: block;
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
      const mainChange = document.querySelector('.com');
      mainChange.classList.remove('collapsed');     
    </script>

  <section id="main" class="main">

    <div class="pagetitle">
      <h1>Complaints</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Complaints</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="my-5 w-100 d-flex justify-content-center">
      <button class="btn btn-primary complaint-btn">
        Register new Complaint
      </button>
    </div>

    <div class="main-form mx-auto">
      <form action="complaint-reg.php" method="POST">
        <div class="row">
          <div class="col-12 input_field">
            <label for="complaint-type" class="form-label">
              Complaint Type
            </label>
            <select name="complaintType" id="complaint-type" class="form-select mb-3">
              <option value="electrical">Electrical</option>
              <option value="house-keeping">House Keeping</option>
              <option value="plumbing">Plumbing</option>
              <option value="personal">Personal</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="col-12 hide-other">
            <label for="other-complaint" class="form-label">
              Other
            </label>
            <input type="text" id="other-complaint" name="otherComplaint" class="form-control mb-3"
              placeholder="What type of problem is it?">
          </div>
          <div class="col-12">
            <label for="hb" class="form-label">Hostel Block</label>
            <input type="text" name="hostel_block" id="hb" class="form-control mb-3"
              placeholder="Eg:- K2">
          </div>
          <div class="col-12">
            <label for="Room-Number" class="form-label">Room-Number</label>
            <input type="text" name="room_number" id="Room-Number" class="form-control mb-3"
              placeholder="Eg:- FF-32">
          </div>
          <div class="col-12">
            <label for="complaint" class="form-label">Complaint</label>
            <textarea name="leaveComplaint" id="complaint" rows="3" class="form-control mb-3"
              placeholder="Type the problem here"></textarea>
          </div>
        </div>
        <div id="error-msg" class="text-center pb-2" style="color:rgb(200,40,40);font-weight:600;"></div>
        <div class="w-100 d-flex justify-content-center">
          <input type="submit" value="Register Complaint" class="btn btn-primary" id="submit-btn" style="width:160px;">
        </div>
      </form>
    </div>
    <script>
      const selectbox = document.querySelector(".input_field select");
      const otherBox = document.querySelector('.hide-other');
      selectbox.addEventListener('click', function () {
        if (document.querySelector(".input_field select option[value='other']").selected) {
          otherBox.classList.add('active');
        } else {
          otherBox.classList.remove('active');
        }
      });

      const complaintBtn = document.querySelector('.complaint-btn');
      const complaintBox = document.querySelector('.main-form');
      complaintBtn.addEventListener('click', function () {
        console.log('yash');
        complaintBox.classList.toggle('active');
      })
    </script>

    <!-- complaints table -->
    <div class="col-11 mx-auto">
      <div class="card overflow-scroll">

        <div class="card-body mt-4 "> 


          <table class="table table-borderless datatable">
            <?php 
                include "db_config.php";
                $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
                if(!$conn){
                  die('connection error'.mysqli_connect_error());
                } else {
                  $id_number = $_SESSION['id_number'];
                  $stmt = $conn->prepare("SELECT * FROM `complaints` WHERE id_number = ? ORDER BY created_at DESC");
                  $stmt->bind_param('s', $id_number);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $s_no = 1;
                  if(mysqli_num_rows($result) > 0){
            ?>
                <thead>
                  <tr>
                    <th scope="col" style="border-bottom:none">S.NO</th>
                    <th scope="col" style="border-bottom:none">COMPLAINT TYPE</th>
                    <th scope="col" style="border-bottom:none">Room No</th>
                    <th scope="col" style="border-bottom:none">Complaint</th>
                    <th scope="col" style="border-bottom:none">Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                      ?>
                      <tr class="mt-4" data-bs-toggle="modal" data-bs-target="#c-modal<?php echo $s_no;?>" style="cursor:pointer;">
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
                      <div class="modal fade" id="c-modal<?php echo $s_no;?>">
                          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                              <form action="changeComplaints.php" style="padding:0" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title">Complaint</h5>
                                <button class="btn-close" data-bs-dismiss="modal" onclick='event.preventDefault()'></button>
                              </div>
                              <div class="modal-body">
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold ">ID Number :</div>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['id_number'];?></div>
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold">Date of Request :</div>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['date_of_request'];?></div>
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold">Complaint Type :</div>
                                        <div class="col-12 col-sm-6 value">
                                          <?php if($row['complaint_type'] == 'Other'){?>
                                          <?php echo $row['other'];?>
                                          <?php }else{?>
                                          <?php echo $row['complaint_type'];?>
                                          <?php }?>
                                        </div>
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold">Hostel Block :</div>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['hostel_block'];?></div>
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold">Room Number :</div>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['rno'];?></div>
                                      </div>
                                      <div class="row mt-3">
                                        <div class="col-12 col-sm-6 bold">Comlaint Description :</div>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['complaint_desc'];?></div>
                                      </div>
                                      <div class="row mt-3 mb-3">
                                        <div class="col-12 col-sm-6 bold">Complaint Status :</div>
                                        <?php 
                                          if($row['complaint_status'] == 'Verified'){
                                        ?>
                                        <div class="col-12 col-sm-6">
                                          <input type="text" style="display:none" value="<?php echo $row['created_at'];?>" name="time">
                                          <input type="text" style="display:none" value="<?php echo $row['id_number'];?>" name="id">
                                          <select name="compStatus" id="compStatus" class="form-select">
                                            <?php if($row['complaint_status'] !== 'Closed'){?>
                                              <option value="Verified">Verified</option>
                                            <?php }?>
                                            <option value="Closed">Closed</option>
                                          </select>
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
                                      <?php }
                                      else if ($row['complaint_status'] == 'Closed'){?>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['complaint_status'];?></div>
                                      <?php }
                                      else {?>
                                        <div class="col-12 col-sm-6 value"><?php echo $row['complaint_status'];?></div>
                                      <?php
                                      }
                                      ?>
                              </div>
                              <div class="modal-footer d-flex align-items-center">
                              <input type="submit" class="btn btn-success" data-bs-dismiss="modal" value="Ok">
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
                        else{
                          echo "<style>.col-11{display:none}</style>";
                        }
                      }
                    ?> 
            </tbody>
          </table>
          <h5 style="font-weight:700" class="mt-2">Note :-</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, deleniti. Officiis necessitatibus debitis voluptas incidunt!</p>
        </div>

      </div>
    </div>
  </section>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>RGUKT Nuzvid</span></strong>. All Rights Reserved
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

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

    
  

<script>
  const submitBtn = document.getElementById('submit-btn');
  submitBtn.addEventListener('click', function(e){
    const errorCount = validateForm();
    if(errorCount != 0){
      e.preventDefault();
    }
  })
  function validateForm(){
    const complaintType = document.getElementById('complaint-type').value;
    const otherComplaint = document.getElementById('other-complaint').value;
    const roomNumber = document.getElementById('Room-Number').value;
    const complaint = document.getElementById('complaint').value;
    const errorMsg = document.getElementById('error-msg');
    let error = 0;
    if(complaintType === '' || roomNumber === '' || complaint === ''){
      errorMsg.innerHTML = 'All fields are required';
      error = 1;
    }
    else if(complaintType === 'other' && otherComplaint === ''){
      errorMsg.innerHTML = 'All fields are required';
      error = 1;
    }
    else{
      errorMsg.innerHTML = '';
      error = 0;
    }
    return error;
  }
</script>


</body>

    </html>