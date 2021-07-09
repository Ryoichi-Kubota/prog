<?php
//1. GETデータ取得
$id = $_GET["id"];

include("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成 //ここにカラム名を入力する
$stmt = $pdo->prepare("DELETE FROM user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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