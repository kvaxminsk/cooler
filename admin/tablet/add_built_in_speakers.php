<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Встроенные динамики</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO built_in_speakers_block (`id_built_in_speakers` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_built_in_speakers'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT built_in_speakers.* FROM  built_in_speakers, built_in_speakers_block WHERE built_in_speakers.id= built_in_speakers_block.id_built_in_speakers  AND built_in_speakers_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO built_in_speakers_block (`id_built_in_speakers` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_built_in_speakers'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT built_in_speakers.* FROM  built_in_speakers, built_in_speakers_block WHERE built_in_speakers.id= built_in_speakers_block.id_built_in_speakers  AND built_in_speakers_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_built_in_speakers'] . ' Core ' . $row['number_cores_built_in_speakers'] . ' ' . $row['speed_built_in_speakers'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Встроенные динамики</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_built_in_speakers']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO built_in_speakers_tablet (`name_built_in_speakers`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT built_in_speakers_tablet.* FROM  built_in_speakers_tablet " , $db);
//var_dump("INSERT INTO built_in_speakers_tablet (`name_built_in_speakers`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_built_in_speakers'].'">' . $row['name_built_in_speakers'] .  '</option>';
    }
}

