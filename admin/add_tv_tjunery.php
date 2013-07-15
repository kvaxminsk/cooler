<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
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
if (isset($_POST['information'])) {
    $information = $_POST['information'];
    if ($information == '') {
        unset($information);
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
if (isset($image_small) && isset($image_big) && isset($model) && isset($information) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO tv_tjunery (image_small,image_big,model,information,cost,date) VALUES ('$image_small', '$image_big', '$model', '$information', '$cost', '$date')");

    $id = mysql_insert_id();
    header("Location:/admin/edit_tv_tjunery.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_tv_tjunery.php?successfully=2" . "&change=add");
}


?>
