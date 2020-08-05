<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.phpからの導線以外は、『login_error.php』へリダイレクト
if(!$_POST['from_mypage']){
    header('Location:login_error/php');
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu1.css">
  </head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>
         <main>
        <div class="confirm">
        <h2>会員情報</h2>
       
             <p>こんにちは！　<?php echo $_SESSION['name']; ?>さん</p>
             <img src="<?php echo $_SESSION['picture']; ?>">
             
             <form action="mypage_update.php" method="post" enctype="multipart/form-data"> 
      <div class="form_contents">
        <div class="name">
          <div class="hissu"></div><label>氏名:</label>
            <input type="text" class="forbox" size="40" name="name" value="<?php echo $_SESSION['name']; ?>" required>
          </div>
<div class="mail">
    <div class="hissu"></div><label>メールアドレス:</label>
    <input type="text" class="formbox" size="40" name="mail" value="<?php echo $_SESSION['mail']; ?>" required>
</div>
<div class="password">
    <div class="hissu"></div><label>パスワード:</label>
    <input type="password" class="formbox" size="40" name="password" value="<?php $_SESSION['password']; ?>" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
</div>
 <div class="comments">
   <textarea rows="5" cols="100" name="comments" value="<?php echo $_SESSION['comments']; ?>"></textarea>
 </div>
 <div class="toroku">
   <input type="submit" class="submit_button" size="35" value="この内容に変更する">
 </div>
</div>   
      </form> 
      </div>
    </main>
        <footer>
           c 2018 InterNous.Inc. All rights reserved
        </footer>
  </body>
</html>