<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['type'])) {
    $type = $_POST['type'];
}
if (isset($_POST['number'])) {
    $number = $_POST['number'];
    if ($number == '') {
        unset($number);
    }
}
if (isset($_POST['processor'])) {
    $processor = $_POST['processor'];
    if ($processor == '') {
        unset($processor);
    }
}
if (isset($_POST['ram'])) {
    $ram = $_POST['ram'];
    if ($ram == '') {
        unset($ram);
    }
}
if (isset($_POST['hdd'])) {
    $hdd = $_POST['hdd'];
    if ($hdd == '') {
        unset($hdd);
    }
}
if (isset($_POST['vga'])) {
    $vga = $_POST['vga'];
    if ($vga == '') {
        unset($vga);
    }
}
if (isset($_POST['motherboard'])) {
    $motherboard = $_POST['motherboard'];
    if ($motherboard == '') {
        unset($motherboard);
    }
}
if (isset($_POST['dvd_rw'])) {
    $dvd_rw = $_POST['dvd_rw'];
    if ($dvd_rw == '') {
        unset($dvd_rw);
    }
}
if (isset($_POST['housing'])) {
    $housing = $_POST['housing'];
    if ($housing == '') {
        unset($housing);
    }
}
if (isset($_POST['cost_sb_ue'])) {
    $cost_sb_ue = $_POST['cost_sb_ue'];
}
if (isset($_POST['cost_clearing'])) {
    $cost_clearing = $_POST['cost_clearing'];
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    if ($date == '') {
        unset($date);
    }
}

if ($type == 'beznal') {
    $cost_sb_ue = '';
} else {
    if ($cost_sb_ue == '') {
        unset($cost_sb_ue);
    }
}
if ($type == 'ofisnyj' || $type == 'beznal') {
    if ($cost_clearing == '') {
        unset($cost_clearing);
    }
} else {
    $cost_clearing = '';
}
?>

<?php
if (isset($type) && isset($number) && isset($processor) && isset($ram) && isset($hdd) && isset($vga) && isset($motherboard) && isset($dvd_rw) && isset($housing) && isset($cost_sb_ue) && isset($cost_clearing) && isset($date)) {
    $result = mysql_query("INSERT INTO build_computer (type,number,processor,ram,hdd,vga,motherboard,dvd_rw,housing,cost_sb_ue,cost_clearing,date) VALUES ('$type','$number','$processor','$ram','$hdd','$vga','$motherboard','$dvd_rw','$housing','$cost_sb_ue','$cost_clearing','$date')");

    $id = mysql_insert_id();
    header("Location:/admin/edit_build_computer.php?id=" . $id . "&successfully=" . $result . "&change=add");
} else {
    header("Location:/admin/new_build_computer.php?successfully=2" . "&change=add");
}

?>
