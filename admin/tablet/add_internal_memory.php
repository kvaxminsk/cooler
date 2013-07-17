<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Внутренняя память</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertInternalMemoryTablet = mysql_query("INSERT INTO internal_memory_system_block (`id_internal_memory` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_internal_memory'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectInternalMemory = mysql_query("SELECT internal_memory.* FROM  internal_memory, internal_memory_system_block WHERE internal_memory.id= internal_memory_system_block.id_internal_memory  AND internal_memory_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertInternalMemoryTablet = mysql_query("INSERT INTO internal_memory_system_block (`id_internal_memory` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_internal_memory'] ."','" . 0 . "')");
        $resultSelectInternalMemory = mysql_query("SELECT internal_memory.* FROM  internal_memory, internal_memory_system_block WHERE internal_memory.id= internal_memory_system_block.id_internal_memory  AND internal_memory_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectInternalMemory))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_internal_memory'] . ' Core ' . $row['number_cores_internal_memory'] . ' ' . $row['speed_internal_memory'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Внутренняя память</option>';
    $nameInternalMemory = htmlspecialchars(trim($_POST['name_internal_memory']));


    $resultInsertInternalMemory = mysql_query("INSERT INTO internal_memory_tablet (`name_internal_memory`) VALUES ( '" . $nameInternalMemory ."')") ;
    $resultSelectInternalMemory = mysql_query("SELECT internal_memory_tablet.* FROM  internal_memory_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectInternalMemory))
    {
        echo  '<option value="'.  $row['id_internal_memory'].'">' . $row['name_internal_memory'] .  '</option>';
    }
}

