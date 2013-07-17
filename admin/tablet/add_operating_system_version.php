<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Версия операционной системы </option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertCpuSystemBlock = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] ."','" . 0 . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectCpu))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Версия операционной системы </option>';
    $nameOperatingSystemVersion = htmlspecialchars(trim($_POST['name_operating_system_version']));


    $resultInsertOperatingSystemVersion = mysql_query("INSERT INTO operating_system_version_tablet (`name_operating_system_version`) VALUES ( '" . $nameOperatingSystemVersion ."')") ;
    $resultSelectOperatingSystemVersion = mysql_query("SELECT operating_system_version_tablet.* FROM  operating_system_version_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectOperatingSystemVersion))
    {
        echo  '<option value="'.  $row['id_operating_system_version'].'">' . $row['name_operating_system_version'] .  '</option>';
    }
}

