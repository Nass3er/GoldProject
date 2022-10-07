<?php
/**  @var $pdo \PDO */
require_once "../../database.php";

$stcount=$pdo->prepare('SELECT * FROM virtualtable ');
$stcount->execute();
$addedCount =$stcount->rowCount();

?>