<?php
  /*
    引数 $reserve_date を用いて
    current_time, reserve_date, reserve_time, user_name, furigana, email, telのデータを返します
  */

  function User($reserve_date){
    global $dbh;

    // SELECT文を変数に格納 reserve_date はプレースフォルダーで空の値を入れとく
    $sql = "SELECT * FROM RESERVE JOIN USER USING(user_id) WHERE reserve_date = :reserve_date";
    
    //値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);

    // 挿入する値を bindValue で格納
    $stmt->bindValue('reserve_date', $reserve_date, PDO::PARAM_INT);

    // SQLを実行
    $stmt->execute();

    // フェッチして結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 結果を返す
    return $result;

  }

?>