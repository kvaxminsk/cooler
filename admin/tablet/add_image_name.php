<?php
    include ("../lock.php");
    include ("../blocks/bd.php");
$idTablet = htmlspecialchars(trim($_POST['id_tablet']));
if(isset($_POST['id_tablet']))
{

    echo '<option value="0" selected="selected">Выбор Изображения</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_image_name']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO image_name_tablet (`name_image_name`,`id_tablet`) VALUES ( '" . $nameTypeOfMatrixScreen ."','" . ((int) htmlspecialchars(trim($_POST['id_tablet']))) . "')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name_tablet.* FROM image_name_tablet WHERE id_tablet=" . $idTablet , $db);;
//var_dump("INSERT INTO image_name_tablet (`name_image_name`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Выбор Изображения</option>';
    $nameTypeOfMatrixScreen = htmlspecialchars(trim($_POST['name_image_name']));


    $resultInsertTypeOfMatrixScreen = mysql_query("INSERT INTO image_name_tablet (`name_image_name`,`id_tablet`) VALUES ( '" . $nameTypeOfMatrixScreen ."','0')") ;
    $resultSelectTypeOfMatrixScreen = mysql_query("SELECT image_name_tablet.* FROM image_name_tablet WHERE id_tablet=0" , $db);
//var_dump("INSERT INTO image_name_tablet (`name_image_name`) VALUES ( '" . $nameTypeOfMatrixScreen ."')");die();
    while($row = mysql_fetch_assoc($resultSelectTypeOfMatrixScreen))
    {
        echo  '<option value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
    }
}

