<?php
  require("../config/config_user.php");
  require("../lib/lib_db_in.php");//여기에 db_in.php 내용 추가
  $conn = db_init($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
  $order_id = $_POST['id'];

  $sql = "DELETE FROM chronological_order WHERE id = ".$order_id;
  $result = mysqli_query($conn, $sql);

  header('location:../index.php');
?>
