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
  <form action="mailto.php" method="post">
    <p>name:</p><?php echo $_POST['name']; ?>
    <p>mail address:</p><?php echo $_POST['mail']; ?>
    <p>message:</p><?php echo $_POST['message']; ?>

    <input type="submit" value="送信">
  </form>
</body>
</html>