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
if (isset($_POST['other'])) {
    $other = $_POST['other'];
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
    $result = mysql_query("INSERT INTO mjishji (model,image,other,cost,date) VALUES ('$model','$image','$other','$cost','$date')");

    $id = mysql_insert_id();
    header("Location:/admin/edit_mjishji.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_mjishji.php?successfully=2" . "&change=add");
}
?>
