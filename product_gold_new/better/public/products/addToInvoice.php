<?php
 session_start();

 /**  @var $pdo \PDO */

 require_once "../../database.php";
 
 $id=$_POST['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit;
}
 
 $stmtquant=$pdo->prepare('SELECT * from newproducts where id=:id');
 $stmtquant->bindValue(':id',$id);
 $stmtquant->execute();
 $prodQ=$stmtquant->fetch(PDO::FETCH_ASSOC);
  
  if ($prodQ['quantity']<= 0) {
    
    //echo "<h2> !! لا يوجد كمية من هذا المنتج </h2>";  // اشتي هذه الرسالة تظهر في الصفحة الرئيسية
    header('Location:index.php');
    exit;

    
  } else{
       
      /// decrement quantity by 1 default 
       $stmt4=$pdo->prepare('UPDATE newproducts  SET quantity = quantity-1 ,isSelect = 1  where id=:id' );
       $stmt4->bindValue(':id',$id);
       $stmt4->execute();

    // MY TRYING TO SAVE INTO SESSION MORE SESSION
      //$ss=new SessCart(); 

            // $ss->id= $prodQ['id'];
            // $ss->price= $prodQ['price'];
            // $ss->wieght= $prodQ['wieght'];
            // $ss->desc= $prodQ['description'];
            // $ss->quant= $prodQ['quantity'];
            // $ss->type= $prodQ['type'];


          
            
            
            // $_SESSION['cart']=new SessCart();
            //$_SESSION['cart1']=array($prodQ['id'],$prodQ['price'],$prodQ['wieght'],$prodQ['description'],$prodQ['quantity'],$prodQ['type'] );
           // $_SESSION['cart']=array($prodQ['id'],$prodQ['price'],$prodQ['wieght'],$prodQ['description'],$prodQ['quantity'],$prodQ['type'] );
            /// $arr=[];
           //$_SESSION['cart']=array_push($arr,$prodQ['id'],$prodQ['price'],$prodQ['wieght'],$prodQ['description'],$prodQ['quantity'],$prodQ['type'] );
           // array_push($_SESSION['cart'],$arr);
     
 

    /// THIS CODE VERY GOOD WORK I LOVE IT  , its very very very vero gooooood
      if (! isset($_SESSION['cart'])) { 
        $_SESSION['cart']=Array(); 
        array_push($_SESSION['cart'], $prodQ);
      }else{
       
       
       array_push($_SESSION['cart'], $prodQ);
       
      }
      
      foreach ( $_SESSION['cart'] as &$val ) { // modify quantity 
         $val['quantity']=1;
      }
      
       
      
      
       header('Location:index.php');
       exit;

        

    
     }
?>