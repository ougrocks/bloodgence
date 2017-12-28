<html>
    
    <head>
        <title>
            Search Your Blood Group
        </title>
    </head>
    <body>
         <form action="userresult.php" method="post">
             
            
             <div id="geo" class="geolocation_data" style="display: none" ></div>
             <!--<a href="userresult.php?action=a1"><input type="button"  value="A+"/></a>
             <a href="userresult.php?action=a2"><input type="button"  value="A-"/></a>
             <a href="userresult.php?action=b1"><input type="button"  value="B+"/></a>
             <a href="userresult.php?action=b2"><input type="button"  value="B-"/></a>
             <a href="userresult.php?action=o1"><input type="button"  value="O+"/></a>
             <a href="userresult.php?action=o2"><input type="button" value="O-"/></a>
             <a href="userresult.php?action=ab1"><input type="button"  value="AB+"/></a>
             <a href="userresult.php?action=ab2"><input type="button"  value="AB-"/></a>-->
             
             <input type="radio" name="sex" value="A+">A+<br><br>
            <input type="radio" name="sex" value="A-">A-<br><br>
            <input type="radio" name="sex" value="B+">B+<br><br>
            <input type="radio" name="sex" value="B-">B-<br><br>
            <input type="radio" name="sex" value="O+">O+<br><br>
            <input type="radio" name="sex" value="O-">O-<br><br>
            <input type="radio" name="sex" value="AB+">AB+<br><br>
            <input type="radio" name="sex" value="AB-">AB-<br><br>
             <input type="textbox" name="req" placeholder="Required Unit of Blood" />
             
             <input type="submit" value="fetch" />
             
         </form>
        
    </body>
    <script type="text/JavaScript" src="js/geo.js"></script>
</html>