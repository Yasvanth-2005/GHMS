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
        $docs = mysqli_real_escape_string($conn,$_POST['notificationdoc_name']);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('F j');
        if(isset($_FILES['notificationdocs'])){
            $doc_name=$_FILES['notificationdocs']['name'];
            $error=$_FILES['notificationdocs']['error'];
            $tmp_name=$_FILES['notificationdocs']['tmp_name'];
            if (!file_exists('notification_docs')) {
                mkdir('notification_docs');
            }
            $doc_type = strtolower(pathinfo($doc_name,PATHINFO_EXTENSION));
            $new_doc_name=uniqid($username.'-',true).".".$doc_type;
            $doc_upload_path='notification_docs/'.$new_doc_name;
            if($error===0 && move_uploaded_file($tmp_name,$doc_upload_path)){
                $sql = "INSERT INTO notifications (date,title,short_desc,long_desc,links,doc_name,docs)
                VALUES ('$date','$title','$shortDesc','$longDesc','$links','$docs','$new_doc_name')";
                $result_query = mysqli_query($conn,$sql);
                if(!$result_query){
                    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    $_SESSION['error_message'] = 'New Record Created Successfully';
                    header('location:index.php');
                }          
            }
        } else {
            $_SESSION['error_message'] = 'File Not Uploaded';
            header('location:index.php');
        }
    }


?>