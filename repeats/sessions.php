<?php
session_start();
if(!isset($_SESSION['id_number']))
{
  header("Location: login.php");
}
include "db_config.php";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
if(!$conn){
  die("Connection Failed ".mysqli_connect_error());
}
$id_number = $_SESSION['id_number'];
$stmt = $conn->prepare("SELECT * FROM `student_registrations` WHERE id_number = ?");
$stmt->bind_param("s", $id_number);
$stmt->execute();
$result_query = $stmt->get_result();
if(mysqli_num_rows($result_query) > 0){
  $row = mysqli_fetch_assoc($result_query);
  $name = $row['student_name'];
  $year = $row['academic_year'];
  $branch = $row['branch'];
  $academic_block = $row['academic_block'];
  $classroom = $row['class_room'];
  $hostel_block = $row['hostel_block'];
  $hostelroom = $row['hostel_room'];
  $bloodgroup = $row['blood_group'];
  $mother_name = $row['mother_name'];
  $father_name = $row['father_name'];
  $gaurdian_name = $row['gaurdian_name'];
  $mother_phno = $row['mother_phno'];
  $father_phno = $row['father_phno'];
  $gaurdian_phno = $row['gaurdian_phno'];
  $state = $row['state'];
  $district = $row['district'];
  $mandal = $row['mandal'];
  $village = $row['village'];
  $street = $row['street'];
  $pincode = $row['pin_code'];
  $password = $row['password'];
}
?>