<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/

if(isset($_POST['id_existing_motherboard']))
{
    echo '<option value="0" selected="selected">Материнская плата</option>';
    if((isset($_POST['id_system_block'])))
    {
        $resultInsertMotherboardSystemBlock = mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_motherboard'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectMotherboard = mysql_query("SELECT motherboard.* FROM   motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard  AND motherboard_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertMotherboardSystemBlock = mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_motherboard'] ."','" . 0 . "')");
        $resultSelectMotherboard = mysql_query("SELECT motherboard.* FROM   motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard  AND motherboard_system_block.id_system_block = " . 0, $db);
    }
    while($row = mysql_fetch_assoc($resultSelectMotherboard))
    {
        echo  '<option value="'.  $row['id'].'">'. $row['name_motherboard'].'</option>';
    }
}
elseif (isset($_POST['id_motherboard']))
{
    $idMotherboard = (int) htmlspecialchars(trim($_POST['id_motherboard']));
    $nameMotherboard = htmlspecialchars(trim($_POST['name_motherboard']));;
    mysql_query("UPDATE motherboard SET name_motherboard='" . $nameMotherboard . "' WHERE id=" . $idMotherboard);

    header("Location:/admin/list_motherboard.php")  ;
}
else
{

    echo '<option value="0" selected="selected">Материнская плата</option>';

    $nameMotherboard = htmlspecialchars(trim($_POST['name_motherboard']));
    
    $resultSelectMotherboard = mysql_query("SELECT * FROM motherboard WHERE name_motherboard='" . $nameMotherboard .  "'");
    
    $row = mysql_fetch_assoc($resultSelectMotherboard);
    
    if(!$row)
    {
        $resultInsertMotherboard = mysql_query("INSERT INTO motherboard (`name_motherboard`) VALUES ( '" . $nameMotherboard . "')") ;
        $idMotherboard = mysql_insert_id();
        $resultInsertMotherboardSystemBlock = mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $idMotherboard ."','" . 0 . "')");
    }
    else
    {
        $idMotherboard = $row['id'];
        $resultSelectMotherboardSystemBlockAdd = mysql_query("SELECT * FROM motherboard_system_block WHERE id_system_block =" . 0 . " AND id_motherboard =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectMotherboardSystemBlockAdd);
        if(!$rowAddId)
        {
            $resultInsertMotherboardSystemBlock = mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $idMotherboard ."','" . 0 . "')");
        }
    }
    
    
    
    
    $resultSelectMotherboardSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM motherboard_system_block WHERE id_motherboard IN(SELECT  id_motherboard FROM motherboard_system_block WHERE id_system_block = " . 0 . " AND id_motherboard<>" . $idMotherboard . ") AND id_system_block <> " . 0);
    
    while($row = mysql_fetch_assoc($resultSelectMotherboardSystemBlock))
    {
        $resultSelectMotherboardSystemBlockId = mysql_query("SELECT id_motherboard FROM motherboard_system_block WHERE id_motherboard=" .$idMotherboard ." AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectMotherboardSystemBlockId);
        if(!$rowId)
        {
            mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $idMotherboard ."','" . $row['id_system_block'] . "')");
        }
        elseif($rowId['id_system_block'] <> 0)
        {
            $resultInsertMotherboardSystemBlock = mysql_query("INSERT INTO motherboard_system_block (`id_motherboard` ,`id_system_block` ) VALUES ( '" . $idMotherboard ."','" . 0 . "')");
        }
    }
    
    $resultSelectMotherboard = mysql_query("SELECT motherboard.* FROM   motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard  AND motherboard_system_block.id_system_block = " . 0, $db);
    
    while($row = mysql_fetch_assoc($resultSelectMotherboard))
    {
        echo  '<option value="'.  $row['id'].'">'. $row['name_motherboard'].'</option>';
    }
}
    
