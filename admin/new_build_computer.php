<?php include("lock.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Таблица вариантов сборки системных блоков</title>
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
                <div id="text"><h1>Таблица вариантов сборки системных блоков</h1><br/></div>
                <div id="text"><br/>

                    <div id="forma">
                        <?php
                        if ($_GET['successfully'] == '2') {
                            echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                        }
                        ?>
                        <form id="form1" method="post" action="add_build_computer.php">
                            <table width="680" border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td><label>Тип компьютера</label></td>
                                    <td><select name="type" id="type">
                                            <option value="ofisnyj">Офисный</option>
                                            <option value="shkolniku">Школьнику</option>
                                            <option value="domashnij">Домашний</option>
                                            <option value="igrovoj">Игровой</option>
                                            <option value="multimedijnyj">Мультимедийный</option>
                                            <option value="beznal">Безнал</option>
                                            <option value="igrovoj_radeon">Игровой Radeon</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Номер сборки</label></td>
                                    <td><input name="number" type="text" id="number" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Процессор</label></td>
                                    <td><input name="processor" type="text" id="processor" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Оперативная память</label></td>
                                    <td><input name="ram" type="text" id="ram" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Жесткий диск</label></td>
                                    <td><input name="hdd" type="text" id="hdd" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Видеокарта</label></td>
                                    <td><input name="vga" type="text" id="vga" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Материнская плата</label></td>
                                    <td><input name="motherboard" type="text" id="motherboard" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>DVD-RW</label></td>
                                    <td><input name="dvd_rw" type="text" id="dvd_rw" size="60"/></td>
                                </tr>

                                <tr>
                                    <td><label>Корпус (блок питания)</label></td>
                                    <td><input name="housing" type="text" id="housing" size="60"/></td>
                                </tr>

                                <tr>
                                    <td><label>Цена системного блока в у.е.</label></td>
                                    <td><input name="cost_sb_ue" type="text" id="cost_sb_ue" size="60"/></td>
                                </tr>
                                <tr>
                                    <td><label>Цена системного блока по безнал.расч в бел.руб. <em>(заполняется только
                                                для офисных и по безналу)</em></label></td>
                                    <td><input name="cost_clearing" type="text" id="cost_clearing" size="60"/></td>
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
