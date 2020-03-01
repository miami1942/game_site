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
      <form action='php/logout_process.php' method='post'>
        <input type='submit' name='logout_button' value='로그아웃'>
      </form>
    </div>
    ";
  }
?>
