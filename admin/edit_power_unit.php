<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Редактирование</title>
    <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="index/index.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
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
                <div id="text"><h1>Редактирование</h1><br /></div>
                <div id="text">
                    <?php
                    if (isset($_GET['id_power_unit']))
                    {
                        $idPowerUnit = htmlspecialchars(trim($_GET['id_power_unit']));
                    }
                    $result = mysql_query("SELECT * FROM  power_unit WHERE id =" . $idPowerUnit, $db);

                    if (!$result)
                    {
                        echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
                        exit (mysql_error());
                    }
                    if (!(mysql_num_rows($result) > 0))
                    {
                        echo "<p>Нет записей!</p>";
                        exit ();
                    }

                    $rowPowerUnit = mysql_fetch_assoc($result);
                    ?>

                    <form id="form1" method="post" action="add_power_unit.php">
                        <input type="hidden" name="id_power_unit" id="id_power_unit" value="<?php echo  $idPowerUnit;?>">
                        <table  border="0" cellspacing="10" cellpadding="340">
                            <!-- Процессор (power_unit)-->
                            <tr height="25px">
                                <td id="td_add_power_unit">


                                    <label>Название блока питания:</label>
                                    <input type="text" id="name_power_unit" name="name_power_unit" value="<?php echo $rowPowerUnit['name_power_unit'];?>">

                                    </br>
                                    <label>Мощность блока питания:</label>
                                    <input type="text" id="size_power_unit" name="size_power_unit" value="<?php echo $rowPowerUnit['size_power_unit'];?>">

                                    </br>
                                    </br>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" id="submit" value="Обновить" />
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
    <hr />
    <!-- start footer -->
    <?php include ("index/footer.txt"); ?>
</div>

</body>
</html>
