<?php
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$id=$_POST['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit; 
}

$statement= $pdo->prepare('DELETE FROM newProducts WHERE id = :id');

$statement->bindValue(':id',$id);
$statement->execute();
header('Location:index.php');

?>
