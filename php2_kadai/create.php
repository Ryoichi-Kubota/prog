<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
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
          <a href="http://localhost/dev_20_php_02/php2_kadai/index.php" class="side-icon"><i class="fas fa-chart-line"></i></a>
        </li>
        <li>
          <a href="http://localhost/dev_20_php_02/php2_kadai/create.php" class="side-icon"><i class="fas fa-user-plus"></i></a>
        </li>
        <li>
          <a href="" class="side-icon"><i class="fas fa-database"></i></a>
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
        <!-- ここからinsert.phpにデータを送ります -->
        <form method="post" action="insert.php">
            <fieldset>
              <legend>UserData Create</legend>
              <label>姓：<input type="text" name="last_name"></label><br>
              <label>年齢（歳）：<input type="text" name="age" placeholder="※半角数字のみ"></label><br>
              <label>年収（万円）：<input type="text" name="annual_income" placeholder="※半角数字のみ"></label><br>
              <label>スマートフォン：<select name="device">
                <option value=""></option>
                <option value="iPhone">iPhone</option>
                <option value="android">android</option>
              </select></label><br>
              <label>購入金額（万円）：<input type="text" name="sales" placeholder="※半角数字のみ"></label><br>
              <label>会員ランク：<select name="rank">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select></label><br>
              <label>満足度 価格：<select name="answer_kakaku">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></label><br>
              <label>満足度 デザイン：<select name="answer_design">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></label><br>
              <label>満足度 サポート：<select name="answer_support">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></label><br>
              <label>満足度 ブランド：<select name="answer_brand">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></label><br>
              <label>満足度 品質：<select name="answer_quality">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select></label><br>
              <input type="submit" value="登録">
            </fieldset>
          <!-- </div> -->
        </form>
      </div>
    </main>

  </body>
</html>
