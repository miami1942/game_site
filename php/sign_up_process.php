<?php
  require("../config/config_user.php");
  require("../lib/lib_db_in.php");//여기에 db_in.php 내용 추가
  $conn = db_init($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
  $var_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $var_pw = mysqli_real_escape_string($conn, $_POST['user_pw']);
  $sql = "SELECT * FROM user WHERE name='".$var_name."'";

  $result = mysqli_query($conn, $sql);
  $now_login = 0;

  if($result->num_rows ==0){//신규유저일경우 값이 없어서 row의 갯수가 0이 된다.
    $sql = "INSERT INTO user (name,password)
     VALUES ('".$var_name."','".$var_pw."')";
     mysqli_query($conn, $sql);
     header('location:../index.php');
  }
  else{
    echo "<script type='text/javascript'>
      alert('이미 있는 아이디 입니다.');
      history.back();
    </script>";
  }//돌아가는거 history.go(-1);도 가능
  ?>
