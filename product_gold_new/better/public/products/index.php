<?php 
 session_start();



// print_r( $_SESSION['role']);
// exit;
 $items_in_cart=0;
  if (isset($_SESSION['cart'])) {
    $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;

  }
 
 
 if (!isset($_SESSION['username']) and !isset($_SESSION['password'])) {
    header('Location:login.php');
    exit;
 }
/**  @var $pdo \PDO */
  require_once "../../database.php";
  $addedCount=[];
$search=$_GET['search'] ?? '';

if ($search) {
    $statement=$pdo->prepare('SELECT * FROM newProducts WHERE name LIKE :name ORDER BY create_date DESC');
    $statement->bindValue(':name', "%$search%" );
}else {
$statement=$pdo->prepare('SELECT * FROM newProducts ORDER BY create_date DESC');
      
}
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 
// echo "<pre>";
// var_dump($products);
// echo "</pre>";
// exit;

// if ($_GET['id']==012345) {
//   include_once "create.php";
// } else{
//   header('Location:index.php');
// }

include 'glopalsVariables.php';

 
 
 
//  echo "<pre>";
// var_dump($addedCount);
// echo "</pre>";
// exit;

?>

<!DOCTYPE html>
<html>

<?php  include_once "../../views/head.php" ?>    
<!-- normal head -->
<body >
    

  
<?php include_once "../../views/header.php" ?>
 
  
      
<div class="all">
  
<?php  //include_once "../../views/list_left.php" ?>
 
     
      
      <?php  include_once "../../views/productPage.php" ?>
      
</div>

<script src="../../main.js" >

  
</script>


</body>
<script type="text/javascript">
var list=document.getElementById("list");
// var tab=document.getElementById("tab");
list.style.cssText="border-bottom: 5px solid #1673ba ";
 
</script>

</html>
