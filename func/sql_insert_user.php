<?php
  /*
    引数 $userform を用いて
    USER へデータを渡して
    user_id を返します
  */

  function Insert_user($userform){
    global $dbh;
    
    // テーブルに登録するINSERT INTO文を変数に格納 VALUESはプレースフォルダーで空の値を入れとく
    $sql = "INSERT INTO USER (user_id, user_name, furigana, email, tel) VALUES (:user_id, :user_name, :furigana, :email, :tel);";
    
    //値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);
    
    // 挿入する値を配列に格納
    $params = array(
      ':user_id' => NULL,
      ':user_name' => $userform['user_name'],
      ':furigana' => $userform['furigana'],
      ':email' => $userform['email'],
      ':tel' => $userform['tel'],
    );
    
    // 挿入する値が入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);

    // user_id を返す
    return $dbh->lastInsertId();
  }

?>