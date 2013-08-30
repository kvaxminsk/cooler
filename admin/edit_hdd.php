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
                    <?php
                    if (isset($_GET['id_hdd'])) {
                        $idHdd = htmlspecialchars(trim($_GET['id_hdd']));
                    }
                    $result = mysql_query("SELECT * FROM  hdd WHERE id =" . $idHdd, $db);

                    if (!$result) {
                        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
                        exit (mysql_error());
                    }
                    if (!(mysql_num_rows($result) > 0)) {
                        echo "<p>Нет записей!</p>";
                        exit ();
                    }

                    $rowHdd = mysql_fetch_assoc($result);
                    ?>

                    <form id="form1" method="post" action="add_hdd.php">
                        <input type="hidden" name="id_hdd" id="id_hdd" value="<?php echo $idHdd; ?>">
                        <table border="0" cellspacing="10" cellpadding="340">
                            <!-- Процессор (hdd)-->
                            <tr height="25px">
                                <td id="td_add_hdd">


                                    <label>Название жесткого диска:</label>
                                    <input type="text" id="name_hdd" name="name_hdd"
                                           value="<?php echo $rowHdd['name_hdd']; ?>">

                                    </br>
                                    <label>Размер жесткого диска:</label>
                                    <input type="text" id="size_hdd" name="size_hdd"
                                           value="<?php echo $rowHdd['size_hdd']; ?>">

                                    </br>
                                    </br>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" id="submit" value="Обновить"/>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
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
