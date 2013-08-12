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

echo '<option value="0" selected="selected">Производитель</option>';


$manufactureId = htmlspecialchars(trim($_POST['id_manufacture']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeletemanufactureTablet = mysql_query("DELETE FROM manufacture_system_block WHERE manufacture_system_block.id_system_block = " . $idTablet . " AND manufacture_system_block.id_manufacture = " . $manufactureId, $db);
    $resultSelectmanufacture = mysql_query("SELECT manufacture.* FROM  manufacture, manufacture_system_block WHERE manufacture.id= manufacture_system_block.id_manufacture  AND manufacture_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeletemanufactureTablet = mysql_query("DELETE FROM manufacture_tablet WHERE manufacture_tablet.id_manufacture = " . $manufactureId, $db);
    $resultSelectManufacture = mysql_query("SELECT manufacture_tablet.* FROM manufacture_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectManufacture))
{
    echo  '<option value="'.  $row['id_manufacture'].'">' . $row['name_manufacture'] .  '</option>';
}

