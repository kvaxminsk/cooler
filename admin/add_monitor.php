<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['brand'])) {
    $brand = $_POST['brand'];
}
if (isset($_POST['series'])) {
    $series = $_POST['series'];
}
if (isset($_POST['model'])) {
    $model = $_POST['model'];
    if ($model == '') {
        unset($model);
    }
}
if (isset($_POST['image_small'])) {
    $image_small = $_POST['image_small'];
    if ($image_small == '') {
        unset($image_small);
    }
}
if (isset($_POST['image_big'])) {
    $image_big = $_POST['image_big'];
    if ($image_big == '') {
        unset($image_big);
    }
}
if (isset($_POST['format'])) {
    $format = $_POST['format'];
    if ($format == '') {
        unset($format);
    }
}
if (isset($_POST['resolution'])) {
    $resolution = $_POST['resolution'];
    if ($resolution == '') {
        unset($resolution);
    }
}
if (isset($_POST['contrast'])) {
    $contrast = $_POST['contrast'];
    if ($contrast == '') {
        unset($contrast);
    }
}
if (isset($_POST['response_time'])) {
    $response_time = $_POST['response_time'];
    if ($response_time == '') {
        unset($response_time);
    }
}
if (isset($_POST['angles'])) {
    $angles = $_POST['angles'];
    if ($angles == '') {
        unset($angles);
    }
}
if (isset($_POST['connector'])) {
    $connector = $_POST['connector'];
    if ($connector == '') {
        unset($connector);
    }
}
if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
    if ($cost == '') {
        unset($cost);
    }
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    if ($date == '') {
        unset($date);
    }
}

if ($_POST['brand'] == 'acer' || $_POST['brand'] == 'benq' || $_POST['brand'] == 'viewsonic') {
    $series = '';
}

if (isset($brand) && isset($series) && isset($model) && isset($image_small) && isset($image_big) && isset($format) && isset($resolution) && isset($contrast) && isset($response_time) && isset($angles) && isset($connector) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO monitor (brand,series,model,image_small,image_big,format,resolution,contrast,response_time,angles,connector,cost,date) VALUES ('$brand', '$series', '$model', '$image_small', '$image_big', '$format', '$resolution', '$contrast', '$response_time', '$angles', '$connector', '$cost', '$date')");


    $id = mysql_insert_id();
    header("Location:/admin/edit_monitor.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_monitor.php?successfully=2" . "&change=add");
}


?>

