
<?php   

 /**  @var $pdo \PDO */
  require_once "../../database.php";

  session_start();
 
  
$VDATE=date('Y/m/d');
  ///data from virtual table
  $stmt=$pdo->prepare('SELECT * FROM virtualtable');
  $stmt->execute();
  $virtualTab =$stmt->fetchAll(PDO::FETCH_ASSOC);
  
//   echo '<pre>';
//   var_dump($virtualTab);
//   echo '</pre>';
//   exit;
$invtId=null;
  if($_SERVER['REQUEST_METHOD']==='POST'){
     
    $dat=date('Y-m-d H:i:s');
     $customerId=$_POST['customerId'];
     $noteInvoice=$_POST['notes'];
  
    $query='INSERT INTO salesbill 
    (datesales , notes ,customerId, total)  VALUES  (:dat , :notes , :custId ,:total)';
   $insertToInvoice =$pdo->prepare($query);
   $insertToInvoice->bindValue('dat',$dat);
   $insertToInvoice->bindValue('notes',$noteInvoice);
   $insertToInvoice->bindValue('custId',$customerId);
   $insertToInvoice->bindValue('total',$_SESSION['sum']);
   $insertToInvoice->execute();

   $invtId= $pdo->LastInsertId();  //this  return the last of inserted id of salesbill table
     
                         // THIS METHOD VERY IMPORTANT WE NEED TO IT ALOT
    
     foreach ($virtualTab as $k => $virtualE) {
      
    
   /// insert into salesbilldetails
   $insertToDetails=$pdo->prepare('INSERT INTO salesbilldetails
      (productId , salesbillId , quantity_d , price_d , description_d)
      VALUES(:pid , :salid , :quand ,:prd , :descd)' );
   $insertToDetails->bindValue(':pid', $virtualE ['id_v']) ;  // id of product FK
   $insertToDetails->bindValue(':salid', $invtId);             // id of invoice FK
   $insertToDetails->bindValue(':quand',$virtualE ['quantity_v']);
   $insertToDetails->bindValue(':prd',  $virtualE['price_v']);
   $insertToDetails->bindValue(':descd', $virtualE['description_v']);
   $insertToDetails->execute();
   
     } // end foreach
  }



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
            <div>محمد عبدالله</div>
            <div> شارع الثلاثين    </div>
            <div>تعز بيرباشا</div>
        </div>

        <div class="dist">
            <h4>دفع ل</h4>
            <div>   عبدالغني مصلح</div>
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
                    <div>2022/5/20</div>
                    <div>2022/5/20</div>
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
   
      <?php foreach ($virtualTab as $key=> $pr): ?>   
          <tr>
           
                <td> <?php echo $pr ['id_v'] ?>  </td>
                <td>  <?php echo $pr ['wieght_v'] ?> </td>
                <td> <?php echo $pr ['price_v'] ?>  </td>
                <td>  <?php echo $pr ['description_v'] ?> </td> 
                <td>  <?php echo $pr ['quantity_v'] ?> </td>
                <td>  <?php echo $pr ['type_v'] ?> </td>
         
         </tr>
    <?php endforeach; ?>

        </tbody>
         <tfoot>
             <tr> 
               <th colspan="3"> الإجمالي  =  <?php echo"   ". $_SESSION['sum']. " \t  "  ?>   ريال يمني </th> 
             </tr>
           
      </tfoot>
     </table>
 
</div>
</body>
</html>