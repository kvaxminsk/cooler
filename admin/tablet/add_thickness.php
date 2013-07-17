<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Толщина</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertThicknessTablet = mysql_query("INSERT INTO thickness_system_block (`id_thickness` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_thickness'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectThickness = mysql_query("SELECT thickness.* FROM  thickness, thickness_system_block WHERE thickness.id= thickness_system_block.id_thickness  AND thickness_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertThicknessTablet = mysql_query("INSERT INTO thickness_system_block (`id_thickness` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_thickness'] ."','" . 0 . "')");
        $resultSelectThickness = mysql_query("SELECT thickness.* FROM  thickness, thickness_system_block WHERE thickness.id= thickness_system_block.id_thickness  AND thickness_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectThickness))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_thickness'] . ' Core ' . $row['number_cores_thickness'] . ' ' . $row['speed_thickness'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Толщина</option>';
    $nameThickness = htmlspecialchars(trim($_POST['name_thickness']));


    $resultInsertThickness = mysql_query("INSERT INTO thickness_tablet (`name_thickness`) VALUES ( '" . $nameThickness ."')") ;
    $resultSelectThickness = mysql_query("SELECT thickness_tablet.* FROM  thickness_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectThickness))
    {
        echo  '<option value="'.  $row['id_thickness'].'">' . $row['name_thickness'] .  '</option>';
    }
}

