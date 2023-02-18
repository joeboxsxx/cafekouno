<?php
  /*
    引数 $userform を用いて
    RESERVE へデータを渡して
    id を返します
  */

  function Insert_reserve($user_id, $userform){ 
    global $dbh;
    
    // テーブルに登録するINSERT INTO文を変数に格納 VALUESはプレースフォルダーで空の値を入れとく
    $sql = "INSERT INTO RESERVE (id, user_id, reserve_date, reserve_time) VALUES (:id, :user_id, :date, :time);";
    
    //値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);
    
    // 挿入する値を配列に格納
    $params = array(
      ':id' => NULL,
      ':user_id' => $user_id,
      ':date' => $userform['date'],
      ':time' => $userform['time'],
    );
    
    // 挿入する値が入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);

    // id を返す
    return $dbh->lastInsertId();
    
  }

?>