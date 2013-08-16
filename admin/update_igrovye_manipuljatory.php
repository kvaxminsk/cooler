<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
if (isset($_POST['id']))
{
    $id = $_POST['id'];
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
if (isset($_POST['interface']))
{
    $interface = $_POST['interface'];
    if ($interface == '')
    {
        unset($interface);
    }
}
if (isset($_POST['buttons']))
{
    $buttons = $_POST['buttons'];
    if ($buttons == '')
    {
        unset($buttons);
    }
}
if (isset($_POST['vibration']))
{
    $vibration = $_POST['vibration'];
    if ($vibration == '')
    {
        unset($vibration);
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

if (isset($image_small) && isset($image_big) && isset($model) && isset($interface) && isset($buttons) && isset($vibration) && isset($cost) && isset($date))
{
    $result = mysql_query("UPDATE igrovye_manipuljatory SET image_small='$image_small', image_big='$image_big', model='$model', interface='$interface', buttons='$buttons', vibration='$vibration', cost='$cost', date='$date' WHERE id=$id");
    header("Location:/admin/edit_igrovye_manipuljatory.php?id=" . $id . "&successfully=" . $result . "&change=edit");
}
else
{
    header("Location:/admin/edit_igrovye_manipuljatory.php?id=" . $id . "&successfully=2" . "&change=edit");
}

?>
