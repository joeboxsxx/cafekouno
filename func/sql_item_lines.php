<?php  
  /*
    引数 $item_id, $type_id を用いて
    item_name, type, image_path のデータを返します
  */
  
  function item_Lines($item_id, $type_id){
    global $dbh;

    // SELECT文を変数に格納 item_id, type_id をプレースフォルダーで空の値を入れとく
    $sql = "SELECT * FROM ITEM_LINES JOIN ITEM USING(item_id) JOIN TYPE USING(type_id) WHERE item_id = :item_id AND type_id = :type_id;";

    //値が空のままSQL文をセット
    $stmt = $dbh->prepare($sql);

    // 挿入する値を bindValue で格納
    $stmt->bindValue('item_id', $item_id, PDO::PARAM_INT);
    $stmt->bindValue('type_id', $type_id, PDO::PARAM_INT);

    // SQLを実行
    $stmt->execute();

    // フェッチして結果を受け取る
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // 結果を返す
    return $result;

  }

?>