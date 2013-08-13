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

echo '<option value="0" selected="selected">Выбор Изображения</option>';


$image_nameId = htmlspecialchars(trim($_POST['id_image_name']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM image_name_tablet WHERE image_name_tablet.id_image_name = " . $image_nameId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name_tablet.* FROM image_name_tablet WHERE id_tablet=" . $idTablet , $db);
}
else
{

    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM image_name_tablet WHERE image_name_tablet.id_image_name = " . $image_nameId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name_tablet.* FROM image_name_tablet WHERE id_tablet=0" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
{
    echo  '<option value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
}

