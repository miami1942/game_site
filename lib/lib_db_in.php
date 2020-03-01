<?php
  function db_init($db_host, $db_user, $db_pw, $db_name){
    $conn = mysqli_connect($db_host, $db_user, $db_pw);
    mysqli_select_db($conn,$db_name);
    return $conn;
  }
?>
