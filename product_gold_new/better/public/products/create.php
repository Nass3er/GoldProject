

<?php
session_start();
$items_in_cart=0;
  if (isset($_SESSION['cart'])) {
    $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;
  }
/**  @var $pdo \PDO */
 require_once "../../database.php";

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
$suppId='';
$lastproductId=0;

$stmtsup=$pdo->prepare('SELECT * FROM supplier');
$stmtsup->execute();
$suppliers =$stmtsup->fetchAll(PDO::FETCH_ASSOC);// fetch all the suppliers


if($_SERVER['REQUEST_METHOD']==='POST'){
  // if($_POST['submit']){
       
      $name=$_POST['name'];
      $type=$_POST['type'];
      $description=$_POST['description'];
      $wieght=$_POST['wieght'];
      $price=$_POST['price'];
      $date= date('Y-m-d H:i:s');
      $quantity=$_POST['quantity'];
      $suppId=$_POST['supplierId'];
      if ($quantity=='') 
         $quantity="1";
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
        // $image=$_FILES['image'] ?? null;
        // $imagePath='';

        // if($image && $image['tmp_name']){

        //  $imagePath='images/'.$image['name'];
        //  mkdir(dirname($imagePath));


        //   move_uploaded_file($image['tmp_name'],$imagePath);
        $imagePath='';
        $file_name=$_FILES['image']['name'] ;
        $file_size=$_FILES['image']['size'] ;
        $file_tmp=$_FILES['image']['tmp_name'];

        $exten=strtolower(end(explode(".",$file_name)));
        
        $extentions=array("png","jpg","jpeg");
        if ($file_size>2*1024*1024)  
            $errors[]="file more than 2mb not allowd";
        if(!in_array($exten,$extentions))
        $errors[]=" this file extention not allowd";
     
        if (empty($errors)) {
          $imagePath="images/".$file_name;
          move_uploaded_file($file_tmp,$imagePath);
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

          $lastproductId= $pdo->LastInsertId(); // for get the last id of product that inserted
           echo $lastproductId;
          

                    
          $stmtInsertPS=$pdo->prepare("INSERT INTo product_supplier (productId ,supplierId )
          VALUES (:proid,:suppid)");
          $stmtInsertPS->bindValue(':proid',$lastproductId);
          $stmtInsertPS->bindValue(':suppid',$suppId );
          $stmtInsertPS->execute();

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

include 'glopalsVariables.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../create.css">
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="../../priceDetermin.css">
</head>
<body>
<?php  include_once "../../views/header.php" ?>
<div class="layout">
  <div class="right">
      
 </div>
 <div class="left">
    <div class="cont">
    <h1>إنشاء منتج جديد </h1>
    <?php if(!empty($errors)): ?>
        <div class="alert-danger">
          <?php foreach ($errors as $error ): ?> 
                <div> <?php  echo $error  ?></div>
            <?php  endforeach; ?>
    <?php endif; ?>
    </div>
       
    <form action="" method="POST"  enctype="multipart/form-data">
        صورة المنتج:
       <input type="file" name="image" id=""  >
      <input type="text" name="name" placeholder="ادخل الاسم " value="<?php echo $name ?>" >
      <input type="text" name="wieght" placeholder=" الوزن" value="<?php echo $wieght ?>" >
      <input type="text" name="price" placeholder="السعر" value="<?php echo $price ?>" >
      <!-- <input type="text" name="type" placeholder="النوع " value="<?php //echo $type ?>" > -->
      <select name="type" id="" class="caliber">
        <option value="24">عيار 24</option>
        <option value="22">عيار 22</option>
        <option value="21">عيار 21</option>
        <option value="18">عيار 18</option>
      </select>
     
      <input type="text" name="description" placeholder="الوصف" value="<?php echo $description ?>" >
       
      <input type="text" name="quantity" placeholder="الكمية" value="<?php echo $quantity ?>" >
      <input type="text" name="position" id="" placeholder="الموقع" value="<?php echo $position ?>" >

      <select name="supplierId" id=""  class="caliber">                    
                        <?php foreach ($suppliers  as $i=> $supplier ): ?>
                        
                            <option value=" <?php echo $supplier['supp_id'] ?> " > <?php echo $supplier['supplier_name'] ?></option>
                              
                        <?php  endforeach; ?>
       <input type="submit" value="حفظ">
      
</form>
  </div>
 </div>  
 

</body>
<script  type="text/javascript">
   // TODO HIDDEN THE FIELD SEARCH FROM HEADER WHEN MOVE TO THIS PAGE
     var hidSearch=document.getElementById("hiddenSearch");
     hidSearch.style.cssText="display:none";
   </script>
</html>
</html>