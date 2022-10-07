

<?php
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
// exit;
$errors=[];
 
$name='';
$type='';
$description='';
$wieght='';
$price='';
$date='';
$quantity='';
$position='';

if($_SERVER['REQUEST_METHOD']==='POST'){
  // if($_POST['submit']){
       
      $name=$_POST['name'];
      $type=$_POST['type'];
      $description=$_POST['description'];
      $wieght=$_POST['wieght'];
      $price=$_POST['price'];
      $date= date('Y-m-d H:i:s');
      $quantity=$_POST['quantity'];
      $position=$_POST['position'];

      if(!$name){
        $errors[]='product name is required';

      }
      if(!$wieght){
        $errors[]='product wieght is required';

      if (!is_dir('images')) {
         mkdir('images');
      }

      }

      // $statement= $pdo->exec("INSERT INT products (image ,name ,type ,caliber ,wieght ,price ,create_date ,quantity ,position)
      //     VALUES('','$name','$type',$caliber,$wieght,$price,'$date',$quantity,'$position')
      // ");
      if(empty($errors)){
        $image=$_FILES['image'] ?? null;
        $imagePath='';

        if($image && $image['tmp_name']){

         $imagePath='images/'.randomString(8).'/'.$image['name'];
         mkdir(dirname($imagePath));


          move_uploaded_file($image['tmp_name'],$imagePath);
        }

          $statement= $pdo->prepare("INSERT INTo newProducts (image ,name ,wieght ,price ,type ,description ,quantity ,position,create_date)
           VALUES(:image, :name, :wieght, :price, :type, :description,:quantity, :position ,:date)");
          

       
          $statement->bindValue(':image',$imagePath);
          $statement->bindValue(':name',$name);
          $statement->bindValue(':wieght',$wieght);
          $statement->bindValue(':price',$price);
          $statement->bindValue(':type',$type);
          $statement->bindValue(':description',$description);
          $statement->bindValue(':quantity',$quantity);
          $statement->bindValue(':position',$position);
          $statement->bindValue(':date',$date);
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
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="cont">
    <h1>CREATE NEW PRODUCT </h1>
    <?php if(!empty($errors)): ?>
        <div class="alert-danger">
          <?php foreach ($errors as $error ): ?> 
                <div> <?php  echo $error  ?></div>
            <?php  endforeach; ?>
    <?php endif; ?>
    </div>

    <form action="" method="POST"  enctype="multipart/form-data">
        PRODUCT IMAGE:
       <input type="file" name="image" id=""  >
      <input type="text" name="name" placeholder="product Name" value="<?php echo $name ?>" >
      <input type="text" name="wieght" placeholder=" wieght" value="<?php echo $wieght ?>" >
      <input type="text" name="price" placeholder="price of product" value="<?php echo $price ?>" >
      <input type="text" name="type" placeholder="type of gold" value="<?php echo $type ?>" >
      <input type="text" name="description" placeholder="description" value="<?php echo $description ?>" >
       
      <input type="text" name="quantity" placeholder="quantity" value="<?php echo $quantity ?>" >
      <input type="text" name="position" id="" placeholder="position" value="<?php echo $position ?>" >
       <input type="submit" value="save">
      
</form>
  </div>
</body>
</html>