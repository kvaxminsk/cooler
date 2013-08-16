<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/

if(isset($_POST['id_existing_computer_case']))
{
    echo '<option value="0" selected="selected">Корпус</option>';
    if((isset($_POST['id_system_block'])))
    {
        $resultInsertComputerCaseSystemBlock = mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_computer_case'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectComputerCase = mysql_query("SELECT computer_case.* FROM   computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case  AND computer_case_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertComputerCaseSystemBlock = mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_computer_case'] ."','" . 0 . "')");
        $resultSelectComputerCase = mysql_query("SELECT computer_case.* FROM   computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case  AND computer_case_system_block.id_system_block = " . 0, $db);
    }
    while($row = mysql_fetch_assoc($resultSelectComputerCase))
    {
        echo  '<option value="'.  $row['id'].'">'. $row['name_computer_case'].'</option>';
    }
}
elseif (isset($_POST['id_computer_case']))
{
    $idComputerCase = (int) htmlspecialchars(trim($_POST['id_computer_case']));
    $nameComputerCase = htmlspecialchars(trim($_POST['name_computer_case']));
    $sizeComputerCase = htmlspecialchars(trim($_POST['size_computer_case']));
    mysql_query("UPDATE computer_case SET name_computer_case= '" .  $nameComputerCase . "' WHERE id=" . $idComputerCase);

    header("Location:/admin/list_computer_case.php")  ;
}
else
{

    echo '<option value="0" selected="selected">Корпус</option>';

    $nameComputerCase = htmlspecialchars(trim($_POST['name_computer_case']));
    
    $resultSelectComputerCase = mysql_query("SELECT * FROM computer_case WHERE name_computer_case='" . $nameComputerCase .  "'");
    
    $row = mysql_fetch_assoc($resultSelectComputerCase);
    
    if(!$row)
    {
        $resultInsertComputerCase = mysql_query("INSERT INTO computer_case (`name_computer_case`) VALUES ( '" . $nameComputerCase . "')") ;
        $idComputerCase = mysql_insert_id();
        $resultInsertComputerCaseSystemBlock = mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $idComputerCase ."','" . 0 . "')");
    }
    else
    {
        $idComputerCase = $row['id'];
        $resultSelectComputerCaseSystemBlockAdd = mysql_query("SELECT * FROM computer_case_system_block WHERE id_system_block =" . 0 . " AND id_computer_case =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectComputerCaseSystemBlockAdd);
        if(!$rowAddId)
        {
            $resultInsertComputerCaseSystemBlock = mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $idComputerCase ."','" . 0 . "')");
        }
    }
    
    
    
    
    $resultSelectComputerCaseSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM computer_case_system_block WHERE id_computer_case IN(SELECT  id_computer_case FROM computer_case_system_block WHERE id_system_block = " . 0 . " AND id_computer_case<>" . $idComputerCase . ") AND id_system_block <> " . 0);
    
    while($row = mysql_fetch_assoc($resultSelectComputerCaseSystemBlock))
    {
        $resultSelectComputerCaseSystemBlockId = mysql_query("SELECT id_computer_case FROM computer_case_system_block WHERE id_computer_case=" .$idComputerCase ." AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectComputerCaseSystemBlockId);
        if(!$rowId)
        {
            mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $idComputerCase ."','" . $row['id_system_block'] . "')");
        }
        elseif($rowId['id_system_block'] <> 0)
        {
            $resultInsertComputerCaseSystemBlock = mysql_query("INSERT INTO computer_case_system_block (`id_computer_case` ,`id_system_block` ) VALUES ( '" . $idComputerCase ."','" . 0 . "')");
        }
    }
    
    $resultSelectComputerCase = mysql_query("SELECT computer_case.* FROM   computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case  AND computer_case_system_block.id_system_block = " . 0  , $db);
    
    while($row = mysql_fetch_assoc($resultSelectComputerCase))
    {
        echo  '<option value="'.  $row['id'].'">'. $row['name_computer_case'].'</option>';
    }
}