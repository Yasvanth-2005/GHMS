<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GHMS | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
    .errormsg{
      font-size:22px;
      color:rgba(200,40,40);
      text-align:center;
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <div  class="logo d-flex align-items-center w-auto" style="flex-direction:column">
                  <span class="mb-3">GHMS</span>
                  <span>Change Password</span>
                </div>
              </div>
    <!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <form class="row g-3 p-4" id="studentLogin" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control stop-focus" placeholder="Id Number" name="username" id="p-username">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Previous Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control stop-focus" placeholder="password" name="password" id="prev-password">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">New Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control stop-focus" placeholder="password" name="password" id="new-password">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Confirm Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control stop-focus" placeholder="password" name="password" id="conf-password">
                      </div>
                    </div>

                    <div class="col-12 pt-3">
                      <button class="btn btn-primary w-100 submit-btn" type="submit">Submit</button>
                    </div>  
                    
                  </form>
                  <div class="text-center text-danger err-msg"></div>

                </div>
              </div>
              

            </div>
          </div>
        </div>
      </section>
     <script>
        const p_username = document.getElementById("p-username");
        const prevPassword = document.getElementById("prev-password");
        const newPasssword = document.getElementById("new-password");
        const confirmPassword = document.getElementById("conf-password");
        const errMsg = document.querySelector(".err-msg");
        const submitBtn = document.querySelector(".submit-btn");
        let errCount = 1

        submitBtn.addEventListener("click",function(e){
            if(errCount != 0){
                e.preventDefault()
            }
            if(p_username.value =="" || prevPassword.value =="" || newPassword.value =="" || confirmPassword.value ==""){
                errMsg.innerHTML = "This field is required"
                errCount++
            }
            
            if(p_username.value.length < 6){
                errMsg.innerHTML = "please enter valid name"
            }
        })
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
  <!-- <script src="assets/js/main.js"></script> -->
  
</body>

</html>