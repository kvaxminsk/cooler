<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Редактирование</title>
    <link href="default.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="index/index.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- начало стр -->
<div id="wrapper">

<?php include("index/header-callme.txt"); ?>

<!-- start page -->
<div id="page">
<div id="bgtop"></div>
<div id="bgbottom">

<!-- start menu -->

<?php include("index/menu.txt"); ?>

<!-- начало Right -->
<div id="right">
<div id="text"><h1>Редактирование</h1><br/></div>
<div id="text"><br/>
<?php
echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_printer.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=epson_snpch&series=epson_stylus'>Редактировать</a></td>
  </tr>
</table></div><br />";
?>
<?php
echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='edit_printer.php?type=epson_snpch&series=epson_stylus'>Принтеры и МФУ Epson с СНПЧ</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=laser'>Принтеры лазерные</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=mfu'>МФУ</a></td>
  </tr>
</table></div><br />";
?>
<?php
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (!isset($id)) {
    if ($type == 'epson_snpch') {
        echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='edit_printer.php?type=$type&series=epson_stylus'>Epson Stylus</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=$type&series=epson_stylus_photo'>Epson Stylus Photo</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=$type&series=epson_l_series'>Epson L-серия</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=$type&series=epson_workforce'>Epson WorkForce</a></td>
  </tr>
</table></div><br />";
        if (isset($_GET['series'])) {
            $series = $_GET['series'];
        }
        $result = mysql_query("SELECT type,model,id FROM printer WHERE type='$type' AND series='$series' ORDER BY model", $db);
    } else {
        $result = mysql_query("SELECT type,model,id FROM printer WHERE type='$type' ORDER BY model", $db);
    }


    if (!$result) {
        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
        exit (mysql_error());
    }

    if (mysql_num_rows($result) > 0) {
        $myrow = mysql_fetch_array($result);
    } else {
        echo "<p>Нет записей!</p>";
        exit ();
    }


    echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_printer.php' method='post'>";
    $cols = 1; //  desired count of columns
    $col = 0;

    do {

        if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
        printf("<TD id='td_edit'><a href='edit_printer.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["model"]);

        $col++;
        if ($col == $cols) {
            echo "</TR>";
            $col = 0;

        }

    } while ($myrow = mysql_fetch_array($result));
    echo "</TABLE></form>";
} else {
    $result = mysql_query("SELECT * FROM printer WHERE id=$id", $db);

    if (!$result) {
        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
        exit (mysql_error());
    }

    if (mysql_num_rows($result) > 0) {
        $myrow = mysql_fetch_array($result);
    } else {
        echo "<p>Нет записей!</p>";
        exit ();
    }

    $result2 = mysql_query("SELECT type,title FROM categories_printer", $db);

    if (!$result2) {
        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
        exit (mysql_error());
    }

    if (mysql_num_rows($result2) > 0) {
        $myrow2 = mysql_fetch_array($result2);
    } else {
        echo "<p>Нет записей!</p>";
        exit ();
    }

    $result3 = mysql_query("SELECT series,title FROM printer_series", $db);

    if (!$result3) {
        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
        exit (mysql_error());
    }

    if (mysql_num_rows($result3) > 0) {
        $myrow3 = mysql_fetch_array($result3);
    } else {
        echo "<p>Нет записей!</p>";
        exit ();
    }

    echo "<br /><div id='forma'>  ";

    if (isset($_GET['successfully'])) {
        if ($_GET['successfully'] == '1') {
            if ($_GET['change'] == 'add') {
                echo "<h1 style='color:blue'>Данные успешно добавлены</h1>";
            } elseif ($_GET['change'] == 'edit') {
                echo "<h1 style='color:blue'>Данные успешно отредактированы</h1>";
            }
        } elseif ($_GET['successfully'] == '0') {
            if ($_GET['change'] == 'add') {
                echo "<h1 style='color:blue'>Данные не добавлены</h1>";
            } elseif ($_GET['change'] == 'edit') {
                echo "<h1 style='color:blue'>Данные не отредактированы</h1>";
            }
        } elseif ($_GET['successfully'] == '2') {
            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
        }
    }


    echo "<form id='form1' method='post' action='update_printer.php'>
<table width='680' border='0' cellspacing='10' cellpadding='340'>
  <tr>
    <td><label>Тип принтера</label></td>
    <td><select name='type' id='type'>";

    do {
        if ($myrow['type'] == $myrow2['type']) {
            printf("<option value='%s' selected>%s</option>", $myrow2['type'], $myrow2['title']);
        } else {
            printf("<option value='%s'>%s</option>", $myrow2['type'], $myrow2['title']);
        }
    } while ($myrow2 = mysql_fetch_array($result2));
    echo "</select></td></tr>";


    echo "<tr>
    <td><label>Серия <em>(для принтеров и МФУ Epson с СНПЧ)</em></label></td>
    <td><select name='series' id='series'>";

    do {
        if ($myrow['series'] == $myrow3['series']) {
            printf("<option value='%s' selected>%s</option>", $myrow3['series'], $myrow3['title']);
        } else {
            printf("<option value='%s'>%s</option>", $myrow3['series'], $myrow3['title']);
        }
    } while ($myrow3 = mysql_fetch_array($result3));
    echo "</select></td></tr>";


    print <<<HERE


  
    
   <tr>
  <td><label>Ссылка на маленькое изображение <em>(пример: snpch/small/sn-1.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: ширина жесткая <strong>150px</strong>. </label></td>
  <td><input value="$myrow[image_small]" name="image_small" type="text" id="image_small" size="60" /></td>
  </tr>
  <tr>
  <td><label>Ссылка на большое изображение <em>(пример: snpch/sn-1.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: нет ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
  <td><input value="$myrow[image_big]" name="image_big" type="text" id="image_big" size="60" /></td>
  </tr> 
  <tr>
  <td><label>Модель</label></td>
  <td><input value="$myrow[model]" name="model" type="text" id="model" size="60" /></td>
  </tr>
  <tr>
  <td><label>Печать</label></td>
  <td><input value="$myrow[color_print]" name="color_print" type="text" id="color_print" size="60" /></td>
  </tr>
  <tr>
  <td><label>Функции</label></td>
  <td><input value="$myrow[functions]" name="functions" type="text" id="functions" size="60" /></td>
  </tr>
  <tr>
  <td><label>Формат</label></td>
  <td><input value="$myrow[format]" name="format" type="text" id="format" size="60" /></td>
  </tr>
    <tr>
  <td><label>Разрешение макс</label></td>
  <td><input value="$myrow[resolution_max]" name="resolution_max" type="text" id="resolution_max" size="60" /></td>
  </tr>
    <tr>
  <td><label>Кол-во цветов</label></td>
  <td><input value="$myrow[kol_color]" name="kol_color" type="text" id="kol_color" size="60" /></td>
  </tr>
    <tr>
  <td><label>Печать без компьютера</label></td>
  <td><input value="$myrow[bez_pc]" name="bez_pc" type="text" id="bez_pc" size="60" /></td>
  </tr>
    <tr>
  <td><label>Wi-Fi</label></td>
  <td><input value="$myrow[wi_fi]" name="wi_fi" type="text" id="wi_fi" size="60" /></td>
  </tr>
   <tr>
  <td><label>Ethernet</label></td>
  <td><input value="$myrow[ethernet]" name="ethernet" type="text" id="ethernet" size="60" /></td>
  </tr>
   <tr>
  <td><label>Bluetooth</label></td>
  <td><input value="$myrow[bluetooth]" name="bluetooth" type="text" id="bluetooth" size="60" /></td>
  </tr>
   <tr>
  <td><label>Факс</label></td>
  <td><input value="$myrow[fax]" name="fax" type="text" id="fax" size="60" /></td>
  </tr>
  <tr>
  <td><label>Картридер</label></td>
  <td><input value="$myrow[card]" name="card" type="text" id="card" size="60" /></td>
  </tr>
  <tr>
  <td><label>ЖК-дисплей</label></td>
  <td><input value="$myrow[lcd]" name="lcd" type="text" id="lcd" size="60" /></td>
  </tr>
  <tr>
  <td><label>Фотопечать</label></td>
  <td><input value="$myrow[photo_print]" name="photo_print" type="text" id="photo_print" size="60" /></td>
  </tr>
  <tr>
  <td><label>Прочее <em>(для принудительного перехода строки используйте тег <strong>&lt;br /&gt;</strong>)</em></label></td>
  <td><textarea name="information" cols="46" rows="6" id="information">$myrow[information]</textarea></td>
  </tr>
  <tr>
  <td><label>Вес, кг</label></td>
  <td><input value="$myrow[weight]" name="weight" type="text" id="weight" size="60" /></td>
  </tr>
  <tr>
  <td><label>Высота, мм</label></td>
  <td><input value="$myrow[height]" name="height" type="text" id="height" size="60" /></td>
  </tr>
  <tr>
  <td><label>Ширина, мм</label></td>
  <td><input value="$myrow[width]" name="width" type="text" id="width" size="60" /></td>
  </tr>
  <tr>
  <td><label>Глубина, мм</label></td>
  <td><input value="$myrow[depth]" name="depth" type="text" id="depth" size="60" /></td>
  </tr>
   <tr>
  <td><label>Стоимость</label></td>
  <td><input value="$myrow[cost]" name="cost" type="text" id="cost" size="60" /></td>
  </tr>
   <tr>
  <td><label>Дата <em>(автоматический)</em></label></td>
  <td><input name="date" type="text" id="date" size="60" value="$myrow[date]" /></td>
  </tr>
  <input name="id" type="hidden" value="$myrow[id]" />
   <tr>
  <td colspan="2"><input type="submit" name="submit" id="submit" value="Обновить" /></td>
  <td></td>
  </tr>
</table>
</form> </div><br />

HERE;
}
?>
<br/>

</div>
<div id="text_footer"></div>
</div>
<div style="clear: both;">&nbsp;</div>
</div>
</div>
<hr/>
<!-- start footer -->
<?php include("index/footer.txt"); ?>
</div>
</body>
</html>
