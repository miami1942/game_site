<?php
  $conn = mysqli_connect("localhost", "root", "wkdgmd7093");
  mysqli_select_db($conn,"skyrim");
  $result = mysqli_query($conn, "SELECT * FROM chronological_order");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php echo file_get_contents('txt/title_write.txt'); ?>
    </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="target" class="">
    <div class="body_class">
    <!--********헤더*********-->
    <header>
      <h1 class="logo">
        <?php echo file_get_contents('txt/header_write.txt'); ?>
      </h1>
      <a href="index.php">
        <img id="main_img" src="images/main_image.png"
             width="200" height="150">
      </a>
    </header>
    <!--******전체 본문******-->
    <div class="container">
      <!--******리스트******-->
      <aside>
        <ul>
        <?php
          //echo file_get_contents('txt/list.txt');
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href="index.php?id='.htmlspecialchars($row['id']).'">'
            .htmlspecialchars($row['title']).'</a></li>'."\n";
          }
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br>
      </ul>
      </aside>
      <!--******메인******-->
      <section>
        <!--******검색******-->
      <div>
        <div class="write_button">
          <a href="index.php">
            <input type="button" value="수정 종료" id="exit"/>
          </a>
        </div>
        <form id="m_search" action="php/main.php">
          페이지 이동(테스트)
          <input type="text" name="page_num">
          <input type="submit" name="submit" value="이동">
        </form>
      </div>
        <!--******내용******-->
        <article>
          <?php
          if(empty($_GET['id'])===false){
            $order_id = $_GET['id'];
            $sql = "SELECT * ,chronological_order.id as c_id
            FROM chronological_order LEFT JOIN user
            ON chronological_order.author = user.id
            WHERE chronological_order.id=".$_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo "
            <form action='php/update_process.php' method='post'>
                <input type='hidden' name='id' value=".htmlspecialchars($row['c_id']).">
              <p>
                제목
                <input type='text' name='title' value=".htmlspecialchars($row['title'])." id='in_title'>
              </p>
              <p>
                작성자
                <input type='text' name='author' value=".htmlspecialchars($row['name'])." id='in_author'>
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
          ";*/?>
        </article>
      </section>
    </div>
    <!--******풋터******-->
    <footer>
      <?php
        echo file_get_contents('txt/footer.txt');
      ?>
    </footer>
    <!--js파일은 특정한 위치에 있어야 작동함-->
    <script src="js/test_button.js"></script>
    <!--이 위치로 test_button.js의 코드를 넣는다-->
  </div>
  </body>
</html>
