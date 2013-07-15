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
                        $result = mysql_query("SELECT * FROM  system_block
                                                    LEFT JOIN cpu ON cpu.id = system_block.id_cpu
                                                    LEFT JOIN hdd ON hdd.id = system_block.id_hdd
                                                    LEFT JOIN random_access_memory ON random_access_memory.id = system_block.id_random_access_memory
                                                    LEFT JOIN computer_case ON computer_case.id = system_block.id_computer_case
                                                    LEFT JOIN motherboard ON motherboard.id = system_block.id_motherboard
                                                    LEFT JOIN power_unit  ON power_unit.id = system_block.id_power_unit
                                                    LEFT JOIN optical_drive  ON optical_drive.id = system_block.id_optical_drive
                                                    LEFT JOIN vga  ON vga.id = system_block.id_vga
                                                    ORDER BY system_block.name_system_block", $db);

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
                    <table id='table_edit' ALIGN='center' CELLSPACING='2px'  bgcolor='#ffffff'>
                        <form action='drop_system_block.php' method='post'>
                            <?php
                            while($row = mysql_fetch_assoc($result))
                            {
                            ?>
                                <tr valign="top" align="left">
                                    <td id="td_edit">
                                        <a title="Редактировать" href="edit_system_block.php?id=<?php echo $row['id_system_block'];?>">
                                            <img id="table_icon" src="images/form_edit.png">
                                        </a>
                                    </td>
                                    <td id="td_radio">
                                        <input id="radio" type="radio" value="<?php echo $row['id_system_block'];?>" name="id">
                                    </td>
                                    <td id="td_edit">
                                        <input id="go" type="submit" name="submit">
                                    </td>
                                    <td id="td_edit1">
                                        <strong>
                                            <?php
                                                echo $row['name_system_block'] .  ', ';
                                                echo $row['name_cpu'] .  ' Core' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'ГЦ, ';
                                                echo $row['name_hdd'] .  ' ' . $row['size_hdd'] .  'GB, ';
                                                echo $row['name_random_access_memory'] .  ' ' . $row['size_random_access_memory'] . 'GB, ';
                                                echo $row['name_computer_case'] . ', ';
                                                echo $row['name_motherboard'] . ', ';
                                                echo $row['name_power_unit'] .  ' ' . $row['size_power_unit'] . 'Вт, ';
                                                echo $row['name_optical_drive'] . ', ';
                                                echo $row['name_vga'] .  ' ' . $row['size_vga'] . 'GB, ';
                                                echo $row['cost'] .  '$, ';
                                            ?>
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
