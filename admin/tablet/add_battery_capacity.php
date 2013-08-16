<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Емкость аккумулятора</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertBatteryCapacityTablet = mysql_query("INSERT INTO battery_capacity_system_block (`id_battery_capacity` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_battery_capacity'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectBatteryCapacity = mysql_query("SELECT battery_capacity.* FROM  battery_capacity, battery_capacity_system_block WHERE battery_capacity.id= battery_capacity_system_block.id_battery_capacity  AND battery_capacity_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertBatteryCapacityTablet = mysql_query("INSERT INTO battery_capacity_system_block (`id_battery_capacity` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_battery_capacity'] ."','" . 0 . "')");
        $resultSelectBatteryCapacity = mysql_query("SELECT battery_capacity.* FROM  battery_capacity, battery_capacity_system_block WHERE battery_capacity.id= battery_capacity_system_block.id_battery_capacity  AND battery_capacity_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectBatteryCapacity))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_battery_capacity'] . ' Core ' . $row['number_cores_battery_capacity'] . ' ' . $row['speed_battery_capacity'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Емкость аккумулятора</option>';
    $nameBatteryCapacity = htmlspecialchars(trim($_POST['name_battery_capacity']));


    $resultInsertBatteryCapacity = mysql_query("INSERT INTO battery_capacity_tablet (`name_battery_capacity`) VALUES ( '" . $nameBatteryCapacity ."')") ;
    $resultSelectBatteryCapacity = mysql_query("SELECT battery_capacity_tablet.* FROM  battery_capacity_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectBatteryCapacity))
    {
        echo  '<option value="'.  $row['id_battery_capacity'].'">' . $row['name_battery_capacity'] .  '</option>';
    }
}

