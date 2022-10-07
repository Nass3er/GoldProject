<?php
   /**  @var $pdo \PDO */

    require_once "../../database.php";
 
// $customerId=$_POST['cust_id'];
 

require_once "../../getIsSelect.php"; 
     
         
      
    // $dateSales= date('Y-m-d H:i:s');

    foreach ($products as $key => $pro) {
       
        $stmtInvoice= $pdo->prepare(" INSERT INTO virtualtable (
            id_v ,
            wieght_v ,
             price_v,
             description_v,
            quantity_v ,
            type_v 
             )
        VALUES(
            :idV, 
            :wieghtV, 
            :priceV,
             :descV,
              :quantityV, 
              :typeV
                     )");
       
      
    
       $stmtInvoice->bindValue(':idV',$pro['id']);
       $stmtInvoice->bindValue(':wieghtV', $pro['wieght']);
       $stmtInvoice->bindValue(':priceV',$pro['price']);
       $stmtInvoice->bindValue(':descV',$pro['description']);
       $stmtInvoice->bindValue(':quantityV',1);
       $stmtInvoice->bindValue(':typeV',$pro['type']);
       

       $stmtInvoice->execute();
         
  
    } // end for


 

     

  
    $stmtf=$pdo->prepare('SELECT * FROM virtualtable');
     
   
    // $statement->bindValue(':id','customer.id');
    $stmtf->execute();
    $elementSelected=$stmtf->fetchAll(PDO::FETCH_ASSOC);
    
    // foreach ($elementSelected as $k=> $selectedE ){
    //     echo  $selectedE['descriptionSales'];
       
    // }
    // exit;
    // echo $elementSelected['descriptionSales'];
    // exit;
//         echo '<pre>';
// var_dump($elementSelected);
// echo '</pre>';
// exit;

    $stmtB=$pdo->prepare('UPDATE  newproducts SET isSelect = 0  ');
    $stmtB->execute();
     
    // header('Location:invoice1.php');
     
//     echo '<pre>';
// var_dump($elementSelected);
// echo '</pre>';
// exit;
     ?>