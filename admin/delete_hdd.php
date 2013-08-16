<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/

echo '<option value="0" selected="selected">Жесткий диск</option>';


$idSystemBlock =htmlspecialchars(trim($_POST['id_system_block']));
if(isset($_POST['id_system_block']))
{
    $resultDeleteHddSystemBlock = mysql_query("DELETE FROM hdd_system_block WHERE hdd_system_block.id_system_block = " . $idSystemBlock . " AND hdd_system_block.id_hdd = " .  $_POST['hdd_id'], $db);
    $resultSelectHdd = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd  AND hdd_system_block.id_system_block = " . $idSystemBlock , $db);
}
else
{
    $resultDeleteHddSystemBlock = mysql_query("DELETE FROM hdd_system_block WHERE hdd_system_block.id_system_block = " . 0 . " AND hdd_system_block.id_hdd = " .  $_POST['hdd_id'], $db);
    $resultSelectHdd = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd  AND hdd_system_block.id_system_block = " . 0 , $db);
}
while($row = mysql_fetch_assoc($resultSelectHdd))
{
    echo  '<option value="'.  $row['id'].'"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
}


