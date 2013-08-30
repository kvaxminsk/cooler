<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
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
    $result = mysql_query("UPDATE build_computer SET type='$type', number='$number', processor='$processor', ram='$ram', hdd='$hdd', vga='$vga', motherboard='$motherboard', dvd_rw='$dvd_rw', housing='$housing', cost_sb_ue='$cost_sb_ue', cost_clearing='$cost_clearing', date='$date' WHERE id=$id");

    header("Location:/admin/edit_build_computer.php?id=" . $id . "&successfully=" . $result . "&change=edit");
} else {
    header("Location:/admin/edit_build_computer.php?id=" . $id . "&successfully=2" . "&change=edit");
}


?>
