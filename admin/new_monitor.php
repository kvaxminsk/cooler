<?php include ("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление нового монитора</title>
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
                <div id="text"><h1>Добавление нового монитора</h1><br/></div>
                <div id="text"><br/>

                    <div id="forma">
                        <?php
                        if   ($_GET['successfully'] == '2')
                        {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_monitor.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Бренд</label></td>
                                    <td><select name="brand" id="brand">
                                        <option value="acer">Acer</option>
                                        <option value="benq">BenQ</option>
                                        <option value="lg">LG</option>
                                        <option value="philips">PHILIPS</option>
                                        <option value="samsung">Samsung</option>
                                        <option value="viewsonic">Viewsonic</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Диогональ <em>(для LG, PHILIPS, Samsung)</em></label></td>
                                    <td><select name="series" id="series">
                                        <option value="19">19"</option>
                                        <option value="20">20"</option>
                                        <option value="22">22"</option>
                                        <option value="23">23"</option>
                                        <option value="24">24"</option>
                                        <option value="27">27"</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Модель монитора</label></td>
                                    <td><input name="model" type="text" id="model" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на маленькое изображение <em>(пример:
                                        acer_monitor/small/acer_1.jpg)</em>. Изображение предварительно загрузить по
                                        ftp. Требование к изображению: ширина жесткая <strong>135px</strong>,
                                        рекомендуемая высота 107-110px до 140px. </label></td>
                                    <td><input name="image_small" type="text" id="image_small" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на большое изображение <em>(пример: acer_monitor/acer_1.jpg)</em>.
                                        Изображение предварительно загрузить по ftp. Требование к изображению: нет
                                        ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
                                    <td><input name="image_big" type="text" id="image_big" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Формат</label></td>
                                    <td><input name="format" type="text" id="format" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Разрешение</label></td>
                                    <td><input name="resolution" type="text" id="resolution" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Контрастность</label></td>
                                    <td><input name="contrast" type="text" id="contrast" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Время отклика</label></td>
                                    <td><input name="response_time" type="text" id="response_time" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Углы обзора</label></td>
                                    <td><input name="angles" type="text" id="angles" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Видеоразъем</label></td>
                                    <td><input name="connector" type="text" id="connector" size="60"/></td>
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
                                    <td colspan="2"><input type="submit" name="submit" id="submit"
                                                           value="Добавить монитор"/></td>
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
