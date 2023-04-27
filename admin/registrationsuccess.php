<?php 
  session_start();
  if(!isset($_SESSION['id_number']))
  {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | success card-body </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-kp/1K/VYYXYtR45Th7g72KjzKk7seuHvX9m7nK04g/YJaG7fHw2zJMY7RtR5D7yJd60Ru1I7LzfvCZ5r5qF+5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    body{
      min-height: 100vh;
      width: 100%;
    }
    .card{
      position: relative;
      width: 90%;
      max-width:500px;
      height: auto;
      animation: card .5s linear;
      margin-top: 40px;
      padding: 0;
    }
    @keyframes card{
      0%{
        transform: translateY(-100px);
        opacity: 0;

      }
      100%{
        transform: translateY(0px);
        opacity: 1;
      }
    }

    .card-body{
      display: flex;
      flex-direction: column;
      width: 100%;
      margin: 0;
    }
    .card-body .details{
      width: 100%;
    }
    
    
  </style>


</head>
<body class="d-flex justify-content-center align-items-center ">
  <div class="card" id="card">
    <div class="card-head  d-flex flex-column justify-content-center align-items-center" style="background-color:limegreen">
      <i class="bi bi-check-circle text-white h1 mt-2" style="font-size: 100px"></i>
      <span class="text-white text-center  mb-3" style="font-weight:700;font-size: 20px;">Successfully submited</span>
    </div>
    <div class="card-body d-flex" style="padding:0">
      <div class="col-12 h3 text-center  mt-2" style="font-size:32px;font-weight:750;">Sribabu</div>
      <div class="details  d-flex justify-content-center align-items-center flex-wrap">
        <div class="col-sm-4" style="width: 150px;height: 150px;">
          <img src="" alt="" width="100%" height="100%">
        </div>
        <div class="col-sm-8 mt-3 ">
          <table class="table">
            <tr>
              <th>ID Number</th>
              <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
              <td>N210522</td>
            </tr>
            <tr>
              <th>Password</th>
              <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
              <td>^d7c25*</td>
            </tr>
          </table>
        </div>
      </div>
      <a href="student-register.php">
       <button class="d-flex justify-content-center align-items-center my-2 btn btn-success mx-auto" style="width:100px;background:rgba(40,200,40)">
          <span style="padding:2px 20px">Back</span>
       </button>
      </a>

    </div>
  </div>
</body>



    </html>