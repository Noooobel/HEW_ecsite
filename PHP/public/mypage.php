<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';
ini_set('display_errors', true);

// ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください!';
  header('Location: signup_form.php');
  return;
}

$login_user = $_SESSION['login_user'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>マイページ</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<h2>マイページ</h2>
<p>ログインユーザ：<?php echo h($login_user['name'])?></p>
<p>メールアドレス：<?php echo h($login_user['email'])?></p>
<form action="../../index.html" method="POST">
<input type="submit" name="logout" value="ホームページへ">
</form>
<form action="logout.php" method="POST">
<input type="submit" name="logout" value="ログアウト">
</form>



</body>
</html>