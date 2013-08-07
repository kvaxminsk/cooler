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

echo '<option value="0" selected="selected">Тактовая частота</option>';


$clock_speedId = htmlspecialchars(trim($_POST['id_clock_speed']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM clock_speed_system_block WHERE clock_speed_system_block.id_system_block = " . $idTablet . " AND clock_speed_system_block.id_clock_speed = " . $clock_speedId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT clock_speed.* FROM  clock_speed, clock_speed_system_block WHERE clock_speed.id= clock_speed_system_block.id_clock_speed  AND clock_speed_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM clock_speed_tablet WHERE clock_speed_tablet.id_clock_speed = " . $clock_speedId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT clock_speed_tablet.* FROM clock_speed_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectScreenResolution))
{
    echo  '<option value="'.  $row['id_clock_speed'].'">' . $row['name_clock_speed'] .  '</option>';
}

