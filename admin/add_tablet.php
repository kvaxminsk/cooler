<?php
    include ("lock.php");
    include ("blocks/bd.php");/*Connecting to BD!*/
//    var_dump($_POST);die();



    foreach($_POST as $key => $value)
    {
        if($value == 'on')
        {
           $value = '1';
        }
       $insert[$key] = htmlspecialchars(trim($value));
    }
//print_r($insert);
//die();
    if(!empty($insert['id_tablet'] ) )
    {
        $strSql = "UPDATE `tablet` SET ";
        if (isset($insert['name_tablet']))
        {
            $strSql .= "`name_tablet`='" . $insert['name_tablet'] . "', " ;
        }
        else
        {

        }

        if(isset($insert['design']))
        {
            $strSql .= "`design`='" . $insert['design'] . "', " ;
        }
        else
        {

        }

        if(isset($insert['screen_size']))
        {
            $strSql .= "`screen_size`='" . $insert['screen_size'] . "', " ;
        }
        else
        {

        }

        if(isset($insert['operating_system']))
        {
            $strSql .= "`operating_system`='" . $insert['operating_system'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['operating_system_version']))
        {
            $strSql .= "`operating_system_version`='" . $insert['operating_system_version'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['cpu']))
        {
            $strSql .= "`cpu`='" . $insert['cpu'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['graphics_accelerator']))
        {
            $strSql .= "`graphics_accelerator`='" . $insert['graphics_accelerator'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['ram']))
        {
            $strSql .= "`ram`='" . $insert['ram'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['internal_memory']))
        {
            $strSql .= "`internal_memory`='" . $insert['internal_memory'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['number_of_cores']))
        {
            $strSql .= "`number_of_cores`='" . $insert['number_of_cores'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['clock_speed']))
        {
            $strSql .= "`clock_speed`='" . $insert['clock_speed'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['case_material'] ))
        {
            $strSql .= "`case_material`='" . $insert['case_material'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['battery_capacity']))
        {
            $strSql .= "`battery_capacity`='" . $insert['battery_capacity'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['length']))
        {
            $strSql .= "`length`='" . $insert['length'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['width']))
        {
            $strSql .= "`width`='" . $insert['width'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['thickness']))
        {
            $strSql .= "`thickness`='" . $insert['thickness'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['weight']))
        {
            $strSql .= "`weight`='" . $insert['weight'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['accelerometer']))
        {
            $strSql .= "`accelerometer`='" . $insert['accelerometer'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['case_material']))
        {
            $strSql .= "`case_material`='" . $insert['case_material'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['battery_capacity']))
        {
            $strSql .= "`battery_capacity`='" . $insert['battery_capacity'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['length']))
        {
            $strSql .= "`length`='" . $insert['length'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['width']))
        {
            $strSql .= "`width`='" . $insert['width'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['thickness']))
        {
            $strSql .= "`thickness`='" . $insert['thickness'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['weight']))
        {
            $strSql .= "`weight`='" . $insert['weight'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['accelerometer']))
        {
            $strSql .= "`accelerometer`='" . $insert['accelerometer'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['gyroscope']))
        {
            $strSql .= "`gyroscope`='" . $insert['gyroscope'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['proximity_sensor']))
        {
            $strSql .= "`proximity_sensor`='" . $insert['proximity_sensor'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['screen_resolution']))
        {
            $strSql .= "`screen_resolution`='" . $insert['screen_resolution'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['type_of_matrix_screen']))
        {
            $strSql .= "`type_of_matrix_screen`='" . $insert['type_of_matrix_screen'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['multi_touch']))
        {
            $strSql .= "`multi_touch`='" . $insert['multi_touch'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['text_multi_touch'] ))
        {
            $strSql .= "`text_multi_touch`='" . $insert['text_multi_touch'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['protection_from_scratches']))
        {
            $strSql .= "`protection_from_scratches`='" . $insert['protection_from_scratches'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['the_light_sensor']))
        {
            $strSql .= "`the_light_sensor`='" . $insert['the_light_sensor'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['memory_cards']))
        {
            $strSql .= "`memory_cards`='" . $insert['memory_cards'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['text_memory_cards']))
        {
            $strSql .= "`text_memory_cards`='" . $insert['text_memory_cards'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['built-in_camera']))
        {
            $strSql .= "`built-in_camera`='" . $insert['built-in_camera'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['number_of_active_pixels_front_camera']))
        {
            $strSql .= "`number_of_active_pixels_front_camera`='" . $insert['number_of_active_pixels_front_camera'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['built-in_microphone']))
        {
            $strSql .= "`built-in_microphone`='" . $insert['built-in_microphone'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['bluetooth']))
        {
            $strSql .= "`bluetooth`='" . $insert['bluetooth'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['text_bluetooth']))
        {
            $strSql .= "`text_bluetooth`='" . $insert['text_bluetooth'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['lan']))
        {
            $strSql .= "`lan`='" . $insert['lan'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['wifi']))
        {
            $strSql .= "`wifi`='" . $insert['wifi'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['text_wifi']))
        {
            $strSql .= "`text_wifi`='" . $insert['text_wifi'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['3g_modem']))
        {
            $strSql .= "`3g_modem`='" . $insert['3g_modem'] . "',"  ;

        }
        else
        {

        }
        if(isset($insert['text_3g_modem']))
        {
            $strSql .= "`text_3g_modem`='" . $insert['text_3g_modem'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['usb_2']))
        {
            $strSql .= "`usb_2`='" . $insert['usb_2'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['usb_3']))
        {
            $strSql .= "`usb_3`='" . $insert['usb_3'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['hdmi']))
        {
            $strSql .= "`hdmi`='" . $insert['hdmi']  . "', " ;

        }
        else
        {

        }
        if(isset($insert['display_port']))
        {
            $strSql .= "`display_port`='" .  $insert['display_port'] . "', " ;

        }
        else
        {

        }
        if(isset($insert['audio_outputs']))
        {
            $strSql .= "`audio_outputs`='" .  $insert['audio_outputs'] . "', "  ;

        }
        else
        {

        }
        if(isset($insert['docking_port']))
        {
            $strSql .= "`docking_port`='" . $insert['docking_port'] . "', "  ;

        }
        else
        {

        }
        if(isset($insert['gps'] ))
        {
            $strSql .= "`gps`='" .  $insert['gps']  . "', ";

        }
        else
        {

        }
        if(isset($insert['electronic_compass']))
        {
            $strSql .= "`electronic_compass` = '" .  $insert['electronic_compass'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['image_name']))
        {
            $strSql .= "`image_name` = '" .  $insert['image_name'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['cost']))
        {
            $strSql .= "`cost` = '" .  $insert['cost'] . "', " ;
        }
        else
        {

        }
        if(isset($insert['manufacture']))
        {
            $strSql .= "`manufacture` = '" .  $insert['manufacture'] . "', " ;
        }
        else
        {

        }
        $strSql = (substr($strSql, 0, strlen($strSql)-2));
//        echo $strSql;die();
        $strSql .= " WHERE `tablet`.`id_tablet` =" . $insert['id_tablet'] ;
//        echo $strSql;die();
        $idInsertSystemBlock = $insert['id_tablet'];
        $result = mysql_query($strSql);
        header("Location:/admin/edit_tablet.php?id=" . $idInsertSystemBlock ."&successfully=" . $result ."&change=edit");

    }
    else
    {
        $strSql = "INSERT INTO tablet  (`name_tablet`, `design`, `screen_size`, `operating_system`, `operating_system_version`, `cpu`, `graphics_accelerator`, `ram`, `internal_memory`, `number_of_cores`, `clock_speed`, `case_material`, `battery_capacity`, `length`, `width`, `thickness`, `weight`, `accelerometer`, `gyroscope`, `proximity_sensor`, `screen_resolution`, `type_of_matrix_screen`, `multi_touch`, `text_multi_touch`, `protection_from_scratches`, `the_light_sensor`, `memory_cards`, `text_memory_cards`, `built-in_camera`, `number_of_active_pixels`,`number_of_active_pixels_front_camera`, `built-in_microphone`,`built_in_speakers`, `bluetooth`, `text_bluetooth`, `lan`, `wifi`, `text_wifi`, `3g_modem`, `text_3g_modem`, `usb_2`, `usb_3`, `hdmi`, `display_port`, `audio_outputs`, `docking_port`, `gps`, `electronic_compass`, `image_name`,`cost`, `manufacture`) VALUES(";
//        $strSql .= "'" . $insert['name_tablet'] . "', ";
//        $strSql .= "'" . $insert['cpu'] . "', ";
//        $strSql .= "'" . $insert['hdd'] ."',";
//        $strSql .= "'" . $insert['random_access_memory'] ."',";
//        $strSql .= "'" . $insert['optical_drive'] ."',";
//        $strSql .= "'" . $insert['computer_case'] ."',";
//        $strSql .= "'" . $insert['motherboard'] ."',";
//        $strSql .= "'" . $insert['vga'] ."',";
//        $strSql .= "'" . $insert['power_unit'] ."',";
//        $strSql .= "'" . $insert['url_image'] ."',";
//        $strSql .= "'" . $insert['cost'] ."'";
//        $strSql .=")";
        if (isset($insert['name_tablet']))
        {
            $strSql .= "'" . $insert['name_tablet'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['design']))
        {
            $strSql .= "'" . $insert['design'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['screen_size']))
        {
            $strSql .= "'" . $insert['screen_size'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['operating_system']))
        {
            $strSql .= "'" . $insert['operating_system'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['operating_system_version']))
        {
            $strSql .= "'" . $insert['operating_system_version'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['cpu']))
        {
            $strSql .= "'" . $insert['cpu'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['graphics_accelerator']))
        {
            $strSql .= "'" . $insert['graphics_accelerator'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['ram']))
        {
            $strSql .= "'" . $insert['ram'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['internal_memory']))
        {
            $strSql .= "'" . $insert['internal_memory'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['number_of_cores']))
        {
            $strSql .= "'" . $insert['number_of_cores'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['clock_speed']))
        {
            $strSql .= "'" . $insert['clock_speed'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['case_material'] ))
        {
            $strSql .= "'" . $insert['case_material'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['battery_capacity']))
        {
            $strSql .= "'" . $insert['battery_capacity'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['length']))
        {
            $strSql .= "'" . $insert['length'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['width']))
        {
            $strSql .= "'" . $insert['width'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['thickness']))
        {
            $strSql .= "'" . $insert['thickness'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['weight']))
        {
            $strSql .= "'" . $insert['weight'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['accelerometer']))
        {
            $strSql .= "'" . $insert['accelerometer'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }

        if(isset($insert['gyroscope']))
        {
            $strSql .= "'" . $insert['gyroscope'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['proximity_sensor']))
        {
            $strSql .= "'" . $insert['proximity_sensor'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['screen_resolution']))
        {
            $strSql .= "'" . $insert['screen_resolution'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['type_of_matrix_screen']))
        {
            $strSql .= "'" . $insert['type_of_matrix_screen'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['multi_touch']))
        {
            $strSql .= "'" . $insert['multi_touch'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['text_multi_touch'] ))
        {
            $strSql .= "'" . $insert['text_multi_touch'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['protection_from_scratches']))
        {
            $strSql .= "'" . $insert['protection_from_scratches'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['the_light_sensor']))
        {
            $strSql .= "'" . $insert['the_light_sensor'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['memory_cards']))
        {
            $strSql .= "'" . $insert['memory_cards'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['text_memory_cards']))
        {
            $strSql .= "'" . $insert['text_memory_cards'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['built-in_camera']))
        {
            $strSql .= "'" . $insert['built-in_camera'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['number_of_active_pixels']))
        {
            $strSql .= "'" . $insert['number_of_active_pixels'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['number_of_active_pixels_front_camera']))
        {
            $strSql .= "'" . $insert['number_of_active_pixels_front_camera'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['built-in_microphone']))
        {
            $strSql .= "'" . $insert['built-in_microphone'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['built_in_speakers']))
        {
            $strSql .= "'" . $insert['built_in_speakers'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['bluetooth']))
        {
            $strSql .= "'" . $insert['bluetooth'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['text_bluetooth']))
        {
            $strSql .= "'" . $insert['text_bluetooth'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['lan']))
        {
            $strSql .= "'" . $insert['lan'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['wifi']))
        {
            $strSql .= "'" . $insert['wifi'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['text_wifi']))
        {
            $strSql .= "'" . $insert['text_wifi'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['3g_modem']))
        {
            $strSql .= "'" . $insert['3g_modem'] . "',"  ;

        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['text_3g_modem']))
        {
            $strSql .= "'" . $insert['text_3g_modem'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['usb_2']))
        {
            $strSql .= "'" . $insert['usb_2'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['usb_3']))
        {
            $strSql .= "'" . $insert['usb_3'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['hdmi']))
        {
            $strSql .= "'" . $insert['hdmi']  . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['display_port']))
        {
            $strSql .= "'" .  $insert['display_port'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['audio_outputs']))
        {
            $strSql .= "'" .  $insert['audio_outputs'] . "', "  ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['docking_port']))
        {
            $strSql .= "'" . $insert['docking_port'] . "', "  ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['gps'] ))
        {
            $strSql .= "'" .  $insert['gps']  . "',";
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['electronic_compass']))
        {
            $strSql .= "'" .  $insert['electronic_compass'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['image_name']))
        {
            $strSql .= "'" .  $insert['image_name'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['cost']))
        {
            $strSql .= "'" .  $insert['cost'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        if(isset($insert['manufacture']))
        {
            $strSql .= "'" .  $insert['manufacture'] . "', " ;
        }
        else
        {
            $strSql .= "'', " ;
        }
        $strSql=substr($strSql, 0, strlen($strSql)-2);
        $strSql .=")";
//        echo $strSql;        die();
        $result = mysql_query($strSql);

        $idInsertSystemBlock = mysql_insert_id();
        //echo $idInsertSystemBlock;        die();
        header("Location:/admin/edit_tablet.php?id=" . $idInsertSystemBlock ."&successfully=" . $result ."&change=add");
    }



?>