
<?php
session_start();
$items_in_cart=0;
  if (isset($_SESSION['cart'])) {
    $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;
  }
require_once "../../database.php";
//include 'glopalsVariables.php';


$search=$_GET['search'] ?? '';

if ($search) {
    $statement=$pdo->prepare('SELECT * FROM newProducts WHERE name LIKE :name ORDER BY create_date DESC');
    $statement->bindValue(':name', "%$search%" );
}else {
$statement=$pdo->prepare('SELECT * FROM newProducts ORDER BY create_date DESC');
      
}
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 

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
               
               <th scope="col">صورة المنتج</th>
               <th scope="col">عنوان المنتج</th>
               <th scope="col">الوزن</th>
               <th scope="col">السعر</th>
               <th scope="col">النوع</th>
               <th scope="col" class="pr">الوصف</th>

               <th scope="col">الكمية المتاحة </th>
                <th scope="col">الموقع </th>
               <th scope="col" colspan="3">احداث</th>

           </tr>
       </thead>
       <tbody>
     <?php foreach ($products as $i => $product):  ?>
                
         <tr>
           
           <td> 
               <img src="<?php  echo $product['image'] ?>" class="thumb" width="70px" height="auto" >  
          </td>
           <td><?php echo $product['name'] ?></td>
           <td><?php echo $product['wieght'].'  جم '?></td>
           <td><?php echo $product['price'] ?></td>
           <td><?php echo $product['type'] ?></td>
           <td class=""><?php echo $product['description'] ?></td>
           <td><?php echo $product['quantity'] ?></td>
           <td><?php echo $product['position'] ?></td>
            
           <td >
              <form style="display:inline" action="delete.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
               <button type="submit" class="btn btn_d">حذف</button>
               </form> 
               <a  href="update.php?id=<?php echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">تعديل</a>
               <form style="display:inline" action="addToInvoice.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
               <button type="submit" class="btn btn_add">إضافةللفاتورة</button>
               </form>
             </td>
        </tr>
     <?php endforeach; ?>
       </tbody>
      
     
    </table>  
    </div>
 
</div>
<script type="text/javascript">
//var list=document.getElementById("list");
 var tab=document.getElementById("tab");
tab.style.cssText="border-bottom: 5px solid #1673ba ";
 
</script>