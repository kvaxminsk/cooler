<?php include ("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление принтеров и МФУ</title>
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
                <div id="text"><h1>Добавление принтеров и МФУ</h1><br/></div>
                <div id="text"><br/>
                    <?php
                    echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_printer.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_printer.php?type=epson_snpch&series=epson_stylus'>Редактировать</a></td>
  </tr>
</table></div><br />";
                    ?>
                    <div id="forma">
                        <?php
                        if ($_GET['successfully'] == '2')
                        {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_printer.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Тип принтера</label></td>
                                    <td><select name="type" id="type">
                                        <option value="epson_snpch">Принтеры и МФУ Epson с СНПЧ</option>
                                        <option value="laser">Принтеры лазерные</option>
                                        <option value="mfu">МФУ</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Серия <em>(для принтеров и МФУ Epson с СНПЧ)</em></label></td>
                                    <td><select name="series" id="series">
                                        <option value="epson_stylus">Epson Stylus</option>
                                        <option value="epson_stylus_photo">Epson Stylus Photo</option>
                                        <option value="epson_l_series">Epson L-серия</option>
                                        <option value="epson_workforce">Epson WorkForce</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на маленькое изображение <em>(пример: snpch/small/sn-1.jpg)</em>.
                                        Изображение предварительно загрузить по ftp. Требование к изображению: ширина
                                        жесткая <strong>150px</strong>. </label></td>
                                    <td><input name="image_small" type="text" id="image_small" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на большое изображение <em>(пример: snpch/sn-1.jpg)</em>.
                                        Изображение предварительно загрузить по ftp. Требование к изображению: нет
                                        ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
                                    <td><input name="image_big" type="text" id="image_big" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Модель</label></td>
                                    <td><input name="model" type="text" id="model" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Печать</label></td>
                                    <td><input name="color_print" type="text" id="color_print" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Функции</label></td>
                                    <td><input name="functions" type="text" id="functions" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Формат</label></td>
                                    <td><input name="format" type="text" id="format" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Разрешение макс</label></td>
                                    <td><input name="resolution_max" type="text" id="resolution_max" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Кол-во цветов</label></td>
                                    <td><input name="kol_color" type="text" id="kol_color" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Печать без компьютера</label></td>
                                    <td><input name="bez_pc" type="text" id="bez_pc" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Wi-Fi</label></td>
                                    <td><input name="wi_fi" type="text" id="wi_fi" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ethernet</label></td>
                                    <td><input name="ethernet" type="text" id="ethernet" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Bluetooth</label></td>
                                    <td><input name="bluetooth" type="text" id="bluetooth" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Факс</label></td>
                                    <td><input name="fax" type="text" id="fax" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Картридер</label></td>
                                    <td><input name="card" type="text" id="card" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>ЖК-дисплей</label></td>
                                    <td><input name="lcd" type="text" id="lcd" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Фотопечать</label></td>
                                    <td><input name="photo_print" type="text" id="photo_print" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Прочее <em>(для принудительного перехода строки используйте тег <strong>
                                        &lt;br /&gt;</strong>)</em></label></td>
                                    <td><textarea name="information" cols="46" rows="6" id="information"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Вес, кг</label></td>
                                    <td><input name="weight" type="text" id="weight" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Высота, мм</label></td>
                                    <td><input name="height" type="text" id="height" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ширина, мм</label></td>
                                    <td><input name="width" type="text" id="width" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Глубина, мм</label></td>
                                    <td><input name="depth" type="text" id="depth" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Стоимость</label></td>
                                    <td><input name="cost" type="text" id="cost" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Дата <em>(автоматический)</em></label></td>
                                    <td><input name="date" type="text" id="date" size="60"
                                               value="<?php $date = date("Y-m-d"); echo $date;?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="submit" id="submit" value="Добавить"/>
                                    </td>
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
