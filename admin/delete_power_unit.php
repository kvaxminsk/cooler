<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/

echo '<option value="0" selected="selected">Блок питания</option>';

$idSystemBlock =htmlspecialchars(trim($_POST['id_system_block']));
if(isset($_POST['id_system_block']))
{
    $resultDeletePowerUnitSystemBlock = mysql_query("DELETE FROM power_unit_system_block WHERE power_unit_system_block.id_system_block = " . $idSystemBlock . " AND power_unit_system_block.id_power_unit = " .  $_POST['power_unit_id'], $db);

    $resultSelectPowerUnit = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id= power_unit_system_block.id_power_unit  AND power_unit_system_block.id_system_block = " . $idSystemBlock , $db);

}
else
{
    $resultDeletePowerUnitSystemBlock = mysql_query("DELETE FROM power_unit_system_block WHERE power_unit_system_block.id_system_block = " . 0 . " AND power_unit_system_block.id_power_unit = " .  $_POST['power_unit_id'], $db);
    $resultSelectPowerUnit = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id= power_unit_system_block.id_power_unit  AND power_unit_system_block.id_system_block = " . 0 , $db);
}
while($row = mysql_fetch_assoc($resultSelectPowerUnit))
{
    echo  '<option value="'.  $row['id'].'">'. $row['name_power_unit'] . ' ' . $row['size_power_unit'].'Вт</option>';
}

