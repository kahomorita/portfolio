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
  <div class="inner confirm">
    <h1 class="message_confirm">メッセージ内容</h1>
    <form action="complete.php" method="post">
      <div class="message_info">
        <p>name:</p><?php echo htmlspecialchars($_POST['name']); ?>
      </div>
      <div class="message_info">
        <p>mail address:</p><?php echo htmlspecialchars($_POST['mail']); ?>
      </div>
      <div class="message_info">
        <p>message:</p><?php echo htmlspecialchars($_POST['message']); ?>
      </div>

      <p class="last_confirm">こちらの内容で送信してもよろしいですか？</p>

      <button type="submit" class="confirm_button">OK</button>
    </form>
  </div>
</body>
</html>