

 <div class="content"> 
    <?php foreach ($products as $i => $product): ?>
    <div class="product">
    
        <img src="<?php echo $product['image'] ?>" class="border" alt="" width="170px" height="auto">
        <span class="info">
      
            <div>
              <label for="">العنوان: <span><?php echo $product['name'] ?> </span>  </label>
            </div>
            
          <div>
            <label for="">الوزن:<span><?php echo $product['wieght'] ?></span>  </label>
          </div>
          <div>
            <label for="">السعر: <span><?php echo $product['price'] ?> </span> </label>
          </div>
          <div>
            <label for="">النوع:<span><?php echo $product['type'] ?></span> </label>
          </div>
          <div>
            <label for="">الوصف:<span><?php echo $product['description'] ?></span> </label>
          </div>
          <div>
            <label for="">الكمية:<span><?php echo $product['quantity'] ?></span> </label>
          </div>
          <div>
            <label for="">الموقع:<span><?php echo $product['position'] ?></span> </label>
          </div>
          <form style="display:inline" action="delete.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
               <button type="submit" class="btn btn_d">حذف</button>
               </form> 
               <a  href="update.php?id=<?php echo $product['id'] ?>" class="btn btn_e" style=" text-decoration-line:none">تعديل</a>
               <form style="display:inline" action="addToInvoice.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
               <button type="submit" class="btn btn_add">إضافةإلى الفاتورة</button>
               </form> 
      </span>
         
    </div>
    <?php  endforeach; ?>
  </div>