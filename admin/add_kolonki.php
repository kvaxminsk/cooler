<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['type'])) {
    $type = $_POST['type'];
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
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    if ($color == '') {
        unset($color);
    }
}
if (isset($_POST['power'])) {
    $power = $_POST['power'];
    if ($power == '') {
        unset($power);
    }
}
if (isset($_POST['material'])) {
    $material = $_POST['material'];
    if ($material == '') {
        unset($material);
    }
}
if (isset($_POST['diapozon'])) {
    $diapozon = $_POST['diapozon'];
    if ($diapozon == '') {
        unset($diapozon);
    }
}
if (isset($_POST['size'])) {
    $size = $_POST['size'];
    if ($size == '') {
        unset($size);
    }
}
if (isset($_POST['other'])) {
    $other = $_POST['other'];
    if ($other == '') {
        unset($other);
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

if (isset($type) && isset($image_small) && isset($image_big) && isset($model) && isset($color) && isset($power) && isset($material) && isset($diapozon) && isset($size) && isset($other) && isset($cost) && isset($date)) {
    $result = mysql_query("INSERT INTO kolonki (type,image_small,image_big,model,color,power,material,diapozon,size,other,cost,date) VALUES ('$type','$image_small','$image_big','$model','$color','$power','$material','$diapozon','$size','$other','$cost','$date')");


    $id = mysql_insert_id();
    header("Location:/admin/edit_kolonki.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_kolonki.php?successfully=2" . "&change=add");
}


?>