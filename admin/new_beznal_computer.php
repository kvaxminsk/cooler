<?php include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление нового компьютера (по безналу)</title>
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
                <div id="text"><h1>Добавление нового компьютера (по безналу)</h1><br/></div>
                <div id="text"><br/>

                    <div id="forma">
                        <?php
                        if ($_GET['successfully'] == '2') {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_beznal_computer.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Название компьютера</label></td>
                                    <td><input name="title" type="text" id="title" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на изображение <em>(пример:
                                                ofisnyj_kompjuter/ofisnyj_kompjuter.jpg)</em>. Изображение
                                            предварительно
                                            загрузить по ftp. Требование к изображению: рекомендуемое 330*177px</label>
                                    </td>
                                    <td><input name="image" type="text" id="image" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Описание изображения <em>(подсказка при наведении курсора)</em></label>
                                    </td>
                                    <td><input name="image_alt" type="text" id="image_alt" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Общая стоимость компьютера</label></td>
                                    <td><input name="beznal" type="text" id="beznal" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость системного блока</label></td>
                                    <td><input name="beznal_sb" type="text" id="beznal_sb" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость монитора</label></td>
                                    <td><input name="beznal_monitor" type="text" id="beznal_monitor" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость клавиатуры</label></td>
                                    <td><input name="beznal_keyboard" type="text" id="beznal_keyboard" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость мыши</label></td>
                                    <td><input name="beznal_mouse" type="text" id="beznal_mouse" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость колонок</label></td>
                                    <td><input name="beznal_loudspeakers" type="text" id="beznal_loudspeakers"
                                               size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Процессор</label></td>
                                    <td><input name="processor" type="text" id="processor" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Жесткий диск</label></td>
                                    <td><input name="hdd" type="text" id="hdd" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Оперативная память</label></td>
                                    <td><input name="ram" type="text" id="ram" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Оптический привод</label></td>
                                    <td><input name="optical_drive" type="text" id="optical_drive" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Материнская плата</label></td>
                                    <td><input name="motherboard" type="text" id="motherboard" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Корпус</label></td>
                                    <td><input name="housing" type="text" id="housing" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Видеокарта</label></td>
                                    <td><input name="vga" type="text" id="vga" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Монитор</label></td>
                                    <td><input name="monitor" type="text" id="monitor" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Колонки</label></td>
                                    <td><input name="loudspeakers" type="text" id="loudspeakers" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Информация<br/>(<em>Для применения к слову жирного шрифта надо заключить
                                                слово в теги, например,</em> &lt;b&gt;<b>GeForce GTX660 с
                                                2Gb</b>&lt;/b&gt;. </em>Для применения в разделе акция для красной цены,
                                            например,</em><br/> &lt;b class="cena-slide"&gt;<b class="cena-slide">799
                                                у.е.</b>&lt;/b&gt;)</label></td>
                                    <td><textarea name="information" cols="46" rows="6" id="information"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Дата <em>(автоматический)</em></label></td>
                                    <td><input name="date" type="text" id="date" size="60"
                                               value="<?php $date = date("Y-m-d");
                                               echo $date; ?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="submit" id="submit"
                                                           value="Добавить компьютер"/></td>
                                    <td></td>
                                </tr>
                            </table>
                        </form>
                    </div>
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
