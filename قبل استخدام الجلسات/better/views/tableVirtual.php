 

<div  class="content tableInvoice">
<table class="table" id="tble">
  <thead>
      <tr>
      <th scope="col">#</th>
      <!-- <th scope="col">item</th> -->
      <th scope="col">wieght</th>
      <th scope="col">price</th>
      <th scope="col">description</th>
      <th scope="col" class="pr">quantity</th>
      <th scope="col">type</th> 
      <!-- <th scope="col">Date</th>  -->
      
      <th scope="col" colspan="3">action</th>

            </tr>
        </thead>
        <tbody>
  <?php  foreach ($elementSelected as $selectedE ):  ?>
     
          <tr>
    
    <td>  <?php  echo $selectedE ['id_v']  ?>   </td>   
  
  <td><?php echo $selectedE ['wieght_v'] ?></td>
  <td><?php echo $selectedE ['price_v']  ?></td>
  <td><?php echo $selectedE ['description_v'] ?></td>
  <td class="pr">  <?php echo  $selectedE ['quantity_v'] ?></td>
  <td><?php echo $selectedE ['type_v']  ?></td>
   
   
  <td><button onclick="document.getElementById('id02').style.display='block'"
      style="width:auto;" class="deter" >تعديل  </button>
       </td>
  <td  colspan="3">
      <form style="display:inline" action="updateQuantity.php" method="POST" >
          <input type="hidden" name="id" value='<?php echo $selectedE['id_v'] ?>'>
            <button type="submit" class="retrate">تراجع</button>
          
       </form>
       
        <!-- <a  href="update.php?id=<?php //echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">Edit</a>
      <button type="button" class="btn btn_add">AddTo Invoice</button>  -->
  </td>
</tr>
<?php endforeach; ?>  
</tbody>
<span id=error></span>
<tfoot class="foot">
  <tr> 
     
        <div class="sum">
            
            <td colspan="3" > <div class="textSum">المجموع الكلي للفاتورة </div> </td>
            <td colspan="2"> <div class="valueSum">
              <?php foreach($elementSelected as $p): ?>
              <?php $_SESSION['sum']+=$p['price_v'] ?>
              <?php endforeach; ?>
              <?php echo $_SESSION['sum'] ?>
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

 