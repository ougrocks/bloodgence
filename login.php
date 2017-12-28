<?php 

require 'config.php';


?>

<html>
    <head>
        <title>Blood Bank</title>
        
    </head>
    <body>
        <form action="bank.php" method="post">
        <label>Username</label> 
        <input type="textbox" name="username" placeholder="Username" /><br> <br>
        <label>Password</label> 
        <input type="textbox" name="password" placeholder="Password" /><br> <br>
        
        <button type="submit">Login</button>
        </form>
    </body>
</html>