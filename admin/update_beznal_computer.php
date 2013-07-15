<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    if ($title == '') {
        unset($title);
    }
}
if (isset($_POST['image'])) {
    $image = $_POST['image'];
    if ($image == '') {
        unset($image);
    }
}
if (isset($_POST['image_alt'])) {
    $image_alt = $_POST['image_alt'];
    if ($image_alt == '') {
        unset($image_alt);
    }
}
if (isset($image_alt)) {
    $image_title = $image_alt;
}
if (isset($_POST['beznal'])) {
    $beznal = $_POST['beznal'];
    if ($beznal == '') {
        unset($beznal);
    }
}
if (isset($_POST['beznal_sb'])) {
    $beznal_sb = $_POST['beznal_sb'];
    if ($beznal_sb == '') {
        unset($beznal_sb);
    }
}
if (isset($_POST['beznal_monitor'])) {
    $beznal_monitor = $_POST['beznal_monitor'];
    if ($beznal_monitor == '') {
        unset($beznal_monitor);
    }
}
if (isset($_POST['beznal_keyboard'])) {
    $beznal_keyboard = $_POST['beznal_keyboard'];
    if ($beznal_keyboard == '') {
        unset($beznal_keyboard);
    }
}
if (isset($_POST['beznal_mouse'])) {
    $beznal_mouse = $_POST['beznal_mouse'];
    if ($beznal_mouse == '') {
        unset($beznal_mouse);
    }
}
if (isset($_POST['beznal_loudspeakers'])) {
    $beznal_loudspeakers = $_POST['beznal_loudspeakers'];
    if ($beznal_loudspeakers == '') {
        unset($beznal_loudspeakers);
    }
}
if (isset($_POST['processor'])) {
    $processor = $_POST['processor'];
    if ($processor == '') {
        unset($processor);
    }
}
if (isset($_POST['hdd'])) {
    $hdd = $_POST['hdd'];
    if ($hdd == '') {
        unset($hdd);
    }
}
if (isset($_POST['ram'])) {
    $ram = $_POST['ram'];
    if ($ram == '') {
        unset($ram);
    }
}
if (isset($_POST['optical_drive'])) {
    $optical_drive = $_POST['optical_drive'];
    if ($optical_drive == '') {
        unset($optical_drive);
    }
}
if (isset($_POST['motherboard'])) {
    $motherboard = $_POST['motherboard'];
    if ($motherboard == '') {
        unset($motherboard);
    }
}
if (isset($_POST['housing'])) {
    $housing = $_POST['housing'];
    if ($housing == '') {
        unset($housing);
    }
}
if (isset($_POST['vga'])) {
    $vga = $_POST['vga'];
    if ($vga == '') {
        unset($vga);
    }
}
if (isset($_POST['monitor'])) {
    $monitor = $_POST['monitor'];
    if ($monitor == '') {
        unset($monitor);
    }
}
if (isset($_POST['loudspeakers'])) {
    $loudspeakers = $_POST['loudspeakers'];
    if ($loudspeakers == '') {
        unset($loudspeakers);
    }
}
if (isset($_POST['information'])) {
    $information = $_POST['information'];
    if ($information == '') {
        unset($information);
    }
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    if ($date == '') {
        unset($date);
    }
}

if (isset($title) && isset($image) && isset($image_alt) && isset($image_title) && isset($beznal) && isset($beznal_sb) && isset($beznal_monitor) && isset($beznal_keyboard) && isset($beznal_mouse) && isset($beznal_loudspeakers) && isset($processor) && isset($hdd) && isset($ram) && isset($optical_drive) && isset($motherboard) && isset($housing) && isset($vga) && isset($monitor) && isset($loudspeakers) && isset($information) && isset($date)) {
    $result = mysql_query("UPDATE beznal_computer SET title='$title', image='$image', image_alt='$image_alt', image_title='$image_title', beznal='$beznal', beznal_sb='$beznal_sb', beznal_monitor='$beznal_monitor', beznal_keyboard='$beznal_keyboard', beznal_mouse='$beznal_mouse', beznal_loudspeakers='$beznal_loudspeakers', processor='$processor', hdd='$hdd', ram='$ram', optical_drive='$optical_drive', motherboard='$motherboard', housing='$housing', vga='$vga', monitor='$monitor', loudspeakers='$loudspeakers', information='$information', date='$date' WHERE id=$id");

    header("Location:/admin/edit_beznal_computer.php?id=" . $id ."&successfully=" . $result ."&change=edit");
}
else
{
    header("Location:/admin/edit_beznal_computer.php?id=" . $id ."&successfully=2"."&change=edit" );
}


?>
