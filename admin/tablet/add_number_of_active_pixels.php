<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Количество активных пикселей</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO number_of_active_pixels_block (`id_number_of_active_pixels` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_active_pixels'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels.* FROM  number_of_active_pixels, number_of_active_pixels_block WHERE number_of_active_pixels.id= number_of_active_pixels_block.id_number_of_active_pixels  AND number_of_active_pixels_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO number_of_active_pixels_block (`id_number_of_active_pixels` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_active_pixels'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels.* FROM  number_of_active_pixels, number_of_active_pixels_block WHERE number_of_active_pixels.id= number_of_active_pixels_block.id_number_of_active_pixels  AND number_of_active_pixels_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_number_of_active_pixels'] . ' Core ' . $row['number_cores_number_of_active_pixels'] . ' ' . $row['speed_number_of_active_pixels'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Количество активных пикселей</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_number_of_active_pixels']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO number_of_active_pixels_tablet (`name_number_of_active_pixels`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_tablet.* FROM  number_of_active_pixels_tablet " , $db);
//var_dump("INSERT INTO number_of_active_pixels_tablet (`name_number_of_active_pixels`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_number_of_active_pixels'].'">' . $row['name_number_of_active_pixels'] .  '</option>';
    }
}

