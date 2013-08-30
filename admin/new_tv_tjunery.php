<?php include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление нового TV тюнеры</title>
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
                <div id="text"><h1>Добавление TV тюнеры</h1><br/></div>
                <div id="text"><br/>
                    <?php
                    echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_tv_tjunery.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_tv_tjunery.php'>Редактировать</a></td>
  </tr>
</table></div><br />";
                    ?>
                    <div id="forma">
                        <?php
                        if ($_GET['successfully'] == '2') {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_tv_tjunery.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Ссылка на маленькое изображение <em>(пример:
                                                tv_tjunery/small/tv_4.jpg)</em>. Изображение предварительно загрузить по
                                            ftp.
                                            Требование к изображению: ширина жесткая <strong>135px</strong>,
                                            рекомендуемая
                                            высота до 140px. </label></td>
                                    <td><input name="image_small" type="text" id="image_small" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на большое изображение <em>(пример: tv_tjunery/tv_4.jpg)</em>.
                                            Изображение предварительно загрузить по ftp. Требование к изображению: нет
                                            ограничений, но рекомендуется 700*700px по большей стороне. </label></td>
                                    <td><input name="image_big" type="text" id="image_big" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Модель</label></td>
                                    <td><input name="model" type="text" id="model" size="60"/></td>
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
                                    <td><label>Стоимость</label></td>
                                    <td><input name="cost" type="text" id="cost" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Дата <em>(автоматический)</em></label></td>
                                    <td><input name="date" type="text" id="date" size="60"
                                               value="<?php $date = date("Y-m-d");
                                               echo $date; ?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="submit" id="submit"
                                                           value="Добавить TV тюнер"/></td>
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
