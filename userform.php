<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <?php include "header.html" ?>
  <title>お客様情報入力画面</title>

</head>
<body>
  <div class="whiteBack">
    <h5>お客様情報入力</h5>
    <!-- ユーザーフォーム -->
    <div class="input_form">
      <form class="input_form1" action="confirm.php" method="POST">
        <label for="user_name"><span>氏名<span class="required">*</span></span>
          <div class="input_box">
            <input type="text" name="sei" placeholder="姓" class="input_name_field" required>
            <input type="text" name="mei" placeholder="名" class="input_name_field" required>
          </div>
        </label>
        <label for="furigana"><span>フリガナ<span class="required">*</span></span>
          <div class="input_box">
            <input type="text" name="furi" placeholder="セイ" class="input_name_field" required>
            <input type="text" name="gana" placeholder="メイ" class="input_name_field" required>
          </div>
        </label>    
        <label for="tel"><span>電話番号<span class="required">*</span></span>
          <div>
            <input type="tel" name="tel" placeholder="XXX-XXXX-XXXX" class="input_field" required>
          </div>
        </label>
        <label for="email"><span>メールアドレス<span class="required">*</span></span>
          <div>
            <input type="email" name="email" placeholder="example@mail" class="input_field" required>
          </div>
        </label>
      <label for="date"><span>受取日<span class="required" required>*</span></span>
        <div>
          <input type="date" name="date" placeholder="20XX-XX-XX" class="input_field" required>
        </div>
      </label>
      <label for="time"><span>受取時間<span class="required">*</span></span>
        <div>
          <input type="time" step="900" name="time" placeholder="XX:XX" class="input_field" required>
        </div>
      </label>
      <label for="check">
        <div  class="checkbox">
          <input type="checkbox" required><span>個人情報保護方針、特定商取引に基づく表記に同意する</span>
        </div>
      </label>
    </div>  <!-- END input_form -->
  </div>  <!-- END whiteBack -->
  <div class="input_form">
    <!-- 確認画面へ進む -->
    <div class="button">
      <input type="submit" value="確認画面へ進む">
    </div>           
    <!-- カート一覧に戻る -->
    <div class="return_button">
      <input type="button" value="カート情報へ戻る" onclick="location.href='cart.php'">
    </div>
    <!-- 商品一覧に戻る -->
    <div class="return_button">
      <input type="button" value="商品一覧に戻る" onclick="location.href='show_items.php'">
    </div>
  </div>  <!-- END input_form -->
  </form>  <!-- FORM END -->
  <?php include "footer.html" ?>
</body>
</html>