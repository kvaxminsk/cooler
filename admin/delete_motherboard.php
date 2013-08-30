<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

echo '<option value="0" selected="selected">Материнская плата</option>';


$idSystemBlock = htmlspecialchars(trim($_POST['id_system_block']));
if (isset($_POST['id_system_block'])) {
    $resultDeleteMotherboardSystemBlock = mysql_query("DELETE FROM motherboard_system_block WHERE motherboard_system_block.id_system_block = " . $idSystemBlock . " AND motherboard_system_block.id_motherboard = " . $_POST['motherboard_id'], $db);
    $resultSelectMotherboard = mysql_query("SELECT motherboard.* FROM  motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard  AND motherboard_system_block.id_system_block = " . $idSystemBlock, $db);
} else {
    $resultDeleteMotherboardSystemBlock = mysql_query("DELETE FROM motherboard_system_block WHERE motherboard_system_block.id_system_block = " . 0 . " AND motherboard_system_block.id_motherboard = " . $_POST['motherboard_id'], $db);
    $resultSelectMotherboard = mysql_query("SELECT motherboard.* FROM  motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard  AND motherboard_system_block.id_system_block = " . 0, $db);
}
while ($row = mysql_fetch_assoc($resultSelectMotherboard)) {
    echo '<option value="' . $row['id'] . '">' . $row['name_motherboard'] . '</option>';
}
