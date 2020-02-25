<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "wkdgmd7093");
  mysqli_select_db($conn,"skyrim");
  $result = mysqli_query($conn, "SELECT * FROM chronological_order");

  $now_login = 0;
  if (isset($_SESSION['user_id'])) {
    $now_login = 1;
  }
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
        <div class="login_screen">
          <?php
            if ($now_login==0) {
              echo "
              <form action='php/login_process.php' method='post'>
                <div class='login_text'>
                  아이디<input type='text' name='login_id' value=''>
                  비밀번호<input type='text' name='login_pw' value=''>
                </div>
                <div class='login_button'>
                  <input type='submit' name='login_button' value='로그인'>
                  <a href='sign_up.php'>
                  <input type='button' name='sign_button' value='회원가입'>
                  </a>
                </div>
              </form>
              ";
            }
            else {
              echo "
              <div class='login_text'>
                -접속중-<br/><br/>
                이름 : ".$_SESSION['user_name']."<br/>
                회원번호 : ".$_SESSION['user_id']."
              </div>
              <div class='logout_button'>
                <input type='button' name='logout_button' value='로그아웃'>
              </div>
              ";
            }
          ?>
        </div>
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
        <div class="m_search">
          <div class="write_button">
            <?php
            if ($now_login==1) {
              echo "
              <a href='write.php'>
                <input type='button' value='새 글쓰기' id='write'/>
              </a>
              ";
            }
            ?>
          </div>
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
