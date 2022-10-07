<?php
/**  @var $pdo \PDO */
require_once "../../database.php";
 $qup=0;
$id=$_POST['id'];

if($id !=null){
    $statement= $pdo->prepare("SELECT quantity_v FROM virtualtable WHERE id_v = :id");

$statement->bindValue(':id',$id);
$statement->execute();
$product2 =$statement->fetch(PDO::FETCH_ASSOC);
 $qup= $product2['quantity_v'];
  
// echo '<pre>';
// echo $product2['quantitySales'];
// echo '</pre>';
// exit;
$st2=$pdo->prepare('UPDATE newproducts SET quantity = quantity +:qupdate  WHERE id=:id');
$st2->bindValue(':qupdate',$qup);
$st2->bindValue(':id',$id);
$st2->execute();

$st=$pdo->prepare('DELETE FROM virtualtable WHERE  id_v = :id');
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
  