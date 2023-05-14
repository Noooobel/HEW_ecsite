
<?php
session_start();

require_once '../classes/UserLogic.php';
ini_set('display_errors', true);

//エラーメッセージ
$err = [];

//バリデーション
//filter_input = POSTやGETなどのグローバル変数をフィルタリング
//フィルタリングとは、対象の変数が存在するか、想定しているデータ型か、格納している値は予測している内容か、など、データ内容のチェックを行うことです。
//typeとvariable_nameが必須!!!!!

if(!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを記入してください。';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = 'パスワードを記入してください。';
}


if (count($err) > 0) {
    // エラーがあった場合は戻す
    $_SESSION = $err;
    header('Location: login_form.php');
    return;
  }
//ログイン成功時の処理
$result = UserLogic::login($email, $password);
//ログイン失敗時の処理
if (!$result) {
  header('Location: login_form.php');
  return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>ログイン完了</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<h2>ログイン完了</h2>
<p>ログインしました!</p>
<a href="./mypage.php">マイページへ</a>


</body>
</html>