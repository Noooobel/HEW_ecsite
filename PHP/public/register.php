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
if(!$username = filter_input(INPUT_POST, 'username')) {
    $err[] = 'ユーザ名を記入してください。';
}
if(!$email = filter_input(INPUT_POST, 'email')) {
    $err[] = 'メールアドレスを記入してください。';
}
$password = filter_input(INPUT_POST, 'password');
// 正規表現
if (!preg_match("/\A[a-z\d]{4,100}+\z/i",$password)) {
    $err[] = 'パスワードは英数字4文字以上100文字以下にしてください。';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
    $err[] = '確認用パスワードと異なっています。';
}

if (count($err) === 0) {
    // ユーザを登録完了する処理
    $hasCreated = UserLogic::createUser($_POST);
    
    if (!$hasCreated) {
      $err[] = '登録に失敗しました';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>ユーザ登録完了画面</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

    <!-- エラーがあったら全て表示 -->
    <!-- as = イコール -->
<?php if (count($err) > 0) : ?>
  <?php foreach($err as $e) : ?>
    <p><?php echo $e ?></p>
  <?php endforeach ?>
  
    <!-- エラーが無ければ登録完了 -->
<?php else : ?>
  <p>ユーザ登録が完了しました。</p>
<?php endif ?>
<a href="./signup_form.php">戻る</a>


</body>
</html>