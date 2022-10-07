<?php
session_start();
/**  @var $pdo \PDO */
require_once "../../database.php";
 
$id=$_POST['id'];
$q=$_POST['q'];
$p=$_POST['p'];
$d= $_POST['d'];
$t= $_POST['t'];
$w= $_POST['w'];
  
$stmt5= $pdo->prepare("SELECT quantity FROM newProducts WHERE id = :id");

$stmt5->bindValue(':id',$id);
$stmt5->execute();
$prod1 =$stmt5->fetch(PDO::FETCH_ASSOC);
  if ($q>$prod1['quantity']) {
      //   <script>
      //     document.getElementById("error").innerHTML="not allowd this quantity more than you have!!!!";
      //   </script>
      echo "not allowd this quantity more than you have!!!!";
        header('Location:invoice1.php');
      
        exit;
    }

 else {
       
  foreach ($_SESSION['cart'] as $key => &$product) {
    if ($product['id']==$id) {
        $product['quantity']=$q;
        $product['price']=$p;
        $product['description']=$d;
        $product['type']=$t;
        $product['wieght']=$w;
        
    }
  }


// $stmt6= $pdo->prepare("UPDATE virtualtable SET wieght_v = :wieght ,
// price_v = :price , description_v = :descV , quantity_v = :quantity , type_v = :typeV   WHERE id_v = :id");
  



 
// $stmt6->bindValue(':wieght',$w);
 
// $stmt6->bindValue(':price',$p);
// $stmt6->bindValue(':typeV',$t);
// $stmt6->bindValue(':descV',$d);
// $stmt6->bindValue(':quantity',$q);
// $stmt6->bindValue(':typeV',$t);
// $stmt6->bindValue(':id',$id);
// $stmt6->execute();
                                
  header('Location:invoice1.php');
 }
?>