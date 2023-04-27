<?php 
   session_start();
   if(!isset($_SESSION['username']) || !isset($_SESSION['staff_pos'])) {
      header("Location: login.php");
   }
   include 'db_config.php';
   $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
   if(!$conn){
      die('Connection Error : '.mysqli_connect_error());
   } else {
      $id = mysqli_real_escape_string($conn,$_POST['id']);
      $time = mysqli_real_escape_string($conn,$_POST['time']);
      $status = ucwords(mysqli_real_escape_string($conn,$_POST['compStatus']));
      $stmt = mysqli_stmt_init($conn);
      if(mysqli_stmt_prepare($stmt, "UPDATE complaints SET complaint_status=? WHERE id_number=? AND created_at=?")) {
         mysqli_stmt_bind_param($stmt, "sss", $status, $id , $time);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
         $_SESSION['error_message'] = 'Record Updated Successfully';
         header('location:admin-complaints.php');
      } else {
         $_SESSION['error_message'] = "Error updating leave status: " . mysqli_error($conn);
         header('location:admin-complaints.php');
      }
   }
   mysqli_close($conn);
?>