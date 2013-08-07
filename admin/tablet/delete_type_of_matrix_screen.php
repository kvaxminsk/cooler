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

echo '<option value="0" selected="selected">Тип матрицы экрана</option>';


$type_of_matrix_screenId = htmlspecialchars(trim($_POST['id_type_of_matrix_screen']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM type_of_matrix_screen_system_block WHERE type_of_matrix_screen_system_block.id_system_block = " . $idTablet . " AND type_of_matrix_screen_system_block.id_type_of_matrix_screen = " . $type_of_matrix_screenId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT type_of_matrix_screen.* FROM  type_of_matrix_screen, type_of_matrix_screen_system_block WHERE type_of_matrix_screen.id= type_of_matrix_screen_system_block.id_type_of_matrix_screen  AND type_of_matrix_screen_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteTypeOfMatrixScreenTablet = mysql_query("DELETE FROM type_of_matrix_screen_tablet WHERE type_of_matrix_screen_tablet.id_type_of_matrix_screen = " . $type_of_matrix_screenId, $db);
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT type_of_matrix_screen_tablet.* FROM type_of_matrix_screen_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
{
    echo  '<option value="'.  $row['id_type_of_matrix_screen'].'">' . $row['name_type_of_matrix_screen'] .  '</option>';
}

