<?php
//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$name = $_POST["name"];
$email = $_POST["email"];
$kanri_flg = $_POST["kanri_flg"];
$id = $_POST["id"];
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

//３．データ登録SQL作成 //ここにカラム名を入力する
$stmt = $pdo->prepare("UPDATE user_table SET name=:name, email=:email, fname=:fname, kanri_flg=:kanri_flg WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);

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
