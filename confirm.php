<?php
  // userform.php からのPOSTを受け取る
  $sei = isset($_POST['sei']) ? $_POST['sei'] : "";
  $mei = isset($_POST['mei']) ? $_POST['mei'] : "";
  $furi = isset($_POST['furi']) ? $_POST['furi'] : "";
  $gana = isset($_POST['gana']) ? $_POST['gana'] : "";
  $tel = isset($_POST['tel']) ? $_POST['tel'] : "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $date = isset($_POST['date']) ? $_POST['date'] : "";
  $time = isset($_POST['time']) ? $_POST['time'] : "";
  

  // セッション開始
  session_start();

  /* セッションに登録する */
  if ($sei != '' && $mei != '' && $furi != '' && $gana != '' && $tel != '' && $email != '' && $date != '' && $time != '') {
    $_SESSION['userform'] = [
      'user_name' => $sei . $mei,   // 氏名
      'furigana' => $furi . $gana,    // フリガナ
      'tel' => $tel,    // 電話番号
      'email' => $email,    // メールアドレス
      'date' => $date,    // 受け取り日
      'time' => $time,    // 受け取り時間
    ];
  }

  // セッションからデータを受け取る
  $cartInfo = isset($_SESSION['cartInfo'])? $_SESSION['cartInfo'] : "";
  $userform = isset($_SESSION['userform'])? $_SESSION['userform'] : "";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <?php include "header.html" ?>
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <title>確認画面</title>
</head>
<body>
<div class="whiteBack">
  <!-- タイトル -->
  <h5>確認画面</h5>
  <p>ご予約情報に間違いがないかお確かめください。</p>

  <div class="confirm_form">

    <!-- 受け取り日時 -->
    <div class="type">
        <span class="type-text1">受取日時</span><br>
    </div>
    <div>
      <p class="date_time"><?php echo $userform['date'].' ' ?>
      <?php echo $userform['time'] ?>ごろ</p>
    </div>
    <br>

    <!-- 商品情報 -->
    <div>
      <div class="type">
        <span class="type-text1">商品情報</span>
      </div>
        <?php
          // 総額を計算
          $total = 0;
          if (!empty($cartInfo)) {
            foreach($cartInfo as $key => $val){
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
                </div>
            </div>
            <div class="item_q_d">
                <div class="item_quantity">
                <?php echo $val['quantity']; ?>
                </div>
            </div>
            <div class="item_totalPrice">
                <?php echo $val['total']; ?>円
            </div>
        </div>
        <?php
          } //foreach終わり
        } //if終わり
        ?>
      <!-- 総額表示 -->
      <div class="all_total">
        小計:<?php echo $total; ?>円
      </div>
    </div>
    <br>

    <!-- お客様情報 -->
    <div class="type">
        <span class="type-text1">お客様情報</span>
    </div>
      <table>
        <tr>
          <th>氏名</th>
          <td><?php echo $_SESSION['userform']['user_name']; ?></td>
        </tr>
        <tr>
          <th>フリガナ</th>
          <td><?php echo $_SESSION['userform']['furigana']; ?></td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td><?php echo $_SESSION['userform']['tel']; ?></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><?php echo $_SESSION['userform']['email']; ?></td>
        </tr>
      </table>
    <br>
    </div>
  </div>

<!-- 予約確定ボタン -->
<div class="input_form">
    <div class="button">
        <input type="button" value="予約確定" onclick="location.href='complete.php'">
    </div>

<!-- 入力画面へ戻る -->
    <div class="return_button">
        <input type="button" value="お客様情報入力画面へ戻る" onclick="location.href='userform.php'">
    </div>

<!-- 商品一覧に戻る -->
    <div class="return_button">
        <input type="button" value="商品一覧に戻る" onclick="location.href='show_items.php'">
    </div>
</div>
</body>
</html>