<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:mypage.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
    
<body>
  <header>
    <img src="4eachblog_logo.jpg">
      <div class="login"><a href="login.php">ログイン</a></div>
  </header>
    
  <main> 
    <form action="mypage.php" method="post" enctype="multipart/form-data"> 
      <div class="form_contents">
<div class="mail">
   <label>メールアドレス</label><br>
    <input type="text" class="formbox" size="30" value="<?php echo $_COOKIE['mail']; ?>" name="mail" required>
</div>
<div class="password">
   <label>パスワード</label><br>
    <input type="password" class="formbox" size="30" value="<?php echo $_COOKIE['password']; ?>" name="password" pattern="^[a-zA-Z0-9]{6,}$" required>
</div>
 <div class="hoji">
     <label><input type="checkbox" name="hoji" value="hoji"
     <?php
        if(isset($_COOKIE['hoji'])){
            echo "checked='checked'";
        }
        ?>>ログイン状態を保持する</label></div>
 <div class="login">
<input type="submit" class="submit_button" size="35" value=" ログイン">
 </div>
 </div>
      </form>
    </main>
<footer>
c 2018 InterNous.Inc. All rights reserved
</footer>
    </body>
</html>    
