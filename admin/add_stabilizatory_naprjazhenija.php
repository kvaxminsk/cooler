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
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    if ($input == '') {
        unset($input);
    }
}
if (isset($_POST['kol_roz'])) {
    $kol_roz = $_POST['kol_roz'];
    if ($kol_roz == '') {
        unset($kol_roz);
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

if (isset($image_small) && isset($image_big) && isset($model) && isset($power) && isset($input) && isset($kol_roz) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO stabilizatory_naprjazhenija (image_small,image_big,model,power,input,kol_roz,cost,date) VALUES ('$image_small','$image_big','$model','$power','$input','$kol_roz','$cost','$date')");
    $id = mysql_insert_id();
    header("Location:/admin/edit_stabilizatory_naprjazhenija.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_stabilizatory_naprjazhenija.php?successfully=2" . "&change=add");
}

?>
