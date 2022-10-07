
 <?php
   /**  @var $pdo \PDO */

    require_once "../../database.php";
 

   $stmt=$pdo->prepare('SELECT * FROM customer');
     
   
// $statement->bindValue(':id','customer.id');
$stmt->execute();
$customers =$stmt->fetchAll(PDO::FETCH_ASSOC);

$products=[];
$invoiceInfo=[];
 
 $productIdForUpdateInvoice=null;
 session_start();
       $_SESSION['sum']=0.0;  
//  require_once "../../getIsSelect.php"; 
 

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

include 'glopalsVariables.php';
 
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
              <form action="finalInvoice.php" method="POST" enctype="multipart/form-data">
                    <label for="" class="custName">اسم العميل:</label>
                    <select name="customerId" id="">                   
                        <?php foreach ($customers  as $i=> $customer ): ?>
                        
                            <option value=" <?php echo $customer['customer_id'] ?> " > <?php echo $customer['customer_name'] ?></option>
                              
                        <?php  endforeach; ?>
                    </select>
                    <button type="button" onclick="document.getElementById('id04').style.display='block'"
                    style="width:auto;"  class="next btn btn_add"> إضافة عميل</button>
                    <label  class="custName" for="salesNotes">ملاحظة:</label> <input type="text" name="notes" class="select">
                  </div>
                
            <span> INV:NUM:#   </span>
            
          </div>
           <div class="downTable"><button type="submit">تم</button> </div>
          </form>

       <?php   require_once  "insertIntoVirtualTable.php" ?>
    


     
     
    <br>
    <div class="all">
    <?php  include_once "../../views/tableVirtual.php" ?>  
                  
    </div>
                                   
    <div id="id02" class="modal2"> 
                      
                      <form action="updateInvoice.php" method="post" class="modal-content animate">
  
                           <div class="imgcont">
  
                             <span onclick="document.getElementById('id02').style.display='none'"
                             class="close2" title="close modal">&times; </span>
                              
  
                              
                           </div>
                           <h3 > التحديثات الجديدة  </h3>
                           <div class="container">
                           <input type="hidden" name="id" id="idd"  >  
                             <label ><b>   الوزن</b></label>
                             <input type="text" name="w" id="ww"   >
                              
                             <label ><b>   السعر </b></label>
                             <input type="text" name="p" id="pp">
  
                             <label ><b>  الوصف  </b></label>
                             <input type="text" name="d" id="dd">
  
                             <label ><b>  الكمية </b></label>
                             <input type="text" name="q" id="qq" >
                              
                             <label ><b>  النوع </b></label>
                             <select name="t" id="tt" class="selectType">
                                <option value="24">عيار 24</option>
                                <option value="22">عيار 22</option>
                                <option value="21">عيار 21</option>
                                <option value=" 18">عيار 18</option>
                              </select>
                             <!-- <button type="submit"  id="btnChangInvoice" >حفظ التغييرات</button> -->
                            
                               
                              
                                <button type="submit" id="btnChangInvoice" >حفظ التغييرات</button>
                             <!-- if we dont change on the database -->
                                
                           </div>
                              
                      </form>
                    </div>
     </div>

            <script>

                    // var modal2=document.getElementById('id02');
                    // window.onclick=function(event){
                    //     if(event.target==modal2){
                    //       modal2.style.display="none";
                    //     }
                    // }


                    var modal2=document.getElementById('id02');
                     modal2.addEventListener("click",function(event){
                        if(event.target==modal2){
                          modal2.style.display="none";
                        }
                     });
            </script>
    <script>
        var tbl=document.getElementById("tble");
        var btnch= document.getElementById("btnChangInvoice");
        let indeex= 0;
          // let arr  =[];
         for (let i = 1; i < tbl.rows.length-1; i++) {
         
         
              tbl.rows[i].addEventListener("click",function(){
                index=Number (this.cells[0].innerHTML);
                //console.log(index );
                document.getElementById("idd").value=this.cells[0].innerHTML;
                document.getElementById("ww").value=this.cells[1].innerHTML;
                document.getElementById("pp").value=this.cells[2].innerHTML;
                document.getElementById("dd").value=this.cells[3].innerHTML;
                document.getElementById("qq").value=this.cells[4].innerHTML;
                document.getElementById("tt").value=this.cells[5].innerHTML;
             // console.log(this.cells[5].innerHTML);
      
              });
          }
           
           btnch.onclick=function(){

               if (index !=0) {
                 
                tbl.rows[index].cells[0].innerHTML= document.getElementById("idd").value;
                tbl.rows[index].cells[1].innerHTML= document.getElementById("ww").value;
                tbl.rows[index].cells[2].innerHTML= document.getElementById("pp").value;
                tbl.rows[index].cells[3].innerHTML=  document.getElementById("dd").value;
                tbl.rows[index].cells[4].innerHTML=  document.getElementById("qq").value;
                tbl.rows[index].cells[5].innerHTML=  document.getElementById("tt").value;
                //consol.log( tbl.rows[index].cells[2].innerHTML);

               }
               document.getElementById('id02').style.display="none";// for hide the navigation 
           }
          
        
             

             
                // btnch.addEventListener("click",function(){
                
                // });
             
          
       
    </script>
 
              

</body>
</html>