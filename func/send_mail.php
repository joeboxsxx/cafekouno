<?php
  /*
    引数 $cartInfo, $userform を用いて
    メールを送信する
  */
  function send_mail($cartInfo, $userform) {
    echo 2;
    mb_language("Japanese");
    echo 3;
    mb_internal_encoding("UTF-8");

    echo 4;
    $to = $cartInfo['email'];
    echo 5;
    $title = "cafe~こうの~ | 予約確認メール";
    $message = "";
    $headers = "From: motutenaso@gmail.com";

    if(mb_send_mail($to, $title, $message, $headers)) {
      echo "メール送信成功です";
    } else {
      echo "メール送信失敗です";
    }

  }

?>