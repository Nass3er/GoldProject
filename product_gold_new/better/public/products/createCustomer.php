<?php
/**  @var $pdo \PDO */
 require_once "../../database.php";

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
// exit;
 
$customer_name= '';
$phone= '';
$customer_address= '';
$notes='';

if($_SERVER['REQUEST_METHOD']==='POST'){
  // if($_POST['submit']){
       
      $customer_name=$_POST['cus_name'];
      $phone=$_POST['phone'];
      $customer_address=$_POST['address'];
      $notes=$_POST['notes'];

      $st= $pdo->prepare("INSERT INTo customer(customer_name,phone,customer_address,notes)
      VALUES(:cname, :phone, :customer_address ,:notes)");
     

     $st->bindValue(':cname', $customer_name);
     $st->bindValue(':phone',$phone);
     $st->bindValue(':customer_address',$customer_address);
     $st->bindValue(':notes',$notes);
     $st->execute();
    
     header('Location:invoice1.php');
  }
  

  ?>