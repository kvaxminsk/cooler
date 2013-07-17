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

echo '<option value="0" selected="selected">Оперативная память</option>';


$ramId = htmlspecialchars(trim($_POST['id_ram']));
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));

if (isset($_POST['id_tablet']))
{
    $resultDeleteRamTablet = mysql_query("DELETE FROM ram_system_block WHERE ram_system_block.id_system_block = " . $idTablet . " AND ram_system_block.id_ram = " . $ramId, $db);
    $resultSelectRam = mysql_query("SELECT ram.* FROM  ram, ram_system_block WHERE ram.id= ram_system_block.id_ram  AND ram_system_block.id_system_block = " . $idTablet, $db);
}
else
{

    $resultDeleteRamTablet = mysql_query("DELETE FROM ram_tablet WHERE ram_tablet.id_ram = " . $ramId, $db);
    $resultSelectRam = mysql_query("SELECT ram_tablet.* FROM ram_tablet" , $db);
}


while ($row = mysql_fetch_assoc($resultSelectRam))
{
    echo  '<option value="'.  $row['id_ram'].'">' . $row['name_ram'] .  '</option>';
}

