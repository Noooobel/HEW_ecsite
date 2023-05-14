<?php
require_once 'env.php';//一度読み込んだ処理は飛ばしてくれる 再定義エラーを防ぐ
ini_set('display_errors', true);//PHPエラーの表示・非表示を設定します。true = 表示 false = 非表示
function connect()

{
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//エラーを投げてくれる処理 = 属性ATTR_ERRMODE,値ERRMODE_EXCEPTION
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC//配列を必ずkeyとvalueで返す処理 = 属性ATTR_DEFAULT_FETCH_MODE,値FETCH_ASSOC
        ]);
        return $pdo;
    } catch(PDOExeption $e) {
        echo '接続失敗です!'. $e->getMessage();
        exit();
    }
}

