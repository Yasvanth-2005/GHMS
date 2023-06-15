<?php 
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['staff_pos']))
    {
      header("Location: login.php");
    }
    include 'db_config.php';
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    if(!$conn){
        die('Connection Error'.mysqli_connect_error());
    }
    else{
        if(isset($_FILES['file'])){
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d-m-Y');
            $hostel_block = mysqli_real_escape_string($conn,$_POST['hostel']);
            $filename = $_FILES['file']['name'];
            $filetmpname = $_FILES['file']['tmp_name'];
            $target_dir = "sheets/";
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newfilename = uniqid($date.'-'.$hostel_block.'-', true) . '.' . $file_extension;
            $target_file = $target_dir . $newfilename;
            if (!file_exists('sheets')) {
                mkdir('sheets');
            }
            if(!move_uploaded_file($filetmpname, $target_file)) {
                die("Error: Failed to upload file.");
            }
            $sql = "INSERT INTO hostel_attendance (date,hostel,attendance_sheet) VALUES ('$date','$hostel_block','$newfilename')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $_SESSION['error_message'] = 'New Record Created Successfully';
                header('location:hostel-attendance.php');
            }
        }
    }
    mysqli_close($conn);
?>
