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
        <div class="login_screen">
          <?php
            $var_name = "Dovakin";//임시로 변수 지정
            $var_id = 1;//임시로 변수 지정
            $now_login = 0;
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
                이름 : ".$var_name."<br/>
                회원번호 : ".$var_id."
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
            echo '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
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
            <input type="button" value="가입 종료" id="exit"/>
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
          <form action="php/sign_up_process.php" method="post">
            <p>
              사용자 이름
              <input type="text" name="title" id="in_title">
            </p>
            <p>
              비밀번호
              <input type="text" name="author" id="in_author">
            </p>
            <input type="submit" name="sign_up_now" value="회원가입">
          </form>
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
