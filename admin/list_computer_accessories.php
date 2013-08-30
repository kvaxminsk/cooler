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
                    <table id='table_edit' ALIGN='center' CELLSPACING='2px' bgcolor='#ffffff'>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_cpu.php">Процессор</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_hdd.php">Жесткий диск</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_random_access_memory.php">Оперативная память</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_motherboard.php">Материнская плата</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_computer_case.php">Корпус</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_power_unit.php">Блок питания</a></h3>
                                </strong>
                            </td>
                        </tr>
                        <tr valign="top" align="left">
                            <td id="td_edit1">
                                <strong>
                                    <h3><a href="list_vga.php">Видеокарта</a></h3>
                                </strong>
                            </td>
                        </tr>
                    </table>
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
