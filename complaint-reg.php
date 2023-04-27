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
        header("Location: complaint.php");
        exit();
    }
    else{
        $id_number = $_SESSION['id_number'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $complaint_type = ucwords(mysqli_real_escape_string($conn,$_POST['complaintType']));
        $hostel_block = mysqli_real_escape_string($conn,$_POST['hostel_block']);
        $room_number = mysqli_real_escape_string($conn,$_POST['room_number']);
        $other = mysqli_real_escape_string($conn,$_POST['otherComplaint']);
        $complaint_desc = mysqli_real_escape_string($conn,$_POST['leaveComplaint']);
        $complaint_status = "Pending";  

        $sql = "INSERT INTO complaints (id_number,date_of_request,complaint_type,other,hostel_block,rno,complaint_desc,complaint_status)
        VALUES ('$id_number','$date','$complaint_type','$other','$hostel_block','$room_number','$complaint_desc','$complaint_status')";
        
        $result_query = mysqli_query($conn,$sql);
        if($result_query){
            $_SESSION['error_message'] = 'New Record Created Successfully';
            header('location:complaint.php');
        }
        else{
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $stmt->close();
        $conn->close();
    }
?>