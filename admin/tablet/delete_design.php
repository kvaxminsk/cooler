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

echo '<option value="0" selected="selected">Конструкция</option>';


$designId = htmlspecialchars(trim($_POST['id_design']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteDesignTablet = mysql_query("DELETE FROM cpu_system_block WHERE cpu_system_block.id_system_block = " . $idTablet . " AND cpu_system_block.id_cpu = " . $cpuId, $db);
    $resultSelectDesign = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteDesignTablet = mysql_query("DELETE FROM design_tablet WHERE design_tablet.id_design = " . $designId, $db);
    $resultSelectDesign = mysql_query("SELECT design_tablet.* FROM design_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectDesign))
{
    echo  '<option value="'.  $row['id_design'].'">' . $row['name_design'] .  '</option>';
}

