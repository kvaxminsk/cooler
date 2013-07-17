<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Количество ядер</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertnumberOfCoresTablet = mysql_query("INSERT INTO number_of_cores_system_block (`id_number_of_cores` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_cores'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectnumberOfCores = mysql_query("SELECT number_of_cores.* FROM  number_of_cores, number_of_cores_system_block WHERE number_of_cores.id= number_of_cores_system_block.id_number_of_cores  AND number_of_cores_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertnumberOfCoresTablet = mysql_query("INSERT INTO number_of_cores_system_block (`id_number_of_cores` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_number_of_cores'] ."','" . 0 . "')");
        $resultSelectnumberOfCores = mysql_query("SELECT number_of_cores.* FROM  number_of_cores, number_of_cores_system_block WHERE number_of_cores.id= number_of_cores_system_block.id_number_of_cores  AND number_of_cores_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectnumberOfCores))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_number_of_cores'] . ' Core ' . $row['number_cores_number_of_cores'] . ' ' . $row['speed_number_of_cores'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Количество ядер</option>';
    $nameNumberOfCores = htmlspecialchars(trim($_POST['name_number_of_cores']));


    $resultInsertnumberOfCores = mysql_query("INSERT INTO number_of_cores_tablet (`name_number_of_cores`) VALUES ( '" . $nameNumberOfCores ."')") ;
    $resultSelectnumberOfCores = mysql_query("SELECT number_of_cores_tablet.* FROM  number_of_cores_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectnumberOfCores))
    {
        echo  '<option value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
    }
}

