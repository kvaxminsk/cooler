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

echo '<option value="0" selected="selected">Графический ускоритель</option>';


$graphicsAcceleratorId = htmlspecialchars(trim($_POST['id_graphics_accelerator']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteCpuTablet = mysql_query("DELETE FROM graphics_accelerator_system_block WHERE graphics_accelerator_system_block.id_system_block = " . $idTablet . " AND graphics_accelerator_system_block.id_graphics_accelerator = " . $graphics_acceleratorId, $db);
    $resultSelectCpu = mysql_query("SELECT graphics_accelerator.* FROM  graphics_accelerator, graphics_accelerator_system_block WHERE graphics_accelerator.id= graphics_accelerator_system_block.id_graphics_accelerator  AND graphics_accelerator_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteCpuTablet = mysql_query("DELETE FROM graphics_accelerator_tablet WHERE graphics_accelerator_tablet.id_graphics_accelerator = " . $graphicsAcceleratorId, $db);
    $resultSelectCpu = mysql_query("SELECT graphics_accelerator_tablet.* FROM graphics_accelerator_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectCpu))
{
    echo  '<option value="'.  $row['id_graphics_accelerator'].'">' . $row['name_graphics_accelerator'] .  '</option>';
}

