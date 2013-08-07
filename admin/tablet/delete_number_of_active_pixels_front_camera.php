<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include ("../lock.php");
include ("../blocks/bd.php"); /*Connecting to BD!*/

echo '<option value="0" selected="selected">Количество активных пикселей фронтальной камеры</option>';


$number_of_active_pixels_front_cameraId = htmlspecialchars(trim($_POST['id_number_of_active_pixels_front_camera']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM number_of_active_pixels_front_camera_system_block WHERE number_of_active_pixels_front_camera_system_block.id_system_block = " . $idTablet . " AND number_of_active_pixels_front_camera_system_block.id_number_of_active_pixels_front_camera = " . $number_of_active_pixels_front_cameraId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_front_camera.* FROM  number_of_active_pixels_front_camera, number_of_active_pixels_front_camera_system_block WHERE number_of_active_pixels_front_camera.id= number_of_active_pixels_front_camera_system_block.id_number_of_active_pixels_front_camera  AND number_of_active_pixels_front_camera_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM number_of_active_pixels_front_camera_tablet WHERE number_of_active_pixels_front_camera_tablet.id_number_of_active_pixels_front_camera = " . $number_of_active_pixels_front_cameraId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT number_of_active_pixels_front_camera_tablet.* FROM number_of_active_pixels_front_camera_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
{
    echo  '<option value="'.  $row['id_number_of_active_pixels_front_camera'].'">' . $row['name_number_of_active_pixels_front_camera'] .  '</option>';
}

