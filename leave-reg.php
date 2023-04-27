<?php 
    session_start();
    if(!isset($_SESSION['id_number']))
    {
      header("Location: login.php");
    }
    include "db_config.php";
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    if(!$conn){
        die("Connection Failed ".mysqli_connect_error());
        $_SESSION['error_message'] = "Database not connected";
        header("Location: apply-leave.php");
        exit();
    }
    else{
        $id_number = $_SESSION['id_number'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $leave_from = mysqli_real_escape_string($conn,$_POST['leaveFrom']);
        $leave_from = dateToNormal($leave_from);
        $leave_to = mysqli_real_escape_string($conn,$_POST['leaveTo']);
        $leave_to = dateToNormal($leave_to);
        $leave_type = mysqli_real_escape_string($conn,$_POST['leaveType']);
        $reason = mysqli_real_escape_string($conn,$_POST['leaveReason']);
        $status = "Pending";

        $sql = "INSERT INTO leaves (id_number,date_of_request,leave_from,leave_to,leave_type,reason,leave_status)
        VALUES ('$id_number','$date','$leave_from','$leave_to','$leave_type','$reason','$status')";
        $leave_apply = mysqli_query($conn,$sql);
        if($leave_apply){
            $_SESSION['error_message'] = 'New Record Created Successfully';
            header('location:apply-leave.php');
        }
        else {
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $stmt->close();
        $conn->close();
    }

    function dateToNormal($date_input){
        $newDate = date("d-m-Y", strtotime($date_input));
        return $newDate;
    }
?>