<?php
  if(empty($_GET['id'])===false){
    $order_id = $_GET['id'];
    $sql = "SELECT * ,chronological_order.id as c_id
    FROM chronological_order LEFT JOIN user
    ON chronological_order.author = user.id
    WHERE chronological_order.id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
//input type='text'는 띄어쓰기를 인식못하기 때문에 텍스트에리어로 바꾸었다.
    echo "
    <form action='php/update_process.php' method='post'>
        <input type='hidden' name='id' value=".htmlspecialchars($row['c_id']).">
      <p>
        제목
        <textarea name='title' id='in_title'>".htmlspecialchars($row['title'])."</textarea>
      </p>
      <p>
        본문
        <textarea name='description' id='in_description'>".htmlspecialchars($row['description'])."</textarea>
      </p>
      <input type='submit' name='update_now' value='수정'>
    </form>
    ";
  }

  /*    실패 다음에 도전해볼것
  $var_title= $_POST['index_title'];
  $var_author= $_POST['index_author'];
  $var_description= $_POST['index_description'];
  $var_id= $_POST['index_id'];
  echo "
  <form action='php/update_process.php' method='post'>
    <p>
      제목
      <input type='text' name='title' value=".$var_title." id='in_title'>
    </p>
    <p>
      작성자
      <input type='text' name='author' value=".$var_author." id='in_author'>
    </p>
    <p>
      본문
      <textarea name='description' id='in_description'>".$var_description."</textarea>
    </p>
    <input type='submit' name='update_now' value='수정'>
  </form>
  ";*/
?>
