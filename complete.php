<?php
  require_once(__DIR__ . "/src/db_connect.php");
  require_once(__DIR__ . "/func/sql_insert_user.php");
  require_once(__DIR__ . "/func/sql_insert_reserve.php");
  require_once(__DIR__ . "/func/sql_insert_reserve_lines.php");
  require_once(__DIR__ . "/func/send_mail.php");
  
  // DB に登録てきていない場合 (初期状態)
  $flag = false;

  // セッション開始
  session_start();

  // セッションからデータを受け取る
  $cartInfo = isset($_SESSION['cartInfo'])? $_SESSION['cartInfo'] : "";
  $userform = isset($_SESSION['userform'])? $_SESSION['userform'] : "";

  // DB にデータを登録する
  try {
    if (isset($cartInfo) && isset($userform)) {

      // トランザクション開始
      $dbh->beginTransaction();

      // ユーザー表に登録して user_id を受け取る
      $user_id = Insert_user($userform);
      
      // 予約表に登録して id を受け取る
      $id = Insert_reserve($user_id, $userform);
      
      // 予約明細表に登録
      Insert_reserve_lines($id, $cartInfo);
      
      // トランザクションコミット
      $dbh->commit();
      
      // DB に登録できた場合
      $flag = true;

    }  // if 終わり
    
  } catch (PDOException $e) {
    // ロールバック
    $dbh->rollback();

  }

  // セッションからデータを消す
  unset($_SESSION['cartInfo']);
  unset($_SESSION['userform']);

  ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
    <?php include "header.html" ?>
    <title>完了画面</title>
  </head>
  <body>
    <h5>完了画面</h5>
    <?php
    // DB に登録できた場合
    if ($flag) {
      ?>
      <div class="completion_form">
        <div class="completion">店頭受取予約が完了しました</div>
        <div class="ID">予約ID：<?php echo $id; ?></div>
        <p>
          ご予約ありがとうございます。</br>
          店頭受取のご予約が完了しました。</br>
          予約番号をお控え頂き、ご来店時にご提示ください。</br>
          受け取り日時から2時間を過ぎてもご連絡のない場合は、ご予約をキャンセルとさせていただきます。</br>
          予約時間にお越しいただけない場合はご連絡いただきますようお願い申し上げます。</br>
        </p>
        <!-- トップページに戻る -->
        <form action="index.php" method="POST">
          <div class="button">
            <input type="submit" value="TOPページへ戻る">
          </div>
        </form>
      </div>  <!-- END completion_form -->
      <?php
    // DB に登録できてない
  } else {
    ?>
      <div class="completion_form">
        <div class="completion">店頭受取予約が未完了です</div>
        <p>
          店頭受取のご予約が失敗しました。</br>
          申し訳ありませんが、再度始めから予約をお願いします。</br>
        </p>
        <!-- トップページに戻る -->
        <form action="index.php" method="POST">
          <div class="button">
            <input type="submit" value="TOPページへ戻る">
          </div>
        </form>
      </div>  <!-- END completion_form -->
      <?php
    }  // if終わり
    ?>
    <?php include "footer.html" ?>
</body>
</html>