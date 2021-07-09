<?php
// step1
session_start();

// postのときは、まず事前にデータを受け取りましょう
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

include("admin/funcs.php");
$pdo = db_connect();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if ($res==false) {
    // queryError($stmt);
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入 ※空っぽじゃなければ（認証がオッケーだったときに新しくセッションIDを作る）
if ($val["id"] != "") {
    $_SESSION["chk_ssid"]  = session_id();//ここでログインしているか判断するsessionID
    $_SESSION["name"]      = $val['name'];
    $_SESSION["fname"]     = $val['fname'];
    header("Location: admin/index.php");
} else {
    //logout処理を経由して全画面へ
    header("Location:login.php");
}
exit();

?>