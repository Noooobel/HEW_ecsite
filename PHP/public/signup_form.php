<?php
session_start();

require_once '../functions.php';
require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>ユーザ登録画面</title>
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/signup.css" rel="stylesheet">
</head>
<body>
<div class="form">
<h2>ユーザ登録フォーム</h2>
<?php if (isset($login_err)) : ?>
      <p><?php echo $login_err; ?></p>
    <?php endif; ?>
  <form action="register.php" method="POST">
  <div class="user-box"><p>
  <label for="username">ユーザ名<label>
  <input type="text" name="username"placeholder="名前を入力してください" required>
</p></div>
<div class="email-box"><p>
    <label for="email">メールアドレス<label>
    <input type="email" name="email" placeholder="メールアドレスを入力してください" required>
</p></div>
<div class="password-box1"><p>
    <label for="password">パスワード<label>
    <input type="password" name="password" placeholder="パスワードを入力してください" required>
</p></div>
<div class="password-box2"><p>
    <label for="password_conf">パスワード確認<label>
    <input type="password" name="password_conf" placeholder="パスワードを再入力してください" required>
</p></div>
<input type="hidden" name="csrf_token" value="">
  <input type="submit" value="新規登録">
</form>
<p>
<a href="login_form.php">ログインはこちらから</a>
</p>
</div>
</body>
</html>