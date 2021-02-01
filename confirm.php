<?php
session_start();

if (!isset($_SESSION['form'])) {
  header('Location: index.php');
  exit();
} else {
  $post = $_SESSION['form'];
}

// if($_SERVER['REQUEST_METHOD']==='POST') {
//     $to = "kahomaru2679@yahoo.co.jp";
//     $from = $post['mail'];
//     $subject = 'メッセージが届きました';
//     $body = <<<EOT
//     名前： {$post['name']}
//     メールアドレス： {$post['mail']}
//     メッセージ内容：
//     {$post['message']}
//     EOT;

//     mb_send_mail($to,$subject,$body,"From:{$from}");
//     unset($_SESSION['form']);
//     header('Location:complete.html');
//     exit();
// }

$name    = $post['name'];
$address      = $post['mail'];
$message = $post['message'];

mb_language("japanese");
mb_internal_encoding("UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('vendor/autoload.php');

$mail = new PHPMailer(true);

try {
  // SMTPの設定
  $mail->isSMTP();                       // SMTP 利用
  $mail->Host       = 'smtp.gmail.com';  // SMTP サーバー(Gmail の場合これ)
  $mail->SMTPAuth   = true;              // SMTP認証を有効にする
  $mail->Username   = 'kaho2679@gmail.com'; // ユーザ名 (Gmail ならメールアドレス)
  $mail->Password   = '26790512';      // パスワード
  $mail->SMTPSecure = 'ssl';             // 暗号化通信 (Gmail では使えます)
  $mail->Port       = 465;               // TCP ポート (TLS の場合 587)

  // メール本体
  $mail->setFrom($address, mb_encode_mimeheader($name, 'ISO-2022-JP'));  // 送信元メールアドレスと名前
  $mail->addAddress('kaho2679@gmail.com');  // 送信先メールアドレスと名前
  $mail->Body    = mb_convert_encoding($message, "JIS","UTF-8");  // 本文

// 送信
  $mail->send();
  echo '送信済み';
  unset($_SESSION['form']);
      header('Location: complete.html');
      exit();
} catch (Exception $e) {
  echo "送信失敗: {$mail->ErrorInfo}";
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>確認画面</title>
</head>
<body>
  <div class="inner message_box">
    <h1 class="message_confirm">メッセージ内容</h1>
    <form action="" method="post">
      <div class="message_info">
        <p>name:</p><?php echo htmlspecialchars($post['name']); ?>
      </div>
      <div class="message_info">
        <p>mail address:</p><?php echo htmlspecialchars($post['mail']); ?>
      </div>
      <div class="message_info">
        <p>message:</p><?php echo nl2br(htmlspecialchars($post['message'])); ?>
      </div>

      <p class="last_confirm">こちらの内容で送信してもよろしいですか？</p>

      <div class="confirm_button">
        <a href="./index.php" class="button">back</a>
        <button type="submit" class="button">OK</button>
      </div>
    </form>
  </div>

  <footer class="footer">
    <nav class="gnav">
      <ul>
        <li>
          <a href="index.php">TOP</a>
        </li>
      </ul>
    </nav>
  </footer>

</body>
</html>