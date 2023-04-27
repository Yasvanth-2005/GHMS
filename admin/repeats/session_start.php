<?php 
  session_start();
  if(!isset($_SESSION['username']) || !isset($_SESSION['staff_pos']))
  {
    header("Location: login.php");
  }
  if(isset($_SESSION['error_message'])){
    echo "<script>alert('{$_SESSION['error_message']}')</script>";
    unset($_SESSION['error_message']);
  }
?>