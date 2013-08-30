<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

if (isset($_POST['id_existing_power_unit'])) {
    echo '<option value="0" selected="selected">Блок питания</option>';
    if (isset($_POST['id_system_block'])) {
        $resultInsertPowerUnitSystemBlock = mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_power_unit'] . "','" . $_POST['id_system_block'] . "')");
        $resultSelectPowerUnit = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id= power_unit_system_block.id_power_unit  AND power_unit_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    } else {
        $resultInsertPowerUnitSystemBlock = mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_power_unit'] . "','" . 0 . "')");
        $resultSelectPowerUnit = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id= power_unit_system_block.id_power_unit  AND power_unit_system_block.id_system_block = " . 0, $db);
    }

    while ($row = mysql_fetch_assoc($resultSelectPowerUnit)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_power_unit'] . ' ' . $row['size_power_unit'] . 'Вт</option>';
    }
} elseif (isset($_POST['id_power_unit'])) {
    $idPowerUnit = (int)htmlspecialchars(trim($_POST['id_power_unit']));
    $namePowerUnit = htmlspecialchars(trim($_POST['name_power_unit']));
    $sizePowerUnit = htmlspecialchars(trim($_POST['size_power_unit']));
    mysql_query("UPDATE power_unit SET size_power_unit='" . $sizePowerUnit . "' WHERE id=" . $idPowerUnit);
    mysql_query("UPDATE power_unit SET name_power_unit= '" . $namePowerUnit . "' WHERE id=" . $idPowerUnit);
    header("Location:/admin/list_power_unit.php");
} else {
    echo '<option value="0" selected="selected">Блок питания</option>';

    $namePowerUnit = htmlspecialchars(trim($_POST['name_power_unit']));
    $sizePowerUnit = htmlspecialchars(trim($_POST['size_power_unit']));

    $resultSelectPowerUnit = mysql_query("SELECT * FROM power_unit WHERE name_power_unit='" . $namePowerUnit . "' AND size_power_unit='" . $sizePowerUnit . "'");

    $row = mysql_fetch_assoc($resultSelectPowerUnit);

    if (!$row) {
        $resultInsertPowerUnit = mysql_query("INSERT INTO power_unit (`name_power_unit` ,`size_power_unit`) VALUES ( '" . $namePowerUnit . "','" . $sizePowerUnit . "')");
        $idPowerUnit = mysql_insert_id();
        $resultInsertPowerUnitSystemBlock = mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $idPowerUnit . "','" . 0 . "')");
    } else {
        $idPowerUnit = $row['id'];
        $resultSelectPowerUnitSystemBlockAdd = mysql_query("SELECT * FROM power_unit_system_block WHERE id_system_block =" . 0 . " AND id_power_unit =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectPowerUnitSystemBlockAdd);
        if (!$rowAddId) {
            $resultInsertPowerUnitSystemBlock = mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $idPowerUnit . "','" . 0 . "')");
        }
    }


    $resultSelectPowerUnitSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM power_unit_system_block WHERE id_power_unit IN(SELECT  id_power_unit FROM power_unit_system_block WHERE id_system_block = " . 0 . " AND id_power_unit<>" . $idPowerUnit . ") AND id_system_block <> " . 0);

    while ($row = mysql_fetch_assoc($resultSelectPowerUnitSystemBlock)) {
        $resultSelectPowerUnitSystemBlockId = mysql_query("SELECT id_power_unit FROM power_unit_system_block WHERE id_power_unit=" . $idPowerUnit . " AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectPowerUnitSystemBlockId);
        if (!$rowId) {
            mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $idPowerUnit . "','" . $row['id_system_block'] . "')");
        } elseif ($rowId['id_system_block'] <> 0) {
            $resultInsertPowerUnitSystemBlock = mysql_query("INSERT INTO power_unit_system_block (`id_power_unit` ,`id_system_block` ) VALUES ( '" . $idPowerUnit . "','" . 0 . "')");
        }
    }

    $resultSelectPowerUnit = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id= power_unit_system_block.id_power_unit  AND power_unit_system_block.id_system_block = " . 0, $db);

    while ($row = mysql_fetch_assoc($resultSelectPowerUnit)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_power_unit'] . ' ' . $row['size_power_unit'] . 'Вт</option>';
    }

}