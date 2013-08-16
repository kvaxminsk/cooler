<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Процессоры</option>';
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
    echo '<option value="0" selected="selected">Процессоры</option>';
    $nameCpu = htmlspecialchars(trim($_POST['name_cpu']));


    $resultInsertCpu = mysql_query("INSERT INTO cpu_tablet (`name_cpu`) VALUES ( '" . $nameCpu ."')") ;
    $resultSelectCpu = mysql_query("SELECT cpu_tablet.* FROM  cpu_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectCpu))
    {
        echo  '<option value="'.  $row['id_cpu'].'">' . $row['name_cpu'] .  '</option>';
    }
}

