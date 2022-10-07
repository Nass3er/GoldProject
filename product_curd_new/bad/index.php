
<?php

$pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$search=$_GET['search'] ?? '';

if ($search) {
    $statement=$pdo->prepare('SELECT * FROM newProducts WHERE name LIKE :name ORDER BY create_date DESC');
    $statement->bindValue(':name', "%$search%" );
}else {
$statement=$pdo->prepare('SELECT * FROM newProducts ORDER BY create_date DESC');
      
}
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 
// echo "<pre>";
// var_dump($products);
// echo "</pre>";
// exit;

// if ($_GET['id']==012345) {
//   include_once "create.php";
// } else{
//   header('Location:index.php');
// }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="index.css">
</head>

<body >
  <div class="container">
    
  
<div class="head">
  <span class="firstIcon">
    <span></span>
    <span></span>
    <span></span>
  </span>
  <span>الذهب</span>
</div>
<br>
<!-- end head div -->
  
    <div class="my">
      <p> AbbasiGold</p>
        <form action="">
                <div class="search">
                    <input type="text" placeholder="search the product" name="search" value="<?php echo $search?>" >
                    <button type="submit" class="btn_search">search</button>
                </div>
        </form>
     </div>
     
  </div>
  <hr>
  
<div class="all">
  


 <div class="list-left">
   <table border="1">
     <thead>
       <tr>
         <th> الأنشطة</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td><a href="index.php?id=012">All_products</a></td>
       </tr>
       <tr>
        <td> <a href="sales.php?id=0123">sales </a></td> 
       </tr>
       <tr>
         <td><a href="purchase.php?id=1234">purchase</a></td>
         
       </tr>
       <tr>
         <td><a href="create.php">create product</a></td>
         
       </tr>
     </tbody>
   
</table>
 </div>
 
  <div class="content"> 
    <?php foreach ($products as $i => $product): ?>
    <div class="product">
    
        <img src="<?php echo $product['image'] ?>" alt="" width="150px" height="170px">
        <span class="info">
      
            <div>
              <label for="">title: <span><?php echo $product['name'] ?> </span>  </label>
            </div>
            
          <div>
            <label for="">wieght:<span><?php echo $product['wieght'] ?></span>  </label>
          </div>
          <div>
            <label for="">price: <span><?php echo $product['price'] ?> </span> </label>
          </div>
          <div>
            <label for="">type:<span><?php echo $product['type'] ?></span> </label>
          </div>
          <div>
            <label for="">description:<span><?php echo $product['description'] ?></span> </label>
          </div>
          <div>
            <label for="">quantity:<span><?php echo $product['quantity'] ?></span> </label>
          </div>
          <div>
            <label for="">position:<span><?php echo $product['position'] ?></span> </label>
          </div>
          <form style="display:inline" action="delete.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
               <button type="submit" class="btn btn_d">Delete</button>
               </form> 
               <a  href="update.php?id=<?php echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">Edit</a>
          <button type="submit" class="btn btn_add">add to invoice</button>
      </span>
         
    </div>
    <?php  endforeach; ?>
  </div>
</div>
</body>

</html>
