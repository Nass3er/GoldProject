
 <?php
   /**  @var $pdo \PDO */

    require_once "../../database.php";
 

   $stmt=$pdo->prepare('SELECT * FROM customer');
     
   
// $statement->bindValue(':id','customer.id');
$stmt->execute();
$customers =$stmt->fetchAll(PDO::FETCH_ASSOC);

$products=[];
$invoiceInfo=[];
 $sum=0.0;
         
 require_once "../../getIsSelect.php"; 
          
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
// exit;  
         
    

  
  $date= date('Y-m-d H:i:s');
//   $idQ=$_GET['idQ'] ?? '';
// if($idQ){

// $st=$pdo->prepare('UPDATE  newproducts SET quantity = quantity +1 , isSelect=0  WHERE id=:id');
// $st->bindValue(':id',$idQ);
// $st->execute();

 
//}
   //function temp(){
    // $data ;
    //  $data[]=array(
    //      'name'=> $products['name'],
    //      'wieght'=> $products['wieght'],
    //      'price'=> $products['price'],
    //      'description'=> $products['description'],
    //      'quantity'=> $products['quantity'],
    //      'date'   => $date
    //  );
    //  $fh=fopen('temp.json','w') or die("تعذر فتح الملف");
    //  fwrite($fh,json_encode( $data) );
    //  fclose($fh);

  // }

   //function fetching(){
    //    $jsonData=file_get_contents('temp.json') or die("لم يتم جلب محتوى الملف");
    //    $data2=json_decode($jsonData,true);
       
   //}
     

// echo '<pre>';
// var_dump($data2);
// echo '</pre>';
// exit;

 
?>  





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT CURD</title>
    <link rel="stylesheet" href="../../invoice.css">
    <link rel="stylesheet" href="../../index.css">
  <link rel="stylesheet" href="../../priceDetermin.css">
</head>
<body>

      <?php  include_once "../../views/header.php" ?>  
      <?php // include_once "../../views/list_left.php" ?>  
    <div class="titleInvoce">
            <div class="select">
                <label for="" class="custName">اسم العميل:</label>
                <select name="customerName" id="">
                    <?php foreach ($customers  as $i=> $customer ): ?>
                         <?php   echo '<option>' ?>
                           <?php echo $customer['name'] ?>
                          <?php echo '</option>'  ?>
                           
                     <?php  endforeach; ?>
                        
                </select>
            </div>
            <span> INV:NUM:#   </span>
            
    </div>

    <!-- <H1 class="one">PRODUCT CURD</H1> -->


    <!-- <p>
        <a href="create.php" class="btn_success"> create product</a>
    </p> -->
    
     
    <br>
      <div class="all">

                 <?php  include_once "../../views/list_left.php" ?>
                 <div class="content">
                    <table class="table" id="tble">
                      <thead>
                          <tr>
                            
                          <th scope="col">item</th>
                          <th scope="col">wieght</th>
                          <th scope="col">price</th>
                          <th scope="col">description</th>
                          <th scope="col" class="pr">quantity</th>
                          <th scope="col">Date</th> 
                          <th scope="col" colspan="3">action</th>

                                </tr>
                            </thead>
                            <tbody>
                      <?php  foreach ($products as $i => $product ):  ?>
                                      
                              <tr>
                    
                        <!-- <td>    <?php// echo $i + 1 ?> </td>    -->
                      <td><?php  echo $product ['name']  ?></td>
                      <td><?php echo $product ['wieght'] ?></td>
                      <td><?php echo $product ['price']  ?></td>
                      <td><?php echo $product ['description'] ?></td>
                      <td class="pr">  <?php echo "1" ?></td>
                      <td><?php echo $date ?></td>
                      <td> <button onclick="document.getElementById('id02').style.display='block'"
                                        style="width:auto;" class="deter">تعديل  </button>
                           </td>
                      <td><?php //echo $product['position'] ?></td>
                      <td  colspan="3">
                          <form style="display:inline" action="updateQuantity.php" method="POST" >
                              <input type="hidden" name="id" value='<?php echo $product['id'] ?>'>
                                <button type="submit" class="retrate">تراجع</button>
                              
                           </form>
                          
                            <!-- <a  href="update.php?id=<?php //echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">Edit</a>
                          <button type="button" class="btn btn_add">AddTo Invoice</button>  -->
                      </td>
                    </tr>
                    <?php endforeach; ?>  
                   </tbody>
                    <tfoot class="foot">
                      <tr> 
                         
                            <div class="sum">
                                
                                <td colspan="3" > <div class="textSum">المجموع الكلي للفاتورة </div> </td>
                                <td colspan="2"> <div class="valueSum">
                                  <?php foreach($products as $p): ?>
                                  <?php $sum+=$p['price'] ?>
                                  <?php endforeach; ?>
                                  <?php echo  $sum ?>
                              </div>
                            </td>
                            <td>
                                <form style="" action="finalInvoice.php" method="POST">
                                   <input type="hidden" name="id" value="<?php  ?>">
                                    <button type="submit" class="btn btn_add next">التالي>></button>
                                </form> 
                                
                            </td>
                        </tr>
                    </tfoot>
                   </table>
                </div>
    </div>
    <div id="id02" class="modal2"> 
                      
                      <form action=" .php" method="post" class="modal-content animate">
  
                           <div class="imgcont">
  
                             <span onclick="document.getElementById('id02').style.display='none'"
                             class="close2" title="close modal">&times; </span>
                              
  
                              
                           </div>
                           <h3 > التحديثات الجديدة  </h3>
                           <div class="container">
                             <label ><b>   الوزن</b></label>
                             <input type="text" name="" >
                              
                             <label ><b>   السعر </b></label>
                             <input type="text" name="n22" >
  
                             <label ><b>  الوصف  </b></label>
                             <input type="text" name="n21" >
  
                             <label ><b>  الكمية </b></label>
                             <input type="text" name="n18" >
                              
                             <label ><b>  النوع </b></label>
                             <select name="type" id="" class="selectType">
                                <option value="24">عيار 24</option>
                                <option value="22">عيار 22</option>
                                <option value="21">عيار 21</option>
                                <option value=" 18">عيار 18</option>
                              </select>
                             <button type="submit">حفظ التغييرات</button>
  
                           </div>
                              
                      </form>
                    </div>
     </div>

            <script>

                    var modal2=document.getElementById('id02');
                    window.onclick=function(event){
                        if(event.target==modal2){
                          modal2.style.display="none";
                        }
                    }
            </script>
    <script>
        var tbl=document.getElementById("tble");
          // let arr  =[];
        // for (let i = 1; i < tbl.rows.length-1; i++) {
        //    // for (let j = 0; j < tbl.row.length; j++) {
        //        tble.rows.onclick=function(){

        //        } 
              
            //}
        // }
        console.log(tbl);
    </script>
    <!-- <?php //echo "<pre>" ?>
    <?php  //var_dump($invoiceInfo) ?>
    <?php //echo "</pre>" ?> -->
</body>
</html>