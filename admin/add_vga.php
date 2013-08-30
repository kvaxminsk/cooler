<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

if (isset($_POST['id_existing_vga'])) {
    echo '<option value="0" selected="selected">Видеокарта</option>';
    if ((isset($_POST['id_system_block']))) {
        $resultInsertVgaSystemBlock = mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_vga'] . "','" . $_POST['id_system_block'] . "')");
        $resultSelectVga = mysql_query("SELECT vga.* FROM  vga, vga_system_block WHERE vga.id= vga_system_block.id_vga  AND vga_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    } else {
        $resultInsertVgaSystemBlock = mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_vga'] . "','" . 0 . "')");
        $resultSelectVga = mysql_query("SELECT vga.* FROM  vga, vga_system_block WHERE vga.id= vga_system_block.id_vga  AND vga_system_block.id_system_block = " . 0, $db);
    }

    while ($row = mysql_fetch_assoc($resultSelectVga)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
    }
} elseif (isset($_POST['id_vga'])) {
    $idVga = (int)htmlspecialchars(trim($_POST['id_vga']));
    $nameVga = htmlspecialchars(trim($_POST['name_vga']));
    $sizeVga = htmlspecialchars(trim($_POST['size_vga']));
    mysql_query("UPDATE vga SET size_vga='" . $sizeVga . "' WHERE id=" . $idVga);
    mysql_query("UPDATE vga SET name_vga= '" . $nameVga . "' WHERE id=" . $idVga);

    header("Location:/admin/list_vga.php");
} else {
    echo '<option value="0" selected="selected">Видеокарта</option>';

    $nameVga = htmlspecialchars(trim($_POST['name_vga']));
    $sizeVga = htmlspecialchars(trim($_POST['size_vga']));

    $resultSelectVga = mysql_query("SELECT * FROM vga WHERE name_vga='" . $nameVga . "' AND size_vga='" . $sizeVga . "'");

    $row = mysql_fetch_assoc($resultSelectVga);

    if (!$row) {
        $resultInsertVga = mysql_query("INSERT INTO vga (`name_vga` ,`size_vga`) VALUES ( '" . $nameVga . "','" . $sizeVga . "')");
        $idVga = mysql_insert_id();
        $resultInsertVgaSystemBlock = mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $idVga . "','" . 0 . "')");
    } else {
        $idVga = $row['id'];
        $resultSelectVgaSystemBlockAdd = mysql_query("SELECT * FROM vga_system_block WHERE id_system_block =" . 0 . " AND id_vga =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectVgaSystemBlockAdd);
        if (!$rowAddId) {
            $resultInsertVgaSystemBlock = mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $idVga . "','" . 0 . "')");
        }
    }


    $resultSelectVgaSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM vga_system_block WHERE id_vga IN(SELECT  id_vga FROM vga_system_block WHERE id_system_block = " . 0 . " AND id_vga<>" . $idVga . ") AND id_system_block <> " . 0);

    while ($row = mysql_fetch_assoc($resultSelectVgaSystemBlock)) {
        $resultSelectVgaSystemBlockId = mysql_query("SELECT id_vga FROM vga_system_block WHERE id_vga=" . $idVga . " AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectVgaSystemBlockId);
        if (!$rowId) {
            mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $idVga . "','" . $row['id_system_block'] . "')");
        } elseif ($rowId['id_system_block'] <> 0) {
            $resultInsertVgaSystemBlock = mysql_query("INSERT INTO vga_system_block (`id_vga` ,`id_system_block` ) VALUES ( '" . $idVga . "','" . 0 . "')");
        }
    }

    $resultSelectVga = mysql_query("SELECT vga.* FROM vga, vga_system_block WHERE vga.id= vga_system_block.id_vga  AND vga_system_block.id_system_block = " . 0, $db);

    while ($row = mysql_fetch_assoc($resultSelectVga)) {
        echo '<option value="' . $row['id'] . '"> ' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
    }
}
