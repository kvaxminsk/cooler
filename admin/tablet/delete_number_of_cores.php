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

echo '<option value="0" selected="selected">Количество ядер</option>';


$numberOfCoresId = htmlspecialchars(trim($_POST['id_number_of_cores']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeletenumberOfCoresTablet = mysql_query("DELETE FROM number_of_cores_system_block WHERE number_of_cores_system_block.id_system_block = " . $idTablet . " AND number_of_cores_system_block.id_number_of_cores = " . $numberOfCoresId, $db);
    $resultSelectnumberOfCores = mysql_query("SELECT number_of_cores.* FROM  number_of_cores, number_of_cores_system_block WHERE number_of_cores.id= number_of_cores_system_block.id_number_of_cores  AND number_of_cores_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeletenumberOfCoresTablet = mysql_query("DELETE FROM number_of_cores_tablet WHERE number_of_cores_tablet.id_number_of_cores = " . $numberOfCoresId, $db);
    $resultSelectnumberOfCores = mysql_query("SELECT number_of_cores_tablet.* FROM number_of_cores_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectnumberOfCores))
{
    echo  '<option value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
}

