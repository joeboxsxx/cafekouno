<?php
  /*
    引数 $item_id, $type_id, $size_id を用いて
    price, item_name, type, size のデータを返します
  */
  
  function Price($item_id, $type_id, $size_id){
    global $dbh;

    // SELECT文を変数に格納 item_id, type_id, size_id をプレースフォルダーで空の値を入れとく
    $sql = "SELECT * FROM PRICE JOIN ITEM USING(item_id) JOIN TYPE USING(type_id) JOIN SIZE USING(size_id) WHERE item_id = :item_id AND type_id = :type_id AND size_id = :size_id";
    
    // 値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);
    
    // 挿入する値を bindValue で格納
    $stmt->bindValue('item_id', $item_id, PDO::PARAM_INT);
    $stmt->bindValue('type_id', $type_id, PDO::PARAM_INT);
    $stmt->bindValue('size_id', $size_id, PDO::PARAM_INT);

    // SQLを実行
    $stmt->execute();

    // フェッチして結果を受け取る
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // 結果を返す
    return $result;

  }

?>