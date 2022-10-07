<?php 

 /**  @var $pdo \PDO */

//  require_once "../../database.php";

$statement=$pdo->prepare('SELECT * FROM newProducts WHERE isSelect=1');
     
  
//$statement->bindValue(':isS',1);
$statement->execute();
$products =$statement->fetchAll(PDO::FETCH_ASSOC);
 
?>