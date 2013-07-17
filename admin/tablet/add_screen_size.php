<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Диагональ экрана</option>';
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
    echo '<option value="0" selected="selected">Диагональ экрана</option>';
    $nameScreenSize = htmlspecialchars(trim($_POST['name_screen_size']));


    $resultInsertScreenSize = mysql_query("INSERT INTO screen_size_tablet (`name_screen_size`) VALUES ( '" . $nameScreenSize ."')") ;
    $resultSelectScreenSize = mysql_query("SELECT screen_size_tablet.* FROM  screen_size_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectScreenSize))
    {
        echo  '<option value="'.  $row['id_screen_size'].'">' . $row['name_screen_size'] .  '</option>';
    }
}

