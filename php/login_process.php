<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "wkdgmd7093");
  mysqli_select_db($conn,"skyrim");
  $var_id = mysqli_real_escape_string($conn, $_POST['login_id']);
  $var_pw = mysqli_real_escape_string($conn, $_POST['login_pw']);
  $sql = "SELECT * FROM user WHERE name='".$var_id."'
  AND password='".$var_pw."'";
  $result = mysqli_query($conn, $sql);
  $now_login = 0;

  if ($result->num_rows=="1") {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_pw'] = $row['password'];
    header('location:../index.php');
  }
  else {
    header('location:../index.php');
  }
  ?>
