<?php

// step1. GETを使って送られたidを取得しましょう！
// この場合は$_GET['id'];を使います

$id = $_GET['id'];

// step2. insert.phpからDBに接続するコード一式を持ってきます
// 2. DBに接続します xxxにDB名を入力する
try {
    $pdo = new PDO('mysql:dbname=analytics_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }

// step3. IDをもとに、sqlを準備します！
// 3. SELECT * FROM xxx WHERE id=:id
$sql = "SELECT * FROM a_table WHERE id=:id";
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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="img/chart-line-solid.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <title>AnalyticsTool UserCreate</title>
  </head>
  <body>
    <!-- header -->
    <header id="header">
      <div class="header-container">
      <ul class="nav-list">
        <li>
          <div class="search">
            <p class="search-text">search</p>
            <i class="fas fa-search"></i>
          </div>
        </li>
        <li>
          <a href="" class="help-icon"><i class="fas fa-question-circle"></i></a>
        </li>
        <li>
          <a href="" class="account-icon"><i class="fas fa-user-circle"></i></a>
        </li>
      </ul>
      </div>
    </header>

    <!-- サイドバー -->
    <div id="sidebar">
      <ul class="side-ul">
        <li>
          <a href="http://localhost/dev_20_php_03/php3_kadai/index.php" class="side-icon"><i class="fas fa-chart-line"></i></a>
        </li>
        <li>
          <a href="http://localhost/dev_20_php_03/php3_kadai/create.php" class="side-icon"><i class="fas fa-user-plus"></i></a>
        </li>
        <li>
          <a href="http://localhost/dev_20_php_03/php3_kadai/select.php" class="side-icon"><i class="fas fa-users"></i></a>
        </li>
        <li>
          <a href="" class="side-icon"><i class="fas fa-cog"></i></a>
        </li>
        <li>
          <a href="" class="side-icon sign-out-icon"><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>

  <!-- main -->
  <main id="main">
      <div class="main-container">
        <!-- 余白 -->
        <div class="left-margin"></div>
        <!-- ここからupdate.phpにデータを送ります -->
        <form method="post" action="update.php">
          <fieldset>
            <legend>UserData Update</legend>
            <label>姓：<input type="text" name="last_name" value="<?=$row["last_name"]?>"></label><br>
            <label>年齢（歳）：<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
            <label>年収（万円）：<input type="text" name="annual_income" value="<?=$row["annual_income"]?>"></label><br>
            <label>スマートフォン：<input type="text" name="device" value="<?=$row["device"]?>"></label><br>
            <label>購入金額（万円）：<input type="text" name="sales" value="<?=$row["sales"]?>"></label><br>
            <label>会員ランク：<input type="text" name="rank" value="<?=$row["rank"]?>"></label><br>           
            <label>満足度 価格：<input type="text" name="answer_kakaku" value="<?=$row["answer_kakaku"]?>"></label><br>
            <label>満足度 デザイン：<input type="text" name="answer_design" value="<?=$row["answer_design"]?>"></label><br>
            <label>満足度 サポート：<input type="text" name="answer_support" value="<?=$row["answer_support"]?>"></label><br>
            <label>満足度 ブランド：<input type="text" name="answer_brand" value="<?=$row["answer_brand"]?>"></label><br>
            <label>満足度 品質：<input type="text" name="answer_quality" value="<?=$row["answer_quality"]?>"></label><br>
            <input type='hidden' name="id" value="<?=$row["id"]?>">
            <input type="submit" value="更新">
            </fieldset>
          </div>
        </form>

  </body>