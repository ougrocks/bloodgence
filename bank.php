
<?php 

if(empty($_POST) === false)
{
require 'config.php';


$user = $_POST['username'];
$pass = $_POST['password'];


$query  =   $db->query("SELECT `username`,`password` FROM `inventory` WHERE `username` = '".$user."' and `password` = '".$pass."' ");
         if(!empty($query))
         {
             $count= $query->rowCount();
             if($count != 0)
                 
             {
                 session_start();

                $_SESSION['username']= $user;
               

                 $blood = $db->query("SELECT `A+`,`A-`,`B+`,`B-`,`O+`,`O-`,`AB+`,`AB-` FROM `inventory` WHERE `username` = '".$user."'");
        
                    $group = $blood->fetch(PDO::FETCH_ASSOC);
                   
?>

<html>
    <head>
        <title>Blood Bank</title>
        
    </head>
    <body>
        <form action="update.php" method="post">
        <label>A+ Quantity</label> 
        <input type="textbox" name="a+quantity" placeholder="A+ Quantity" value=" <?=$group['A+'];?>" /><br> <br>
        <label>A- Quantity</label> 
        <input type="textbox" name="a-quantity" placeholder="A- Quantity" value=" <?=$group['A-'];?>"/><br> <br>
        <label>B+ Quantity</label> 
        <input type="textbox" name="b+quantity" placeholder="B+ Quantity" value=" <?=$group['B+'];?>"/><br> <br>
        <label>B- Quantity</label> 
        <input type="textbox" name="b-quantity" placeholder="B- Quantity" value=" <?=$group['B-'];?>"/><br> <br>
        <label>O+ Quantity</label> 
        <input type="textbox" name="o+quantity" placeholder="O+ Quantity" value=" <?=$group['O+'];?>"/><br> <br>
        <label>O- Quantity</label> 
        <input type="textbox" name="o-quantity" placeholder="O- Quantity" value=" <?=$group['O-'];?>"/><br> <br>
        <label>AB+ Quantity</label> 
        <input type="textbox" name="ab+quantity" placeholder="AB+ Quantity" value=" <?=$group['AB+'];?>"/><br> <br>
        <label>AB- Quantity</label> 
        <input type="textbox" name="ab-quantity" placeholder="AB- Quantity" value=" <?=$group['AB-'];?>"/><br> <br>
        
        
     
        
        
        <button type="submit" >Update Blood Group Inventory</button>
        </form>
        
        </body>
    
</html>

<?php
  }
  else {
  header("location:login.php");
     
  }
         }
 
}

 else {

    header("location:login.php");
}
?>