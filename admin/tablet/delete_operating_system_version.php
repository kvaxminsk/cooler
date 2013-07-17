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

echo '<option value="0" selected="selected">Версия операционной системы </option>';


$operatingSystemVersionId = htmlspecialchars(trim($_POST['id_operating_system_version']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteoperatingSystemVersionTablet = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idTablet . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectoperatingSystemVersion = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteoperatingSystemVersionTablet = mysql_query("DELETE FROM operating_system_version_tablet WHERE operating_system_version_tablet.id_operating_system_version = " . $operatingSystemVersionId, $db);
    $resultSelectoperatingSystemVersion = mysql_query("SELECT operating_system_version_tablet.* FROM operating_system_version_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectoperatingSystemVersion))
{
    echo  '<option value="'.  $row['id_operating_system_version'].'">' . $row['name_operating_system_version'] .  '</option>';
}

