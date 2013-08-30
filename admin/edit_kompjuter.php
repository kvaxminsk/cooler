<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Редактирование компьютеров</title>
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
<div id="text"><h1>Редактирование компьютеров</h1><br/></div>
<div id="text">
<br>
<?php
echo "<div align='center'><table id='table_top' border='1' cellspacing='0px' width='710px'>
  <tr height='40px' bgcolor='#f0f0f0'>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=ofisnyj'>Офисный</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=shkolniku'>Школьнику</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=domashnij'>Домашний</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=igrovoj'>Игровой</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=igrovoj_radeon'>Игровой Radeon</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=multimedijnyj'>Суперигровой</a></td>
  </tr>
  <tr height='50px' >
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=akciya_main_page'>Акция  Главная стр</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=akciya_domashnij'>Акция Домашний</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=akciya_igrovoj'>Акция Игровой</a></td>
    <td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=akciya_radeon'>Акция Radeon</a></td>
	<td id='td_tabl_sbor'><a href='edit_kompjuter.php?type=akciya_multimedijnyj'>Акция Суперигровой</a></td>
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
    $result = mysql_query("SELECT title,id FROM kompjuter WHERE type='$type' ORDER BY title", $db);

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


    echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_kompjuter.php' method='post'>";
    $cols = 1; //  desired count of columns
    $col = 0;

    do {

        if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
        printf("<TD id='td_edit'><a href='edit_kompjuter.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["title"]);

        $col++;
        if ($col == $cols) {
            echo "</TR>";
            $col = 0;

        }

    } while ($myrow = mysql_fetch_array($result));
    echo "</TABLE></form>";
} else {
    $result = mysql_query("SELECT * FROM kompjuter WHERE id=$id", $db);

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

    $result2 = mysql_query("SELECT type,title FROM categories", $db);

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

    echo "<br /><div id='forma'>";

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


    echo "<form id='form1' method='post' action='update_kompjuter.php'>
<table width='680' border='0' cellspacing='10' cellpadding='340'>
  <tr>
    <td><label>Тип компьютера</label></td>
    <td><select name='type' id='type'>";

    do {
        if ($myrow['type'] == $myrow2['type']) {
            printf("<option value='%s' selected>%s</option>", $myrow2['type'], $myrow2['title']);
        } else {
            printf("<option value='%s'>%s</option>", $myrow2['type'], $myrow2['title']);
        }
    } while ($myrow2 = mysql_fetch_array($result2));
    echo "</select></td></tr>";

    if ($myrow['main_page'] == 'yes') {
        echo "<tr>
    <td><label>Отображать на главной странице</label></td>
    <td><input type='checkbox' name='main_page' checked value='yes' /></td>
  </tr>";
    } else {
        echo "<tr>
    <td><label>Отображать на главной странице</label></td>
    <td><input type='checkbox' name='main_page' value='yes' /></td>
  </tr>";
    }


    print <<<HERE


  
    
  <tr>
    <td>    
      <label>Ссылка при клике на изображение или название <em>(пример: ofisnyj_kompjuter.html)</em><br /><em>(заполняется только для главной)</em></label></td>
    <td><input value="$myrow[main_link1]" name="main_link1" type="text" id="main_link1" size="60" /></td>
  </tr>
    <tr>
  <td><label>Описание ссылки <em>(подсказка при наведении курсора)</em><br /><em>(заполняется только для главной)</em></label></td>
  <td><input value="$myrow[image_alt]" name="image_alt" type="text" id="image_alt" size="60" /></td>
  </tr>
  <tr>
  <td><label>Название компьютера</label></td>
  <td><input value="$myrow[title]" name="title" type="text" id="title" size="60" /></td>
  </tr>
  <tr>
  <td><label>Ссылка на изображение <em>(пример: ofisnyj_kompjuter/ofisnyj_kompjuter.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: рекомендуемое 330*177px</label></td>
  <td><input value="$myrow[image]" name="image" type="text" id="image" size="60" /></td>
  </tr>
  <tr>
  <td><label>Общая стоимость компьютера</label></td>
  <td><input value="$myrow[cost]" name="cost" type="text" id="cost" size="60" /></td>
  </tr>
    <tr>
  <td><label>Стоимость компьютера по безналу <em>(заполняется только для офисных)</em></label></td>
  <td><input value="$myrow[cost_clearing]" name="cost_clearing" type="text" id="cost_clearing" size="60" /></td>
  </tr>
    <tr>
  <td><label>Стоимость системного блока</label></td>
  <td><input value="$myrow[cost_sb]" name="cost_sb" type="text" id="cost_sb" size="60" /></td>
  </tr>
    <tr>
  <td><label>Стоимость монитора</label></td>
  <td><input value="$myrow[cost_monitor]" name="cost_monitor" type="text" id="cost_monitor" size="60" /></td>
  </tr>
    <tr>
  <td><label>Стоимость клавиатуры</label></td>
  <td><input value="$myrow[cost_keyboard]" name="cost_keyboard" type="text" id="cost_keyboard" size="60" /></td>
  </tr>
   <tr>
  <td><label>Стоимость мыши</label></td>
  <td><input value="$myrow[cost_mouse]" name="cost_mouse" type="text" id="cost_mouse" size="60" /></td>
  </tr>
   <tr>
  <td><label>Стоимость колонок</label></td>
  <td><input value="$myrow[cost_loudspeakers]" name="cost_loudspeakers" type="text" id="cost_loudspeakers" size="60" /></td>
  </tr>
   <tr>
  <td><label>Процессор</label></td>
  <td><input value="$myrow[processor]" name="processor" type="text" id="processor" size="60" /></td>
  </tr>
   <tr>
  <td><label>Жесткий диск</label></td>
  <td><input value="$myrow[hdd]" name="hdd" type="text" id="hdd" size="60" /></td>
  </tr>
   <tr>
  <td><label>Оперативная память</label></td>
  <td><input value="$myrow[ram]" name="ram" type="text" id="ram" size="60" /></td>
  </tr>
   <tr>
  <td><label>Оптический привод</label></td>
  <td><input value="$myrow[optical_drive]" name="optical_drive" type="text" id="optical_drive" size="60" /></td>
  </tr>
   <tr>
  <td><label>Материнская плата</label></td>
  <td><input value="$myrow[motherboard]" name="motherboard" type="text" id="motherboard" size="60" /></td>
  </tr>
  <tr>
  <td><label>Корпус</label></td>
  <td><input value="$myrow[housing]" name="housing" type="text" id="housing" size="60" /></td>
  </tr>
   <tr>
  <td><label>Видеокарта</label></td>
  <td><input value="$myrow[vga]" name="vga" type="text" id="vga" size="60" /></td>
  </tr>
   <tr>
  <td><label>Монитор</label></td>
  <td><input value='$myrow[monitor]' name="monitor" type="text" id="monitor" size="60" /></td>
  </tr>

  <tr>
  <td><label>Колонки</label></td>
  <td><input value="$myrow[loudspeakers]" name="loudspeakers" type="text" id="loudspeakers" size="60" /></td>
  </tr>
   <tr>
  <td><label>Информация<br />(<em>Для применения к слову жирного шрифта надо заключить слово в теги, например,</em> &lt;b&gt;<b>GeForce GTX660 с 2Gb</b>&lt;/b&gt;. </em>Для применения в разделе акция для красной цены, например,</em><br /> &lt;b class="cena-slide"&gt;<b class="cena-slide">799 у.е.</b>&lt;/b&gt;)</label></td>
  <td><textarea name="information" cols="46" rows="6" id="information">$myrow[information]</textarea></td>
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
