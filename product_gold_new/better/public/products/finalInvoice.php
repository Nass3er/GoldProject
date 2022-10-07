
<?php   

 /**  @var $pdo \PDO */
 session_start();
  require_once "../../database.php";
 
$VDATE=date('Y/m/d');

$summation=0.0;
  foreach ($_SESSION['cart'] as $key ) {
       $summation+=$key['price'];
  }
    
//   ///data from virtual table
//   $stmt=$pdo->prepare('SELECT * FROM virtualtable');
//   $stmt->execute();
//   $virtualTab =$stmt->fetch(PDO::FETCH_ASSOC);
  
//   echo '<pre>';
//   var_dump($virtualTab);
//   echo '</pre>';
//   exit;

  if($_SERVER['REQUEST_METHOD']==='POST'){
     
    $dat=date('Y-m-d H:i:s');
     $customerId=$_POST['customerId'];
     $noteInvoice=$_POST['notes'];
     
     $stmtC=$pdo->prepare('SELECT customer_name FROM customer WHERE customer_id = :cusId');
     $stmtC->bindValue(':cusId',$customerId);
       $stmtC->execute();
       $customerName =$stmtC->fetchColumn(); 

       
    $query='INSERT INTO salesbill 
    (datesales ,total, notes ,customerId ,userId)  VALUES  (:dat ,:total, :notes , :custId,:userid)';
   $insertToInvoice =$pdo->prepare($query);
   $insertToInvoice->bindValue('dat',$dat);
   $insertToInvoice->bindValue('total',$summation);
   $insertToInvoice->bindValue('notes',$noteInvoice);
   $insertToInvoice->bindValue('custId',$customerId);
   $insertToInvoice->bindValue('userid',$_SESSION['user_id']);
   
   $insertToInvoice->execute();

   $invtId= $pdo->LastInsertId();  //this  return the last of inserted id of salesbill table
                                   // THIS METHOD VERY IMPORTANT WE NEED TO IT ALOT
    
   
   
     
 //    /// insert into salesbilldetails
  foreach ($_SESSION['cart'] as $elements) {
    
  
    $insertToDetails=$pdo->prepare("INSERT INTO salesbilldetails
        (productId , salesbillId , quantity_d , price_d , description_d)
        VALUES
        (:pid , :salid , :quand ,:prd , :descd)
    ");
    $insertToDetails->bindValue(':pid',$elements['id']) ;  // id of product FK
    $insertToDetails->bindValue(':salid',$invtId);             // id of invoice FK
    $insertToDetails->bindValue(':quand',$elements['quantity']);
    $insertToDetails->bindValue(':prd',$elements['price']);
    $insertToDetails->bindValue(':descd',$elements['description']);
    $insertToDetails->execute();
  }
        
  }// end if
 

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../finalInvoice.css">
</head>
<body>
<div class="cont">

    <div class="header">
        <div class="left">
            <h2>NASSER ALABBASI</h1>
            <div>442 drive</div>
            <div>NY <?php echo $invtId ?></div>
        </div>
        <div class="icon">
           <span>LOGO</span> 
        </div>
         
        
    </div>
    <hr class="hr">

    <div class="info">
        <div class="dist">
            <h4>فاتورة ل</h4>
            <div> <?php echo $customerName  ?></div>
            <div> شارع الثلاثين    </div>
            <div>تعز بيرباشا</div>
        </div>

        <div class="dist">
            <h4>دفع ل</h4>
            <div>  <?php echo $_SESSION['username'] ?></div>
            <div>شارع المطار     </div>
            <div>   تعز شارع جمال</div>
        </div>

        <div class="endinfo">
                <div class="one">
                    <h4>  تاريخ الفاتورة</h4>
                    <h4>تاريخ الشراء</h4>
                    <h4>تاريخ الدفع</h4>
                </div>

                <div class="two">
                    <div><?php echo $VDATE  ?></div>
                    <div><?php echo $VDATE  ?></div>
                    <div><?php echo $VDATE  ?></div>
                </div>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                
                <th scope="col">#</th>
                <th scope="col">الوزن</th>
                <th scope="col">السعر</th>
                <th scope="col">الوصف</th> 
                <th scope="col"> الكمية</th>
                <th scope="col"> العيار</th>
                
  
            </tr>
        </thead>
        <tbody>
   
      <?php foreach ($_SESSION['cart'] as $pr): ?>   
          <tr>
           
                <td> <?php echo $pr['id'] ?>  </td>
                <td>  <?php echo $pr['wieght'] ?> </td>
                <td> <?php echo $pr['price'] ?>  </td>
                <td>  <?php echo $pr['description'] ?> </td> 
                <td>  <?php echo $pr['quantity'] ?> </td>
                <td>  <?php echo $pr['type'] ?> </td>
         
         </tr>
    <?php endforeach; ?>

        </tbody>
        <tfoot>
             <tr> 
               <th colspan="3"> الإجمالي  =  <?php echo"   ". $summation. " \t  "  ?>   ريال يمني </th> 
             </tr>
           
      </tfoot>
     
     </table>
     <form action="destroySession.php" method="post">
         <button type="submit">تم</button>
     </form>
</div>
</body>
</html>