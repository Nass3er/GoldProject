
<?php   

 /**  @var $pdo \PDO */
  require_once "../../database.php";

 
   

  $stmt=$pdo->prepare('SELECT * FROM invoice WHERE id=:id');
  $stmt->bindValue(':id',$id);
  
  $stmt->execute();
$invoice =$stmt->fetch(PDO::FETCH_ASSOC);
 


?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../finalInvoice.css">
</head>
<body>
<div class="cont">

    <div class="header">
        <div class="left">
            <h2>NASSER ALABBASI</h1>
            <div>442 drive</div>
            <div>NY 012210</div>
        </div>
        <div class="icon">
           <span>LOGO</span> 
        </div>
         
        
    </div>
    <hr class="hr">

    <div class="info">
        <div class="dist">
            <h4>bill To</h4>
            <div>yasser jone</div>
            <div>4312 mood Roud</div>
            <div>Taiz time NY 1007165</div>
        </div>

        <div class="dist">
            <h4>ship To</h4>
            <div>yasser jone</div>
            <div>4312 mood Roud</div>
            <div>Taiz time NY 1007165</div>
        </div>

        <div class="endinfo">
                <div class="one">
                    <h4>Invoice Date</h4>
                    <h4>P.I.O#</h4>
                    <h4>Due Date</h4>
                </div>

                <div class="two">
                    <div>2022/5/20</div>
                    <div>2022/5/20</div>
                    <div>2022/5/20</div>
                </div>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                
                <th scope="col">item</th>
                <th scope="col">quantity</th>
                <th scope="col">description</th>
                <th scope="col">wieght</th> 
                <th scope="col"> price</th>
                  
                
  
            </tr>
        </thead>
        <tbody>
   
                 
          <tr>
       
                <td>nabasgfgds </td>
                <td> nabasgfgds</td>
                <td>nabasgfgdssdbsds ddbjflkdw mjwe;lfnwe wel;ewm;lwef we fnwel </td>
                <td> nabasgfgds</td> 
                <td> nabasgfgds</td>
         
         </tr>
         <tr>
       
            <td>nabasgfgds </td>
            <td> nabasgfgds</td>
            <td>nabasgfgds cx n,mjer  rew porjwe jpoewjwen</td>
            <td> nabasgfgds</td> 
            <td> nabasgfgds</td>
     
     </tr>
     <tr>
       
        <td>nabasgfgds </td>
        <td> nabasgfgds</td> 
        <td> nabasgfgds</td>
        <td > nabasgfgds</td>
        <td> nabasgfgds</td>
 
 </tr>

        </tbody>
 
     </table>
 
</div>
</body>
</html>