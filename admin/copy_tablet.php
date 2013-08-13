<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/
?>
<?php

    $idTablet = (int) htmlspecialchars(trim($_GET['id']));

    $result = mysql_query("SELECT * FROM  tablet WHERE id_tablet=" . $idTablet, $db);
    $row = mysql_fetch_assoc($result);
    $idTabletOld = $row['id_tablet'];
    $strSql = "INSERT INTO tablet  (`name_tablet`, `design`, `screen_size`, `operating_system`, `operating_system_version`, `cpu`, `graphics_accelerator`, `ram`, `internal_memory`, `number_of_cores`, `clock_speed`, `case_material`, `battery_capacity`, `length`, `width`, `thickness`, `weight`, `accelerometer`, `gyroscope`, `proximity_sensor`, `screen_resolution`, `type_of_matrix_screen`, `multi_touch`, `text_multi_touch`, `protection_from_scratches`, `the_light_sensor`, `memory_cards`, `text_memory_cards`, `built-in_camera`, `number_of_active_pixels`,`number_of_active_pixels_front_camera`, `built-in_microphone`,`built_in_speakers`, `bluetooth`, `text_bluetooth`, `lan`, `wifi`, `text_wifi`, `3g_modem`, `text_3g_modem`, `usb_2`, `usb_3`, `hdmi`, `display_port`, `audio_outputs`, `docking_port`, `gps`, `electronic_compass`, `image_name`,`cost`, `manufacture`) VALUES(";
    array_shift($row);
    foreach($row as $key => $value)
    {
        $strSql .= "'" . $value . "', " ;
    }
    $strSql=substr($strSql, 0, strlen($strSql)-2);
    $strSql .=")";

    $result = mysql_query($strSql);
    $idTablet = mysql_insert_id();
    $result = mysql_query("SELECT image_name_tablet.* FROM  image_name_tablet WHERE id_tablet=" . $idTabletOld, $db);

    while($row = mysql_fetch_assoc($result))
    {
        $strSql ='';
        $strSql = "INSERT INTO image_name_tablet ( `name_image_name`, `id_tablet`) VALUES(" . $row['name_image_name'] . "," . $idTablet . ")";
        $result1 = mysql_query($strSql);

    }
die();


    $idInsertTablet = mysql_insert_id();
    //echo $idInsertSystemBlock;        die();
    header("Location:/admin/edit_tablet.php?id=" . $idInsertTablet ."&successfully=" . $result ."&change=add");