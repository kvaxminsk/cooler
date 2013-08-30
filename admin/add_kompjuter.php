<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['type'])) {
    $type = $_POST['type'];
}
if (isset($_POST['main_link1'])) {
    $main_link1 = $_POST['main_link1'];
}
if (isset($main_link1)) {
    $main_link2 = $main_link1;
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
}
if (isset($image_alt)) {
    $image_title = $image_alt;
}
if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
    if ($cost == '') {
        unset($cost);
    }
}
if (isset($_POST['cost_clearing'])) {
    $cost_clearing = $_POST['cost_clearing'];
}
if (isset($_POST['cost_sb'])) {
    $cost_sb = $_POST['cost_sb'];
    if ($cost_sb == '') {
        unset($cost_sb);
    }
}
if (isset($_POST['cost_monitor'])) {
    $cost_monitor = $_POST['cost_monitor'];
    if ($cost_monitor == '') {
        unset($cost_monitor);
    }
}
if (isset($_POST['cost_keyboard'])) {
    $cost_keyboard = $_POST['cost_keyboard'];
    if ($cost_keyboard == '') {
        unset($cost_keyboard);
    }
}
if (isset($_POST['cost_mouse'])) {
    $cost_mouse = $_POST['cost_mouse'];
    if ($cost_mouse == '') {
        unset($cost_mouse);
    }
}
if (isset($_POST['cost_loudspeakers'])) {
    $cost_loudspeakers = $_POST['cost_loudspeakers'];
    if ($cost_loudspeakers == '') {
        unset($cost_loudspeakers);
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

if (isset($_POST['main_page']) && $_POST['main_page'] == 'yes') {
    $main_page = $_POST['main_page'];
    if ($main_link1 == '') {
        unset($main_link1);
    }
    if ($image_alt == '') {
        unset($image_alt);
    }
} else {
    $main_page = '';
    $main_link1 = '';
    $main_link2 = '';
    $image_alt = '';
    $image_title = '';
}

if ($type == 'ofisnyj') {
    if ($cost_clearing == '') {
        unset($cost_clearing);
    }
} else {
    $cost_clearing = '';
}
if (($type == 'akciya_domashnij') || ($type == 'akciya_igrovoj') || ($type == 'akciya_main_page') || ($type == 'akciya_radeon') || ($type == 'akciya_multimedijnyj')) {
    if (isset($type) && isset($title) && isset($image) && isset($image_alt) && isset($image_title) && isset($cost) && isset($processor) && isset($hdd) && isset($ram) && isset($optical_drive) && isset($motherboard) && isset($housing) && isset($vga) && isset($information) && isset($date)) {
        $result = mysql_query("INSERT INTO kompjuter (type,main_page,main_link1,main_link2,title,image,image_alt,image_title,cost,cost_clearing,cost_sb,cost_monitor,cost_keyboard,cost_mouse,cost_loudspeakers,processor,hdd,ram,optical_drive,motherboard,housing,vga,monitor,loudspeakers,information,date) VALUES ('$type','$main_page','$main_link1','$main_link2','$title','$image','$image_alt','$image_title','$cost','$cost_clearing','$cost_sb','$cost_monitor','$cost_keyboard','$cost_mouse','$cost_loudspeakers','$processor','$hdd','$ram','$optical_drive','$motherboard','$housing','$vga','$monitor','$loudspeakers','$information','$date')");

        $id = mysql_insert_id();
        header("Location:/admin/edit_kompjuter.php?id=" . $id . "&successfully=" . $result . "&change=add");
    } else {
        header("Location:/admin/new_kompjuter.php?successfully=2" . "&change=add");
    }
} else {
    if (isset($type) && isset($main_page) && isset($main_link1) && isset($main_link2) && isset($title) && isset($image) && isset($image_alt) && isset($image_title) && isset($cost) && isset($cost_clearing) && isset($cost_sb) && isset($cost_monitor) && isset($cost_keyboard) && isset($cost_mouse) && isset($cost_loudspeakers) && isset($processor) && isset($hdd) && isset($ram) && isset($optical_drive) && isset($motherboard) && isset($housing) && isset($vga) && isset($monitor) && isset($loudspeakers) && isset($information) && isset($date)) {
        $result = mysql_query("INSERT INTO kompjuter (type,main_page,main_link1,main_link2,title,image,image_alt,image_title,cost,cost_clearing,cost_sb,cost_monitor,cost_keyboard,cost_mouse,cost_loudspeakers,processor,hdd,ram,optical_drive,motherboard,housing,vga,monitor,loudspeakers,information,date) VALUES ('$type','$main_page','$main_link1','$main_link2','$title','$image','$image_alt','$image_title','$cost','$cost_clearing','$cost_sb','$cost_monitor','$cost_keyboard','$cost_mouse','$cost_loudspeakers','$processor','$hdd','$ram','$optical_drive','$motherboard','$housing','$vga','$monitor','$loudspeakers','$information','$date')");

        $id = mysql_insert_id();
        header("Location:/admin/edit_kompjuter.php?id=" . $id . "&successfully=" . $result . "&change=add");
    } else {
        header("Location:/admin/new_kompjuter.php?successfully=2" . "&change=add");
    }
}

?>