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
                <div id="text">
                    <br>
                    <?php
                    echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_usb_pamjat.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_usb_pamjat.php'>Редактировать</a></td>
  </tr>
</table></div><br />";
                    ?>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    if (!isset($id)) {
                        $result = mysql_query("SELECT title,id FROM usb_pamjat ORDER BY title", $db);

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


                        echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_usb_pamjat.php' method='post'>";
                        $cols = 1; //  desired count of columns
                        $col = 0;

                        do {

                            if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
                            printf("<TD id='td_edit'><a href='edit_usb_pamjat.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["title"]);

                            $col++;
                            if ($col == $cols) {
                                echo "</TR>";
                                $col = 0;

                            }

                        } while ($myrow = mysql_fetch_array($result));
                        echo "</TABLE></form>";
                    } else {
                        $result = mysql_query("SELECT * FROM usb_pamjat WHERE id=$id", $db);

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

                        print <<<HERE

<br /><div id='forma'>
<form id='form1' method='post' action='update_usb_pamjat.php'>
<table width='680' border='0' cellspacing='10' cellpadding='340'>
<tr>
  <td><label>Модель</label></td>
  <td><input value="$myrow[title]" name="title" type="text" id="title" size="60" /></td>
  </tr>
<tr>
  <td><label>Ссылка на изображение <em>(пример: usb_pamjat/fl_8.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: не должно превышать  220px по ширине</label></td>
  <td><input value="$myrow[image]" name="image" type="text" id="image" size="60" /></td>
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
