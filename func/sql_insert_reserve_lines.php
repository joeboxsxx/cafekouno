<?php
  /*
    引数 $id, $cartInfo を用いて
    DBへデータを渡します
  */

  function Insert_reserve_lines($id, $cartInfo){ 
    global $dbh;

    // テーブルに登録するINSERT INTO文を変数に格納 VALUESはプレースフォルダーで空の値を入れとく
    $sql = "INSERT INTO RESERVE_LINES (id, item_id, type_id, size_id, quantity) VALUES (:id, :item_id, :type_id, :size_id, :quantity);";

    //値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);
    
    foreach ($cartInfo as $key => $val) {
      // 挿入する値を配列に格納
      $params = array(
        ':id' => $id,
        ':item_id' => $val['item_id'],
        ':type_id' => $val['type_id'],
        ':size_id' => $val['size_id'],
        ':quantity' => $val['quantity'],
      );
      
      //挿入する値が入った変数をexecuteにセットしてSQLを実行
      $stmt->execute($params);
    }

  }

?>