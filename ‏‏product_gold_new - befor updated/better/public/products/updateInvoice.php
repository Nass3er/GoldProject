<?php
/**  @var $pdo \PDO */
require_once "../../database.php";
 
$id=$_POST['id'];
$q=(int)$_POST['q'];
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
       
  


// $stmt6= $pdo->prepare("UPDATE newProducts SET wieght = :wieght ,
// price = :price , type = :type , description = :description , quantity = :quantity  WHERE id = :id");
  



 
// $stmt6->bindValue(':wieght',$w);
 
// $stmt6->bindValue(':price',$p);
// $stmt6->bindValue(':type',$t);
// $stmt6->bindValue(':description',$d);
// $stmt6->bindValue(':quantity',$q);
 
// $stmt6->bindValue(':id',$id);
// $stmt6->execute();
                                
  header('Location:invoice1.php');
 }
?>