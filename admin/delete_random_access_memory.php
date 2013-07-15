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

echo '<option value="0" selected="selected">Оперативная память</option>';

$idSystemBlock =htmlspecialchars(trim($_POST['id_system_block']));
if(isset($_POST['id_system_block']))
{
    $resultDeleteRandomAccessMemorySystemBlock = mysql_query("DELETE FROM random_access_memory_system_block WHERE random_access_memory_system_block.id_system_block = " . $idSystemBlock . " AND random_access_memory_system_block.id_random_access_memory = " .  $_POST['random_access_memory_id'], $db);

    $resultSelectRandomAccessMemorySystem = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory  AND random_access_memory_system_block.id_system_block = " . $idSystemBlock, $db);

}
else
{
    $resultDeleteRandomAccessMemorySystemBlock = mysql_query("DELETE FROM random_access_memory_system_block WHERE random_access_memory_system_block.id_system_block = " . 0 . " AND random_access_memory_system_block.id_random_access_memory = " .  $_POST['random_access_memory_id'], $db);
    $resultSelectRandomAccessMemorySystem = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory  AND random_access_memory_system_block.id_system_block = " . 0 , $db);
}
while($row = mysql_fetch_assoc($resultSelectRandomAccessMemorySystem))
{
    echo  '<option value="'.  $row['id'].'"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
}


