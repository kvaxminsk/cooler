<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/

$addNot = false;
foreach ($_POST as $key => $value) {
    if (isset($_POST)) {
        /*if(preg_match('[Input]',$key) > 0)
        {
           // $post[preg_replace('[Input]','',$key)] = $value;

        }*/
        if ($key == "submit") {
            break;
        }
        $post[$key] = $value;
    } else {
        $addNot = true;
    }
}

$strSql = "UPDATE system_block SET ";
foreach ($post as $key => $value) {

    $strSql = $strSql . $key . "='" . $value . "', ";
}

$strSql = substr($strSql, 0, strlen($strSql) - 2) . " WHERE id =" . htmlspecialchars(trim((int)$_GET['id'])) . "; ";

/*if (isset($brand) && isset($series) && isset($model) && isset($image_small) && isset($image_big) && isset($format) && isset($resolution) && isset($contrast) && isset($response_time) && isset($angles) && isset($connector) && isset($cost) && isset($date))
*/
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
                <div id="text"><h1>Редактирование</h1><br/></div>
                <div id="text">
                    <?php
                    if (!$addNot) {
                        $result = mysql_query($strSql);
                        if ($result == 'true') {
                            echo "<p>Данные успешно обновлены!</p>";
                        } else {
                            echo "<p>Данные успешно не обновлены!</p>";
                        }
                    } else {
                        echo "<p>Вы ввели не все данные!</p>";
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