
<!-- <?php
   /**  @var $pdo \PDO */


     // from newProduct
//    $name='';
//    $description='';
//    $wieght='';
//    $price='';
//    $quantity='';
   
//    // from invoice
//    $invoiceNumber;
//    $date='';
//    $customer='';


// $press=$_GET['press'] ?? '';

// if ($press) {
//     $statement=$pdo->prepare('SELECT * FROM newProducts WHERE  id =:id');
     
  
// $statement->bindValue(':id',$press);
// $statement->execute();
// $products =$statement->fetch(PDO::FETCH_ASSOC);
 
// $name=$products['name'];
// $wieght=$products['wieght'];
// $price=$products['price'];
// $description=$products['description'];
// $quantity=$products['quantity'];
 
//     if ($select) {
//         $statement2=$pdo->prepare('SELECT * FROM invoice WHERE  customer =:select');
//         $statement2->bindValue(':select',$select);
//             $statement2->execute();
//             $invoice =$statement->fetch(PDO::FETCH_ASSOC);
            
//             $name=$invoice['name'];
//             $date=$invoice['date'];
//             $price=$invoice['price'];
//             $description=$invoice['description'];
//     }

// }

?> -->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT CURD</title>
    <link rel="stylesheet" href="../../invoice.css">
</head>
<body>
    
     <div class="select">
         <select name="" id="">
             <option value="bbb">hhhh</option>
             <option value="nnnn">vvvvvvvvvv</option>
         </select>
     </div>

    <!-- <H1 class="one">PRODUCT CURD</H1> -->


    <!-- <p>
        <a href="create.php" class="btn_success"> create product</a>
    </p> -->
    <!--  -->
    <!-- <form action="">
            <div class="search">
                <input type="text" placeholder="search the product" name="search" value="<?//php echo $search?>" >
                <button type="submit" class="btn_search">search</button>
            </div>
    </form> -->
    <br>

    <table class="table">
       <thead>
           <tr>
               <!-- <th scope="col">#</th> -->
               <th scope="col">item</th>
               <th scope="col">desciption</th>
               <th scope="col">quantity</th>
               <th scope="col">wieght</th>
               <th scope="col" class="pr">price</th>
               <th scope="col">invoice Date</th>
               <!-- <th scope="col">quantity</th>
               <th scope="col">position</th>
               <th scope="col" colspan="3">action</th> -->

           </tr>
       </thead>
       <tbody>
 <?php //foreach ($products as $i => $product):  ?>
                
         <tr>
           <th scope="row"> <? //php echo $i + 1 ?> </th>
           <td> 
               <img src="<?php  //echo $product['image'] ?>" class="thumb" width="70px" height="70px" >  
          </td>
           <td><?php// echo $product['name'] ?></td>
           <td><?php //echo $product['type'] ?></td>
           <td><?php //echo $product['caliber'] ?></td>
           <td><?php// echo $product['wieght'] ?></td>
           <td class="pr"><?php //echo $product['price'] ?></td>
           <td><?php //echo $product['create_date'] ?></td>
           <td><?php //echo $product['quantity'] ?></td>
           <td><?php //echo $product['position'] ?></td>
           <td colspan="3">
               <form style="display:inline" action="deleteed.php" method="POST">
                   <input type="hidden" name="id" value="<?php //echo $product['id'] ?>">
               <button type="submit" class="btn btn_d">Retreat</button>
               </form> 
               <!-- <a  href="update.php?id=<?php //echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">Edit</a>
               <button type="button" class="btn btn_add">AddTo Invoice</button> -->
           </td>
        </tr>
<?php// endforeach; ?>
       </tbody>

    </table>

</body>
</html>