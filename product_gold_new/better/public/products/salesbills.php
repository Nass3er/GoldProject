
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

$query='SELECT p.name ,p.description,p.price,p.type , s.dateSales,s.total,c.customer_name,u.username FROM newproducts p
  JOIN salesbilldetails sd ON p.id=sd.productId
 JOIN salesbill s ON sd.salesbillId=s.salesId
 JOIN customer c ON c.customer_id=s.customerId JOIN users u ON u.user_id=s.userId';
$statement=$pdo->prepare($query);
      
 
$statement->execute();
$sallesbills=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 

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
               <th scope="col">السعر</th>
               <th scope="col">العيار</th>
               <th scope="col">التاريخ</th>
               

               <th scope="col">الإجمالي </th>
                <th scope="col">اسم العميل </th>
                <th scope="col">المستخدم </th>
               <th scope="col" colspan="3">احداث</th>

           </tr>
       </thead>
       <tbody>
     <?php foreach ($sallesbills as $i => $sales):  ?>
                
         <tr>
           
           <!-- <td> 
               <img src="<?php  //echo $sales['image'] ?>" class="thumb" width="70px" height="auto" >  
          </td> -->
           <td><?php echo $sales['name'] ?></td>
           <td><?php echo $sales['description'] ?></td>
           <td><?php echo $sales['price'] ?></td>
           <td><?php echo $sales['type'] ?></td>
           <td class=""><?php echo $sales['dateSales'] ?></td>
           <td><?php echo $sales['total'] ?></td>
           <td><?php echo $sales['customer_name'] ?></td>
           <td><?php echo $sales['username'] ?></td>
           
            
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