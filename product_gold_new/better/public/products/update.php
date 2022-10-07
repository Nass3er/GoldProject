

<?php
 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$id=$_GET['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit;
}

$statement= $pdo->prepare("SELECT * FROM newProducts WHERE id = :id");

$statement->bindValue(':id',$id);
$statement->execute();
$product2 =$statement->fetch(PDO::FETCH_ASSOC);
 

// echo '<pre>';
// var_dump($product);
// echo '</pre>';
// exit;
$errors=[];
 
$name=$product2['name'];
$wieght=$product2['wieght'];
$price=$product2['price'];
$type=$product2['type'];
$description=$product2['description'];
// $date=$product['date'];
$quantity=$product2['quantity'];
$position=$product2['position'];

if($_SERVER['REQUEST_METHOD']==='POST'){
  // if($_POST['submit']){
       
      $name=$_POST['name'];
      $wieght=$_POST['wieght'];
      $price=$_POST['price'];
      $type=$_POST['type'];
      $description=$_POST['description'];
      $quantity=$_POST['quantity'];
      $position=$_POST['position'];

      if(!$name){
        $errors[]='product name is required';

      }
      if(!$wieght){
        $errors[]='product wieght is required';
      }
      if (!is_dir('images')) {
         mkdir('images');
      }




      // $statement= $pdo->exec("INSERT INT products (image ,name ,type ,caliber ,wieght ,price ,create_date ,quantity ,position)
      //     VALUES('','$name','$type',$caliber,$wieght,$price,'$date',$quantity,'$position')
      // ");
      if(empty($errors)){
        $image=$_FILES['image'] ?? null;

        $imagePath=$product2['image'];

         
        if($image && $image['tmp_name']){

         $imagePath='images/'.randomString(8).'/'.$image['name'];
         mkdir(dirname($imagePath));


          move_uploaded_file($image['tmp_name'],$imagePath);
        }

          $statement= $pdo->prepare("UPDATE newProducts SET image = :image , name = :name ,wieght = :wieght ,
          price = :price , type = :type , description = :description , quantity = :quantity , position = :position WHERE id = :id");
            
          

       
          $statement->bindValue(':image',$imagePath);
          $statement->bindValue(':name',$name);
          $statement->bindValue(':wieght',$wieght);
          $statement->bindValue(':price',$price);
          $statement->bindValue(':type',$type);
          $statement->bindValue(':description',$description);
          $statement->bindValue(':quantity',$quantity);
          $statement->bindValue(':position',$position);
          $statement->bindValue(':id',$id);
          $statement->execute();
            header('Location:index.php');
       }
  //}
   }
function randomString($n){

  $characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str='';
  for ($i=0; $i < $n; $i++) { 
     $index=rand(0,strlen($characters)-1);
     $str .=$characters[$index];
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../create.css">
    
</head>
<body>
     
    <p>
       <a href="index.php"  class="btn-go"> Go Back to product </a>
    </p>
    <div class="cont">
    
    <h1>UPDATE PRODUCT <span class="pro"> <?php echo $product2['name']  ?></span></h1>
    <?php if(!empty($errors)): ?>
        <div class="alert-danger">
          <?php foreach ($errors as $error ): ?> 
                <div> <?php  echo $error  ?></div>
            <?php  endforeach; ?>
    <?php endif; ?>
    </div>

    <form action=" " method="POST"  enctype="multipart/form-data">
 
    <?php   if($product2['image']): ?>
        <img src=" <?php  echo $product2['image'] ?>"  width="150px"  height="150px">
          <!-- <?php // else :  ?>
            <img src=" <?php  //echo $_FILES['image'] ?>"  width="150px"  height="150px"> -->
    <?php  endif;   ?>
       <br>

        <label for="">PRODUCT IMAGE:</label> 
       <input type="file" name="image" id=""  >
      <input type="text" name="name" placeholder="product Name" value="<?php echo $name ?>" >
      <input type="text" name="wieght" placeholder="wieght" value="<?php echo $wieght ?>" >
      <input type="text" name="price" placeholder="price of product" value="<?php echo $price ?>" >
      <!-- <input type="text" name="type" placeholder="type of product" value="<?php //echo $type ?>" > -->
      <select name="type" id="" class="caliber">
        <option value="24">عيار 24</option>
        <option value="22">عيار 22</option>
        <option value="21">عيار 21</option>
        <option value="18">عيار 18</option>
      </select>
      <input type="text" name="description" placeholder="description" value="<?php echo $description ?>" >
       
      <input type="text" name="quantity" placeholder="quantity" value="<?php echo $quantity ?>" >
      <input type="text" name="position" id="" placeholder="position" value="<?php echo $position ?>" >
       <input type="submit" value="save">
      
</form>
  </div>
</body>
</html>