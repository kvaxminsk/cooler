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

echo '<option value="0" selected="selected">Толщина</option>';


$thicknessId = htmlspecialchars(trim($_POST['id_thickness']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteCpuTablet = mysql_query("DELETE FROM thickness_system_block WHERE thickness_system_block.id_system_block = " . $idTablet . " AND thickness_system_block.id_thickness = " . $thicknessId, $db);
    $resultSelectCpu = mysql_query("SELECT thickness.* FROM  thickness, thickness_system_block WHERE thickness.id= thickness_system_block.id_thickness  AND thickness_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteCpuTablet = mysql_query("DELETE FROM thickness_tablet WHERE thickness_tablet.id_thickness = " . $thicknessId, $db);
    $resultSelectCpu = mysql_query("SELECT thickness_tablet.* FROM thickness_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectCpu))
{
    echo  '<option value="'.  $row['id_thickness'].'">' . $row['name_thickness'] .  '</option>';
}

