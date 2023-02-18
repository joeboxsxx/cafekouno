<?php
  require_once(__DIR__ . "/src/db_connect.php");
  require_once(__DIR__ . "/func/sql_item_lines.php");
  require_once(__DIR__ . "/func/sql_price.php");

  // show_items.php からのGETを受け取る
  $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : "";
  $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : "";

  if (isset($item_id) && isset($type_id)) {
    // sql_item_lines.php を用いて item_lines を取り出す
    $item_lines = item_Lines($item_id, $type_id);
    // 商品タイプがdrinkのとき $sizelist を定義する
    if ($type_id ==  1 || $type_id == 2) {
      $sizelist = [
        1 => 'S',
        2 => 'M',
        3 => 'L',
      ];
    }
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <?php include "header.html" ?>
  <title>商品詳細</title>
  <link href="css/nakastyle.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
  <div class="main_block">
    <!-- image_block -->
    <div class="image_block">
      <img src="image/<?php echo $item_lines['image_path']; ?>">
    </div>
    <!-- text_block -->
    <div class="text_block">
      <!-- 商品名 -->
      <p class="product_name"><?php echo $item_lines['item_name']; ?></p>
      <!-- コメント -->
      <p class="explanation"><?php echo $item_lines['comment']; ?></p>
      <!-- option_block -->
      <div class="option_block">
        <!-- size_block -->
        <div class="size_block">
          <?php
            // 商品タイプがdrinkのとき
            if ($type_id ==  1 || $type_id == 2) {
              foreach ($sizelist as $size_id => $size) {
                $price_result = Price($item_id, $type_id, $size_id);
          ?>
              <!-- サイズ -->
              <div><?php echo $size; ?>サイズ</div>
              <!-- 金額 -->
              <div>税込 ¥ <?php echo $price_result['price']; ?></div>
              <br>
          <?php
              }  // foreach終わり
              // 商品タイプがfoodのとき
            } else {
              $size_id = 0;
              $price_result = Price($item_id, $type_id, $size_id);
              ?>
              <!-- 金額 -->
              <div class="money">税込 ¥ <?php echo $price_result['price']; ?> </div>
              <br>
          <?php
            }  // else終わり 
          ?>
        </div>  <!-- END size_block -->

        <!-- input_block -->
        <div class="input_block">
          <!-- select_block -->
          <div class="select_block">
            <!-- カートに追加する -->
            <form action="cart.php" method="post">  <!-- FORM BEGIN -->
              <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
              <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
              <!-- サイズ -->
              <?php
                // 商品タイプがdrinkのとき
                if ($type_id ==  1 || $type_id == 2) {
              ?>
                  サイズ
                  <div class="select_size">
                    <select name="size_id">
                      <option value="">選択してください</option>
                      <?php
                        foreach ($sizelist as $size_id => $size) {
                      ?>
                          <option value="<?php echo $size_id; ?>">
                            <?php echo $size; ?> サイズ
                          </option>
                      <?php
                        }   // foreach終わり
                      ?>
                    </select>
                    <br>
                  </div> <!-- END select_size -->
              <?php
                // 商品タイプがfoodのとき
                } else {
              ?>
                  <input type="hidden" name="size_id" value="<?php echo $size_id; ?>">
              <?php
                }   // else終わり
              ?>
                <!-- 個数 -->
                個数
                <div class="select_quantity">
                  <select name="quantity">
                    <option value="">選択してください</option>
                    <?php
                      for ($i = 1; $i < 100; $i++) {
                    ?>
                        <option value="<?php echo $i; ?>">
                          <?php echo $i; ?> 個
                        </option>
                    <?php
                      }   // for終わり
                    ?>
                  </select>
                  <br>
                </div> <!-- END select_quantity -->
          </div> <!-- select_block -->
          <!-- next_block -->
          <div class="next_block">
            <!-- 送信ボタン -->
            <div class="send_button"><input type="submit" value="カートに追加する"></div>
          </div>
            </form>  <!-- FORM END -->
        </div>  <!-- END input_block-->
      </div>  <!-- END option_block-->
      <!-- note_block -->
      <div class="note_block">
        <p class="com">予約受付</p>
        <p>ご予約は当日でも受け付けております。<br>
        ※キャンセルする場合は受け取り時間までにご連絡ください。
        </p>
        <p class="com">受渡方法</p>
        <p>店頭カウンターにて確認完了画面をご提示のうえお受け取り下さい。</p>
      </div>  <!-- END note_block -->
    </div>  <!-- END text_block-->
  </div>  <!-- END main_block-->
  <!-- 商品一覧に戻る -->
  <div class="return_button">
    <input type="button" value="商品一覧に戻る" onclick="location.href='show_items.php'">
  </div>
</body>
</html>