<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Выбор Изображения</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO image_name_block (`id_image_name` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_image_name'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name.* FROM  image_name, image_name_block WHERE image_name.id= image_name_block.id_image_name  AND image_name_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO image_name_block (`id_image_name` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_image_name'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name.* FROM  image_name, image_name_block WHERE image_name.id= image_name_block.id_image_name  AND image_name_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_image_name'] . ' Core ' . $row['number_cores_image_name'] . ' ' . $row['speed_image_name'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Выбор Изображения</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_image_name']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO image_name_tablet (`name_image_name`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name_tablet.* FROM  image_name_tablet " , $db);
//var_dump("INSERT INTO image_name_tablet (`name_image_name`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
    }
}

