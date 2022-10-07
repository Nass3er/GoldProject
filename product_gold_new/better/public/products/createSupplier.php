<?php
/**  @var $pdo \PDO */
 require_once "../../database.php";

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
// exit;
 
$supp_name= '';
$phone= '';
$supp_address= '';
$email='';
$notes='';

if($_SERVER['REQUEST_METHOD']==='POST'){
  // if($_POST['submit']){
       
      $supp_name=$_POST['supp_name'];
      $phone=$_POST['phone'];
      $supp_address=$_POST['address'];
      $email=$_POST['email'];
      $notes=$_POST['notes'];

      $st= $pdo->prepare("INSERT INTo supplier (supplier_name,phone,supplier_address,email,notes)
      VALUES(:sname, :sphone, :supp_address ,:email,:notes)");
     

     $st->bindValue(':sname', $supp_name);
     $st->bindValue(':sphone',$phone);
     $st->bindValue(':supp_address',$supp_address);
     $st->bindValue(':email',$email);
     $st->bindValue(':notes',$notes);
     $st->execute();

   
     header('Location:index.php');
  }
  

  ?>