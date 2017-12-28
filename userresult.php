<?php


$group = $_POST['sex'];

require 'config.php';

$city = $_POST['city'];
$req=$_POST['req'];

$query = $db->query("SELECT `name`,`address` FROM `inventory` WHERE city= \"".$city."\" and ".$req." < (SELECT `".$group."` FROM `inventory` WHERE city= \"".$city."\")");

$group = $query->fetch(PDO::FETCH_ASSOC);

if(!empty($group))
{
    $count = count($group);
    for($i=0;$i<$count;$i++)
    {
        ?>


<table>
    <tr><?=$group['name'];?></tr>
    <tr><?=$group['address'];?></tr>
</table>

<?php
    }
}


?>
