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

echo '<option value="0" selected="selected">Ширина</option>';


$widthId = htmlspecialchars(trim($_POST['id_width']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteWidthTablet = mysql_query("DELETE FROM width_system_block WHERE width_system_block.id_system_block = " . $idTablet . " AND width_system_block.id_width = " . $widthId, $db);
    $resultSelectWidth = mysql_query("SELECT width.* FROM  width, width_system_block WHERE width.id= width_system_block.id_width  AND width_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteWidthTablet = mysql_query("DELETE FROM width_tablet WHERE width_tablet.id_width = " . $widthId, $db);
    $resultSelectWidth = mysql_query("SELECT width_tablet.* FROM width_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectWidth))
{
    echo  '<option value="'.  $row['id_width'].'">' . $row['name_width'] .  '</option>';
}

