<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
    
    <body>
        <h2>会員情報</h2>
      <table>
          
         <tr>   
             <p>こんにちは！　<?php echo $_SESSION['name'] ?></p>
             <p>名前:<?php echo $_SESSION['name'] ?></p>
             <p>メールアドレス:<?php echo $_SESSION['mail'] ?></p>
             <p>パスワード:<?php echo $_SESSION['password'] ?></p>
             <p>名前:<?php echo $_SESSION['picture'] ?></p>
             <p>コメント:<?php echo $_SESSION['comments'] ?></p>
         </tr>  
         
      </table>
    </body>
</html>

 function ConfirmPassword($result){
     $input1 = <?php $result['mail']?>;
     $input2 = <?php $_POST['mail']?>;
     $input3 = <?php $result['password']?>;
     $input4 = <?php $_POST['password']?>;
    if(inout1 != input2 || inout3 != input4){
      <?php header('Location: http://localhost/login_maypage/login_error.php'); ?>
      }else{
      confirm.setCutomValidity("");  
    }
  }

$getData= $result;
<?php foreach($getData as $_SESSION) ?>