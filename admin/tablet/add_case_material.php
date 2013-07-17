<?php
    include ("../lock.php");
    include ("../blocks/bd.php");

if(isset($_POST['id_tablet']))
{
    echo '<option value="0" selected="selected">Материал корпуса</option>';
    if((isset($_POST['id_tablet'])))
    {
        $resultInsertCaseMaterialTablet = mysql_query("INSERT INTO case_material_system_block (`id_case_material` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_case_material'] ."','" . $_POST['id_system_block'] . "')");
        $resultSelectCaseMaterial = mysql_query("SELECT case_material.* FROM  case_material, case_material_system_block WHERE case_material.id= case_material_system_block.id_case_material  AND case_material_system_block.id_system_block = " . $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertCaseMaterialTablet = mysql_query("INSERT INTO case_material_system_block (`id_case_material` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_case_material'] ."','" . 0 . "')");
        $resultSelectCaseMaterial = mysql_query("SELECT case_material.* FROM  case_material, case_material_system_block WHERE case_material.id= case_material_system_block.id_case_material  AND case_material_system_block.id_system_block = " . 0, $db);
    }

    while($row = mysql_fetch_assoc($resultSelectCaseMaterial))
    {
        echo  '<option value="'.  $row['id'].'">' . $row['name_case_material'] . ' Core ' . $row['number_cores_case_material'] . ' ' . $row['speed_case_material'] . 'Гц </option>';
    }
}
else
{
    echo '<option value="0" selected="selected">Материал корпуса</option>';
    $nameCaseMaterial = htmlspecialchars(trim($_POST['name_case_material']));


    $resultInsertCaseMaterial = mysql_query("INSERT INTO case_material_tablet (`name_case_material`) VALUES ( '" . $nameCaseMaterial ."')") ;
    $resultSelectCaseMaterial = mysql_query("SELECT case_material_tablet.* FROM  case_material_tablet " , $db);

    while($row = mysql_fetch_assoc($resultSelectCaseMaterial))
    {
        echo  '<option value="'.  $row['id_case_material'].'">' . $row['name_case_material'] .  '</option>';
    }
}

