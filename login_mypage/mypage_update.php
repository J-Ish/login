<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//DB接続
function dbConnect(){
try{
    //try catch文、DBに接続出来なければエラーメッセージを表示
    $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時帝にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
     exit();
   };
    
return $pdo;
}

//①SQL文の準備(update文)
    $pdo = dbConnect();
    $stmt= $pdo->prepare('UPDATE login_mypage SET name = :name, mail = :mail, password = :password, comments = :comments');
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindValue(':comments', $_POST['comments'], PDO::PARAM_STR);

    //③SQLの結果を受け取る
    $stmt->execute();
   
//①SQL文の準備(select文)
    $pdo = dbConnect();
    $stmt= $pdo->prepare('SELECT * FROM login_mypage Where  name = :name and mail = :mail and password = :password and comments = :comments');
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindValue(':comments', $_POST['comments'], PDO::PARAM_STR);

    //③SQLの結果を受け取る
    $stmt->execute();
    

    $result = $stmt->fetchall(PDO::FETCH_ASSOC); 
    $_SESSION[]=$result;

    header('Location:login.php');
    exit();
?>