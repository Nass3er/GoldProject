 

<div  class="content tableInvoice">
<table class="table" id="tble">
  <thead>
      <tr>
      <th scope="col">#</th>
      <!-- <th scope="col">item</th> -->
      <th scope="col">الوزن</th>
      <th scope="col">السعر</th>
      <th scope="col">الوصف</th>
      <th scope="col" class="pr">الكمية</th>
      <th scope="col">العيار</th> 
      <!-- <th scope="col">Date</th>  -->
      
      <th scope="col" colspan="3">احداث</th>

            </tr>
        </thead>
        <tbody>
       
  <?php if( isset($_SESSION['cart'])): ?>
  <?php  foreach ($_SESSION['cart'] as $selectedE ):  ?>
     
          <tr>
    
    <td>  <?php  echo $selectedE ['id']  ?>   </td>   
  
  <td><?php echo $selectedE ['wieght'] ?></td>
  <td><?php echo $selectedE ['price']  ?></td>
  <td><?php echo $selectedE ['description'] ?></td>
  <td class="pr">  <?php echo  $selectedE ['quantity'] ?></td>
  <td><?php echo $selectedE ['type']  ?></td>
   
   
  <td><button onclick="document.getElementById('id02').style.display='block'"
      style="width:auto;" class="deter" >تعديل  </button>
       </td>
  <td  colspan="3">
      <form style="display:inline" action="retreatProduct.php" method="POST" >
          <input type="hidden" name="id" value='<?php echo $selectedE['id'] ?>'>
            <button type="submit" class="retrate">تراجع</button>
          
       </form>
       
        <!-- <a  href="update.php?id=<?php //echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">Edit</a>
      <button type="button" class="btn btn_add">AddTo Invoice</button>  -->
  </td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
  
</tbody>
<span id=error></span>
<tfoot class="foot">
  <tr> 
     
        <div class="sum">
            
            <td colspan="3" > <div class="textSum">المجموع الكلي للفاتورة </div> </td>
            <td colspan="2"> <div class="valueSum">
              <?php foreach($_SESSION['cart'] as $p): ?>
              <?php $sum+=$p['price'] ?>
              <?php endforeach; ?>
              <?php echo  $sum ?>
          </div>
        </td>
        <td>
            <!-- <form style="" action="finalInvoice.php" method="POST">
               <input type="hidden" name="id" value="<?php  ?>"> -->
     <!-- <button type="submit" class="btn btn_add next">التالي>></button> -->
      <!-- end of the form that contain the costomer name and notes -->
            <!-- </form>  -->
            
        </td>
    </tr>
</tfoot>
</table>
</div>

 