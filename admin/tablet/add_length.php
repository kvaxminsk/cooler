<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Длина</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertLengthTablet = mysql_query("INSERT INTO length_system_block (`id_length` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_length'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectLength = mysql_query("SELECT length.* FROM  length, length_system_block WHERE length.id= length_system_block.id_length  AND length_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertLengthTablet = mysql_query("INSERT INTO length_system_block (`id_length` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_length'] ."','" . 0 . "')");
        $resultSelectLength = mysql_query("SELECT length.* FROM  length, length_system_block WHERE length.id= length_system_block.id_length  AND length_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectLength))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_length'] . ' Core ' . $row['number_cores_length'] . ' ' . $row['speed_length'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Длина</option>';
    $nameLength = htmlspecialchars(trim($_POST['name_length']));


    $resultInsertLength = mysql_query("INSERT INTO length_tablet (`name_length`) VALUES ( '" . $nameLength ."')") ;
    $resultSelectLength = mysql_query("SELECT length_tablet.* FROM  length_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectLength))
    {
        echo  '<option value="'.  $row['id_length'].'">' . $row['name_length'] .  '</option>';
    }
}

