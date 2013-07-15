<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
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

<?php include ("index/header-callme.txt"); ?>

<!-- start page -->
<div id="page">
<div id="bgtop"></div>
<div id="bgbottom">

<!-- start menu -->

<?php include ("index/menu.txt"); ?>

<!-- начало Right -->
<div id="right">
<div id="text"><h1>Редактирование</h1><br/></div>
<div id="text">
<br>
<?php
echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='edit_monitor.php?brand=acer'>Acer</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=benq'>BenQ</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=lg&series=19'>LG</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=philips&series=19'>PHILIPS</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=samsung&series=19'>Samsung</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=viewsonic'>Viewsonic</a></td>
  </tr>
</table></div><br />";
?>
<?php
if (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (!isset($id)) {
    if ($brand == 'lg' || $brand == 'philips' || $brand == 'samsung') {
        if ($brand == 'samsung') {
            $sam = "<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=27'>27\"</a></td>";
        }
        echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=19'>19\"</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=20'>20\"</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=22'>22\"</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=23'>23\"</a></td>
	<td id='td_tabl_sbor'><a href='edit_monitor.php?brand=$brand&series=24'>24\"</a></td>
	$sam
  </tr>
</table></div><br />";
        if (isset($_GET['series'])) {
            $series = $_GET['series'];
        }
        $result = mysql_query("SELECT brand,model,id FROM monitor WHERE brand='$brand' AND series='$series' ORDER BY model", $db);
    } else {
        $result = mysql_query("SELECT brand,model,id FROM monitor WHERE brand='$brand' ORDER BY model", $db);
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


    echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_monitor.php' method='post'>";
    $cols = 1; //  desired count of columns
    $col = 0;

    do {

        if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
        printf("<TD id='td_edit'><a href='edit_monitor.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["model"]);

        $col++;
        if ($col == $cols) {
            echo "</TR>";
            $col = 0;

        }

    } while ($myrow = mysql_fetch_array($result));
    echo "</TABLE></form>";
} else {
    $result = mysql_query("SELECT * FROM monitor WHERE id=$id", $db);

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

    $result2 = mysql_query("SELECT brand,title FROM categories_monitor", $db);

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

    $result3 = mysql_query("SELECT series,title FROM monitor_series", $db);

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

    echo "<br /><div id='forma'> ";

    if (isset($_GET['successfully']))
    {
        if   ($_GET['successfully'] == '1')
        {
            if($_GET['change'] =='add')
            {
                echo "<h1 style='color:blue'>Данные успешно добавлены</h1>";
            }
            elseif($_GET['change'] =='edit')
            {
                echo "<h1 style='color:blue'>Данные успешно отредактированы</h1>";
            }
        }
        elseif   ($_GET['successfully'] == '0')
        {
            if($_GET['change'] =='add')
            {
                echo "<h1 style='color:blue'>Данные не добавлены</h1>";
            }
            elseif($_GET['change'] =='edit')
            {
                echo "<h1 style='color:blue'>Данные не отредактированы</h1>";
            }
        }
        elseif   ($_GET['successfully'] == '2')
        {
            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
        }
    }
    echo "<form id='form1' method='post' action='update_monitor.php'>
<table width='680' border='0' cellspacing='10' cellpadding='340'>
  <tr>
    <td><label>Бренд</label></td>
    <td><select name='brand' id='brand'>";

    do {
        if ($myrow['brand'] == $myrow2['brand']) {
            printf("<option value='%s' selected>%s</option>", $myrow2['brand'], $myrow2['title']);
        } else {
            printf("<option value='%s'>%s</option>", $myrow2['brand'], $myrow2['title']);
        }
    } while ($myrow2 = mysql_fetch_array($result2));
    echo "</select></td></tr>";

    echo "<tr>
    <td><label>Диогональ <em>(для LG, PHILIPS, Samsung)</em></label></td>
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
  <td><label>Модель монитора</label></td>
  <td><input value='$myrow[model]' name="model" type="text" id="model" size="60" /></td>
  </tr>
  <tr>
  <td><label>Ссылка на маленькое изображение <em>(пример: acer_monitor/small/acer_1.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: ширина жесткая <strong>135px</strong>, рекомендуемая высота 107-110px до 140px. </label></td>
  <td><input value="$myrow[image_small]" name="image_small" type="text" id="image_small" size="60" /></td>
  </tr>
  <td><label>Ссылка на большое изображение <em>(пример: acer_monitor/acer_1.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: нет ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
  <td><input value="$myrow[image_big]" name="image_big" type="text" id="image_big" size="60" /></td>
  </tr>
  <tr>
  <td><label>Формат</label></td>
  <td><input value="$myrow[format]" name="format" type="text" id="format" size="60" /></td>
  </tr>
    <tr>
  <td><label>Разрешение</label></td>
  <td><input value="$myrow[resolution]" name="resolution" type="text" id="resolution" size="60" /></td>
  </tr>
    <tr>
  <td><label>Контрастность</label></td>
  <td><input value="$myrow[contrast]" name="contrast" type="text" id="contrast" size="60" /></td>
  </tr>
    <tr>
  <td><label>Время отклика</label></td>
  <td><input value="$myrow[response_time]" name="response_time" type="text" id="response_time" size="60" /></td>
  </tr>
    <tr>
  <td><label>Углы обзора</label></td>
  <td><input value="$myrow[angles]" name="angles" type="text" id="angles" size="60" /></td>
  </tr>
   <tr>
  <td><label>Видеоразъем</label></td>
  <td><input value="$myrow[connector]" name="connector" type="text" id="connector" size="60" /></td>
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
<?php include ("index/footer.txt"); ?>
</div>
</body>
</html>
