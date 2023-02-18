<?php
  /* 
    引数なしで
    item_lines の全件のステートメントを返します
  */

  function show_items(){
    global $dbh;

    // SELECT文を変数に格納
    $sql = "SELECT * FROM ITEM_LINES JOIN ITEM USING(item_id) JOIN TYPE USING(type_id) ORDER BY type_id ASC";
   
    // SQLを実行
    $stmt = $dbh->query($sql);

    // ステートメントを返す
    return $stmt;

  }
  
?>