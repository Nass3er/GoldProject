


<?php
session_start();
$items_in_cart=0;
  if (isset($_SESSION['cart'])) {
    $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;
  }
require_once "../../database.php";
//include 'glopalsVariables.php';


// $search=$_GET['search'] ?? '';

// if ($search) {

//     // SELECT p.name ,p.description,p.price,p.type , s.dateSales,s.total FROM newproducts p  join salesbilldetails sd ON p.id=sd.productId JOIN salesbill s ON sd.salesbillId=s.salesId
//     $statement=$pdo->prepare('SELECT * FROM newProducts WHERE name LIKE :name ORDER BY create_date DESC');
   
//     $statement=$pdo->prepare($query);
//     $statement->bindValue(':name', "%$search%" );
// }else {

$query='SELECT p.name,p.description,p.type,p.quantity,p.price,sup.supplier_name,sup.phone FROM newproducts p
 JOIN
product_supplier ps ON p.id=ps.productId JOIN supplier sup ON sup.supp_id=ps.supplierId';
$statement=$pdo->prepare($query);
      
 
$statement->execute();
$prod_supp=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 

?>

<?php  include_once "../../views/head.php" ?>    
<!-- normal head -->
<body >
    
<?php  include_once "../../views/header.php" ?>
  

  
      
<div class="all">
  
    
    
            
    <div class="content">
    <table class="table" class="t2">
       <thead>
           <tr>
               
               <th scope="col">اسم المنتج</th>
               <th scope="col">الوصف</th>
               <th scope="col">العيار</th>
               <th scope="col">الكمية </th>
               <th scope="col">السعر</th>
               

               <th scope="col">اسم المورد </th>
                <th scope="col">  تلفون المورد </th>
             
               <th scope="col" colspan="3">احداث</th>

           </tr>
       </thead>
       <tbody>
     <?php foreach ($prod_supp as $i => $prsp):  ?>
                
         <tr>
           
           <!-- <td> 
               <img src="<?php  //echo $sales['image'] ?>" class="thumb" width="70px" height="auto" >  
          </td> -->
           <td><?php echo $prsp['name'] ?></td>
           <td><?php echo $prsp['description'] ?></td>
           <td><?php echo $prsp['type'] ?></td>
           <td><?php echo $prsp['quantity'] ?></td>
           <td class=""><?php echo $prsp['price'] ?></td>
           <td><?php echo $prsp['supplier_name'] ?></td>
           <td><?php echo $prsp['phone'] ?></td>
            
            
           <td >
              <form style="display:inline" action="delete.php" method="POST">
                   <input type="hidden" name="id" value="<?php //echo $sales['id'] ?>">
               <button type="submit" class="btn btn_d">حذف</button>
               </form> 
              
             </td>
        </tr>
     <?php endforeach; ?>
       </tbody>
      
     
    </table>  
    </div>
 
</div>
<script  type="text/javascript">
     var hidSearch=document.getElementById("hiddenSearch");
     hidSearch.style.cssText="display:none";
   </script>