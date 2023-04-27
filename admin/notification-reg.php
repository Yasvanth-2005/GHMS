<?php 
    include 'db_config.php';
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    if(!$conn){
        die('Connect.error :'.mysqli_connect_error());
    }
    else{
        $title = mysqli_real_escape_string($conn,$_POST['notificationTitle']);
        $shortDesc = mysqli_real_escape_string($conn,$_POST['shortDesc']);
        $longDesc = mysqli_real_escape_string($conn,$_POST['longDesc']);
        $links = mysqli_real_escape_string($conn,$_POST['notificationlinks']);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('F j');

        $sql = "INSERT INTO notifications (date,title,short_desc,long_desc,links)
        VALUES ('$date','$title','$shortDesc','$longDesc','$links')";
        $result_query = mysqli_query($conn,$sql);
        if(!$result_query){
            echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        else{
            $_SESSION['error_message'] = 'New Record Created Successfully';
            header('location:index.php');
        }
    }
?>