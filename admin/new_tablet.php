<?php
include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Добавление нового системного блока</title>
    <link href="default.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="index/index.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js_index/jquery-1.4.2.min.js"></script>
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
                <div id="text"><h1>Добавление нового планшета</h1><br/></div>
                <div id="text"><br/>
                    <?php $row=array();?>
                    <div id="forma">
                        <form id="form1" method="post" action="add_system_block.php">
                            <table border="0" cellspacing="10" cellpadding="340">
                                <tr>
                                    <td>
                                        <label for="name_tablet" style="color:black;font-size:20px ;">Название:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="name_tablet" name="name_tablet" value="<?php echo $row['name_tablet']='';?>"/><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="design" style="color:black;font-size:20px ;">Конструкция:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="design" name="design" value="<?php echo $row['design'];?>"/><br/>
                                    </td>
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
