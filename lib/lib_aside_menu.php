<?php
  //echo file_get_contents('txt/list.txt');
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<li><a href="index.php?id='.htmlspecialchars($row['id']).'">'
    .htmlspecialchars($row['title']).'</a></li>'."\n";
  }

  echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
?>
