<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Производитель</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertManufactureTablet = mysql_query("INSERT INTO manufacture_system_block (`id_manufacture` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_manufacture'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectManufacture = mysql_query("SELECT manufacture.* FROM  manufacture, manufacture_system_block WHERE manufacture.id= manufacture_system_block.id_manufacture  AND manufacture_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertManufactureTablet = mysql_query("INSERT INTO manufacture_system_block (`id_manufacture` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_manufacture'] ."','" . 0 . "')");
        $resultSelectManufacture = mysql_query("SELECT manufacture.* FROM  manufacture, manufacture_system_block WHERE manufacture.id= manufacture_system_block.id_manufacture  AND manufacture_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectManufacture))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_manufacture'] . ' Core ' . $row['number_cores_manufacture'] . ' ' . $row['speed_manufacture'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Производитель</option>';
    $nameManufacture = htmlspecialchars(trim($_POST['name_manufacture']));


    $resultInsertManufacture = mysql_query("INSERT INTO manufacture_tablet (`name_manufacture`) VALUES ( '" . $nameManufacture ."')") ;
    $resultSelectManufacture = mysql_query("SELECT manufacture_tablet.* FROM  manufacture_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectManufacture))
    {
        echo  '<option value="'.  $row['id_manufacture'].'">' . $row['name_manufacture'] .  '</option>';
    }
}

