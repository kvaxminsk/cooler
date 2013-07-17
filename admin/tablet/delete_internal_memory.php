<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include ("../lock.php");
include ("../blocks/bd.php"); /*Connecting to BD!*/

echo '<option value="0" selected="selected">Внутренняя память</option>';


$internalMemoryId = htmlspecialchars(trim($_POST['id_internal_memory']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteInternalMemoryTablet = mysql_query("DELETE FROM internal_memory_system_block WHERE internal_memory_system_block.id_system_block = " . $idTablet . " AND internal_memory_system_block.id_internal_memory = " . $internal_memoryId, $db);
    $resultSelectInternalMemory = mysql_query("SELECT internal_memory.* FROM  internal_memory, internal_memory_system_block WHERE internal_memory.id= internal_memory_system_block.id_internal_memory  AND internal_memory_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteInternalMemoryTablet = mysql_query("DELETE FROM internal_memory_tablet WHERE internal_memory_tablet.id_internal_memory = " . $internalMemoryId, $db);
    $resultSelectInternalMemory = mysql_query("SELECT internal_memory_tablet.* FROM internal_memory_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectInternalMemory))
{
    echo  '<option value="'.  $row['id_internal_memory'].'">' . $row['name_internal_memory'] .  '</option>';
}

