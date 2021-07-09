<?php

// sesssionチェック
function LoginCheck(){
    if (
        !isset($_SESSION['chk_ssid']) ||
        $_SESSION["chk_ssid"] != session_id()
    ) {
        echo "login Error";
        exit();
    }
}

// DB接続します
function db_connect(){
  try {
    $pdo = new PDO('mysql:dbname=analytics_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }
    return $pdo;
}

?>