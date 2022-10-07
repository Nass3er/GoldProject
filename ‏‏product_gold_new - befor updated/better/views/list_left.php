
<div class="list-left">
   <table border="1">
     <thead>
       <tr>
         <th> الأنشطة</th>
       </tr>
     </thead>
     <tbody>
          <tr>
                <td> <button onclick="document.getElementById('id01').style.display='block'"
                style="width:auto;" class="deter">تحديد الاسعار</button> </td>
              

                <div id="id01" class="modal"> 
                      
                    <form action="updatePrice.php" method="post" class="modal-content animate">

                         <div class="imgcont">

                           <span onclick="document.getElementById('id01').style.display='none'"
                           class="close2" title="close modal">&times; </span>
                            

                            
                         </div>
                         <h3 >ادخل الأسعار الجديدة</h3>
                         <div class="container">
                           <label ><b>عيار 24</b></label>
                           <input type="text" name="n24" >
                            
                           <label ><b>عيار 22</b></label>
                           <input type="text" name="n22" >

                           <label ><b>عيار 21</b></label>
                           <input type="text" name="n21" >

                           <label ><b>عيار 18</b></label>
                           <input type="text" name="n18" >

                           <button type="submit">حفظ التغييرات</button>

                         </div>
                            
                    </form>
                  </div>
               
                <script>

                   var modal=document.getElementById('id01');
                   window.onclick=function(event){
                       if(event.target==modal){
                         modal.style.display="none";
                       }
                   }
                 </script>
         </tr>
       <tr>
         <td><a href="index.php?id=012">كل المنتجات</a></td>
       </tr>
       <tr>
        <td> <a href="sales.php?id=0123">المشتريات </a></td> 
       </tr>
       <tr>
         <td><a href="purchase.php?id=1234">المبيعات</a></td>
         
       </tr>
       <tr>
         <td><a href="create.php">إضافة منتج جديد</a></td>
         
       </tr>
       <tr>
         <td><a href="invoice1.php">الفاتورة الحالية</a></td>
         
       </tr>
       
        
     </tbody>
   
</table>
 </div>