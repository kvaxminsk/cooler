<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Тактовая частота</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO clock_speed_block (`id_clock_speed` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_clock_speed'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT clock_speed.* FROM  clock_speed, clock_speed_block WHERE clock_speed.id= clock_speed_block.id_clock_speed  AND clock_speed_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO clock_speed_block (`id_clock_speed` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_clock_speed'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT clock_speed.* FROM  clock_speed, clock_speed_block WHERE clock_speed.id= clock_speed_block.id_clock_speed  AND clock_speed_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_clock_speed'] . ' Core ' . $row['number_cores_clock_speed'] . ' ' . $row['speed_clock_speed'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Тактовая частота</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_clock_speed']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO clock_speed_tablet (`name_clock_speed`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT clock_speed_tablet.* FROM  clock_speed_tablet " , $db);
//var_dump("INSERT INTO clock_speed_tablet (`name_clock_speed`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_clock_speed'].'">' . $row['name_clock_speed'] .  '</option>';
    }
}

