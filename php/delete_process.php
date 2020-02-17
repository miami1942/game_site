<?php
  $conn = mysqli_connect("localhost", "root", "wkdgmd7093");
  mysqli_select_db($conn,"skyrim");
  $order_id = $_POST['id'];

  $sql = "DELETE FROM chronological_order WHERE id = ".$order_id;
  $result = mysqli_query($conn, $sql);

  header('location:../index.php');
?>
