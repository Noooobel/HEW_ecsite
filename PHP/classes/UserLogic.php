<?php

require_once '../dbconnect.php';
ini_set('display_errors', true);
class UserLogic
{
  /** PHPDoc = コメントを書くときの共通の形式
   * ユーザを登録する
   *  @param array $userData
   *  @return bool $result //bool = 返り値を true or false で返す
   */
  
  // public static function createUser($userData)
  // {
  //   $result = false;
    
  //   $sql = 'INSERT INTO account (name, email, password) VALUES (?, ?, ?)'; 
  //   //(?, ?, ?) = プレースホルダ = ユーザから入力があった値をエスケープ(SQLインジェクション対策)
  //   //(?, ?, ?,)には配列で値を渡すことができる
  //   // ユーザデータを配列に入れる
  //   $arr = [];
  //   $arr[] = $userData['username'];
  //   $arr[] = $userData['email'];
  //   $arr[] = password_hash($userData['password'],
  //   PASSWORD_DEFAULT); //第二引数が必要です
    
  //   try{
  //     $stmt = connect()->prepare($sql);
  //     $result = $stmt->execute($arr);
  //     return $result;
  //   } catch(Exception $e) {
  //     return $result;
  //   } 
  // }
  public static function createUser($userData)
{
    $result = false;

    $sql = 'INSERT INTO account (name, email, password) VALUES (?, ?, ?)';
    $arr = [];
    $arr[] = $userData['username'];
    $arr[] = $userData['email'];
    $arr[] = password_hash($userData['password'], PASSWORD_BCRYPT);

    try {
        $stmt = connect()->prepare($sql);
        $result = $stmt->execute($arr);
        return $result;
    } catch (Exception $e) {
        // エラーが発生した場合の処理を記述
        error_log('Error: ' . $e->getMessage());
        echo 'データベースエラー: ' . $e->getMessage();
        return false;
    }
}

  
    /** PHPDoc = コメントを書くときの共通の形式
   * ログイン処理
   *  @param string $email
   *  @param string $password
   *  @return bool $result
   */
  
  public static function login($email, $password)
  {
    // 結果
    $result = false;
    // ユーザをemailから検索して取得
    $user = self::getUserByEmail($email);
    
    
    
    if (!$user) {
      $_SESSION['msg'] = 'emailが一致しません。';
      return $result;
    }
    
    //パスワードの照会
    if (password_verify($password, $user['password'])) {
      // ログイン成功
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    }
    
    $_SESSION['msg'] = 'パスワードが一致しません。';
    return $result;
}

    /** PHPDoc = コメントを書くときの共通の形式
   * emailからユーザを取得
   *  @param string $email
   *  @return array|bool $user|false
   */
  
  public static function getUserByEmail($email)
  {
    // SQLの準備
    // SQLの実行
    // SQLの結果を返す
    $sql = 'SELECT * FROM account WHERE email = ?';
    
    // emailを配列に入れる
    $arr = [];
    $arr[] = $email;

    
    try{
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      //SQLの結果を返す
      $user = $stmt->fetch();
      return $user;
    } catch(Exception $e) {
      return $result;
    } 
  }



    /**
   * ログインチェック
   *  @param void 
   *  @return bool $result
   */
  
  public static function checkLogin()
  {
    $result = false;
    
    //セッションにログインユーザが入っていなかったらfalse
    if (isset($_SESSION['login_user']) && $_SESSION['login_user'] ['id'] > 0) {
      return $result = true;
    }
    return $result;
  }

/**
 * ログアウト処理
 */
  public static function logout()
  {
    $_SESSION = array();
    session_destroy();
  }



}

























?>