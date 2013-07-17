<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Вес</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertWeightTablet = mysql_query("INSERT INTO weight_system_block (`id_weight` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_weight'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectWeight = mysql_query("SELECT weight.* FROM  weight, weight_system_block WHERE weight.id= weight_system_block.id_weight  AND weight_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertWeightTablet = mysql_query("INSERT INTO weight_system_block (`id_weight` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_weight'] ."','" . 0 . "')");
        $resultSelectWeight = mysql_query("SELECT weight.* FROM  weight, weight_system_block WHERE weight.id= weight_system_block.id_weight  AND weight_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectWeight))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_weight'] . ' Core ' . $row['number_cores_weight'] . ' ' . $row['speed_weight'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Вес</option>';
    $nameWeight = htmlspecialchars(trim($_POST['name_weight']));


    $resultInsertWeight = mysql_query("INSERT INTO weight_tablet (`name_weight`) VALUES ( '" . $nameWeight ."')") ;
    $resultSelectWeight = mysql_query("SELECT weight_tablet.* FROM  weight_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectWeight))
    {
        echo  '<option value="'.  $row['id_weight'].'">' . $row['name_weight'] .  '</option>';
    }
}

