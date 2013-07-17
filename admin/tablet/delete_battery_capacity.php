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

echo '<option value="0" selected="selected">Емкость аккумулятора</option>';


$batteryCapacityId = htmlspecialchars(trim($_POST['id_battery_capacity']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteBatteryCapacityTablet = mysql_query("DELETE FROM battery_capacity_system_block WHERE battery_capacity_system_block.id_system_block = " . $idTablet . " AND battery_capacity_system_block.id_battery_capacity = " . $battery_capacityId, $db);
    $resultSelectBatteryCapacity = mysql_query("SELECT battery_capacity.* FROM  battery_capacity, battery_capacity_system_block WHERE battery_capacity.id= battery_capacity_system_block.id_battery_capacity  AND battery_capacity_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteBatteryCapacityTablet = mysql_query("DELETE FROM battery_capacity_tablet WHERE battery_capacity_tablet.id_battery_capacity = " . $batteryCapacityId, $db);
    $resultSelectBatteryCapacity = mysql_query("SELECT battery_capacity_tablet.* FROM battery_capacity_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectBatteryCapacity))
{
    echo  '<option value="'.  $row['id_battery_capacity'].'">' . $row['name_battery_capacity'] .  '</option>';
}

