

<?php
/**  @var $pdo \PDO */
session_start();
$items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;
require_once "../../database.php";
// include 'glopalsVariables.php';


 

 
$statement=$pdo->prepare('SELECT * FROM users');
    
$statement->execute();
$users=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 

?>

<?php  include_once "../../views/head.php" ?>    
<!-- normal head -->
<body >
    
<?php  include_once "../../views/header.php" ?>
  

<button onclick="document.getElementById('id05addUser').style.display='block'"
                style="width:auto;" class="deter">   إضافة مستخدم جديد</button>  
<div id="id05addUser" class="modal5"> 
                      
                      <form action="saveUser.php" method="post" class="modal-content animate">
  
                           <div class="imgcont">
  
                             <span onclick="document.getElementById('id05addUser').style.display='none'"
                             class="close2" title="close modal">&times; </span>
                              
  
                              
                           </div>
                           <h3 >إضافة مستخدم جديد</h3>
                           <div class="containerPrice">
                             <label ><b>إسم المستخدم</b></label>
                             <input type="text" name="user_name" >
                              
                             <label ><b>كلمة مرور المستخدم </b></label>
                             <input type="text" name="user_pass" >
  
                             <label ><b>تأكيد كلمة مرور المستخدم</b></label>
                             <input type="text" name="confirm_pass">
                             
                             <label ><b> الصلاحية</b></label>
                             <input type="text" name="prev">
                             
                             <button type="submit" name="submit">حفظ المستخدم</button>
  
                           </div>
                              
                      </form>

                      <?php
                      
                         if (username_v() and pass_v()) {
                          //  if (checkUser()) {
                          //     echo ("<h4 style='color:red'>!!!اسم المستخدم موجود بالفغعل</h4>");
                          //  }else{
                               signUp();
                            echo ("<h4 style='color:white '>    تم تسجيل المستخدم بنجااح    </h4>");
                           
                           //}
                         }else{
                          echo "<h4 style='color:red'>$error</h4>";
                           
                         }
                    
                      ?>
     </div>
                 
<div class="all">
  
    
    
            
    <div class="content">
    <table class="table" class="t2">
       <thead>
           <tr>
               <th scope="col">#</th>
              
               <th scope="col">name</th>
               <th scope="col">passsword</th>
               <th scope="col">image</th>
               <th scope="col">prev</th>
               <th scope="col" colspan="3">action</th>

           </tr>
       </thead>
       <tbody>
     <?php foreach ($users as $i => $user):  ?>
                
         <tr>
           
         <td><?php echo $i+1 ?></td>
           <td><?php echo $user['username'] ?></td>
           <td><?php echo $user['user_password'] ?></td>
           
           <td> 
               <img src="<?php  echo $user['image'] ?>" class="thumb" width="70px" height="auto" >  
          </td>
          <td><?php echo $user['role'] ?></td>
           
           <td >
              <form style="display:inline" action="deleteUser.php" method="POST">
                   <input type="hidden" name="id" value="<?php echo $user['user_id'] ?>">
               <button type="submit" class="btn btn_d">حذف</button>
               </form> 
               <a  href="update.php?id=<?php echo $user['user_id'] ?>" class="btn btn_e" style=" text-decoration-line:none">تعديل</a>
               
             </td>
        </tr>
     <?php endforeach; ?>
       </tbody>
      
     
    </table>  
    </div>
 
</div>
<!-- هنا يتم تعريف الدوال -->
<?php
   function username_v(){
     global $error;
     if (isset($_POST['user_name']) and $_POST['user_name'] !=null) {
        if (preg_match('/^[a-zA-Z0-9._-]/',$_POST['user_name'])) 
           return true;
         else
         return false;
     }
   }

   function pass_v(){
     global $error;
     if ((isset($_POST['user_pass']) and $_POST['user_pass'] !=null)
     and (isset($_POST['confirm_pass']) and $_POST['confirm_pass'] !=null)){
        if ($_POST['user_pass'] !=$_POST['confirm_pass']) {
          $error="كلمة المرور غير متطابقة" ;
          return false;
        } else {
          return true;

        }
     } else {
       $error="يرجى ملئ حقول كلمة المرور";
       return false;

     }
   }

   function signUp(){
     /**  @var $pdo \PDO */
    $insertUser= $pdo->prepare('INSERT INTO users (username,user_password) VALUES (:uname,:pass)' );
    $insertUser->bindvalue(':uname',$_POST['user_name']);
    $insertUser->bindvalue(':pass',$_POST['user_pass']);
    $insertUser->execute();
     print_r($_POST);
   }
?>




<script>
  
  var modaluser=document.getElementById('id05User');
  window.onclick=function(event){
      if(event.target==modal5){
        modal.style.display="none";
      }
  }
</script>
<script  type="text/javascript">
   // TODO HIDDEN THE FIELD SEARCH FROM HEADER WHEN MOVE TO THIS PAGE
     var hidSearch=document.getElementById("hiddenSearch");
     hidSearch.style.cssText="display:none";
   </script>