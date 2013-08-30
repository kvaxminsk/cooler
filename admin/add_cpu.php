<?php
include("lock.php");
include("blocks/bd.php");

if (isset($_POST['id_existing_cpu'])) {
    echo '<option value="0" selected="selected">Процессор</option>';
    if ((isset($_POST['id_system_block']))) {
        $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] . "','" . $_POST['id_system_block'] . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    } else {
        $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] . "','" . 0 . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . 0, $db);
    }

    while ($row = mysql_fetch_assoc($resultSelectCpu)) {
        echo '<option value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
    }
} elseif (isset($_POST['id_cpu'])) {

    $idCpu = (int)htmlspecialchars(trim($_POST['id_cpu']));
    $nameCpu = htmlspecialchars(trim($_POST['name_cpu']));
    $numberCoresCpu = htmlspecialchars(trim($_POST['number_cores_cpu']));
    $speedCpu = strtr(htmlspecialchars(trim($_POST['speed_cpu'])), ",", ".");

    mysql_query("UPDATE cpu SET name_cpu= '" . $nameCpu . "' WHERE id=" . $idCpu);
    mysql_query("UPDATE cpu SET number_cores_cpu='" . $numberCoresCpu . "' WHERE id=" . $idCpu);
    mysql_query("UPDATE cpu SET speed_cpu= '" . $speedCpu . "' WHERE id=" . $idCpu);
    header("Location:/admin/list_cpu.php");


} else {
    echo '<option value="0" selected="selected">Процессор</option>';
    $nameCpu = htmlspecialchars(trim($_POST['name_cpu']));
    $numberCoresCpu = htmlspecialchars(trim($_POST['number_cores_cpu']));
    $speedCpu = strtr(htmlspecialchars(trim($_POST['speed_cpu'])), ",", ".");

    $resultSelectCpu = mysql_query("SELECT * FROM cpu WHERE name_cpu='" . $nameCpu . "' AND number_cores_cpu='" . $numberCoresCpu . "' AND speed_cpu= '" . $speedCpu . "'");

    $row = mysql_fetch_assoc($resultSelectCpu);

    if (!$row) {
        $resultInsertCpu = mysql_query("INSERT INTO cpu (`name_cpu` ,`number_cores_cpu` ,`speed_cpu`) VALUES ( '" . $nameCpu . "','" . $numberCoresCpu . "','" . $speedCpu . "')");
        $idCpu = mysql_insert_id();
        $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $idCpu . "','" . 0 . "')");
    } else {
        $idCpu = $row['id'];
        $resultSelectCpuSystemBlockAdd = mysql_query("SELECT * FROM cpu_system_block WHERE id_system_block =" . 0 . " AND id_cpu =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectCpuSystemBlockAdd);
        if (!$rowAddId) {
            $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $idCpu . "','" . 0 . "')");
        }
    }


    $resultSelectCpuSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM cpu_system_block WHERE id_cpu IN(SELECT  id_cpu FROM cpu_system_block WHERE id_system_block = " . 0 . " AND id_cpu<>" . $idCpu . ") AND id_system_block <> " . 0);

    while ($row = mysql_fetch_assoc($resultSelectCpuSystemBlock)) {
        $resultSelectCpuSystemBlockId = mysql_query("SELECT id_cpu FROM cpu_system_block WHERE id_cpu=" . $idCpu . " AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectCpuSystemBlockId);
        if (!$rowId) {
            mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $idCpu . "','" . $row['id_system_block'] . "')");
        } elseif ($rowId['id_system_block'] <> 0) {
            $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $idCpu . "','" . 0 . "')");
        }
    }

    $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . 0, $db);

    while ($row = mysql_fetch_assoc($resultSelectCpu)) {
        echo '<option value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
    }
}

