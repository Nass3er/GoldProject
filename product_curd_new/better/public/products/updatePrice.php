<?php
/**  @var $pdo \PDO */
require_once "../../database.php";


$n24=$_POST['n24'] ?? '';
$n22=$_POST['n22'] ?? '';
$n21=$_POST['n21'] ?? '';
$n18=$_POST['n18'] ?? '';

if ($n24) {
    $stmt1=$pdo->prepare('UPDATE newproducts  SET price=:price * wieght where type=24' );
    $stmt1->bindValue(':price',$n24);
    $stmt1->execute();

}
if ($n22) {
    $stmt2=$pdo->prepare('UPDATE newproducts  SET price =:price * wieght  where type=22' );
    $stmt2->bindValue(':price',$n22);
    $stmt2->execute();

}
if ($n21) {
    $stmt3=$pdo->prepare('UPDATE newproducts  SET price =:price * wieght  where type=21' );
    $stmt3->bindValue(':price',$n21);
    $stmt3->execute();

}
if ($n18) {
    $stmt4=$pdo->prepare('UPDATE newproducts  SET price =:price * wieght  where type=18' );
    $stmt4->bindValue(':price',$n18);
    $stmt4->execute();

}

header('Location:index.php');




?>