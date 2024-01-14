<?php
session_start();
$error = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

  if ($post['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($post['mail'] === '') {
    $error['mail'] = 'blank';
  }else if(!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)){
    $error['mail'] = 'mail';
  }
  if ($post['message'] === '') {
    $error['message'] = 'blank';
  }

  if (count($error) === 0) {
    $_SESSION['form'] = $post;
    header('Location: ./confirm.php');
    exit();
}
}else {
  if(isset($_SESSION['form'])) {
    $post =$_SESSION['form'];
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Kaho Portfolio</title>
</head>
<body>
  <header>
    <h1>Kaho Morita's Portfolio</h1>
  </header>
  <nav class="gnav">
    <ul>
      <li>
        <a href="#section1">aboutMe</a>
      </li>
      <li>
        <a href="#section2">skills</a>
      </li>
      <li>
        <a href="#section3">works</a>
      </li>
      <li>
        <a href="#section4">contact</a>
      </li>
    </ul>
  </nav>
  <main>
    <div class="inner" id="section1">
      <div class="inner_title_box">
        <h2>aboutMe</h2>
      </div>
      <div class="inner_explain_box">
        <p>森田 夏帆(28) 奈良県出身</p>
        <p>大学を卒業してから飲食店で月200時間以上働きながら独学でhtml,css,JSを学ぶ。</p>
        <p>”パソコン好き”の印象があった私に友人はプログラミングを紹介してくれました。</p>
        <p>htmlとcssは中学時代流行っていたBLOG作りに似ているところがあり、懐かしさを感じました。</p>
        <p>そこからプログラミングに興味を持ち今に至ります。</p>
        <p>本格的に学びたいと思い、プログラミングのコミュニティに通い、今は主にphp,Laravel,JSを勉強中。</p>
        <div class="gitHub">
          <img src="img/37318.png" class="git_icon" alt="githubアイコン">
          <a href="https://github.com/kahomorita">gitHub</a>
        </div>
      </div>
    </div>
    <div class="inner">
      <div class="inner_title_box" id="section2">
        <h2>skills</h2>
      </div>
      <div class="inner_explain_box">
        <div class="skills_box">
          <table class="skills_table">
            <tr class="skills_item">
              <th class="skill_lan"><span>技術</span></th><th><span>学習期間</span></th><th><span>評価（5段階）</span></th>
            </tr>
            <tr>
              <th class="skill_lan">HTML5</th><th>2020.4〜6(半年)</th><th class="skill_point">4</th>
            </tr>
            <tr>
              <th class="skill_lan">CSS3</th><th>2020.4〜6(半年)</th><th class="skill_point">3</th>
            </tr>
            <tr>
              <th class="skill_lan">JavaScript</th><th>2020.5〜8(4ヶ月ほど)</th ><th class="skill_point">1</th>
            </tr>
            <tr>
              <th class="skill_lan">PHP</th><th>2020.9〜(4ヶ月ほど)</th><th class="skill_point">2</th>
            </tr>
          </table>
          <p>
            <span>HTML,CSS</span>は基本的なことは大体できます。わからないところは調べながらも解決します。
          </p>
          <br>
          <p><span>JavaScript</span>は学習期間が短いこともありあまりできず。再度勉強する必要あり。</p>
          <br>
          <p><span>PHP</span>は主にフレームワーク、Laravelを用いて調べながらではあるが簡単なECサイト、
            <br>掲示板など作ることができる。生のPHPを勉強中。</p>
        </div>
      </div>
    </div>

    <div class="inner">
    <div class="inner_title_box" id="section3">
      <h2 class="itemWord">works</h2>
    </div>
      <div class="card_wrapper">
        <div class="card">
          <div class="card_img">
          <img src="img/portfolio.png" alt="ポートフォリオの画像">
          </div>
          <div class="card_explain">
            <p class="card_explain_title"><span>ポートフォリオ</span></p>
            <p class="card_explain_info">私のポートフォリオです。</p>
            <p>言語：HTML,CSS,JavaScript,PHP</p>
          </div>
        </div>
        <div class="card">
          <div class="card_img">
          <img src="img/OsakaHamburger.png" alt="ハンバーガー投稿サイトの画像">
          </div>
          <div class="card_explain">
            <p class="card_explain_title"><span>ハンバーガーの投稿サイト</span></p>
            <p>ハンバーガー好きが作った、<br>大阪だけに絞ったハンバーガーの投稿サイトです。
              <br>投稿、編集、削除、いいね機能など<br>基本的な機能は入れました。</p>
            <p>言語：HTML,CSS,PHP(Laravel),JavaScript</p>
          </div>
        </div>
      </div>
    </div>

    <div class="inner">
      <div class="inner_title_box" id="section4">
        <h2 class="itemWord">contact</h2>
        <div class="inner_explain_box">

          <form action="" method="POST">
            <div class="confirm_item">
              <p>name</p><p class="require">必須</p>
            </div>
            <input type="text" name="name" value="<?php echo htmlspecialchars($post['name']); ?>">
            <?php if($error['name']==='blank'):?>
              <p class="error_msg">※名前をご記入ください</p>
            <?php endif; ?>

            <div class="confirm_item">
              <p>mail address</p><p class="require">必須</p>
            </div>
            <input type="email" name="mail" value="<?php echo htmlspecialchars($post['mail']); ?>">
            <?php if($error['mail']==='blank'):?>
              <p class="error_msg">※メールアドレスをご記入ください</p>
            <?php endif; ?>
            <?php if($error['mail']==='mail'):?>
              <p class="error_msg">※メールアドレスを正しくご記入ください</p>
            <?php endif; ?>

            <div class="confirm_item">
              <p>message</p><p class="require">必須</p>
            </div>
            <textarea name="message"><?php echo htmlspecialchars($post['message']); ?></textarea>
            <?php if($error['message']==='blank'):?>
              <p class="error_msg">※メッセージをご記入ください</p>
            <?php endif; ?>
            <br>
            <button type="submit" class="button index_button">確認画面へ</button>
          </form>

        </div>
      </div>
    </div>
  </main>

  <div class="scroll-top js-scroll-top"><span>↑</span></div>
  <footer class="footer">
    <nav class="gnav">
      <ul>
        <li>
          <a href="#section1">aboutMe</a>
        </li>
        <li>
          <a href="#section2">skills</a>
        </li>
        <li>
          <a href="#section3">works</a>
        </li>
        <li>
          <a href="#section4">contact</a>
        </li>
      </ul>
    </nav>
  </footer>


  <script src="js/main.js"></script>
</body>
</html>

