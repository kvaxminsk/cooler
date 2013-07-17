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
                                <!-- Конструкция: (design)-->
                                <tr>
                                    <td>
                                        <label for="design" style="color:black;font-size:20px ;">Конструкция:</label>
                                    </td>
                                    <td>
<!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="design" id="design" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Конструкция</option>
                                            <?php
                                            $result = mysql_query("SELECT design_tablet.* FROM  design_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_design'].'">' . $row['name_design'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_design"  name="delete_design"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_design">Добавить Конструкцию</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_design" style="display:none">

                                        <label>Название Конструкции:</label>
                                        <input type="text" id="name_design" name="name_design">

                                        </br>
                                        </br>
                                        <input type="button" id="add_design" name="add_design" value="Добавить Конструкцию">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_design").click(function() {
                                                        deleteDesign();
                                                    });

                                                    $("#add_design").click(function() {
                                                        addDesign();
                                                    });

                                                    $("#div_add_design").click(function() {
                                                        showFormAddDesign();
                                                    });
                                                }

                                            );

                                            function deleteDesign()
                                            {
                                                var area = $("#design");
                                                var designValue = $("#design option:selected").val();
                                                area.load('tablet/delete_design.php',{id_design : designValue});
                                            }

                                            function addDesign()
                                            {
                                                var area = $("#design");
                                                var nameDesign = $("#name_design").val();
                                                area.load('tablet/add_design.php',{name_design : nameDesign});
                                            }

                                            function showFormAddDesign()
                                            {
                                                if (   $("#div_add_design").text() == 'Добавить Конструкцию')
                                                {
                                                    $("#div_add_design").text('Скрыть форму');
                                                    $("#td_add_design").css("display","");
                                                    $("#div_add_design").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_design").text('Добавить Конструкцию');
                                                    $("#td_add_design").css("display","none");
                                                    $("#div_add_design").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>
                                <!-- Диагональ экрана : (screen_size)-->
                                <tr>
                                    <td>
                                        <label for="screen_size" style="color:black;font-size:20px ;">Диагональ экрана:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="screen_size" id="screen_size" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Диагональ экрана</option>
                                            <?php
                                            $result = mysql_query("SELECT screen_size_tablet.* FROM  screen_size_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_screen_size'].'">' . $row['name_screen_size'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_screen_size"  name="delete_screen_size"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_screen_size">Добавить Диагональ экрана</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_screen_size" style="display:none">

                                        <label>Диагональ экрана:</label>
                                        <input type="text" id="name_screen_size" name="name_screen_size">

                                        </br>
                                        </br>
                                        <input type="button" id="add_screen_size" name="add_screen_size" value="Добавить Диагональ экрана">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_screen_size").click(function() {
                                                        deleteScreenSize();
                                                    });

                                                    $("#add_screen_size").click(function() {
                                                        addScreenSize();
                                                    });

                                                    $("#div_add_screen_size").click(function() {
                                                        showFormAddScreenSize();
                                                    });
                                                }

                                            );

                                            function deleteScreenSize()
                                            {
                                                var area = $("#screen_size");
                                                var screenSizeValue = $("#screen_size option:selected").val();
                                                area.load('tablet/delete_screen_size.php',{id_screen_size : screenSizeValue});
                                            }

                                            function addScreenSize()
                                            {
                                                var area = $("#screen_size");
                                                var nameScreenSize = $("#name_screen_size").val();
                                                area.load('tablet/add_screen_size.php',{name_screen_size : nameScreenSize});
                                            }

                                            function showFormAddScreenSize()
                                            {
                                                if (   $("#div_add_screen_size").text() == 'Добавить Диагональ экрана')
                                                {
                                                    $("#div_add_screen_size").text('Скрыть форму');
                                                    $("#td_add_screen_size").css("display","");
                                                    $("#div_add_screen_size").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_screen_size").text('Добавить Диагональ экрана');
                                                    $("#td_add_screen_size").css("display","none");
                                                    $("#div_add_screen_size").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Операционная система  : (operating_system)-->
                                <tr>
                                    <td>
                                        <label for="operating_system" style="color:black;font-size:20px ;">Операционная система:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="operating_system" id="operating_system" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Операционная система</option>
                                            <?php
                                            $result = mysql_query("SELECT operating_system_tablet.* FROM  operating_system_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_operating_system'].'">' . $row['name_operating_system'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_operating_system"  name="delete_operating_system"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_operating_system">Добавить Операционная система</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_operating_system" style="display:none">

                                        <label>Операционная система:</label>
                                        <input type="text" id="name_operating_system" name="name_operating_system">

                                        </br>
                                        </br>
                                        <input type="button" id="add_operating_system" name="add_operating_system" value="Добавить Операционная система">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_operating_system").click(function() {
                                                        deleteOperatingSystem();
                                                    });

                                                    $("#add_operating_system").click(function() {
                                                        addOperatingSystem();
                                                    });

                                                    $("#div_add_operating_system").click(function() {
                                                        showFormAddOperatingSystem();
                                                    });
                                                }

                                            );

                                            function deleteOperatingSystem()
                                            {
                                                var area = $("#operating_system");
                                                var operatingSystemValue = $("#operating_system option:selected").val();
                                                area.load('tablet/delete_operating_system.php',{id_operating_system : operatingSystemValue});
                                            }

                                            function addOperatingSystem()
                                            {
                                                var area = $("#operating_system");
                                                var nameOperatingSystem = $("#name_operating_system").val();
                                                area.load('tablet/add_operating_system.php',{name_operating_system : nameOperatingSystem});
                                            }

                                            function showFormAddOperatingSystem()
                                            {
                                                if (   $("#div_add_operating_system").text() == 'Добавить Операционная система')
                                                {
                                                    $("#div_add_operating_system").text('Скрыть форму');
                                                    $("#td_add_operating_system").css("display","");
                                                    $("#div_add_operating_system").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_operating_system").text('Добавить Операционная система');
                                                    $("#td_add_operating_system").css("display","none");
                                                    $("#div_add_operating_system").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Версия операционной системы   : (operating_system_version)-->
                                <tr>
                                    <td>
                                        <label for="operating_system_version" style="color:black;font-size:20px ;">Версия операционной системы:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="operating_system_version" id="operating_system_version" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Версия операционной системы </option>
                                            <?php
                                            $result = mysql_query("SELECT operating_system_version_tablet.* FROM  operating_system_version_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_operating_system_version'].'">' . $row['name_operating_system_version'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_operating_system_version"  name="delete_operating_system_version"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_operating_system_version">Добавить Версия операционной системы </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_operating_system_version" style="display:none">

                                        <label>Версия операционной системы :</label>
                                        <input type="text" id="name_operating_system_version" name="name_operating_system_version">

                                        </br>
                                        </br>
                                        <input type="button" id="add_operating_system_version" name="add_operating_system_version" value="Добавить Версия операционной системы ">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_operating_system_version").click(function() {
                                                        deleteOperatingSystemVersion();
                                                    });

                                                    $("#add_operating_system_version").click(function() {
                                                        addOperatingSystemVersion();
                                                    });

                                                    $("#div_add_operating_system_version").click(function() {
                                                        showFormAddOperatingSystemVersion();
                                                    });
                                                }

                                            );

                                            function deleteOperatingSystemVersion()
                                            {
                                                var area = $("#operating_system_version");
                                                var operatingSystemValue = $("#operating_system_version option:selected").val();
                                                area.load('tablet/delete_operating_system_version.php',{id_operating_system_version : operatingSystemValue});
                                            }

                                            function addOperatingSystemVersion()
                                            {
                                                var area = $("#operating_system_version");
                                                var nameOperatingSystem = $("#name_operating_system_version").val();
                                                area.load('tablet/add_operating_system_version.php',{name_operating_system_version : nameOperatingSystem});
                                            }

                                            function showFormAddOperatingSystemVersion()
                                            {
                                                if (   $("#div_add_operating_system_version").text() == 'Добавить Версия операционной системы ')
                                                {
                                                    $("#div_add_operating_system_version").text('Скрыть форму');
                                                    $("#td_add_operating_system_version").css("display","");
                                                    $("#div_add_operating_system_version").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_operating_system_version").text('Добавить Версия операционной системы ');
                                                    $("#td_add_operating_system_version").css("display","none");
                                                    $("#div_add_operating_system_version").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Процессоры   : (cpu)-->
                                <tr>
                                    <td>
                                        <label for="cpu" style="color:black;font-size:20px ;">Процессоры:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="cpu" id="cpu" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Процессоры</option>
                                            <?php
                                            $result = mysql_query("SELECT cpu_tablet.* FROM  cpu_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_cpu'].'">' . $row['name_cpu'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_cpu"  name="delete_cpu"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_cpu">Добавить Процессоры</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_cpu" style="display:none">

                                        <label>Процессоры:</label>
                                        <input type="text" id="name_cpu" name="name_cpu">

                                        </br>
                                        </br>
                                        <input type="button" id="add_cpu" name="add_cpu" value="Добавить Процессоры">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_cpu").click(function() {
                                                        deleteCpu();
                                                    });

                                                    $("#add_cpu").click(function() {
                                                        addCpu();
                                                    });

                                                    $("#div_add_cpu").click(function() {
                                                        showFormAddCpu();
                                                    });
                                                }

                                            );

                                            function deleteCpu()
                                            {
                                                var area = $("#cpu");
                                                var operatingSystemValue = $("#cpu option:selected").val();
                                                area.load('tablet/delete_cpu.php',{id_cpu : operatingSystemValue});
                                            }

                                            function addCpu()
                                            {
                                                var area = $("#cpu");
                                                var nameOperatingSystem = $("#name_cpu").val();
                                                area.load('tablet/add_cpu.php',{name_cpu : nameOperatingSystem});
                                            }

                                            function showFormAddCpu()
                                            {
                                                if (   $("#div_add_cpu").text() == 'Добавить Процессоры')
                                                {
                                                    $("#div_add_cpu").text('Скрыть форму');
                                                    $("#td_add_cpu").css("display","");
                                                    $("#div_add_cpu").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_cpu").text('Добавить Процессоры');
                                                    $("#td_add_cpu").css("display","none");
                                                    $("#div_add_cpu").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Графический ускоритель   : (graphics_accelerator)-->
                                <tr>
                                    <td>
                                        <label for="graphics_accelerator" style="color:black;font-size:20px ;">Графический ускоритель:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="graphics_accelerator" id="graphics_accelerator" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Графический ускоритель</option>
                                            <?php
                                            $result = mysql_query("SELECT graphics_accelerator_tablet.* FROM  graphics_accelerator_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_graphics_accelerator'].'">' . $row['name_graphics_accelerator'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_graphics_accelerator"  name="delete_graphics_accelerator"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_graphics_accelerator">Добавить Графический ускоритель</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_graphics_accelerator" style="display:none">

                                        <label>Графический ускоритель:</label>
                                        <input type="text" id="name_graphics_accelerator" name="name_graphics_accelerator">

                                        </br>
                                        </br>
                                        <input type="button" id="add_graphics_accelerator" name="add_graphics_accelerator" value="Добавить Графический ускоритель">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_graphics_accelerator").click(function() {
                                                        deleteGraphicsAccelerator();
                                                    });

                                                    $("#add_graphics_accelerator").click(function() {
                                                        addGraphicsAccelerator();
                                                    });

                                                    $("#div_add_graphics_accelerator").click(function() {
                                                        showFormAddGraphicsAccelerator();
                                                    });
                                                }

                                            );

                                            function deleteGraphicsAccelerator()
                                            {
                                                var area = $("#graphics_accelerator");
                                                var operatingSystemValue = $("#graphics_accelerator option:selected").val();
                                                area.load('tablet/delete_graphics_accelerator.php',{id_graphics_accelerator : operatingSystemValue});
                                            }

                                            function addGraphicsAccelerator()
                                            {
                                                var area = $("#graphics_accelerator");
                                                var nameOperatingSystem = $("#name_graphics_accelerator").val();
                                                area.load('tablet/add_graphics_accelerator.php',{name_graphics_accelerator : nameOperatingSystem});
                                            }

                                            function showFormAddGraphicsAccelerator()
                                            {
                                                if (   $("#div_add_graphics_accelerator").text() == 'Добавить Графический ускоритель')
                                                {
                                                    $("#div_add_graphics_accelerator").text('Скрыть форму');
                                                    $("#td_add_graphics_accelerator").css("display","");
                                                    $("#div_add_graphics_accelerator").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_graphics_accelerator").text('Добавить Графический ускоритель');
                                                    $("#td_add_graphics_accelerator").css("display","none");
                                                    $("#div_add_graphics_accelerator").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Оперативная память   : (ram)-->
                                <tr>
                                    <td>
                                        <label for="ram" style="color:black;font-size:20px ;">Оперативная память:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="ram" id="ram" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Оперативная память</option>
                                            <?php
                                            $result = mysql_query("SELECT ram_tablet.* FROM  ram_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_ram'].'">' . $row['name_ram'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_ram"  name="delete_ram"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_ram">Добавить Оперативная память</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_ram" style="display:none">

                                        <label>Оперативная память:</label>
                                        <input type="text" id="name_ram" name="name_ram">

                                        </br>
                                        </br>
                                        <input type="button" id="add_ram" name="add_ram" value="Добавить Оперативная память">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_ram").click(function() {
                                                        deleteRam();
                                                    });

                                                    $("#add_ram").click(function() {
                                                        addRam();
                                                    });

                                                    $("#div_add_ram").click(function() {
                                                        showFormAddRam();
                                                    });
                                                }

                                            );

                                            function deleteRam()
                                            {
                                                var area = $("#ram");
                                                var operatingSystemValue = $("#ram option:selected").val();
                                                area.load('tablet/delete_ram.php',{id_ram : operatingSystemValue});
                                            }

                                            function addRam()
                                            {
                                                var area = $("#ram");
                                                var nameOperatingSystem = $("#name_ram").val();
                                                area.load('tablet/add_ram.php',{name_ram : nameOperatingSystem});
                                            }

                                            function showFormAddRam()
                                            {
                                                if (   $("#div_add_ram").text() == 'Добавить Оперативная память')
                                                {
                                                    $("#div_add_ram").text('Скрыть форму');
                                                    $("#td_add_ram").css("display","");
                                                    $("#div_add_ram").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_ram").text('Добавить Оперативная память');
                                                    $("#td_add_ram").css("display","none");
                                                    $("#div_add_ram").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Внутренняя память   : (internal_memory)-->
                                <tr>
                                    <td>
                                        <label for="internal_memory" style="color:black;font-size:20px ;">Внутренняя память:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="internal_memory" id="internal_memory" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Внутренняя память</option>
                                            <?php
                                            $result = mysql_query("SELECT internal_memory_tablet.* FROM  internal_memory_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_internal_memory'].'">' . $row['name_internal_memory'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_internal_memory"  name="delete_internal_memory"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_internal_memory">Добавить Внутренняя память</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_internal_memory" style="display:none">

                                        <label>Внутренняя память:</label>
                                        <input type="text" id="name_internal_memory" name="name_internal_memory">

                                        </br>
                                        </br>
                                        <input type="button" id="add_internal_memory" name="add_internal_memory" value="Добавить Внутренняя память">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_internal_memory").click(function() {
                                                        deleteInternalMemory();
                                                    });

                                                    $("#add_internal_memory").click(function() {
                                                        addInternalMemory();
                                                    });

                                                    $("#div_add_internal_memory").click(function() {
                                                        showFormAddInternalMemory();
                                                    });
                                                }

                                            );

                                            function deleteInternalMemory()
                                            {
                                                var area = $("#internal_memory");
                                                var operatingSystemValue = $("#internal_memory option:selected").val();
                                                area.load('tablet/delete_internal_memory.php',{id_internal_memory : operatingSystemValue});
                                            }

                                            function addInternalMemory()
                                            {
                                                var area = $("#internal_memory");
                                                var nameOperatingSystem = $("#name_internal_memory").val();
                                                area.load('tablet/add_internal_memory.php',{name_internal_memory : nameOperatingSystem});
                                            }

                                            function showFormAddInternalMemory()
                                            {
                                                if (   $("#div_add_internal_memory").text() == 'Добавить Внутренняя память')
                                                {
                                                    $("#div_add_internal_memory").text('Скрыть форму');
                                                    $("#td_add_internal_memory").css("display","");
                                                    $("#div_add_internal_memory").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_internal_memory").text('Добавить Внутренняя память');
                                                    $("#td_add_internal_memory").css("display","none");
                                                    $("#div_add_internal_memory").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Количество ядер   : (number_of_cores)-->
                                <tr>
                                    <td>
                                        <label for="number_of_cores" style="color:black;font-size:20px ;">Количество ядер:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="number_of_cores" id="number_of_cores" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Количество ядер</option>
                                            <?php
                                            $result = mysql_query("SELECT number_of_cores_tablet.* FROM  number_of_cores_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_number_of_cores"  name="delete_number_of_cores"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_number_of_cores">Добавить Количество ядер</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_number_of_cores" style="display:none">

                                        <label>Количество ядер:</label>
                                        <input type="text" id="name_number_of_cores" name="name_number_of_cores">

                                        </br>
                                        </br>
                                        <input type="button" id="add_number_of_cores" name="add_number_of_cores" value="Добавить Количество ядер">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_number_of_cores").click(function() {
                                                        deleteNumberOfCores();
                                                    });

                                                    $("#add_number_of_cores").click(function() {
                                                        addNumberOfCores();
                                                    });

                                                    $("#div_add_number_of_cores").click(function() {
                                                        showFormAddNumberOfCores();
                                                    });
                                                }

                                            );

                                            function deleteNumberOfCores()
                                            {
                                                var area = $("#number_of_cores");
                                                var operatingSystemValue = $("#number_of_cores option:selected").val();
                                                area.load('tablet/delete_number_of_cores.php',{id_number_of_cores : operatingSystemValue});
                                            }

                                            function addNumberOfCores()
                                            {
                                                var area = $("#number_of_cores");
                                                var nameOperatingSystem = $("#name_number_of_cores").val();
                                                area.load('tablet/add_number_of_cores.php',{name_number_of_cores : nameOperatingSystem});
                                            }

                                            function showFormAddNumberOfCores()
                                            {
                                                if (   $("#div_add_number_of_cores").text() == 'Добавить Количество ядер')
                                                {
                                                    $("#div_add_number_of_cores").text('Скрыть форму');
                                                    $("#td_add_number_of_cores").css("display","");
                                                    $("#div_add_number_of_cores").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_number_of_cores").text('Добавить Количество ядер');
                                                    $("#td_add_number_of_cores").css("display","none");
                                                    $("#div_add_number_of_cores").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Тактовая частота   : (number_of_cores)-->
                                <tr>
                                    <td>
                                        <label for="number_of_cores" style="color:black;font-size:20px ;">Тактовая частота:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="number_of_cores" id="number_of_cores" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Тактовая частота</option>
                                            <?php
                                            $result = mysql_query("SELECT number_of_cores_tablet.* FROM  number_of_cores_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_number_of_cores"  name="delete_number_of_cores"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_number_of_cores">Добавить Тактовая частота</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_number_of_cores" style="display:none">

                                        <label>Тактовая частота:</label>
                                        <input type="text" id="name_number_of_cores" name="name_number_of_cores">

                                        </br>
                                        </br>
                                        <input type="button" id="add_number_of_cores" name="add_number_of_cores" value="Добавить Тактовая частота">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_number_of_cores").click(function() {
                                                        deleteNumberOfCores();
                                                    });

                                                    $("#add_number_of_cores").click(function() {
                                                        addNumberOfCores();
                                                    });

                                                    $("#div_add_number_of_cores").click(function() {
                                                        showFormAddNumberOfCores();
                                                    });
                                                }

                                            );

                                            function deleteNumberOfCores()
                                            {
                                                var area = $("#number_of_cores");
                                                var operatingSystemValue = $("#number_of_cores option:selected").val();
                                                area.load('tablet/delete_number_of_cores.php',{id_number_of_cores : operatingSystemValue});
                                            }

                                            function addNumberOfCores()
                                            {
                                                var area = $("#number_of_cores");
                                                var nameOperatingSystem = $("#name_number_of_cores").val();
                                                area.load('tablet/add_number_of_cores.php',{name_number_of_cores : nameOperatingSystem});
                                            }

                                            function showFormAddNumberOfCores()
                                            {
                                                if (   $("#div_add_number_of_cores").text() == 'Добавить Тактовая частота')
                                                {
                                                    $("#div_add_number_of_cores").text('Скрыть форму');
                                                    $("#td_add_number_of_cores").css("display","");
                                                    $("#div_add_number_of_cores").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_number_of_cores").text('Добавить Тактовая частота');
                                                    $("#td_add_number_of_cores").css("display","none");
                                                    $("#div_add_number_of_cores").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Материал корпуса   : (case_material)-->
                                <tr>
                                    <td>
                                        <label for="case_material" style="color:black;font-size:20px ;">Материал корпуса:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="case_material" id="case_material" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Материал корпуса</option>
                                            <?php
                                            $result = mysql_query("SELECT case_material_tablet.* FROM  case_material_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_case_material'].'">' . $row['name_case_material'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_case_material"  name="delete_case_material"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_case_material">Добавить Материал корпуса</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_case_material" style="display:none">

                                        <label>Материал корпуса:</label>
                                        <input type="text" id="name_case_material" name="name_case_material">

                                        </br>
                                        </br>
                                        <input type="button" id="add_case_material" name="add_case_material" value="Добавить Материал корпуса">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_case_material").click(function() {
                                                        deleteCaseMaterial();
                                                    });

                                                    $("#add_case_material").click(function() {
                                                        addCaseMaterial();
                                                    });

                                                    $("#div_add_case_material").click(function() {
                                                        showFormAddCaseMaterial();
                                                    });
                                                }

                                            );

                                            function deleteCaseMaterial()
                                            {
                                                var area = $("#case_material");
                                                var caseMaterialValue = $("#case_material option:selected").val();
                                                area.load('tablet/delete_case_material.php',{id_case_material : caseMaterialValue});
                                            }

                                            function addCaseMaterial()
                                            {
                                                var area = $("#case_material");
                                                var nameOperatingSystem = $("#name_case_material").val();
                                                area.load('tablet/add_case_material.php',{name_case_material : nameOperatingSystem});
                                            }

                                            function showFormAddCaseMaterial()
                                            {
                                                if (   $("#div_add_case_material").text() == 'Добавить Материал корпуса')
                                                {
                                                    $("#div_add_case_material").text('Скрыть форму');
                                                    $("#td_add_case_material").css("display","");
                                                    $("#div_add_case_material").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_case_material").text('Добавить Материал корпуса');
                                                    $("#td_add_case_material").css("display","none");
                                                    $("#div_add_case_material").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Емкость аккумулятора   : (battery_capacity)-->
                                <tr>
                                    <td>
                                        <label for="battery_capacity" style="color:black;font-size:20px ;">Емкость аккумулятора:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="battery_capacity" id="battery_capacity" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Емкость аккумулятора</option>
                                            <?php
                                            $result = mysql_query("SELECT battery_capacity_tablet.* FROM  battery_capacity_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_battery_capacity'].'">' . $row['name_battery_capacity'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_battery_capacity"  name="delete_battery_capacity"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_battery_capacity">Добавить Емкость аккумулятора</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_battery_capacity" style="display:none">

                                        <label>Емкость аккумулятора:</label>
                                        <input type="text" id="name_battery_capacity" name="name_battery_capacity">

                                        </br>
                                        </br>
                                        <input type="button" id="add_battery_capacity" name="add_battery_capacity" value="Добавить Емкость аккумулятора">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_battery_capacity").click(function() {
                                                        deleteBatteryCapacity();
                                                    });

                                                    $("#add_battery_capacity").click(function() {
                                                        addBatteryCapacity();
                                                    });

                                                    $("#div_add_battery_capacity").click(function() {
                                                        showFormAddBatteryCapacity();
                                                    });
                                                }

                                            );

                                            function deleteBatteryCapacity()
                                            {
                                                var area = $("#battery_capacity");
                                                var batteryCapacityValue = $("#battery_capacity option:selected").val();
                                                area.load('tablet/delete_battery_capacity.php',{id_battery_capacity : batteryCapacityValue});
                                            }

                                            function addBatteryCapacity()
                                            {
                                                var area = $("#battery_capacity");
                                                var batteryCapacitySystem = $("#name_battery_capacity").val();
                                                area.load('tablet/add_battery_capacity.php',{name_battery_capacity : batteryCapacitySystem});
                                            }

                                            function showFormAddBatteryCapacity()
                                            {
                                                if (   $("#div_add_battery_capacity").text() == 'Добавить Емкость аккумулятора')
                                                {
                                                    $("#div_add_battery_capacity").text('Скрыть форму');
                                                    $("#td_add_battery_capacity").css("display","");
                                                    $("#div_add_battery_capacity").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_battery_capacity").text('Добавить Емкость аккумулятора');
                                                    $("#td_add_battery_capacity").css("display","none");
                                                    $("#div_add_battery_capacity").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Длина   : (length)-->
                                <tr>
                                    <td>
                                        <label for="length" style="color:black;font-size:20px ;">Длина:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="length" id="length" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Длина</option>
                                            <?php
                                            $result = mysql_query("SELECT length_tablet.* FROM  length_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_length'].'">' . $row['name_length'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_length"  name="delete_length"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_length">Добавить Длина</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_length" style="display:none">

                                        <label>Длина:</label>
                                        <input type="text" id="name_length" name="name_length">

                                        </br>
                                        </br>
                                        <input type="button" id="add_length" name="add_length" value="Добавить Длина">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_length").click(function() {
                                                        deleteLength();
                                                    });

                                                    $("#add_length").click(function() {
                                                        addLength();
                                                    });

                                                    $("#div_add_length").click(function() {
                                                        showFormAddLength();
                                                    });
                                                }

                                            );

                                            function deleteLength()
                                            {
                                                var area = $("#length");
                                                var batteryCapacityValue = $("#length option:selected").val();
                                                area.load('tablet/delete_length.php',{id_length : batteryCapacityValue});
                                            }

                                            function addLength()
                                            {
                                                var area = $("#length");
                                                var batteryCapacitySystem = $("#name_length").val();
                                                area.load('tablet/add_length.php',{name_length : batteryCapacitySystem});
                                            }

                                            function showFormAddLength()
                                            {
                                                if (   $("#div_add_length").text() == 'Добавить Длина')
                                                {
                                                    $("#div_add_length").text('Скрыть форму');
                                                    $("#td_add_length").css("display","");
                                                    $("#div_add_length").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_length").text('Добавить Длина');
                                                    $("#td_add_length").css("display","none");
                                                    $("#div_add_length").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Ширина    : (width)-->
                                <tr>
                                    <td>
                                        <label for="width" style="color:black;font-size:20px ;">Ширина:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="width" id="width" ><!--style="font-size:11px;width:500px;"-->
                                            <option value="0" selected="selected">Ширина</option>
                                            <?php
                                            $result = mysql_query("SELECT width_tablet.* FROM  width_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_width'].'">' . $row['name_width'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_width"  name="delete_width"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_width">Добавить Ширина</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_width" style="display:none">

                                        <label>Ширина:</label>
                                        <input type="text" id="name_width" name="name_width">

                                        </br>
                                        </br>
                                        <input type="button" id="add_width" name="add_width" value="Добавить Ширина">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_width").click(function() {
                                                        deleteWidth();
                                                    });

                                                    $("#add_width").click(function() {
                                                        addWidth();
                                                    });

                                                    $("#div_add_width").click(function() {
                                                        showFormAddWidth();
                                                    });
                                                }

                                            );

                                            function deleteWidth()
                                            {
                                                var area = $("#width");
                                                var batteryCapacityValue = $("#width option:selected").val();
                                                area.load('tablet/delete_width.php',{id_width : batteryCapacityValue});
                                            }

                                            function addWidth()
                                            {
                                                var area = $("#width");
                                                var batteryCapacitySystem = $("#name_width").val();
                                                area.load('tablet/add_width.php',{name_width : batteryCapacitySystem});
                                            }

                                            function showFormAddWidth()
                                            {
                                                if (   $("#div_add_width").text() == 'Добавить Ширина')
                                                {
                                                    $("#div_add_width").text('Скрыть форму');
                                                    $("#td_add_width").css("display","");
                                                    $("#div_add_width").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_width").text('Добавить Ширина');
                                                    $("#td_add_width").css("display","none");
                                                    $("#div_add_width").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Толщина    : (thickness)-->
                                <tr>
                                    <td>
                                        <label for="thickness" style="color:black;font-size:20px ;">Толщина:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="thickness" id="thickness" ><!--style="font-size:11px;thickness:500px;"-->
                                            <option value="0" selected="selected">Толщина</option>
                                            <?php
                                            $result = mysql_query("SELECT thickness_tablet.* FROM  thickness_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_thickness'].'">' . $row['name_thickness'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_thickness"  name="delete_thickness"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_thickness">Добавить Толщина</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_thickness" style="display:none">

                                        <label>Толщина:</label>
                                        <input type="text" id="name_thickness" name="name_thickness">

                                        </br>
                                        </br>
                                        <input type="button" id="add_thickness" name="add_thickness" value="Добавить Толщина">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_thickness").click(function() {
                                                        deleteThickness();
                                                    });

                                                    $("#add_thickness").click(function() {
                                                        addThickness();
                                                    });

                                                    $("#div_add_thickness").click(function() {
                                                        showFormAddThickness();
                                                    });
                                                }

                                            );

                                            function deleteThickness()
                                            {
                                                var area = $("#thickness");
                                                var batteryCapacityValue = $("#thickness option:selected").val();
                                                area.load('tablet/delete_thickness.php',{id_thickness : batteryCapacityValue});
                                            }

                                            function addThickness()
                                            {
                                                var area = $("#thickness");
                                                var batteryCapacitySystem = $("#name_thickness").val();
                                                area.load('tablet/add_thickness.php',{name_thickness : batteryCapacitySystem});
                                            }

                                            function showFormAddThickness()
                                            {
                                                if (   $("#div_add_thickness").text() == 'Добавить Толщина')
                                                {
                                                    $("#div_add_thickness").text('Скрыть форму');
                                                    $("#td_add_thickness").css("display","");
                                                    $("#div_add_thickness").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_thickness").text('Добавить Толщина');
                                                    $("#td_add_thickness").css("display","none");
                                                    $("#div_add_thickness").css("color",'red');
                                                }

                                            }
                                        </script>
                                    </td>
                                </tr>

                                <!-- Вес    : (weight)-->
                                <tr>
                                    <td>
                                        <label for="weight" style="color:black;font-size:20px ;">Вес:</label>
                                    </td>
                                    <td>
                                        <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                        <select  name="weight" id="weight" ><!--style="font-size:11px;weight:500px;"-->
                                            <option value="0" selected="selected">Вес</option>
                                            <?php
                                            $result = mysql_query("SELECT weight_tablet.* FROM  weight_tablet", $db);
                                            while($row = mysql_fetch_assoc($result))
                                            {
                                                echo  '<option value="'.  $row['id_weight'].'">' . $row['name_weight'] .  '</option>';
                                            }

                                            ?>
                                            <td>
                                                <input type="button" id="delete_weight"  name="delete_weight"  value="Удалить"/>
                                            </td>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color:red" id="div_add_weight">Добавить Вес</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="td_add_weight" style="display:none">

                                        <label>Вес:</label>
                                        <input type="text" id="name_weight" name="name_weight">

                                        </br>
                                        </br>
                                        <input type="button" id="add_weight" name="add_weight" value="Добавить Вес">


                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                    $("#delete_weight").click(function() {
                                                        deleteThickness();
                                                    });

                                                    $("#add_weight").click(function() {
                                                        addThickness();
                                                    });

                                                    $("#div_add_weight").click(function() {
                                                        showFormAddThickness();
                                                    });
                                                }

                                            );

                                            function deleteThickness()
                                            {
                                                var area = $("#weight");
                                                var batteryCapacityValue = $("#weight option:selected").val();
                                                area.load('tablet/delete_weight.php',{id_weight : batteryCapacityValue});
                                            }

                                            function addThickness()
                                            {
                                                var area = $("#weight");
                                                var batteryCapacitySystem = $("#name_weight").val();
                                                area.load('tablet/add_weight.php',{name_weight : batteryCapacitySystem});
                                            }

                                            function showFormAddThickness()
                                            {
                                                if (   $("#div_add_weight").text() == 'Добавить Вес')
                                                {
                                                    $("#div_add_weight").text('Скрыть форму');
                                                    $("#td_add_weight").css("display","");
                                                    $("#div_add_weight").css("color",'blue');
                                                }
                                                else
                                                {
                                                    $("#div_add_weight").text('Добавить Вес');
                                                    $("#td_add_weight").css("display","none");
                                                    $("#div_add_weight").css("color",'red');
                                                }

                                            }
                                        </script>
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
