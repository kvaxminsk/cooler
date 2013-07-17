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

echo '<option value="0" selected="selected">Диагональ экрана</option>';


$screenSizeId = htmlspecialchars(trim($_POST['id_screen_size']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteScreenSizeTablet = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idTablet . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectScreenSize = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idTablet, $db);
}
else
{
    var_dump("DELETE FROM screen_size_tablet WHERE screen_size_tablet.id_screen_size = " . $screenSizeId);
    $resultDeleteScreenSizeTablet = mysql_query("DELETE FROM screen_size_tablet WHERE screen_size_tablet.id_screen_size = " . $screenSizeId, $db);
    $resultSelectScreenSize = mysql_query("SELECT screen_size_tablet.* FROM screen_size_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectScreenSize))
{
    echo  '<option value="'.  $row['id_screen_size'].'">' . $row['name_screen_size'] .  '</option>';
}

