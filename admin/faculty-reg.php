<?php 
    include 'db_config.php';
    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    if(!$conn){
        die('Error Connection : '.mysqli_connect_error());
        exit();
    }
    else{
        $staff_pos = mysqli_real_escape_string($conn, $_POST['staff_pos']);
        $staff_name = ucwords(mysqli_real_escape_string($conn, $_POST['staffName']));
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $doj = dateToNormal(mysqli_real_escape_string($conn, $_POST['doj']));
        $dob = dateToNormal(mysqli_real_escape_string($conn, $_POST['dob']));
        $staff_phno = mysqli_real_escape_string($conn, $_POST['staff_phno']);
        $staff_mail = mysqli_real_escape_string($conn, $_POST['staff_mail']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(isset($_FILES['image'])){
            $img_name=$_FILES['image']['name'];
            $error=$_FILES['image']['error'];
            $tmp_name=$_FILES['image']['tmp_name'];
            if (!file_exists('uploads')) {
                mkdir('uploads');
            }
            $img_type = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
            $new_img_name=uniqid($username.'-',true).".".$img_type;
            $img_upload_path='uploads/'.$new_img_name;

            if($error===0 && move_uploaded_file($tmp_name,$img_upload_path)){
                $stmt = mysqli_prepare($conn, 'INSERT INTO staff_registrations (staff_position,staff_name,username,date_of_joining,date_of_birth,phno,email,photo,password) VALUES (?,?,?,?,?,?,?,?,?)');
                mysqli_stmt_bind_param($stmt,'sssssssss',$staff_pos,$staff_name,$username,$doj,$dob,$staff_phno,$staff_mail,$new_img_name,$password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_affected_rows($stmt);
                if($result > 0){
                    $_SESSION['error_message'] = 'New Record Created Successfully';
                    header('location:faculty-register.php');
                }
                else{
                    echo "<br>Error: " . mysqli_error($conn);
                }
            } else {
                echo "<br>Error uploading file: " . $error;
            }
        } else {
            echo "<br>No file uploaded.";
        }
    }
    mysqli_close($conn);

    function dateToNormal($date_input){
        return date("d-m-Y", strtotime($date_input));
    }
?>
