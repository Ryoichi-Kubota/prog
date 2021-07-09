<?php
//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$last_name = $_POST["last_name"];
$age = $_POST["age"];
$annual_income = $_POST["annual_income"];
$device = $_POST["device"];
$sales = $_POST["sales"];
$rank = $_POST["rank"];
$answer_kakaku = $_POST["answer_kakaku"];
$answer_design = $_POST["answer_design"];
$answer_support = $_POST["answer_support"];
$answer_brand = $_POST["answer_brand"];
$answer_quality = $_POST["answer_quality"];
$id = $_POST["id"];

include("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成 //ここにカラム名を入力する
$stmt = $pdo->prepare("UPDATE a_table SET last_name=:last_name, device=:device, age=:age, annual_income=:annual_income,
 rank=:rank, answer_kakaku=:answer_kakaku, answer_design=:answer_design, answer_support=:answer_support, answer_brand=:answer_brand,
 answer_quality=:answer_quality, sales=:sales WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindValue(':device', $device, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':annual_income', $annual_income, PDO::PARAM_INT);
$stmt->bindValue(':rank', $rank, PDO::PARAM_INT);
$stmt->bindValue(':answer_kakaku', $answer_kakaku, PDO::PARAM_INT);
$stmt->bindValue(':answer_design', $answer_design, PDO::PARAM_INT);
$stmt->bindValue(':answer_support', $answer_support, PDO::PARAM_INT);
$stmt->bindValue(':answer_brand', $answer_brand, PDO::PARAM_INT);
$stmt->bindValue(':answer_quality', $answer_quality, PDO::PARAM_INT);
$stmt->bindValue(':sales', $sales, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: select.php");
    exit;
}
