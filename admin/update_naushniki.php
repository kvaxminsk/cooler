<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['id'])) {
    $id = $_POST['id'];
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
if (isset($_POST['model'])) {
    $model = $_POST['model'];
    if ($model == '') {
        unset($model);
    }
}
if (isset($_POST['signal_shum'])) {
    $signal_shum = $_POST['signal_shum'];
    if ($signal_shum == '') {
        unset($signal_shum);
    }
}
if (isset($_POST['resist'])) {
    $resist = $_POST['resist'];
    if ($resist == '') {
        unset($resist);
    }
}
if (isset($_POST['microphone'])) {
    $microphone = $_POST['microphone'];
    if ($microphone == '') {
        unset($microphone);
    }
}
if (isset($_POST['volume_control'])) {
    $volume_control = $_POST['volume_control'];
    if ($volume_control == '') {
        unset($volume_control);
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

if (isset($image_small) && isset($image_big) && isset($model) && isset($signal_shum) && isset($resist) && isset($microphone) && isset($volume_control) && isset($cost) && isset($date)) {
    $result = mysql_query("UPDATE naushniki SET image_small='$image_small', image_big='$image_big', model='$model', signal_shum='$signal_shum', resist='$resist', microphone='$microphone', volume_control='$volume_control', cost='$cost', date='$date' WHERE id=$id");

    header("Location:/admin/edit_naushniki.php?id=" . $id . "&successfully=" . $result . "&change=edit");
} else {
    header("Location:/admin/edit_naushniki.php?id=" . $id . "&successfully=2" . "&change=edit");
}


?>
