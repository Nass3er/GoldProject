<?php
/**  @var $pdo \PDO */
require_once "../../database.php";

$id=$_POST['id'] ?? null;

if (!$id) {
    header('Location:users.php');
    exit; 
}

$statement= $pdo->prepare('DELETE FROM users WHERE user_id = :id');

$statement->bindValue(':id',$id);
$statement->execute();
header('Location:users.php');

?>