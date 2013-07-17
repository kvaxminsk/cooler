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

echo '<option value="0" selected="selected">Операционная система</option>';


$operatingSystemId = htmlspecialchars(trim($_POST['id_operating_system']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteOperatingSystemTablet = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idTablet . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectOperatingSystem = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteOperatingSystemTablet = mysql_query("DELETE FROM operating_system_tablet WHERE operating_system_tablet.id_operating_system = " . $operatingSystemId, $db);
    $resultSelectOperatingSystem = mysql_query("SELECT operating_system_tablet.* FROM operating_system_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectOperatingSystem))
{
    echo  '<option value="'.  $row['id_operating_system'].'">' . $row['name_operating_system'] .  '</option>';
}

