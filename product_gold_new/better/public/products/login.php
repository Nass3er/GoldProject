<?php
 session_start();
 
 
 if (isset($_SESSION['username']) and $_SESSION['username'] !=null) {
    header('Location:index.php');
    exit;
 }
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="../../login.css">

 </head>
 <body>
 


     <div class="container1">
             <div class="login">
             
                 <h3>أدخل الاسم وكلمة المرور</h3>
                 <form action="login.php?action=submit" method="POST">
                     <div class="inlin">
                         <label class="labelform" for="username"> اسم المستخدم:</label>
                         <input class="input" type="text" name="username">
                    </div>
                    <div class="inlin2">
                         <label class="labelform" for="pass"> كلمة المرور:</label>
 
                         <input class="input" type="password" name="pass">
                     </div>
                     <input class="submit" type="submit" name="submit" value="دخول">
                    
                 </form>
                 <?php
                 if(isset($_GET['action']) and $_GET['action']=='submit'){
                    if (isset($_POST['username']) and $_POST['username'] !=null and
                      isset($_POST['pass']) and $_POST['pass'] !=null )
                      {
                        $username= stripslashes($_POST['username']);
                          $pass=stripslashes($_POST['pass']);
                           

                        if(loginUser($username,$pass)){
                          
                          echo "<h3 style='color:#3626cd'><<< تم تسجيل الدخول بنجاح  >>>";
                          
                            $_SESSION['username']=$username;
                            $_SESSION['password']=$pass;
                          echo' 
                          <script type="text/javascript">
                            setTimeout(function(){
                                window.location.href="index.php";
                            },2000);
                          </script> ';
                          
                        } else{
                        echo "<h3 style='color:red'> !!لم يتم عملية تسجيل الدخول حاول مجددا ";
                       }
                  }else{
                    echo "<h3 style='color:red'> !!!  يرجى ملئ جميع الحقول  "; 
                  }
                }
                 ?>
                
             </div>
     </div>
 
 
 </body>
 </html>

 <!-- هنا اكواد الدوال -->
<?php

 function loginUser($usern,$pas){
    $pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           
           $query1="SELECT * FROM users WHERE username= ?";

           $stmtVerify=$pdo->prepare($query1);
           $stmtVerify->bindParam(1,$usern);
           $stmtVerify->execute();
          $res1= $stmtVerify->fetch();
                 
                 $_SESSION['user_id']=$res1['user_id'];
                 $_SESSION['role']=$res1['role'];
              if (password_verify($pas,$res1['user_password'])) {
                return true;  // DECODE THE HASH PASSWORD THAT GET FROM DB
              }else {
                return false;
              }
              
   }
 ?>