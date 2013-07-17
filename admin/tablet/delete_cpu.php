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

echo '<option value="0" selected="selected">Процессоры</option>';


$cpuId = htmlspecialchars(trim($_POST['id_cpu']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteCpuTablet = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idTablet . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteCpuTablet = mysql_query("DELETE FROM cpu_tablet WHERE cpu_tablet.id_cpu = " . $cpuId, $db);
    $resultSelectCpu = mysql_query("SELECT cpu_tablet.* FROM cpu_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectCpu))
{
    echo  '<option value="'.  $row['id_cpu'].'">' . $row['name_cpu'] .  '</option>';
}

