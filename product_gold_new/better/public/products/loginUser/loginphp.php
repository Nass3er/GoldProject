
<?php
 

 $pdo=new PDO('mysql:host=localhost;port=3306;dbname=golddb','m','m');
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
 $errLogin=[];
 if(isset($_GET['action']) and $_GET['action']=='submit'){
    if (isset($_POST['username']) and $_POST['username'] !=null and
      isset($_POST['pass']) and $_POST['pass'] !=null )
      {
        $username=preg_replace('/[^a-zA-Z0-9._-]/','',$_POST['username']);
          $pass=preg_replace('/[^a-zA-Z0-9._-]/','',$_POST['pass']);
           echo $username;
    }
  }
  exit;
//  $username=$_POST['username'];
//  $pass=$_POST['pass'] ;
 
 

  function  checkUser(){
   
   
     if(isset($_POST['username']) and $_POST['username'] !=null ){
     
            $stlog=$pdo->prepare('SELECT username,user_password FROM users WHERE username=:username AND user_password=:pass');
            $stlog->bindValue(':username',$username);
            $stlog->bindValue(':pass',$pass);
            $stlog->execute();
            
            $count=$stlog->rowCount();  // to do counter the row that return  from database by query

            if($count>0){
                
            return true;

            } else{

              return false;
            }

        
    
        
     } else{
        return false;
         }
    }
     
       
     
 
  
 ?>
 