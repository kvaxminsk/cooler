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
                        $result = mysql_query("SELECT * FROM  tablet", $db);

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
                    ?>
                    <table id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff' width="100%">
                        <form action='drop_tablet.php' method='post'>
                            <?php
                            while($row = mysql_fetch_assoc($result))
                            {
                            ?>
                                <tr valign="top" align="left">
                                    <td id="td_edit">
                                        <a title="Редактировать" href="edit_tablet.php?id=<?php echo $row['id_tablet'];?>">
                                            <img id="table_icon" src="images/form_edit.png">
                                        </a>
                                    </td>
                                    <td id="td_radio">
                                        <input id="radio" type="radio" value="<?php echo $row['id_tablet'];?>" name="id">
                                    </td>
                                    <td id="td_edit">
                                        <input id="go" type="submit" name="submit">
                                    </td>
                                    <td id="td_edit1" >
                                        <strong>
                                            <?php
                                                echo $row['name_tablet'] .  ' ';
                                            ?>
                                        </strong>
                                    </td>
                                    <td  id="td_edit" width="10%" align="right" >
                                        <strong>
                                            <a href="copy_tablet.php?id=<?php echo $row['id_tablet']?>" target="_blank">дублировать</a>
                                        </strong>
                                    </td>
                                </tr>

                            <?php
                            } //end while
                            ?>
                        </form>
                    </table>
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
