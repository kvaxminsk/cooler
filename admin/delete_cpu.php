<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

echo '<option value="0" selected="selected">Процессор</option>';


$cpuId = htmlspecialchars(trim($_POST['cpu_id']));
$idSystemBlock = htmlspecialchars(trim($_POST['id_system_block']));

if (isset($_POST['id_system_block'])) {
    $resultDeleteCpuSystemBlock = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idSystemBlock . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idSystemBlock, $db);
} else {
    $resultDeleteCpuSystemBlock = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . 0 . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . 0, $db);
}


while ($row = mysql_fetch_assoc($resultSelectCpu)) {
    echo '<option value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
}

