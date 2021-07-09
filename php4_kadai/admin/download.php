<?php

// CSVダウンロード
include("funcs.php");
$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM a_table");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('./customers.csv','w');

//BOMあり
fwrite($fp, "\xEF\xBB\xBF");

$header = ['ID','姓','登録日','デバイス','年齢','年収','会員ランク','満足度(価格)','満足度(デザイン)','満足度(サポート)','満足度(ブランド)','満足度(品質)','客単価'];
fputcsv($fp,$header);

foreach($users as $user){
    fputcsv($fp,$user);
}

fclose($fp);

header('Location:./customers.csv');

?>