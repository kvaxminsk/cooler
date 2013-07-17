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

echo '<option value="0" selected="selected">Вес</option>';


$weightId = htmlspecialchars(trim($_POST['id_weight']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteCpuTablet = mysql_query("DELETE FROM weight_system_block WHERE weight_system_block.id_system_block = " . $idTablet . " AND weight_system_block.id_weight = " . $weightId, $db);
    $resultSelectCpu = mysql_query("SELECT weight.* FROM  weight, weight_system_block WHERE weight.id= weight_system_block.id_weight  AND weight_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteCpuTablet = mysql_query("DELETE FROM weight_tablet WHERE weight_tablet.id_weight = " . $weightId, $db);
    $resultSelectCpu = mysql_query("SELECT weight_tablet.* FROM weight_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectCpu))
{
    echo  '<option value="'.  $row['id_weight'].'">' . $row['name_weight'] .  '</option>';
}

