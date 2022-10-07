<?php
 $errLogin[]='خطأ في اسم المستخدم أو كلمة المرور';
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="login.css">

 </head>
 <body>
 


     <div class="container1">
             <div class="login">
             
                 <h3>أدخل الاسم وكلمة المرور</h3>
                 <form action="loginphp.php" method="POST">
                     <div class="inlin">
                         <label class="labelform" for="username"> اسم المستخدم:</label>
                         <input class="input" type="text" name="username">
                    </div>
                    <div class="inlin2">
                         <label class="labelform" for="pass"> كلمة المرور:</label>
 
                         <input class="input" type="password" name="pass">
                     </div>
                     <input class="submit" type="submit" value="دخول">
                    
                 </form>
                 
                <?php if(!empty($errLogin)): ?>
                    <div class="alert-danger">
                        <?php foreach ( $errLogin  as $error ): ?> 
                                    <div> <?php  echo $error  ?></div>
                        <?php  endforeach; ?>
                <?php endif; ?>
             </div>
     </div>
 
 
 </body>
 </html>