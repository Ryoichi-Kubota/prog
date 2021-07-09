<?php
//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$Aname = $_POST["Aname"];
$Amail = $_POST["Amail"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$fname = $_FILES['fname']['name'];

$tempfile = $_FILES['fname']['tmp_name'];
$filename = '../imgs/' . $_FILES['fname']['name'];
 
if (is_uploaded_file($tempfile)) {
    if ( move_uploaded_file($tempfile , $filename )) {
	    // fileUpload:OK
    } else {
        // fileUpload:NG
        echo "Upload failed";
    }}

include("funcs.php");
$pdo = db_connect();

$kanri_flg = 1;
$life_flg = 0;

//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO user_table(id, name, indate, lid, lpw, email, fname, kanri_flg, life_flg
 )VALUES(NULL, :Aname, sysdate(), :lid, :lpw, :Amail, :fname, :kanri_flg, :life_flg)");
$stmt->bindValue(':Aname', $Aname, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);
$stmt->bindValue(':Amail', $Amail, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: user_select.php");
    exit;
}
