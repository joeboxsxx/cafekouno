<?php
  require_once(__DIR__ . "/src/db_connect.php");
  require_once(__DIR__ . "/func/display_errors.php");
  require_once(__DIR__ . "/func/sql_show_items.php");

  // sql_item_lines.php を用いて実行結果のステートメントを受け取る
  $stmt = show_items();
  // 商品数を計算
  $item_num = $stmt->rowCount();

  // 1つ前の type_id を定義
  $prev_type_id = "";

  // スマホ もしくは PC を切り替える
  $ua = $_SERVER['HTTP_USER_AGENT'];
  if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
  //スマホ


  } else {
  //PC

  }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <?php include "header.html" ?>
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <title>商品一覧</title>
</head>
<body>
<div id="main">
  <div class="whiteBack">
      <!-- タイトル -->
      <h5>商品選択</h5>

      <!-- テイクアウト説明 -->
      <div class="explanation">
          <a>テイクアウトの予約受け取りが可能です。</a><br>
          <a>ご予約はページ下部より商品を選択し、「カートに入れる」のボタンよりお進みください。お電話で注文も承っております。092-0000-0000</a><br>
          <a>1セットのご注文ももちろんのこと、オフィスでの歓送迎やミーティングなど、グループでのご注文なども承っております。</a><br>
          <a>お受け取り当日は、ご予約確定メールの画面をカウンターにてご提示ください。</a><br>
      </div>

      <!-- 商品一覧 -->

      <div class="page-cover">


        <!-- 商品数 -->
        <div class="message-list-cover">

            <div class="shohin_menu">
            <?php
                // 1行ずつフェッチする
                while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            ?>

                <?php
                $item_id = $item['item_id'];    // 商品ID
                $type_id = $item['type_id'];    // タイプID
                $item_name = $item['item_name'];    // 商品名
                $type = $item['type'];    // タイプ
                $image_path = $item['image_path'];    // 画像パス
                ?>
                <?php
                    //  1つ前と type_id が異なるとき
                    if ($prev_type_id != $type_id) { 
                ?>
                    <!-- タイプ -->
                    <div id="<?php echo $type;?>" class="type">
                        <div class="type-text"><span class="type-text1"><?php echo $type; ?></span></div>
                        <br>
                    </div>
                <?php
                    // $prev_type_id を更新する
                    $prev_type_id = $type_id;
                    }   // if終わり
                ?>
                <!-- 商品詳細に遷移する商品画像 -->
                <div class="item-card">
                    <div class="item-image">
                        <a href="item_lines.php?item_id=<?php echo $item_id; ?>&type_id=<?php echo $type_id; ?>">
                        <img class="item_image1" src="image/<?php echo $image_path; ?>">
                        </a>
                    </div>
                <!-- 商品名 -->
                    <div class="item-title">
                        <div><?php echo $item_name; ?></div>
                        <br>
                    </div>
                </div>
            <?php
                }   // while終わり
            ?>
            </div>
        </div>
      </div>
    </div>
</div>
<div id="footer">
    <?php
        if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
            //スマホ
    ?>

    <style>
        footer{
            z-index: 5;
            position: fixed;
            bottom: 0;
            width: 100%;
            max-width: 480px;
            height: 60px;
            background-color: #ffffff;
        }

        .footer {
            overflow: visible;
            width: 100%;
            max-width: 480px;
            height: 60px;
            left: -2px;
            top: 0px;
            background-color: #ffffff;
        }
        body{
        margin: 0px;
        }

        h1 {
        left: 19px;
        margin:0;
        position: absolute;
        overflow: visible;
        white-space: normal;
        text-align: center;
        font-family: Kristen ITC;
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        color: rgba(251,250,239,1);
        }

        
        .Back_To_Top{
        font-size: 5px;
        margin-top: 60px;
        text-align: center;
        vertical-align: bottom;
        line-height: 17px;
        position: absolute;
        }

        .footer_menu{
            display: flex;
            gap: 5%;
            justify-content: center;
            font-size:20px;
            align-items: center;
            width:100%;
            height:100%;
        }

        .footer_menu_font{
            color:#000000;
            text-decoration: none;
        }


    </style>
  <footer>
    <div class="footer_menu">
        <a href="#TOP" class="footer_menu_font"><div>TOP</div></a>
        <a href="#HOT" class="footer_menu_font"><div>HOT</div></a>
        <a href="#ICE" class="footer_menu_font"><div>ICE</div></a>
        <a href="#CASTELLA" class="footer_menu_font"><div>CASTELLA</div></a>
        <a href="#FOOD" class="footer_menu_font"><div>FOOD</div></a>
    </div>
  </footer>

    <?php
         } else {
            //PC
    ?>
            <footer>
                <?php include "footer.html" ?>
            </footer>
    <?php
         }
    ?>
</div>
</body>
</html>