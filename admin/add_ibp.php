<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
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
if (isset($_POST['model'])) {
    $model = $_POST['model'];
    if ($model == '') {
        unset($model);
    }
}
if (isset($_POST['power'])) {
    $power = $_POST['power'];
    if ($power == '') {
        unset($power);
    }
}
if (isset($_POST['time_p'])) {
    $time_p = $_POST['time_p'];
    if ($time_p == '') {
        unset($time_p);
    }
}
if (isset($_POST['time_z'])) {
    $time_z = $_POST['time_z'];
    if ($time_z == '') {
        unset($time_z);
    }
}
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    if ($input == '') {
        unset($input);
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

if (isset($image_small) && isset($image_big) && isset($model) && isset($power) && isset($time_p) && isset($time_z) && isset($input) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO ibp (image_small,image_big,model,power,time_p,time_z,input,cost,date) VALUES ('$image_small','$image_big','$model','$power','$time_p','$time_z','$input','$cost','$date')");

    $id = mysql_insert_id();
    header("Location:/admin/edit_ibp.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_ibp.php?successfully=2" . "&change=add");
}

?>