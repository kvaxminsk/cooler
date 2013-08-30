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
    <td id='td_tabl_sbor'><a href='new_tv_tjunery.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_tv_tjunery.php'>Редактировать</a></td>
  </tr>
</table></div><br />";
                    ?>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    if (!isset($id)) {
                        $result = mysql_query("SELECT model,id FROM tv_tjunery ORDER BY model", $db);

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


                        echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_tv_tjunery.php' method='post'>";
                        $cols = 1; //  desired count of columns
                        $col = 0;

                        do {

                            if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
                            printf("<TD id='td_edit'><a href='edit_tv_tjunery.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["model"]);

                            $col++;
                            if ($col == $cols) {
                                echo "</TR>";
                                $col = 0;

                            }

                        } while ($myrow = mysql_fetch_array($result));
                        echo "</TABLE></form>";
                    } else {
                        $result = mysql_query("SELECT * FROM tv_tjunery WHERE id=$id", $db);

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


                        echo "<form id='form1' method='post' action='update_tv_tjunery.php'>
<table width='680' border='0' cellspacing='10' cellpadding='340'>";

                        print <<<HERE

<tr>
  <td><label>Ссылка на маленькое изображение <em>(пример: tv_tjunery/small/tv_4.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: ширина жесткая <strong>135px</strong>, рекомендуемая высота до 140px. </label></td>
  <td><input value="$myrow[image_small]" name="image_small" type="text" id="image_small" size="60" /></td>
  </tr>
  <tr>
  <td><label>Ссылка на большое изображение <em>(пример: tv_tjunery/tv_4.jpg)</em>. Изображение предварительно загрузить по ftp. Требование к изображению: нет ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
  <td><input value="$myrow[image_big]" name="image_big" type="text" id="image_big" size="60" /></td>
  </tr>
  <tr>
  <td><label>Модель</label></td>
  <td><input value="$myrow[model]" name="model" type="text" id="model" size="60" /></td>
  </tr>
  <tr>
  <td><label>Информация<br />(<em>Для применения к слову жирного шрифта надо заключить слово в теги, например,</em> &lt;b&gt;<b>GeForce GTX660 с 2Gb</b>&lt;/b&gt;. </em>Для применения в разделе акция для красной цены, например,</em><br /> &lt;b class="cena-slide"&gt;<b class="cena-slide">799 у.е.</b>&lt;/b&gt;)</label></td>
  <td><textarea name="information" cols="46" rows="6" id="information">$myrow[information]</textarea></td>
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
