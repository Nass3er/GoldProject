<?php
/**  @var $pdo \PDO */
require_once "../../database.php";

$stcount=$pdo->prepare('SELECT COUNT(isSelect) FROM newproducts  WHERE isSelect=1');
$stcount->execute();
$addedCount =$stcount->fetch(PDO::FETCH_ASSOC);

?>