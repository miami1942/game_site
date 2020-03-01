<?php
  echo "<div class='write_button'>";

  if ($now_login==1) {
    echo "
    <a href='write.php'>
      <input type='button' value='새 글쓰기' id='write'/>
    </a>
    ";
  }

  echo "</div>";
?>
