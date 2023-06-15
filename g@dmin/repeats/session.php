<?php 
    include 'repeats/session_start.php';
    include 'db_config.php';
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
    $username = $_SESSION['username'];
    $position = $_SESSION['staff_pos'];
    $stmt = mysqli_prepare($conn, 'SELECT * FROM staff_registrations WHERE username = ?');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 0){
        $_SESSION['error_message'] = 'No data found';
    }
    else{
            $row = mysqli_fetch_assoc($result);
            $doj = $row['date_of_joining'];
            $dob = $row['date_of_birth'];
            $name = $row['staff_name'];
            $phno = $row['phno'];
            $email = $row['email'];
            $photo = $row['photo'];
            $password = $row['password'];
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
