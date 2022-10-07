<?php
/**  @var $pdo \PDO */
require_once "../../database.php";
 
$id=$_POST['id'];

if($id !=null){
//     $statement= $pdo->prepare("SELECT quantity FROM newProducts WHERE id = :id");

// $statement->bindValue(':id',$id);
// $statement->execute();
// $product2 =$statement->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($product2);
// echo '</pre>';
// exit;

$st=$pdo->prepare('UPDATE  newproducts SET quantity = quantity +1 , isSelect=0  WHERE id=:id');
$st->bindValue(':id',$id);
$st->execute();

header('Location:invoice1.php');
exit;
}
// else {
//      header('Location:invoice1.php');
//      exit;
// }
?>
  