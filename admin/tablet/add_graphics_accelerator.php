<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Графический ускоритель</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertGraphicsAcceleratorTablet = mysql_query("INSERT INTO graphics_accelerator_system_block (`id_graphics_accelerator` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_graphics_accelerator'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectGraphicsAccelerator = mysql_query("SELECT graphics_accelerator.* FROM  graphics_accelerator, graphics_accelerator_system_block WHERE graphics_accelerator.id= graphics_accelerator_system_block.id_graphics_accelerator  AND graphics_accelerator_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertGraphicsAcceleratorTablet = mysql_query("INSERT INTO graphics_accelerator_system_block (`id_graphics_accelerator` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_graphics_accelerator'] ."','" . 0 . "')");
        $resultSelectGraphicsAccelerator = mysql_query("SELECT graphics_accelerator.* FROM  graphics_accelerator, graphics_accelerator_system_block WHERE graphics_accelerator.id= graphics_accelerator_system_block.id_graphics_accelerator  AND graphics_accelerator_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectGraphicsAccelerator))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_graphics_accelerator'] . ' Core ' . $row['number_cores_graphics_accelerator'] . ' ' . $row['speed_graphics_accelerator'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Графический ускоритель</option>';
    $nameGraphicsAccelerator = htmlspecialchars(trim($_POST['name_graphics_accelerator']));


    $resultInsertGraphicsAccelerator = mysql_query("INSERT INTO graphics_accelerator_tablet (`name_graphics_accelerator`) VALUES ( '" . $nameGraphicsAccelerator ."')") ;
    $resultSelectGraphicsAccelerator = mysql_query("SELECT graphics_accelerator_tablet.* FROM  graphics_accelerator_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectGraphicsAccelerator))
    {
        echo  '<option value="'.  $row['id_graphics_accelerator'].'">' . $row['name_graphics_accelerator'] .  '</option>';
    }
}

