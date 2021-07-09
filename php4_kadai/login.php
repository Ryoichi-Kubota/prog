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
              <a href="login.php" class="login-icon"><i class="fas fa-sign-in-alt"></i></a>
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
      </ul>
    </div>

    <!-- main -->
    <main id="main">
      <div class="main-container">
        <!-- 余白 -->
        <div class="left-margin"></div>
        <!-- login_act.phpにデータを送ります -->
        <form  action="login_act.php" method="post">
          <div class="jumbotron">
          <fieldset>
            <legend>ログインページ</legend>
            <label>ID<input type="text" name="lid"></label><br>
            <label>PW<input type="text" name="lpw"></label><br>
            <input type="submit" value="LOGIN" />
            </fieldset>
          </div>
        </form>
      </div>
    </main>

  </body>
</html>