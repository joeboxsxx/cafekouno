<?php
  /*
    引数 $reserve_date を用いて
    current_time, user_id, reserve_time, comment, item_name, type, size, quantity のデータを返します
  */

  function Reserve($reserve_date){
    global $dbh;

    // SELECT文を変数に格納 reserve_date はプレースフォルダーで空の値を入れとく
    $sql = "SELECT * FROM RESERVE_LINES JOIN RESERVE USING(id) JOIN ITEM USING(item_id) JOIN TYPE USING(type_id) JOIN SIZE USING(size_id) WHERE reserve_date = :reserve_date";

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