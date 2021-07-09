<?php

//sessionスタートをして、セッションを使えるようにする
session_start();

include("funcs.php");
LoginCheck();

$Sname = $_SESSION['name'];
$Fname = $_SESSION['fname'];

$id = isset($_GET['id'])? htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8'):'';

$pdo = db_connect();

//ページング設定
//1. 何件ずつ表示させるか（固定。今回は10件ずつ）
$rows = 10; 

//2. 現在表示しているページ数（GETで取得。初回など送られてこなければ1を設定する）
$page = isset($_GET['page'])? $_GET['page'] : 1;  

//3. 表示するページに応じたレコード取得開始位置（2ページ目は、10件目から表示なので、10*(2-1)で$offset=10）
$offset = $rows * ($page-1);

//4. 全件のレコード数。
if($id == '')
{
    //変数の割当が必要無いのでqueryで実行し、fetchColumn()で取得したcountを返す。
    $all_rows = $pdo->query("SELECT COUNT(*) FROM user_table")->fetchColumn();

}else{
    //検索条件を考慮
    $all_rows_stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=:id");
    $all_rows_stmt->bindValue(":id", $id);
    $all_rows_stmt->execute();
    $all_rows = $all_rows_stmt->rowCount();
}

//5.  全件を10件ずつ表示させた場合のページ数。全件÷表示件数をして、0以下の場合は、ページ数は1に固定。
if(($all_rows % $rows) <= 0){
    $pages = (int)($all_rows/$rows);
}else{
    $pages = (int)($all_rows/$rows)+1;
}

//6.  次のページ数（基本的に現在ページ+1。現在ページ+1が全ページ数より大きくなってしまうとページが無いのでその場合は''とする）
$next = ($page+1 > $pages)? '' : $page+1;

//7.  一つ前のページ数（基本的に現在ページ-1。現在ページ-1が0になってしまうとページが無いのでその場合は''とする）
$prev = ($page-1 <= 0)? '' : $page-1;


if($id == '')
{
    // $stmt = $pdo->prepare("SELECT * FROM a_table");
    $stmt = $pdo->prepare("SELECT * FROM user_table limit :offset,:rows");

}else{
    // $stmt = $pdo->prepare("SELECT * FROM a_table WHERE id=:id");
    $stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=:id limit :offset,:rows");
    $stmt->bindParam(":id",$id);     
}

$stmt->bindParam(":offset",$offset,PDO::PARAM_INT);
$stmt->bindParam(":rows",$rows,PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>AnalyticsTool AdminUserSelect</title>
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
        
        <div class="user-wrapper">
          <div class="user-container">
            <div class="wrapper-title">
              <p class="text-head">管理者管理</p>
            </div>
            <!-- 管理者登録ボタン -->
            <button type="button" class="btn btn-navy" onclick="location.href='register.php'">管理者登録</button>
            <!-- 検索フォーム -->
            <form class="serch-box" action="select.php" method="GET">
              <input type="text" name="id" class="" placeholder="管理者ID検索">
              <button type="submit" class="btn btn-navy">検索</button>
            </form>
            <!-- ユーザーリスト -->
            <div class="list">
              <table>
                <thead>
                  <tr>
                    <th class="user_th">管理者ID</th>
                    <th class="user_th">名前</th>
                    <th class="user_th">登録日</th>
                    <th class="user_th">権限</th>
                    <th class="user_th">操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $user): ?>
                    <tr>
                      <td><?php echo $user['id']; ?></td>
                      <td><?php echo $user['name']; ?></td>
                      <td><?php echo $user['indate']; ?></td>
                      <td>
                        <?php if($user['kanri_flg']=='0'): ?>
                          オーナー
                        <?php elseif($user['kanri_flg']=='1'): ?>
                          管理者
                        <?php else: ?>
                          メンバー
                        <?php endif; ?>
                      </td>
                      <td>
                        <button type="button" class="btn btn-blue" onclick="location.href='user_detail.php?id=<?php echo $user['id']; ?>'">編集</button>
                        <a class="btn btn-red" href="user_delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('管理者ID<?php echo $user['id']; ?>のレコードを削除します。よろしいですか？')">削除</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- ページング機能 -->
              <ul class="paging">
                <li><a href="./user_select.php?id=<?php echo $id; ?>">« 最初</a></li>
                <?php if ($prev != ''): ?>
                  <li><a href="./user_select.php?page=<?php echo $prev; ?>&id=<?php echo $id; ?>"><?php echo $page-1; ?></a></li>
                <?php endif; ?>
                <li><span><?php echo $page; ?></span></li>
                <?php if ($next != ''):  ?>
                  <li><a href="./user_select.php?page=<?php echo $next; ?>&id=<?php echo $id; ?>"><?php echo $page+1; ?></a></li>
                <?php endif; ?>
                <li><a href="./user_select.php?page=<?php echo $pages; ?>&id=<?php echo $id; ?>">最後 »</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>