<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

if ($_POST['optical_drive'] == 'on') {
    $_POST['optical_drive'] = '1';
} else {
    $_POST['optical_drive'] = '0';
}

foreach ($_POST as $key => $value) {
    $insert[$key] = htmlspecialchars(trim($value));
}

if (!empty($insert['id_system_block'])) {
    $strSql = "UPDATE `system_block` SET ";
    $strSql .= "`name_system_block`='" . $insert['name_system_block'] . "'";
    $strSql .= ",`id_cpu`='" . $insert['cpu'] . "'";
    $strSql .= ",`id_hdd`='" . $insert['hdd'] . "'";
    $strSql .= ",`id_random_access_memory`='" . $insert['random_access_memory'] . "'";
    $strSql .= ",`id_optical_drive`='" . $insert['optical_drive'] . "'";
    $strSql .= ",`id_computer_case`='" . $insert['computer_case'] . "'";
    $strSql .= ",`id_motherboard`='" . $insert['motherboard'] . "'";
    $strSql .= ",`id_vga`='" . $insert['vga'] . "'";
    $strSql .= ",`id_power_unit`='" . $insert['power_unit'] . "'";
    $strSql .= ",`url_image`='" . $insert['url_image'] . "";
    $strSql .= "',`cost` = '" . $insert['cost'] . "'";

    $strSql .= " WHERE `system_block`.`id_system_block` =" . $insert['id_system_block'];

    $idInsertSystemBlock = $insert['id_system_block'];
    //echo $strSql;die();
    $result = mysql_query($strSql);
    header("Location:/admin/edit_system_block.php?id=" . $idInsertSystemBlock . "&successfully=" . $result . "&change=edit");

} else {
    $strSql = "INSERT INTO system_block  (`name_system_block`, `id_cpu` ,`id_hdd` ,`id_random_access_memory` ,`id_optical_drive` ,`id_computer_case` ,`id_motherboard` ,`id_vga` ,`id_power_unit`,`url_image`,`cost`) VALUES(";
    $strSql .= "'" . $insert['name_system_block'] . "', ";
    $strSql .= "'" . $insert['cpu'] . "', ";
    $strSql .= "'" . $insert['hdd'] . "',";
    $strSql .= "'" . $insert['random_access_memory'] . "',";
    $strSql .= "'" . $insert['optical_drive'] . "',";
    $strSql .= "'" . $insert['computer_case'] . "',";
    $strSql .= "'" . $insert['motherboard'] . "',";
    $strSql .= "'" . $insert['vga'] . "',";
    $strSql .= "'" . $insert['power_unit'] . "',";
    $strSql .= "'" . $insert['url_image'] . "',";
    $strSql .= "'" . $insert['cost'] . "'";
    $strSql .= ")";
    $result = mysql_query($strSql);

    $idInsertSystemBlock = mysql_insert_id();

    mysql_query("UPDATE cpu_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0 ;");
    mysql_query("UPDATE hdd_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0 ;");
    mysql_query("UPDATE random_access_memory_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0; ");
    mysql_query("UPDATE computer_case_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0 ;");
    mysql_query("UPDATE motherboard_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0 ;");
    mysql_query("UPDATE vga_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0; ");
    mysql_query("UPDATE power_unit_system_block SET `id_system_block` = '" . $idInsertSystemBlock . "' WHERE `id_system_block` = 0; ");
    header("Location:/admin/edit_system_block.php?id=" . $idInsertSystemBlock . "&successfully=" . $result . "&change=add");
}



?>