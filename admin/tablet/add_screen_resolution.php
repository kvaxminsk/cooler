<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Разрешение экрана</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertScreenResolutionTablet = mysql_query("INSERT INTO screen_resolution_system_block (`id_screen_resolution` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_screen_resolution'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectScreenResolution = mysql_query("SELECT screen_resolution.* FROM  screen_resolution, screen_resolution_system_block WHERE screen_resolution.id= screen_resolution_system_block.id_screen_resolution  AND screen_resolution_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertScreenResolutionTablet = mysql_query("INSERT INTO screen_resolution_system_block (`id_screen_resolution` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_screen_resolution'] ."','" . 0 . "')");
        $resultSelectScreenResolution = mysql_query("SELECT screen_resolution.* FROM  screen_resolution, screen_resolution_system_block WHERE screen_resolution.id= screen_resolution_system_block.id_screen_resolution  AND screen_resolution_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectScreenResolution))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_screen_resolution'] . ' Core ' . $row['number_cores_screen_resolution'] . ' ' . $row['speed_screen_resolution'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Разрешение экрана</option>';
    $nameScreenResolution = htmlspecialchars(trim($_POST['name_screen_resolution']));


    $resultInsertScreenResolution = mysql_query("INSERT INTO screen_resolution_tablet (`name_screen_resolution`) VALUES ( '" . $nameScreenResolution ."')") ;
    $resultSelectScreenResolution = mysql_query("SELECT screen_resolution_tablet.* FROM  screen_resolution_tablet " , $db);
//var_dump("SELECT screen_resolution_tablet.* FROM  screen_resolution_tablet ");die();
    while($row = mysql_fetch_assoc($resultSelectScreenResolution))
    {
        echo  '<option value="'.  $row['id_screen_resolution'].'">' . $row['name_screen_resolution'] .  '</option>';
    }
}

