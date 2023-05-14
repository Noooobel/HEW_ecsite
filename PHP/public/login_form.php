<?php
session_start();

require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$err = $_SESSION;

// セッションを消す
// エラーメッセージを消す処理
$_SESSION = array();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>ログイン画面</title>
    <link href="../css/reset.css" rel="stylesheet"><!-- ?v=2 -->
    <link href="../css/style.css" rel="stylesheet"><!-- ?v=2 -->
</head>


<body>
  <div class="form">
  <h2>ログインフォーム</h2>
  
  <?php if (isset($err['msg'])) : ?>
    <p><?php echo $err['msg']; ?></p>
  <?php endif; ?>

      <form action="./login.php" method="POST">
    
    
    <div class="email-box"><p>
        <label for="email">メールアドレス<label>
        <input type="email" name="email" placeholder="メールアドレスを入力してください" required>
        

    </p></div>
    
    <div class="password-box"><p>
        <label for="password">パスワード<label>
        <input type="password" name="password" placeholder="パスワードを入力してください" required>
      

    </p></div>
    
    <p>
      <input type="submit" value="ログイン">
    </p>
  </form>
  <a href="signup_form.php">新規登録はこちらから</a>
  </div>
</body>
</html>

