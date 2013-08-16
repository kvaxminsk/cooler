<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Количество активных пикселей фронтальной камеры</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO number_of_active_pixels_front_camera_block (`id_number_of_active_pixels_front_camera` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_active_pixels_front_camera'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_front_camera.* FROM  number_of_active_pixels_front_camera, number_of_active_pixels_front_camera_block WHERE number_of_active_pixels_front_camera.id= number_of_active_pixels_front_camera_block.id_number_of_active_pixels_front_camera  AND number_of_active_pixels_front_camera_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO number_of_active_pixels_front_camera_block (`id_number_of_active_pixels_front_camera` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_active_pixels_front_camera'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_front_camera.* FROM  number_of_active_pixels_front_camera, number_of_active_pixels_front_camera_block WHERE number_of_active_pixels_front_camera.id= number_of_active_pixels_front_camera_block.id_number_of_active_pixels_front_camera  AND number_of_active_pixels_front_camera_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_number_of_active_pixels_front_camera'] . ' Core ' . $row['number_cores_number_of_active_pixels_front_camera'] . ' ' . $row['speed_number_of_active_pixels_front_camera'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Количество активных пикселей фронтальной камеры</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_number_of_active_pixels_front_camera']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO number_of_active_pixels_front_camera_tablet (`name_number_of_active_pixels_front_camera`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_front_camera_tablet.* FROM  number_of_active_pixels_front_camera_tablet " , $db);
//var_dump("INSERT INTO number_of_active_pixels_front_camera_tablet (`name_number_of_active_pixels_front_camera`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_number_of_active_pixels_front_camera'].'">' . $row['name_number_of_active_pixels_front_camera'] .  '</option>';
    }
}

