<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['id']))
{
    $id = $_POST['id'];
}

if (isset($_POST['type']))
{
    $type = $_POST['type'];
}
if (isset($_POST['series']))
{
    $series = $_POST['series'];
}
if (isset($_POST['image_small']))
{
    $image_small = $_POST['image_small'];
    if ($image_small == '')
    {
        unset($image_small);
    }
}
if (isset($_POST['image_big']))
{
    $image_big = $_POST['image_big'];
    if ($image_big == '')
    {
        unset($image_big);
    }
}
if (isset($_POST['model']))
{
    $model = $_POST['model'];
    if ($model == '')
    {
        unset($model);
    }
}
if (isset($_POST['color_print']))
{
    $color_print = $_POST['color_print'];
    if ($color_print == '')
    {
        unset($color_print);
    }
}
if (isset($_POST['functions']))
{
    $functions = $_POST['functions'];
    if ($functions == '')
    {
        unset($functions);
    }
}
if (isset($_POST['format']))
{
    $format = $_POST['format'];
    if ($format == '')
    {
        unset($format);
    }
}
if (isset($_POST['resolution_max']))
{
    $resolution_max = $_POST['resolution_max'];
    if ($resolution_max == '')
    {
        unset($resolution_max);
    }
}
if (isset($_POST['kol_color']))
{
    $kol_color = $_POST['kol_color'];
    if ($kol_color == '')
    {
        unset($kol_color);
    }
}
if (isset($_POST['bez_pc']))
{
    $bez_pc = $_POST['bez_pc'];
    if ($bez_pc == '')
    {
        unset($bez_pc);
    }
}
if (isset($_POST['wi_fi']))
{
    $wi_fi = $_POST['wi_fi'];
    if ($wi_fi == '')
    {
        unset($wi_fi);
    }
}
if (isset($_POST['ethernet']))
{
    $ethernet = $_POST['ethernet'];
    if ($ethernet == '')
    {
        unset($ethernet);
    }
}
if (isset($_POST['bluetooth']))
{
    $bluetooth = $_POST['bluetooth'];
    if ($bluetooth == '')
    {
        unset($bluetooth);
    }
}
if (isset($_POST['fax']))
{
    $fax = $_POST['fax'];
    if ($fax == '')
    {
        unset($fax);
    }
}
if (isset($_POST['card']))
{
    $card = $_POST['card'];
    if ($card == '')
    {
        unset($card);
    }
}
if (isset($_POST['lcd']))
{
    $lcd = $_POST['lcd'];
    if ($lcd == '')
    {
        unset($lcd);
    }
}
if (isset($_POST['photo_print']))
{
    $photo_print = $_POST['photo_print'];
    if ($photo_print == '')
    {
        unset($photo_print);
    }
}
if (isset($_POST['information']))
{
    $information = $_POST['information'];
}
if (isset($_POST['weight']))
{
    $weight = $_POST['weight'];
    if ($weight == '')
    {
        unset($weight);
    }
}
if (isset($_POST['height']))
{
    $height = $_POST['height'];
    if ($height == '')
    {
        unset($height);
    }
}
if (isset($_POST['width']))
{
    $width = $_POST['width'];
    if ($width == '')
    {
        unset($width);
    }
}
if (isset($_POST['depth']))
{
    $depth = $_POST['depth'];
    if ($depth == '')
    {
        unset($depth);
    }
}
if (isset($_POST['cost']))
{
    $cost = $_POST['cost'];
    if ($cost == '')
    {
        unset($cost);
    }
}
if (isset($_POST['date']))
{
    $date = $_POST['date'];
    if ($date == '')
    {
        unset($date);
    }
}

if ($_POST['type'] == 'laser' || $_POST['type'] == 'mfu')
{
    $series = '';
}

if (isset($type) && isset($series) && isset($image_small) && isset($image_big) && isset($model) && isset($color_print) && isset($functions) && isset($format) && isset($resolution_max) && isset($kol_color) && isset($bez_pc) && isset($wi_fi) && isset($ethernet) && isset($bluetooth) && isset($fax) && isset($card) && isset($lcd) && isset($photo_print) /*&& isset($information)*/ && isset($weight) && isset($height) && isset($width) && isset($depth) && isset($cost) && isset($date))
{
    $result = mysql_query("UPDATE printer SET type='$type', series='$series', image_small='$image_small', image_big='$image_big', model='$model', color_print='$color_print', functions='$functions', format='$format', resolution_max='$resolution_max', kol_color='$kol_color', bez_pc='$bez_pc', wi_fi='$wi_fi', ethernet='$ethernet', bluetooth='$bluetooth', fax='$fax', card='$card', lcd='$lcd', photo_print='$photo_print', information='$information', weight='$weight', height='$height', width='$width', depth='$depth', cost='$cost', date='$date' WHERE id=$id");
    header("Location:/admin/edit_printer.php?id=" . $id . "&successfully=" . $result . "&change=edit");
}
else
{
    header("Location:/admin/edit_printer.php?id=" . $id . "&successfully=2" . "&change=edit");
}

?>
