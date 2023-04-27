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
          max-width:450px;
          height: auto;
          animation: card .5s linear ;
          margin-top: 40px;
          padding: 0;
        }
        @keyframes card{
          0%{
            transform: translateY(-50px);
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

<?php 
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
          include "db_config.php";
          $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
          if(!$conn){
            session_start();
            $_SESSION['error_message'] = "Database not connected";
            header("Location: student-register.php");
            exit();
          }
          else{
              $student_name = ucwords(mysqli_real_escape_string($conn,$_POST["student_name"]));
              $id_number = ucwords(mysqli_real_escape_string($conn,$_POST["Id_Number"]));
              $student_phno = mysqli_real_escape_string($conn,$_POST["student_phno"]);
              $academic_year = mysqli_real_escape_string($conn,$_POST["academic_year"]);
              $branch = mysqli_real_escape_string($conn,$_POST["branch"]);
              $academic_block = mysqli_real_escape_string($conn,$_POST["academic_block"]);
              $classroom = mysqli_real_escape_string($conn,$_POST["classroom"]);
              $hostel_block = mysqli_real_escape_string($conn,$_POST["hostel_block"]);
              $hostelroom = mysqli_real_escape_string($conn,$_POST["hostelroom"]);
              $bloodgroup = mysqli_real_escape_string($conn,$_POST["bloodgroup"]);
    
              $mother_name = ucwords(mysqli_real_escape_string($conn,$_POST["mother_name"]));
              $mother_phno = mysqli_real_escape_string($conn,$_POST["mother_phno"]);
              $father_name = ucwords(mysqli_real_escape_string($conn,$_POST["father_name"]));
              $father_phno = mysqli_real_escape_string($conn,$_POST["father_phno"]);
              $gaurdian_name = ucwords(mysqli_real_escape_string($conn,$_POST["gaurdian_name"]));
              $gaurdian_phno = mysqli_real_escape_string($conn,$_POST["gaurdian_phno"]);
    
              $state = ucwords(mysqli_real_escape_string($conn,$_POST["state"]));
              $district = ucwords(mysqli_real_escape_string($conn,$_POST["district"]));
              $mandal = ucwords(mysqli_real_escape_string($conn,$_POST["mandal"]));
              $village = ucwords(mysqli_real_escape_string($conn,$_POST["village"]));
              $street = ucwords(mysqli_real_escape_string($conn,$_POST["d-name"]));
              $pincode = mysqli_real_escape_string($conn,$_POST["pin"]);
    
              $pass = generateRandomPassword();

              $sql = "SELECT * FROM student_registrations";
              $id_check = mysqli_query($conn,$sql);
              while($id_check_data=mysqli_fetch_assoc($id_check)){
                if($id_check_data['id_number'] == $id_number){
                    session_start();
                    $_SESSION['error_message'] = "Id already exists";
                    header("Location: student-register.php");
                    exit();
                }
              }

              $sql = "INSERT INTO student_registrations (student_name, id_number, student_phno, academic_year, branch, academic_block, class_room, hostel_block, hostel_room, blood_group, mother_name, mother_phno, father_name, father_phno, gaurdian_name, gaurdian_phno, state, district, mandal, village, street, pin_code, password)
              VALUES ('$student_name', '$id_number', $student_phno, '$academic_year', '$branch', '$academic_block', '$classroom', '$hostel_block', '$hostelroom', '$bloodgroup', '$mother_name', '$mother_phno', '$father_name', '$father_phno', '$gaurdian_name', '$gaurdian_phno', '$state', '$district', '$mandal', '$village', '$street', '$pincode', '$pass')";

              $reg = mysqli_query($conn, $sql);
              if ($reg) {
                echo '
                  <div class="card" id="card">
                  <div class="card-head  d-flex flex-column justify-content-center align-items-center" style="background-color:limegreen">
                    <i class="bi bi-check-circle text-white h1 mt-2" style="font-size: 100px"></i>
                    <span class="text-white text-center  mb-3" style="font-weight:700;font-size: 20px;">Successfully submited</span>
                  </div>
                  <div class="card-body d-flex" style="padding:0">
                    <div class="col-12 h3 text-center  mt-2" style="font-size:32px;font-weight:750;">';?><?php echo $student_name?><?php echo '</div>
                    <div class="details  d-flex justify-content-center align-items-center flex-wrap">
                      <div class="col-sm-4" style="width: 150px;height: 150px;">
                        <img src="https://intranet.rguktn.ac.in/SMS/usrphotos/user/';?><?php echo $id_number;?><?php echo'.jpg" width="100%" height="100%">
                      </div>
                      <div class="col-sm-8 mt-3 ">
                        <table class="table">
                          <tr>
                            <th>ID Number :</th>
                            <td>';?><?php echo $id_number;?><?php echo'</td>
                          </tr>
                          <tr>
                            <th>Password :</th>
                            <td>';?><?php echo $pass;?><?php echo'</td>
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
                ';
              } else {
                echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
              }
          }
          mysqli_close($conn);
        }

        function generateRandomPassword() {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*()_+-=";
            $rand_password = substr(str_shuffle($chars), 0, 6);
            return $rand_password;
        }
        
  ?>

      </body>
    </html>