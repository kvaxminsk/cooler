<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['model'])) {
    $model = $_POST['model'];
    if ($model == '') {
        unset($model);
    }
}
if (isset($_POST['image'])) {
    $image = $_POST['image'];
    if ($image == '') {
        unset($image);
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

if (isset($model) && isset($image) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO klaviaturji (model,image,cost,date) VALUES ('$model','$image','$cost','$date')");

    $id = mysql_insert_id();
    header("Location:/admin/edit_klaviaturji.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_klaviaturji.php?successfully=2" . "&change=add");
}

?>