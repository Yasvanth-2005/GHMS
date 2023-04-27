<?php
  session_start();
  include 'db_config.php';
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
  if (!$conn) {
      die('Error connecting to the database: ' . mysqli_connect_error());
  }

  $username = mysqli_real_escape_string($conn, $_POST['caretaker_username']);
  $password = mysqli_real_escape_string($conn, $_POST['caretaker_password']);

  $stmt = mysqli_prepare($conn, "SELECT * FROM `staff_registrations` WHERE username = ?");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  if (!$result) {
      die('Error executing query: ' . mysqli_error($conn));
  } else {
      if (mysqli_num_rows($result) == 0) {
          $_SESSION['error_message'] = "Username does not exist";
          header("Location: login.php");
          exit();
      } else {
          $row = mysqli_fetch_assoc($result);
          if ($row['password'] == $password) {
              $_SESSION['username'] = $username;
              $_SESSION['staff_pos'] = 'caretaker';
              header("Location: index.php");
              exit();
          } else {
              $_SESSION['error_message'] = "Password is incorrect";
              header("Location: login.php");
              exit();
          }
      }
  }
  mysqli_close($conn);
?>
