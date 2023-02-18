<?php
  require_once(__DIR__ . "/src/db_connect.php");
  require_once(__DIR__ . "/func/sql_item_lines.php");
  require_once(__DIR__ . "/func/sql_price.php");

  // item_lines.php からのPOSTを受け取る
  $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : "";
  $type_id = isset($_POST['type_id']) ? $_POST['type_id'] : "";
  $size_id = isset($_POST['size_id']) ? $_POST['size_id'] : "";
  $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";

  // セッション開始
  session_start();

  /* セッションに登録する */
  if ($item_id != '' && $type_id != '' && $size_id != '' && $quantity != '') {
    // sql_item_lines.php を用いて image_path を取り出す
    $item_lines = item_Lines($item_id, $type_id);
    $image_path = $item_lines['image_path'];
    
    // 商品を特定するためのコードを作成する
    $cartno = $item_id.'-'.$type_id.'-'.$size_id;

    // sql_price.php を用いて各データを取り出す
    $price_result = Price($item_id, $type_id, $size_id);
    $item_name = $price_result['item_name'];
    $type = $price_result['type'];
    $size = $price_result['size'];
    $price = $price_result['price'];

    // セッションに登録する
    $_SESSION['cartInfo'][$cartno] = [
      'item_id' => $item_id,    // 商品ID
      'item_name' => $item_name,    // 商品名
      'type_id' => $type_id,    // タイプID
      'type' => $type,    // タイプ
      'size_id' => $size_id,    // サイズID
      'size' => $size,    // サイズ
      'image_path' => $image_path,    // 商品画像
      'price' => $price,    // 単価
      'quantity' => $quantity,    // 個数
      'total' => $price * $quantity,    // 合計金額
    ];
  }
  
  //削除行番号が押された場合
  if (isset($_GET['delno'])) {
    //指定の削除行番号のデータをセッションから削除する
    unset($_SESSION['cartInfo'][$_GET['delno']]);
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <?php include "header.html" ?>
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <title>カート一覧</title>
</head>
<body>
<?php
  // セッションに cartInfo が登録されたら
  if (isset($_SESSION['cartInfo'])) {
?>
    <div id="main">
      <div class="whiteBack">
        <h5>ショッピングカート</h5>
        <!-- カート内容 -->
        <div class="item_all">
          <span class="item_info">商品情報</span>
          <div class="items_card">
            <?php
              // 総額を計算
              $total = 0;
              if (!empty($_SESSION['cartInfo'])) {
                foreach($_SESSION['cartInfo'] as $key => $val){
                  $total += $val['total'];
            ?>
                  <div class="item_card">
                    <div class="item_image">
                      <img src="image/<?php echo $val['image_path']; ?>" width="200px" height="200px">
                    </div>
                    <div class="item_n_d">
                      <div class="item_n_t_s_p">
                        <div class="item_name">
                          <?php echo $val['item_name']; ?>
                        </div>
                        <div class="item_type">
                          <?php echo $val['type']; ?>
                        </div>
                        <div class="item_size">
                          <?php echo $val['size']; ?>
                        </div>
                        <div class="item_price">
                          <?php echo $val['price']; ?>円
                        </div>
                      </div>  <!-- END item_n_t_s_p -->
                      <div class="item_q_d">
                        <div class="item_quantity">
                          <?php echo $val['quantity']; ?>個
                        </div>
                        <!-- 削除ボタン -->
                        <div class="item_delete">
                          <a href="cart.php?delno=<?php echo $key; ?>">削除</a>
                        </div>
                      </div>  <!-- END item_q_d -->
                    </div>  <!-- END item_n_d -->
                    <div class="item_totalPrice">
                      <?php echo $val['total']; ?>円
                    </div>
                  </div>  <!-- END item_card -->
            <?php
                } //foreach終わり
              } //if終わり
            ?>
          </div>  <!-- END items_card -->
          <!-- 総額表示 -->
          <div class="all_total">
            小計：<?php echo $total; ?>円(税込)
          </div>
        </div>  <!-- END item_all -->
      </div>  <!-- END whiteBack -->

      <div class="input_form">
        <div class="button">
          <!-- お客様情報入力画面へ -->
          <input type="button" value="ご購入手続きへ" onclick="location.href='userform.php'">
        </div>
        <div class="return_button">
          <!-- 商品一覧に戻る -->
          <input type="button" value="商品一覧に戻る" onclick="location.href='show_items.php'">
        </div>
      </div>  <!-- END input_form -->
    </div>  <!-- END main -->
<?php
  // セッションに cartInfo が登録されてない時
  } else {
?>
    <div class="main">
      <div class="whiteBack">
      <h5>ショッピングカート</h5>
    
      <div class="item_none">カート内に商品がありません。</div>

      </div>  <!-- END whiteBack -->
      <div class="input_form">
        <div class="return_button">
          <!-- 商品一覧に戻る -->
          <input type="button" value="商品一覧に戻る" onclick="location.href='show_items.php'">
        </div>
      </div>  <!-- END input_form -->
    </div>  <!-- END main -->
<?php
  }   // if終わり
?>

<div id="footer">
  <?php include "footer.html" ?>
</div>
</body>
</html>