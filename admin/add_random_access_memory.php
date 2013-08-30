<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

if (isset($_POST['id_existing_random_access_memory'])) {
    echo '<option value="0" selected="selected">Оперативная память</option>';
    if ((isset($_POST['id_system_block']))) {
        $resultInsertRandomAccessMemorySystemBlock = mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_random_access_memory'] . "','" . $_POST['id_system_block'] . "')");
        $resultSelectRandomAccessMemory = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory  AND random_access_memory_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    } else {
        $resultInsertRandomAccessMemorySystemBlock = mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_random_access_memory'] . "','" . 0 . "')");
        $resultSelectRandomAccessMemory = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory  AND random_access_memory_system_block.id_system_block = " . 0, $db);
    }
    while ($row = mysql_fetch_assoc($resultSelectRandomAccessMemory)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
    }
} elseif (isset($_POST['id_random_access_memory'])) {
    $idRandomAccessMemory = (int)htmlspecialchars(trim($_POST['id_random_access_memory']));
    $nameRandomAccessMemory = htmlspecialchars(trim($_POST['name_random_access_memory']));
    $sizeRandomAccessMemory = htmlspecialchars(trim($_POST['size_random_access_memory']));
    mysql_query("UPDATE random_access_memory SET size_random_access_memory='" . $sizeRandomAccessMemory . "' WHERE id=" . $idRandomAccessMemory);
    mysql_query("UPDATE random_access_memory SET name_random_access_memory= '" . $nameRandomAccessMemory . "' WHERE id=" . $idRandomAccessMemory);
    header("Location:/admin/list_random_access_memory.php");
} else {

    echo '<option value="0" selected="selected">Оперативная память</option>';
    /*$resultInsert = mysql_query("INSERT INTO random_access_memory (`name_random_access_memory`, `size_random_access_memory` ) VALUES ('" .$_POST['name_random_access_memory'] ."','"  . $_POST['size_random_access_memory'] . "')") ;
    $resultSelect = mysql_query("SELECT * FROM  random_access_memory", $db);

    while($row = mysql_fetch_assoc($resultSelect))
    {
        echo  '<option value="'.  $row['id'].'"> '. $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
    }*/

    $nameRandomAccessMemorySystem = htmlspecialchars(trim($_POST['name_random_access_memory']));
    $sizeRandomAccessMemorySystem = htmlspecialchars(trim($_POST['size_random_access_memory']));

    $resultSelectRandomAccessMemorySystem = mysql_query("SELECT * FROM random_access_memory WHERE name_random_access_memory='" . $nameRandomAccessMemorySystem . "' AND size_random_access_memory='" . $sizeRandomAccessMemorySystem . "'");

    $row = mysql_fetch_assoc($resultSelectRandomAccessMemorySystem);

    if (!$row) {
        $resultInsertRandomAccessMemorySystem = mysql_query("INSERT INTO random_access_memory (`name_random_access_memory` ,`size_random_access_memory`) VALUES ( '" . $nameRandomAccessMemorySystem . "','" . $sizeRandomAccessMemorySystem . "')");
        $idRandomAccessMemorySystem = mysql_insert_id();
        $resultInsertRandomAccessMemorySystemBlock = mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $idRandomAccessMemorySystem . "','" . 0 . "')");
    } else {
        $idRandomAccessMemorySystem = $row['id'];
        $resultSelectRandomAccessMemorySystemBlockAdd = mysql_query("SELECT * FROM random_access_memory_system_block WHERE id_system_block =" . 0 . " AND id_random_access_memory =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectRandomAccessMemorySystemBlockAdd);
        if (!$rowAddId) {
            $resultInsertRandomAccessMemorySystemBlock = mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $idRandomAccessMemorySystem . "','" . 0 . "')");
        }
    }


    $resultSelectRandomAccessMemorySystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM random_access_memory_system_block WHERE id_random_access_memory IN(SELECT  id_random_access_memory FROM random_access_memory_system_block WHERE id_system_block = " . 0 . " AND id_random_access_memory<>" . $idRandomAccessMemorySystem . ") AND id_system_block <> " . 0);

    while ($row = mysql_fetch_assoc($resultSelectRandomAccessMemorySystemBlock)) {
        $resultSelectRandomAccessMemorySystemBlockId = mysql_query("SELECT id_random_access_memory FROM random_access_memory_system_block WHERE id_random_access_memory=" . $idRandomAccessMemorySystem . " AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectRandomAccessMemorySystemBlockId);
        if (!$rowId) {
            mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $idRandomAccessMemorySystem . "','" . $row['id_system_block'] . "')");
        } elseif ($rowId['id_system_block'] <> 0) {
            $resultInsertRandomAccessMemorySystemBlock = mysql_query("INSERT INTO random_access_memory_system_block (`id_random_access_memory` ,`id_system_block` ) VALUES ( '" . $idRandomAccessMemorySystem . "','" . 0 . "')");
        }
    }

    $resultSelectRandomAccessMemorySystem = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory  AND random_access_memory_system_block.id_system_block = " . 0, $db);

    while ($row = mysql_fetch_assoc($resultSelectRandomAccessMemorySystem)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
    }
}