<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    $m_page = $_GET["page_num"];
      if(is_numeric($m_page)){
        echo "this is main page!";
        echo " this page is ";
        echo $m_page;
        echo "page";
      }
      else {
        echo "<a href='../index.php'>
          return main page
        </a>";
        //echo "<script>location.href='../index.php';</script>";
      }
    ?>
  </body>
</html>
