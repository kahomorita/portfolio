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
  <h1>メッセージ内容</h1>
  <form action="complete.php" method="post">
    <div class="message_info">
      <p>name:</p><?php echo htmlspecialchars($_POST['name']); ?>
    </div>
    <p>mail address:</p><?php echo htmlspecialchars($_POST['mail']); ?>
    <p>message:</p><?php echo htmlspecialchars($_POST['message']); ?>

    <button type="submit">送信</button>
  </form>
</body>
</html>