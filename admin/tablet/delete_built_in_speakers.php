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

echo '<option value="0" selected="selected">Встроенные динамики</option>';


$built_in_speakersId = htmlspecialchars(trim($_POST['id_built_in_speakers']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM built_in_speakers_system_block WHERE built_in_speakers_system_block.id_system_block = " . $idTablet . " AND built_in_speakers_system_block.id_built_in_speakers = " . $built_in_speakersId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT built_in_speakers.* FROM  built_in_speakers, built_in_speakers_system_block WHERE built_in_speakers.id= built_in_speakers_system_block.id_built_in_speakers  AND built_in_speakers_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteScreenResolutionTablet = mysql_query("DELETE FROM built_in_speakers_tablet WHERE built_in_speakers_tablet.id_built_in_speakers = " . $built_in_speakersId, $db);
    $resultSelectScreenResolution = mysql_query("SELECT built_in_speakers_tablet.* FROM built_in_speakers_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectScreenResolution))
{
    echo  '<option value="'.  $row['id_built_in_speakers'].'">' . $row['name_built_in_speakers'] .  '</option>';
}

