<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Тип матрицы экрана</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO type_of_matrix_screen_system_block (`id_type_of_matrix_screen` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_type_of_matrix_screen'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT type_of_matrix_screen.* FROM  type_of_matrix_screen, type_of_matrix_screen_system_block WHERE type_of_matrix_screen.id= type_of_matrix_screen_system_block.id_type_of_matrix_screen  AND type_of_matrix_screen_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertTypeOfMatrixScreenTablet = mysql_query("INSERT INTO type_of_matrix_screen_system_block (`id_type_of_matrix_screen` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_type_of_matrix_screen'] ."','" . 0 . "')");
        $resultSelectTypeOfMatrixScreen = mysql_query("SELECT type_of_matrix_screen.* FROM  type_of_matrix_screen, type_of_matrix_screen_system_block WHERE type_of_matrix_screen.id= type_of_matrix_screen_system_block.id_type_of_matrix_screen  AND type_of_matrix_screen_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_type_of_matrix_screen'] . ' Core ' . $row['number_cores_type_of_matrix_screen'] . ' ' . $row['speed_type_of_matrix_screen'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Тип матрицы экрана</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_type_of_matrix_screen']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO type_of_matrix_screen_tablet (`name_type_of_matrix_screen`) VALUES ( '" . $nameTypeOfMatrixScreen ."')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT type_of_matrix_screen_tablet.* FROM  type_of_matrix_screen_tablet " , $db);
//var_dump("SELECT type_of_matrix_screen_tablet.* FROM  type_of_matrix_screen_tablet ");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_type_of_matrix_screen'].'">' . $row['name_type_of_matrix_screen'] .  '</option>';
    }
}

