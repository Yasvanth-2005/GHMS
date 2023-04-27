<?php 
    session_start();
    if(!isset($_SESSION['id_number']))
    {
      header("Location: login.php");
    } 
    include "db_config.php";
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    if(!$conn){
        die('database not connected'.mysqli_connect_error());
        $_SESSION['error_message'] = "Database not connected";
        header("Location: users-profile.php");
        exit();
    }
    
    $id_number = $_SESSION['id_number'];
    $stmt = $conn->prepare("SELECT * FROM `student_registrations` WHERE id_number = ?");
    $stmt->bind_param("s", $id_number);
    $stmt->execute();
    $result_query = $stmt->get_result();
    if(mysqli_num_rows($result_query) > 0){
        $class_name = mysqli_real_escape_string($conn,$_POST['className']);
        $year = mysqli_real_escape_string($conn,$_POST['academicYear']);
        $branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $ab = mysqli_real_escape_string($conn,$_POST['academicBlock']);
        $hb = mysqli_real_escape_string($conn,$_POST['hostelBlock']);

        $update_stmt = $conn->prepare("UPDATE `student_registrations` SET class_room = ?,branch = ?, academic_year = ?, academic_block = ?, hostel_block = ? WHERE id_number = ?");
        $update_stmt->bind_param("ssssss", $class_name,$branch, $year, $ab, $hb, $id_number);
        if($update_stmt->execute()){
            $_SESSION['success_message'] = "Record updated successfully";
            header("Location: users-profile.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Record update failed";
            header("Location: users-profile.php");
            exit();
        }    
    }
?>