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

echo '<option value="0" selected="selected">Материал корпуса</option>';


$caseMaterialId = htmlspecialchars(trim($_POST['id_case_material']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteCaseMaterialTablet = mysql_query("DELETE FROM case_material_system_block WHERE case_material_system_block.id_system_block = " . $idTablet . " AND case_material_system_block.id_case_material = " . $caseMaterialId, $db);
    $resultSelectCaseMaterial = mysql_query("SELECT case_material.* FROM  case_material, case_material_system_block WHERE case_material.id= case_material_system_block.id_case_material  AND case_material_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteCaseMaterialTablet = mysql_query("DELETE FROM case_material_tablet WHERE case_material_tablet.id_case_material = " . $caseMaterialId, $db);
    $resultSelectCaseMaterial = mysql_query("SELECT case_material_tablet.* FROM case_material_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectCaseMaterial))
{
    echo  '<option value="'.  $row['id_case_material'].'">' . $row['name_case_material'] .  '</option>';
}

