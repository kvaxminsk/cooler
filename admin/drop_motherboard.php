<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

if (isset($_POST['id_motherboard'])) {
    $idMotherboard = (int)htmlspecialchars(trim($_POST['id_motherboard']));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Обработчик</title>
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
                <div id="text"><h1>Удаление</h1><br/></div>
                <div id="text">
                    <?php
                    if (isset($idMotherboard)) {

                        $result = mysql_query("DELETE FROM motherboard WHERE id=$idMotherboard");
                        if ($result == 'true') {
                            echo "<p>Данные успешно удалены!</p>";
                        } else {
                            echo "<p>Данные не удалены!</p>";

                        }
                    } else {
                        echo "<p>Вы не отметили жесткий диск для удаления!</p>";
                    }
                    ?>
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
