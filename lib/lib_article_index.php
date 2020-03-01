<?php
  //  if(empty($val)==false){
  //    echo file_get_contents("txt_info/".$_GET['id'].".txt");
  //  }
  //  if (empty($_GET['id'])==false) {
  //    echo file_get_contents("game_txt/".$_GET['id'].".txt");
  //  }
  if(empty($_GET['id'])===false){
    //$sql = 'SELECT * FROM chronological_order WHERE id='.$_GET['id'];
    $order_id = $_GET['id'];
    $sql = "SELECT *
    FROM chronological_order LEFT JOIN user
    ON chronological_order.author = user.id
    WHERE chronological_order.id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<div class='title_text'>".strip_tags($row['title'],'<br/><br>')."</div>";
    echo "<div class='main_text'>".strip_tags($row['description'],'<br/><br>')."</div>";
    echo "<div class='name_text'>작성자 : ".strip_tags($row['name'],'<br/><br>')."<br/>
    작성 날짜 : ".strip_tags($row['created'],'<br/><br>')."<br /></div>";
    echo "<div class='id_text'>페이지번호 : ".strip_tags($order_id,'<br/><br>')."</div>";

    if ($now_login==1) {
      echo "
      <div class='u_d_button'>
      <a href='update.php?id=".htmlspecialchars($order_id)."'>
        <input type='button' id='db_update' value='수정'>
      </a>
      <form class='d_button' action='php/delete_process.php' method='post'>
        <input type='submit' id='db_delete' value='삭제'>
        <input type='hidden' name='id' value=".htmlspecialchars($order_id).">
      </form>
      </div>";
    }
  }//type='submit'은 form으로 전송하는것이다. button은 전송이안된다.
  else {
    echo file_get_contents('txt/main_write.txt');
  }
?>
