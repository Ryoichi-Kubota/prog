<?php

//sessionスタートをして、セッションを使えるようにする
session_start();

include("funcs.php");
LoginCheck();

$Sname = $_SESSION['name'];
$Fname = $_SESSION['fname'];

// step1. GETを使って送られたidを取得しましょう！
// この場合は$_GET['id'];を使います
$id = $_GET['id'];

$pdo = db_connect();

// step3. IDをもとに、sqlを準備します！
// 3. SELECT * FROM xxx WHERE id=:id
$sql = "SELECT * FROM user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute();

//step４．データ出力
$view=""; //受け取るための変数を事前に作ります。
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //１データのみ抽出の場合はwhileループで取り出さない(一個しかデータが返ってこないので一レコード取得する)
    $row = $stmt->fetch();
}

?>

<!-- html -->
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
    <title>AnalyticsTool detail</title>
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
        <!-- ここからupdate.phpにデータを送ります -->
        <form method="post" action="user_update.php" enctype="multipart/form-data">
          <fieldset>
            <legend>UserData Update</legend>
            <?php if ($row["fname"] == "") : ?><?php $row["fname"] = "user_icon.png" ?> <?php endif; ?>
            <p class="user_img"><img type="image/svg+xml" src="../imgs/<?=$row["fname"]?>" ></p>
            <label>画像：<input type="file" name="fname" class="up_userimg" accept="image/*"></label><br>
            <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
            <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
            <label>管理者権限：<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
            <div class="annotation">※ 0：オーナー, 1：管理者, 2：メンバー</div>
            <input type='hidden' name="id" value="<?=$row["id"]?>">
            <input type="submit" value="更新">
            </fieldset>
          </div>
        </form>

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