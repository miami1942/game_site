<?php
  session_start();

  require("config/config_user.php");
  require("lib/lib_db_in.php");//여기에 db_in.php 내용 추가
  $conn = db_init($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
  $result = mysqli_query($conn, "SELECT * FROM chronological_order");

  $now_login = 0;
  if (isset($_SESSION['user_id'])) {
    $now_login = 1;
  }
?>
