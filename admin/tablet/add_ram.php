<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Оперативная память</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertRamTablet = mysql_query("INSERT INTO ram_system_block (`id_ram` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_ram'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectRam = mysql_query("SELECT ram.* FROM  ram, ram_system_block WHERE ram.id= ram_system_block.id_ram  AND ram_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertRamTablet = mysql_query("INSERT INTO ram_system_block (`id_ram` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_ram'] ."','" . 0 . "')");
        $resultSelectRam = mysql_query("SELECT ram.* FROM  ram, ram_system_block WHERE ram.id= ram_system_block.id_ram  AND ram_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectRam))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_ram'] . ' Core ' . $row['number_cores_ram'] . ' ' . $row['speed_ram'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Оперативная память</option>';
    $nameRam = htmlspecialchars(trim($_POST['name_ram']));


    $resultInsertRam = mysql_query("INSERT INTO ram_tablet (`name_ram`) VALUES ( '" . $nameRam ."')") ;
    $resultSelectRam = mysql_query("SELECT ram_tablet.* FROM  ram_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectRam))
    {
        echo  '<option value="'.  $row['id_ram'].'">' . $row['name_ram'] .  '</option>';
    }
}

