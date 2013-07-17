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

echo '<option value="0" selected="selected">Длина</option>';


$lengthId = htmlspecialchars(trim($_POST['id_length']));
//$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteLengthTablet = mysql_query("DELETE FROM length_system_block WHERE length_system_block.id_system_block = " . $idTablet . " AND length_system_block.id_length = " . $lengthId, $db);
    $resultSelectLength = mysql_query("SELECT length.* FROM  length, length_system_block WHERE length.id= length_system_block.id_length  AND length_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteLengthTablet = mysql_query("DELETE FROM length_tablet WHERE length_tablet.id_length = " . $lengthId, $db);
    $resultSelectLength = mysql_query("SELECT length_tablet.* FROM length_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectLength))
{
    echo  '<option value="'.  $row['id_length'].'">' . $row['name_length'] .  '</option>';
}

