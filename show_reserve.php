<?php
require_once(__DIR__ . "/src/db_connect.php");
require_once(__DIR__ . "/func/sql_show_reserve.php");
require_once(__DIR__ . "/func/sql_show_user.php");

// item_flagの設定
if (isset($_GET['item_flag'])) {    // カレンダーが押されたとき
  $item_flag = $_GET['item_flag'];
} else if (isset($_POST['item_flag'])) {   // 商品一覧ボタンが押されたとき
  $item_flag = true;
} else if (isset($_POST['cust_flag'])) {    // 顧客一覧ボタンが押されたとき
  $item_flag = false;
} else {    // 初期状態
  $item_flag = true;
}

//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
//前の月・次の月が押された時はGETパラメータから取得
if (isset($_GET['ym'])) {
  $ym = $_GET['ym'];
} else {
  //今月の年月を表示
  $ym = date('Y-m');
}

//タイムスタンプを作成し、フォーマットをチェック
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
  $ym = date('Y-m');
  $timestamp = strtotime($ym . '-01');
}

//今月の日付
$today = date('Y-m-j');
//カレンダーのタイトル作成
$html_title = date('Y年n月', $timestamp);
//前の月・次の月の年月を取得
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

//該当月の日数を取得
$day_count = date('t', $timestamp);
//1日が何曜日か  0:日～6:土
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

//カレンダー作成の準備
$weeks = [];
$week = '';

//第１週目：空のセルを追加する
$week .= str_repeat('<td></td>', $youbi);
for ($day = 1; $day <= $day_count; $day++, $youbi++) {
  $date = $ym . '-' . $day;
  $week .= '<td><a class="td_day" href="show_reserve.php?prev_day=' . $day . '&item_flag=' . $item_flag . '">' . $day;
  $week .= '</a></td>';
  //週の終わり、または月の終わりの場合
  if ($youbi % 7 == 6 || $day == $day_count) {
    if ($day == $day_count) {
      //月の最終日の場合、空のセルを追加
      $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
    }

    //weeks配列にtrと$weekを追加する
    $weeks[] = '<tr>' . $week . '</tr>';
    //weekをリセット
    $week = '';
  }
}

// カレンダーの日付が押されたら
if (isset($_GET['prev_day'])) {
  // 表示したい日付 をGETで受け取る
  $prev_day = $_GET['prev_day'];
  // YYYY-MM-dd の形式に変更する
  $reserve_date = $ym . "-" . $prev_day;
} else {
  // 押されてない時は今日の日付
  $reserve_date = $today;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>予約確認</title>
  <link href="css/nakastyle.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
</head>
<header>
  <h1 class="headline">
    <a class="cafe" href="http://ws-hackathon2022-teams03.pencilsystems.site/cafekouno/wordpress/wp-admin">cafe</a><br>
    <a class="cafe" href="http://ws-hackathon2022-teams03.pencilsystems.site/cafekouno/wordpress/wp-admin">～こうの～</a>
  </h1>
  <ul class="nav-list">
    <li class="nav-list-item">
      <a class="h1">お持ち帰り予約管理画面</a>
  </ul>
</header>

<body>
  <!-- big_block -->
  <div class="big_block">
    <!-- カレンダー -->
    <!-- calendar_block -->
    <div class="calendar_block">
      <h2 class="h2">
        <a class="prev_button" href="show_reserve.php?ym=<?php echo $prev; ?>" \>
          &lt;
        </a>
        <a class="text_button">&nbsp;&nbsp;<?php echo $html_title; ?>&nbsp;&nbsp;</a>
        <a class="next_button" href="show_reserve.php?ym=<?php echo $next; ?>">
          &gt;
        </a>
      </h2>
      <table border="1" class="table table-boedered">
        <tr>
          <th>日</th>
          <th>月</th>
          <th>火</th>
          <th>水</th>
          <th>木</th>
          <th>金</th>
          <th>土</th>
        </tr>
        <?php
        foreach ($weeks as $week) {
          echo $week;
        }
        ?>
      </table>
    </div> <!-- END calender_block -->

    <!-- reserve_block -->
    <div class="reserve_block">
      <!-- button_block -->
      <div class="button_block">
        <!-- 一覧表示ボタン -->
        <form action="show_reserve.php?prev_day=<?php echo $prev_day; ?>" method="POST">
          <button type="submit" name="item_flag"> 注文商品一覧</button>
          <button type="submit" name="cust_flag"> 予約顧客一覧</button>
        </form>
      </div><!-- END button_block -->

      <!-- view_block -->
      <div class="view_block">
        <?php
        // 注文商品一覧が押されたら
        if ($item_flag) {
          // sql_show_reserve.php を用いて reserve_list を取り出す
          $reserve_list = Reserve($reserve_date);
        ?>
          <!--注文商品一覧表示-->
          <div class="product">
            <div class="product_name"><?php echo $html_title . $prev_day . "日" ?> 予約状況</div>
            <table class="list">
              <tr>
                <th>No.</th>
                <th>受け取り時間</th>
                <th class="name">商品名</th>
                <th>タイプ</th>
                <th>サイズ</th>
                <th>個数</th>
              </tr>
              <?php
              foreach ($reserve_list as $reserve) {
              ?>
                <tr>
                  <td><?php echo $reserve['id']; ?></td>
                  <td><?php echo $reserve['reserve_time']; ?></td>
                  <td><?php echo $reserve['item_name']; ?></td>
                  <td><?php echo $reserve['type']; ?></td>
                  <td><?php echo $reserve['size']; ?></td>
                  <td><?php echo $reserve['quantity']; ?></td>
                <tr>
                <?php
              }   // foreach終わり
                ?>
            </table>
          </div> <!-- END product -->
        <?php
        } else {    // 予約顧客一覧が押されたら
          // sql_show_user.php を用いて user_list を取り出す
          $user_list = User($reserve_date);
        ?>
          <!--顧客表示-->
          <div class="customer">
            <div class="customer_h1"><?php echo $html_title . $prev_day . "日" ?>顧客一覧</div>
            <table class="customer_list">
              <tr>
                <th>顧客名</th>
                <th>フリガナ</th>
                <th>メールアドレス</th>
                <th class="tel">電話番号</th>
              </tr>
              <?php
              foreach ($user_list as $user) {
              ?>
                <tr>
                  <td><?php echo $user['user_name']; ?></td>
                  <td><?php echo $user['furigana']; ?></td>
                  <td><?php echo $user['email']; ?></td>
                  <td class="tel"><?php echo $user['tel']; ?></td>
                <tr>
                <?php
              }   // foreach終わり
                ?>
            </table>
          </div> <!-- END custmer -->
        <?php
        }   // if終わり
        ?>
      </div> <!-- END view_block end -->
    </div> <!-- END reserve_block end -->
  </div> <!-- END big_block end -->
</body>
<footer class="footerline">
  <a class="cafe_footer">cafe ～こうの～</a>
</footer>

</html>