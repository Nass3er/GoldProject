<?php
 /**  @var $pdo \PDO */

 require_once "../../database.php";
 
 $id=$_POST['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit;
}
 
 $stmtquant=$pdo->prepare('SELECT quantity from newproducts where id=:id');
 $stmtquant->bindValue(':id',$id);
 $stmtquant->execute();
 $prodQ=$stmtquant->fetch(PDO::FETCH_ASSOC);

  if ($prodQ['quantity']<= 0) {
    
    //echo "<h2> !! لا يوجد كمية من هذا المنتج </h2>";// اشتي هذه الرسالة تظهر في الصفحة الرئيسية
    header('Location:index.php');
    exit;

    
  } else{

       // decrement quantity by 1 default 
       $stmt4=$pdo->prepare('UPDATE newproducts  SET quantity = quantity-1 ,isSelect = 1  where id=:id' );
       $stmt4->bindValue(':id',$id);
       $stmt4->execute();
      
      
       header('Location:index.php');
       exit;

        // echo '<pre>';
        // var_dump($prodp);
        // echo '</pre>';
        // exit;

    
     }
?>