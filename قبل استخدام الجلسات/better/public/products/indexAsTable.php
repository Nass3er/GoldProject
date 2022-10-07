
<?php
require_once "../../database.php";
include 'glopalsVariables.php';


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
               
               <th scope="col">image</th>
               <th scope="col">name</th>
               <th scope="col">wieght</th>
               <th scope="col">price</th>
               <th scope="col">type</th>
               <th scope="col" class="pr">description</th>

               <th scope="col">quantity </th>
                <th scope="col">position </th>
               <th scope="col" colspan="3">action</th>

           </tr>
       </thead>
       <tbody>
     <?php foreach ($products as $i => $product):  ?>
                
         <tr>
           
           <td> 
               <img src="<?php  echo $product['image'] ?>" class="thumb" width="70px" height="auto" >  
          </td>
           <td><?php echo $product['name'] ?></td>
           <td><?php echo $product['wieght'] ?></td>
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
