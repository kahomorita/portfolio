<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>送信完了画面</title>
</head>
<body>
  <?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = "kahomaru2679@yahoo.co.jp";
    $name = $_POST['name'];
    $message = $_POST['message'];
    $headers = "From:".$_POST['mail'];

    if(mb_send_mail($to,$name,$message,$headers)) {
      echo '成功です。';
    }else {
      echo '失敗です。';
    };
    var_dump(mb_send_mail());
  ?>
  <div class="complete_box">
    <div class="inner message_box">
      <p class="complete_msg">メッセージを承りました。</p>
      <p class="complete_msg">3日以内にはお返事できるかと思います。</p>
      <p class="complete_msg">ありがとうございました。</p>
      <p class="complete_name">Kaho Morita</p>
    </div>
  </div>

  <footer class="footer">
    <nav class="gnav">
      <ul>
        <li>
          <a href="index.html">TOP</a>
        </li>
      </ul>
    </nav>
  </footer>

</body>
</html>