<?php

  //sessionスタートをして、セッションを使えるようにする
  session_start();

  include("funcs.php");
  LoginCheck();
  
  $Sname = $_SESSION['name'];
  $Fname = $_SESSION['fname'];

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="../img/chart-line-solid.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <title>AnalyticsTool Register</title>
  </head>
  <body>
    <!-- header -->
    <header id="header">
      <div class="header-container">
        <ul class="nav-list1">
          <li>
            <div class="search">
              <p class="search-text">search</p>
              <i class="fas fa-search"></i>
            </div>
          </li>
        </ul>
        <ul class="nav-list2">
          <div class="nav-icon">
            <li>
              <P class="admin_name"><?=$Sname;?></P>
            </li>        
            <li>
              <?php if (empty($Fname)) : ?>
                <a href="" class="account-icon"><i class="fas fa-user-circle"></i></a>
              <?php else: ?>
                <p class="user-icon"><img class="user-icon-img" type="image/svg+xml" src="../imgs/<?=$Fname?>" ></p>
              <?php endif; ?>
            </li>        
            <li>
              <a href="" class="help-icon"><i class="fas fa-question-circle"></i></a>
            </li>
          </div>
        </ul>
      </div>
    </header>

    <!-- サイドバー -->
    <div id="sidebar">
      <ul class="side-ul">
        <li>
          <a href="index.php" class="side-icon"><i class="fas fa-chart-line"></i></a>
        </li>
        <li>
          <a href="create.php" class="side-icon"><i class="fas fa-user-plus"></i></a>
        </li>
        <li>
          <a href="select.php" class="side-icon"><i class="fas fa-users"></i></a>
        </li>
        <li>
          <a href="user_select.php" class="side-icon"><i class="fas fa-cog"></i></a>
        </li>
        <li>
          <a href="logout.php" class="side-icon sign-out-icon" onclick="return confirm('ログアウトします。よろしいですか？')"><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>

    <!-- main -->
    <main id="main">
      <div class="main-container">
        <!-- 余白 -->
        <div class="left-margin"></div>
        <!-- ここからinsert.phpにデータを送ります -->
        <form method="post" action="regi_insert.php" enctype="multipart/form-data">
            <fieldset>
                <legend>AdminUser Register</legend>
                <p class="user_img"><img type="image/svg+xml" src="../img/user_icon.png" ></p>
                <label>画像：<input type="file" name="fname" class="up_userimg" accept="image/*"></label><br>
                <label>名前：<input type="text" name="Aname"></label><br>
                <label>Email：<input type="text" name="Amail" placeholder="※半角数字のみ"></label><br>
                <label>ID：<input type="text" name="lid" placeholder="※半角数字のみ"></label><br>
                <label>パスワード：<input type="text" name="lpw" placeholder="※半角数字のみ"></label><br>
                <input type="submit" value="登録">
            </fieldset>
        </form>
      </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

    // アップロードするファイルを選択
    $('input[type=file]').change(function() {
      var file = $(this).prop('files')[0];

             // 画像以外は処理を停止
      if (! file.type.match('image.*')) {
          // クリア
          $(this).val('');
          $('.user_img > img').html('');
          return;
        }

      // 画像表示
      var reader = new FileReader();
      reader.onload = function() {
       $('.user_img > img').attr('src', reader.result);
      }
      reader.readAsDataURL(file);
    });

    </script>

  </body>
</html>
