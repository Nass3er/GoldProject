<?php
   session_start();
   if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
    //    unset($_SESSION['username']);
    //    unset($_SESSION['password']);
       session_unset();
       session_destroy();
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الخروج</title>
    <link rel="stylesheet" href="../../logout.css">
</head>
<body>
 <div class="containerLogout">
    <div class="logout">
        <h3>    لقد تم تسجيل الخروج </h3>
         <h3> <<<سيتم نقلك إلى صفحة تسجيل الدخول تلقائيا>>></h3>
         
    </div>
  </div>
  <script type="text/javascript">
  // TODO TRANSFER TO THE LOGIN PAGE 
    setTimeout(function(){
        window.location.href="login.php";
    },2000);
</script>
</body>
</html>