<?php include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление клавиатуры</title>
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
                <div id="text">
                    <h1>Добавление клавиатуры</h1><br/></div>
                <div id="text"><br/>
                    <?php
                    echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_klaviaturji.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_klaviaturji.php'>Редактировать</a></td>
  </tr>
</table></div><br />";
                    ?>

                    <div id="forma">
                        <?php
                        if ($_GET['successfully'] == '2') {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_klaviaturji.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Модель</label></td>
                                    <td><input name="model" type="text" id="model" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Ссылка на изображение <em>(пример: klaviaturji/kl_4.jpg)</em>.
                                            Изображение предварительно загрузить по ftp. Требование к изображению: не
                                            должно
                                            превышать <strong>300px</strong> по ширине</label></td>
                                    <td><input name="image" type="text" id="image" size="60"/></td>
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
                                                           value="Добавить клавиатуру"/></td>
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
