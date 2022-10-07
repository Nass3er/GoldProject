
<?php
 

 $pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
 $errLogin=[];
 
 $username=$_POST['username'];
 $pass=$_POST['pass'] ;
 
 if($username !='' && $pass !='' ){
     
     $stlog=$pdo->prepare('SELECT username,user_password FROM users WHERE username=:username AND user_password=:pass');
     $stlog->bindValue(':username',$username);
     $stlog->bindValue(':pass',$pass);
      $stlog->execute();
      
     $count=$stlog->rowCount();  // to do counter the row that return  from database by query

     if($count>0){
         
      echo "header('Location:index.php');";
     } else{
        // echo 'خطأ في اسم المستخدم أو كلمة المرور';
        header('Location:login.php');
        $errLogin='خطأ في اسم المستخدم أو كلمة المرور';
        
        
        
     }

     
       
     
 
 } else{
 header('Location:login.php');
 }
 ?>
 