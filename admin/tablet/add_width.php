<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Ширина</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertWidthTablet = mysql_query("INSERT INTO width_system_block (`id_width` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_width'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectWidth = mysql_query("SELECT width.* FROM  width, width_system_block WHERE width.id= width_system_block.id_width  AND width_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertWidthTablet = mysql_query("INSERT INTO width_system_block (`id_width` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_width'] ."','" . 0 . "')");
        $resultSelectWidth = mysql_query("SELECT width.* FROM  width, width_system_block WHERE width.id= width_system_block.id_width  AND width_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectWidth))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_width'] . ' Core ' . $row['number_cores_width'] . ' ' . $row['speed_width'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Ширина</option>';
    $nameWidth = htmlspecialchars(trim($_POST['name_width']));


    $resultInsertWidth = mysql_query("INSERT INTO width_tablet (`name_width`) VALUES ( '" . $nameWidth ."')") ;
    $resultSelectWidth = mysql_query("SELECT width_tablet.* FROM  width_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectWidth))
    {
        echo  '<option value="'.  $row['id_width'].'">' . $row['name_width'] .  '</option>';
    }
}

