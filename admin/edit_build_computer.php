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
                <div id="text"><h1>Редактирование таблицы вариантов сборки системных блоков</h1><br/></div>
                <div id="text">
                    <br>
                    <?php
                    echo "<div align='center'><table width='666' border='0'>
  <tr>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=ofisnyj'>Офисный</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=shkolniku'>Школьнику</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=domashnij'>Домашний</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=igrovoj'>Игровой</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=multimedijnyj'>Мультимедийный</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=beznal'>Безнал</a></td>
    <td id='td_tabl_sbor'><a href='edit_build_computer.php?type=igrovoj_radeon'>Игровой Radeon</a></td>
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
                        $result = mysql_query("SELECT number,processor,id FROM build_computer WHERE type='$type' ORDER BY number", $db);

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


                        echo "<TABLE id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'><form action='drop_build_computer.php' method='post'>";
                        $cols = 1; //  desired count of columns
                        $col = 0;

                        do {

                            if (!$col) echo "<TR ALIGN='left' VALIGN='top'>";
                            printf("<TD id='td_edit'><a href='edit_build_computer.php?id=%s' title='Редактировать'><img id='table_icon' src='images/form_edit.png' /></a></TD><TD id='td_radio'><input name='id' type='radio' value='%s' id='radio' /></TD><TD id='td_edit'><input name='submit' type='submit' id='go' /></TD><TD id='td_edit'>%s</TD><TD id='td_edit1'><strong>%s</strong></TD>", $myrow["id"], $myrow["id"], $myrow["number"], $myrow["processor"]);

                            $col++;
                            if ($col == $cols) {
                                echo "</TR>";
                                $col = 0;

                            }

                        } while ($myrow = mysql_fetch_array($result));
                        echo "</TABLE></form>";
                    } else {
                        $result = mysql_query("SELECT * FROM build_computer WHERE id=$id", $db);

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

                        $result2 = mysql_query("SELECT type,title FROM categories_sb", $db);

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
                        echo "<form id='form1' method='post' action='update_build_computer.php'>
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

                        print <<<HERE
  
  <tr>
  <td><label>Номер сборки</label></td>
  <td><input value="$myrow[number]" name="number" type="text" id="number" size="60" /></td>
  </tr>
   <tr>
  <td><label>Процессор</label></td>
  <td><input value="$myrow[processor]" name="processor" type="text" id="processor" size="60" /></td>
  </tr>
      <tr>
  <td><label>Оперативная память</label></td>
  <td><input value="$myrow[ram]" name="ram" type="text" id="ram" size="60" /></td>
  </tr>
  <tr>
  <td><label>Жесткий диск</label></td>
  <td><input value="$myrow[hdd]" name="hdd" type="text" id="hdd" size="60" /></td>
  </tr>
  <tr>
  <td><label>Видеокарта</label></td>
  <td><input value="$myrow[vga]" name="vga" type="text" id="vga" size="60" /></td>
  </tr>
  <tr>
  <td><label>Материнская плата</label></td>
  <td><input value="$myrow[motherboard]" name="motherboard" type="text" id="motherboard" size="60" /></td>
  </tr>
   <tr>
  <td><label>DVD-RW</label></td>
  <td><input value="$myrow[dvd_rw]" name="dvd_rw" type="text" id="dvd_rw" size="60" /></td>
  </tr>   
  <tr>
  <td><label>Корпус (блок питания)</label></td>
  <td><input value="$myrow[housing]" name="housing" type="text" id="housing" size="60" /></td>
  </tr>
  <tr>
  <td><label>Цена системного блока в у.е.</label></td>
  <td><input value="$myrow[cost_sb_ue]" name="cost_sb_ue" type="text" id="cost_sb_ue" size="60" /></td>
  </tr>
    <tr>
  <td><label>Цена системного блока по безнал.расч в бел.руб. <em>(заполняется только для офисных и по безналу) <em>(заполняется только для офисных)</em></label></td>
  <td><input value="$myrow[cost_clearing]" name="cost_clearing" type="text" id="cost_clearing" size="60" /></td>
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
