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

echo '<option value="0" selected="selected">Разрешение экрана</option>';


$screen_resolutionId = htmlspecialchars(trim($_POST['id_screen_resolution']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM screen_resolution_system_block WHERE screen_resolution_system_block.id_system_block = " . $idTablet . " AND screen_resolution_system_block.id_screen_resolution = " . $screen_resolutionId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT screen_resolution.* FROM  screen_resolution, screen_resolution_system_block WHERE screen_resolution.id= screen_resolution_system_block.id_screen_resolution  AND screen_resolution_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM screen_resolution_tablet WHERE screen_resolution_tablet.id_screen_resolution = " . $screen_resolutionId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT screen_resolution_tablet.* FROM screen_resolution_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectScreenResolution))
{
    echo  '<option value="'.  $row['id_screen_resolution'].'">' . $row['name_screen_resolution'] .  '</option>';
}

