

<div class="container">
    
  
    <div class="head">
      <span class="firstIcon"  >
        <span></span>
        <span></span>
        <span></span>
      </span>
      

      


      <nav> 
       <span class="close">X</span>
       <button onclick="document.getElementById('id01').style.display='block'"
                style="width:auto;" class="deter">تحديد الاسعار</button>  
 
     <a href="index.php?id=012">كل المنتجات</a>
     <a href="create.php">إضافة منتج جديد</a>
     <a href="invoice1.php">الفاتورة الحالية</a>
     <a onclick="document.getElementById('id04').style.display='block'"
                style="width:auto;">إضافة عميل جديد </a>


    </nav>

       <span class="text">Gwellery</span>
    </div>
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


     <div id="id04" class="modal4"> 
                      
                      <form action="createCustomer.php" method="post" class="modal-content animate">
  
                           <div class="imgcont">
  
                             <span onclick="document.getElementById('id04').style.display='none'"
                             class="close2" title="close modal">&times; </span>
                              
  
                              
                           </div>
                           <h3 >إضافة عميل جديد</h3>
                           <div class="container">
                             <label ><b>إسم العميل</b></label>
                             <input type="text" name="cus_name" >
                              
                             <label ><b> رقم تلفون العميل</b></label>
                             <input type="text" name="phone" >
  
                             <label ><b> عنوان العميل</b></label>
                             <input type="text" name="address" >
  
                             <label ><b>ملاحظة </b></label>
                             <input type="text" name="notes" >
  
                             <button type="submit">حفظ العميل</button>
  
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

                     var modal4=document.getElementById('id04');
                     modal4.addEventListener("click",function(event){
                        if(event.target==modal4){
                          modal4.style.display="none";
                        }
                     });
             
                   </script> 
    
    <br>
    <!-- end head div -->
   

        <div class="my">
             <div class="showAsTable">
                    <a href="index.php"> قائمة</a>  
                  <a href="indexAsTable.php">جدول</a> 
                  <button type="button" class="btn-notification">
                     <span class="img-icon-notif"><img src="notification.jpg" alt="" height="100%" width="100%">  </span>
                     <span class="noti-acount"> <?php  echo $addedCount["COUNT(isSelect)"] ?></span>
                  </button>
             </div>
             
            <script>
             
            </script>
            <form action=""> 
                    <div class="search">
                    
                        <input type="text" class="inputSearch" placeholder="search the product" name="search" value="<?php echo $search?>" >
                        <button   type="submit" class="btn_search">بحث</button>
                    </div>
            </form>
         </div>
         
 </div>
      <hr>
      <script> 
    let toggler=document.querySelector(".firstIcon");
     
     let nav=document.querySelector("nav");
     let clos=document.querySelector(".close");
     
      
       // toggler.addEventListener("click",function() {
       //   nav.classList.toggle("open");
       // });
 
 
      toggler.onclick=function(){
        nav.classList.add("open");
 
      };
     
     clos.onclick=function() {
       this.parentElement.classList.remove("open");
     };
     document.onkeyup=function(e){
   //  console.log(e);
       if(e.key==="Escape"){
         nav.classList.remove("open");
       }
     };
     </script>   

    