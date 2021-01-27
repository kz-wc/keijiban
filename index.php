<?php
  mb_internal_encoding("utf8");
  $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");

  $stmt = $pdo -> query("select * from 4each_keijiban");
?>
<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <div class="header-logo">
      <img src="4eachblog_logo.jpg">
    </div>
    <div class="header-menu">
      <ul>
        <li>トップ</li>
        <li>プロフィール</li>
        <li>4eachについて</li>
        <li>登録フォーム</li>
        <li>問い合わせ</li>
        <li>その他</li>
      </ul>
    </div>
  </header>
  <main>
    <div class="main_left">
      <h1>プログラミングに役立つ掲示板</h1>
      <form method="POST" action="insert.php">
        <h2>入力フォーム</h2>
        <div>
          <label>ハンドルネーム</label>
          <br>
          <input class="form_text" type="text" name="handlename">
        </div>
        <div>
          <label>タイトル</label>
          <br>
          <input class="form_text" type="text" name="title">
        </div>
        <div>
          <label>コメント</label>
          <br>
          <textarea cols="35" rows="7" name="comments"></textarea>
        </div>
        <div>
          <input class="submit" type="submit" value="送信する">
        </div>
      </form>
      <section>
      <?php if($stmt): ?>
      <?php foreach($stmt as $row): ?>
      <article>
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['comments']; ?></p>
        <div class="handlename">posted by <?php echo $row['handlename']?></div>
      </article>
      <?php endforeach; ?>
      <?php endif ?>
      </section>
    </div>

    <div class="main_right">
      <div class="main_right__box hot_article">
        <h2>人気の記事</h2>
        <ul>
          <li>PHPオススメ本</li>
          <li>PHP MyAdminの使い方</li>
          <li>今人気のエディタ Top5</li>
          <li>HTMLの基礎</li>
        </ul>
      </div>
      <div class="main_right__box recommended_link">
        <h2>オススメリンク</h2>
        <ul>
          <li>インターノウス株式会社</li>
          <li>XAMPPのダウンロード</li>
          <li>Eclipseのダウンロード</li>
          <li>Bracketsのダウンロード</li>
        </ul>
      </div>
      <div class="main_right__box category">
        <h2>カテゴリ</h2>
        <ul>
          <li>HTML</li>
          <li>PHP</li>
          <li>MySQL</li>
          <li>JavaScript</li>
        </ul>
      </div>
    </div>
  </main>
  <footer>
    copyright © internous | 4each blog the which provides A to Z about programming
  </footer>

</body>
</html>