<?php
  session_start();

  require("../config/config_user.php");
  require("../lib/lib_db_in.php");//여기에 db_in.php 내용 추가
  $conn = db_init($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);

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
