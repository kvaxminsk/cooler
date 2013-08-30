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

echo '<option value="0" selected="selected">Видеокарта</option>';

$idSystemBlock = htmlspecialchars(trim($_POST['id_system_block']));
if (isset($_POST['id_system_block'])) {
    $resultDeleteVgaSystemBlock = mysql_query("DELETE FROM vga_system_block WHERE vga_system_block.id_system_block = " . $idSystemBlock . " AND vga_system_block.id_vga = " . $_POST['vga_id'], $db);
    $resultSelectVga = mysql_query("SELECT vga.* FROM  vga, vga_system_block WHERE vga.id= vga_system_block.id_vga  AND vga_system_block.id_system_block = " . $idSystemBlock, $db);
} else {

    $resultDeleteVgaSystemBlock = mysql_query("DELETE FROM vga_system_block WHERE vga_system_block.id_system_block = " . 0 . " AND vga_system_block.id_vga = " . $_POST['vga_id'], $db);
    $resultSelectVga = mysql_query("SELECT vga.* FROM  vga, vga_system_block WHERE vga.id= vga_system_block.id_vga  AND vga_system_block.id_system_block = " . 0, $db);

}
while ($row = mysql_fetch_assoc($resultSelectVga)) {
    echo '<option value="' . $row['id'] . '">' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
}


