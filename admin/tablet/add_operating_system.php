<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Операционная система</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertCpuTablet = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertCpuTablet = mysql_query("INSERT INTO cpu_system_block (`id_cpu` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_cpu'] ."','" . 0 . "')");
        $resultSelectCpu = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu  AND cpu_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectCpu))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Операционная система</option>';
    $nameOperatingSystem = htmlspecialchars(trim($_POST['name_operating_system']));


    $resultInsertOperatingSystem = mysql_query("INSERT INTO operating_system_tablet (`name_operating_system`) VALUES ( '" . $nameOperatingSystem ."')") ;
    $resultSelectOperatingSystem = mysql_query("SELECT operating_system_tablet.* FROM  operating_system_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectOperatingSystem))
    {
        echo  '<option value="'.  $row['id_operating_system'].'">' . $row['name_operating_system'] .  '</option>';
    }
}

