<?php
  session_start();

  require("../config/config_user.php");
  require("../lib/lib_db_in.php");//여기에 db_in.php 내용 추가
  $conn = db_init($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
  /*
  $sql = "SELECT * FROM user WHERE name='".$_POST['author']."'";
  $result = mysqli_query($conn, $sql);

  if($result->num_rows ==0){//신규유저일경우 값이 없어서 row의 갯수가 0이 된다.
    $sql = "INSERT INTO user (name,password)
     VALUES ('".$_POST['author']."','0000')";
     mysqli_query($conn, $sql);
     $user_id = mysqli_insert_id($conn);
  }
  else{
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
  }
  */

  $sql = "UPDATE chronological_order SET
  author = '".$_SESSION['user_id']."',
  title = '".$_POST['title']."',
  description = '".$_POST['description']."',
  created = now()
  WHERE id= ".$_POST['id'];
  $result = mysqli_query($conn, $sql);

  header('location:../index.php?id='.$_POST['id']);
?>
