<?php
mb_internal_encoding("utf8");

session_start();

if(empty($_SESSION['id'])){

//データベース接続
function dbConnect(){
try{
    //try catch文、DBに接続出来なければエラーメッセージを表示
    $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時帝にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
   };
return $pdo;
}


 //①SQL文の準備
    $pdo = dbConnect();
    $stmt= $pdo->prepare("SELECT * FROM login_mypage Where mail = :mail && password = :password");
    //②SQLの実行
    $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    //③SQLの結果を受け取る
    $stmt->execute();
    $pdo = null; 
    
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
    }

    if(!empty($_POST['hoji'])){
        $_SESSION['hoji']=$_POST['hoji'];
    }
}

if(!empty($_SESSION['id']) && !empty($_SESSION['hoji'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('hoji',$_SESSION['hoji'],time()+60*60*24*7);
}else if(empty($_SESSION['hoji'])){
    setcookie('mail','',time()-1);
    setcookie('pasword','',time()-1);
    setcookie('hoji','',time()-1);
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage1.css">
  </head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>
        <main>
        <div class="confirm">
        <h2>会員情報</h2>
      
         <tr>   
             <p>こんにちは！　<?php echo $_SESSION['name']; ?>さん</p>
             <img src="<?php echo $_SESSION['picture']; ?>">
             <div class="text">
             <p>名前:<?php echo $_SESSION['name']; ?></p>
             <p>メールアドレス:<?php echo $_SESSION['mail']; ?></p>
             <p>パスワード:<?php echo $_SESSION['password']; ?></p>
             </div>
             
             <p class="comment"><?php echo $_SESSION['comments']; ?></p>
         </tr>  
          
          <form action="mypage_hensyu.php" method="post" class="form_center">
            <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
          <input type="submit" class="button2" value="編集"/>
          </form>
          </div>
        </main>
        <footer>
           c 2018 InterNous.Inc. All rights reserved
        </footer>
    </body>
</html>

