<?php include ("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление нового компьютера</title>
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
                <div id="text"><h1>Добавление нового компьютера</h1><br/></div>
                <div id="text"><br/>

                    <div id="forma">
                        <?php
                            if   ($_GET['successfully'] == '2')
                            {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                            }
                        ?>
                        <form id="form1" method="post" action="add_kompjuter.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Тип компьютера</label></td>
                                    <td><select name="type" id="type">
                                        <option value="ofisnyj">Офисный</option>
                                        <option value="shkolniku">Школьнику</option>
                                        <option value="domashnij">Домашний</option>
                                        <option value="igrovoj">Игровой</option>
                                        <option value="multimedijnyj">Мультимедийный</option>
                                        <option value="akciya_domashnij">Акция &quot;Домашний&quot;</option>
                                        <option value="akciya_igrovoj">Акция &quot;Игровой&quot;</option>
                                        <option value="akciya_multimedijnyj">Акция &quot;Мультимедийный&quot;</option>
                                        <option value="igrovoj_radeon">Игровой &quot;Radeon&quot;</option>
                                        <option value="akciya_radeon">Акция &quot;Radeon&quot;</option>
                                        <option value="akciya_main_page">Акция  &quot;Главная стр&quot;</option>
                                    </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Отображать на главной странице</label></td>
                                    <td><input type="checkbox" name="main_page" value="yes"/></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Ссылка при клике на изображение или название <em>(пример:
                                            ofisnyj_kompjuter.html)</em><br/><em>(заполняется только для
                                            главной)</em></label></td>
                                    <td><input name="main_link1" type="text" id="main_link1" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Описание ссылки <em>(подсказка при наведении курсора)</em><br/><em>(заполняется
                                        только для главной)</em></label></td>
                                    <td><input name="image_alt" type="text" id="image_alt" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Название компьютера</label></td>
                                    <td><input name="title" type="text" id="title" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на изображение <em>(пример:
                                        ofisnyj_kompjuter/ofisnyj_kompjuter.jpg)</em>. Изображение предварительно
                                        загрузить по ftp. Требование к изображению: рекомендуемое 330*177px</label></td>
                                    <td><input name="image" type="text" id="image" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Общая стоимость компьютера</label></td>
                                    <td><input name="cost" type="text" id="cost" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость компьютера по безналу <em>(заполняется только для офисных)</em></label>
                                    </td>
                                    <td><input name="cost_clearing" type="text" id="cost_clearing" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость системного блока</label></td>
                                    <td><input name="cost_sb" type="text" id="cost_sb" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость монитора</label></td>
                                    <td><input name="cost_monitor" type="text" id="cost_monitor" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость клавиатуры</label></td>
                                    <td><input name="cost_keyboard" type="text" id="cost_keyboard" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость мыши</label></td>
                                    <td><input name="cost_mouse" type="text" id="cost_mouse" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость колонок</label></td>
                                    <td><input name="cost_loudspeakers" type="text" id="cost_loudspeakers" size="60"/>
                                    </td>
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
                                               value="<?php $date = date("Y-m-d"); echo $date;?>"/></td>
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
    <?php include ("index/footer.txt"); ?>
</div>
</body>
</html>
