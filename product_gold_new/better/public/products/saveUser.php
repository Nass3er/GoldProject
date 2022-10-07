<?php
/**  @var $pdo \PDO */
require_once "../../database.php";

if (isset($_POST['submit'])) {
  if ((isset($_POST['user_name']) and $_POST['user_name'] !=null) and (isset($_POST['user_pass']) and
    $_POST['user_pass'] !=null)
    and (isset($_POST['confirm_pass']) and $_POST['confirm_pass'] !=null)) {
     if ($_POST['user_pass'] !=$_POST['confirm_pass']) {

        header('Location:users.php');
        exit;
     }else {
          $passHashed=password_hash($_POST['user_pass'],PASSWORD_DEFAULT);
        $insertUser= $pdo->prepare('INSERT INTO users (username,user_password,role) VALUES(:uname,:pass,:rol)' );
        $insertUser->bindvalue(':uname',$_POST['user_name']);
        $insertUser->bindvalue(':pass',$passHashed);
        $insertUser->bindvalue(':rol',$_POST['prev']);
       
        $insertUser->execute();
     } 
  } else {
     header('Location:users.php');
     exit;
}  
}
header('Location:users.php');
     exit;
?>