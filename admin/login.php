<?php
session_start();
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('{$_SESSION['error_message']}')</script>";
    unset($_SESSION['error_message']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
        .form-control.stop-focus{
          box-shadow: none;
          outline:none;
        }
  </style>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    .tab-pane.show.fade{
      display: none;
    }
    .tab-pane.show.fade.active{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    i.bi{
      font-size:22px;
    }
    i.bi.bi-key-fill{
      transform: rotate(30deg);
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

      

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#caretaker-login" type="button">Care Taker</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#warden-login" type="button">Warden</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#adsw-login" type="button">ADSW</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dsw-login" type="button">DSW</button>
            </li>
        </ul>

        <div class="container">
          <div class="row tab-content">

            <!-- Caretaker Login -->
            <div id="caretaker-login" class="tab-pane fade mx-auto show active col-lg-4 col-md-6">

              <div class="d-flex justify-content-center py-4">
                <div  class="logo d-flex align-items-center w-auto" style="flex-direction:column">
                  <span class="mb-3">GHMS</span>
                  <span>Care Taker Login</span>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <form class="row g-3 p-4" id="caretakerLogin" name="caretakerLogin" method="POST" action="caretaker-login.php">
                    <div class="col-12">
                      <label for="caretaker-username" class="form-label">Username</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="User Id" name="caretaker_username" id="caretaker-username">
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="caretaker-password" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control stop-focus" placeholder="password" name="caretaker_password" id="caretaker-password">
                      </div>
                    </div>
                    <div class="col-12 pt-3">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>  
                  </form>
                </div>
              </div>


            </div>

            <!-- Warden Login -->
            <div id="warden-login" class="tab-pane fade mx-auto col-lg-4 col-md-6">

              <div class="d-flex justify-content-center py-4">
                <div  class="logo d-flex align-items-center w-auto" style="flex-direction:column">
                  <span class="mb-3">GHMS</span>
                  <span>Warden Login</span>
                </div>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <form class="row g-3 p-4" id="wardenLogin" method="post" action="warden-login.php">

                    <div class="col-12">
                      <label for="warden-username" class="form-label">Username</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="User Id" name="warden_username" id="warden-username">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="warden-password" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="password" name="warden_password" id="warden-password">
                      </div>
                    </div>

                    <div class="col-12 pt-3">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>  
                  </form>

                </div>
              </div>
            </div>

            <!-- ADSW Login -->
            <div id="adsw-login" class="tab-pane fade mx-auto col-lg-4 col-md-6">

              <div class="d-flex justify-content-center py-4">
                <div  class="logo d-flex align-items-center w-auto" style="flex-direction:column">
                  <span class="mb-3">GHMS</span>
                  <span>ADSW Login</span>
                </div>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <form class="row g-3 p-4" id="adswLogin" method="post" action="adsw-login.php">

                    <div class="col-12">
                      <label for="adsw-username" class="form-label">Username</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="User Id" name="adsw_username" id="adsw-username">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="adsw-password" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="password" name="adsw_password" id="adsw-password">
                      </div>
                    </div>

                    <div class="col-12 pt-3">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>  
                  </form>

                </div>
              </div>

            </div>

            <!-- DSW Login -->
            <div id="dsw-login" class="tab-pane fade mx-auto col-lg-4 col-md-6">

              <div class="d-flex justify-content-center py-4">
                <div  class="logo d-flex align-items-center w-auto" style="flex-direction:column">
                  <span class="mb-3">GHMS</span>
                  <span>DSW Login</span>
                </div>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <form class="row g-3 p-4" id="dswLogin" method="POST" action='dsw-login.php'>

                    <div class="col-12">
                      <label for="dsw-username" class="form-label">Username</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="User Id" name="dsw_username" id="dsw-username">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="dsw-password" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="password" name="dsw_password" id="dsw-password">
                      </div>
                    </div>

                    <div class="col-12 pt-3">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>  
                  </form>

                </div>
              </div>

            </div>


          </div>
        </div>

      </section>
      <script>
        console.log('yash');
      </script>

    </div>
  </main><!-- End #main -->
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