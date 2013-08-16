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
                    <div id="text"><h1>Редактирование</h1><br /></div>
                    <div id="text">
                    <div id="forma">
                         <br/>
                        <?php
                             if (isset($_GET['id']))
                             {
                                 $idTablet = htmlspecialchars(trim($_GET['id']));
                             }
                            $result = mysql_query("SELECT * FROM  tablet WHERE id_tablet =" . $idTablet , $db);

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

                             $rowTablet = mysql_fetch_assoc($result);
                        ?>



                             <?php
                                if (isset($_GET['successfully']))
                                {
                                   if   ($_GET['successfully'] == '1')
                                   {
                                       if($_GET['change'] =='add')
                                       {
                                           echo "<h1 style='color:blue'>Данные успешно добавлены</h1>";
                                       }
                                       elseif($_GET['change'] =='edit')
                                       {
                                           echo "<h1 style='color:blue'>Данные успешно отредактированы</h1>";
                                       }

                                   }
                                    elseif   ($_GET['successfully'] == '0')
                                    {
                                        if($_GET['change'] =='add')
                                        {
                                            echo "<h1 style='color:blue'>Данные не добавлены</h1>";
                                        }
                                        elseif($_GET['change'] =='edit')
                                        {
                                            echo "<h1 style='color:blue'>Данные не отредактированы</h1>";
                                        }
                                    }
                                   elseif   ($_GET['successfully'] == '2')
                                   {
                                       echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
                                   }
                                }

                            ?>
                         <form id="form1" method="post" action="add_tablet.php">
                         <input type="hidden" name="id_tablet" id="id_tablet" value="<?php echo $idTablet;?>">
                         <table border="0" cellspacing="10" cellpadding="340">
                         <tr>
                             <td>
                                 <label for="name_tablet" style="color:black;font-size:15px;">Название:</label>
                             </td>
                             <td>
                                 <input type="text" id="name_tablet" name="name_tablet" value="<?php echo $rowTablet['name_tablet'];?>"/><br/>
                             </td>
                         </tr>
                         <!-- Конструкция: (design)-->
                         <tr>
                             <td>
                                 <label for="design" style="color:black;font-size:15px;">Конструкция:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="design" id="design" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" selected="selected" >Конструкция</option>
                                     <?php
                                     $result = mysql_query("SELECT design_tablet.* FROM  design_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['design'] == $row['id_design'])
                                         {
                                             echo  '<option selected="selected" value="'.  $row['id_design'].'">' . $row['name_design'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_design'].'">' . $row['name_design'] .  '</option>';
                                         }

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
                                 <label for="screen_size" style="color:black;font-size:15px;">Диагональ экрана:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="screen_size" id="screen_size" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Диагональ экрана</option>
                                     <?php
                                     $result = mysql_query("SELECT screen_size_tablet.* FROM  screen_size_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['screen_size'] == $row['id_screen_size'])
                                         {
                                             echo  '<option selected="selected" value="'.  $row['id_screen_size'].'">' . $row['name_screen_size'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_screen_size'].'">' . $row['name_screen_size'] .  '</option>';
                                         }

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
                                 <label for="operating_system" style="color:black;font-size:15px;">Операционная система:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="operating_system" id="operating_system" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" selected="selected">Операционная система</option>
                                     <?php
                                     $result = mysql_query("SELECT operating_system_tablet.* FROM  operating_system_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['operating_system'] == $row['id_operating_system'])
                                         {
                                             echo  '<option selected="selected" value="'.  $row['id_operating_system'].'">' . $row['name_operating_system'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_operating_system'].'">' . $row['name_operating_system'] .  '</option>';
                                         }

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
                                 <label for="operating_system_version" style="color:black;font-size:15px;">Версия операционной системы:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="operating_system_version" id="operating_system_version" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Версия операционной системы </option>
                                     <?php
                                     $result = mysql_query("SELECT operating_system_version_tablet.* FROM  operating_system_version_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['operating_system_version'] == $row['id_operating_system_version'])
                                         {
                                             echo  '<option selected="selected" value="'.  $row['id_operating_system_version'].'">' . $row['name_operating_system_version'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_operating_system_version'].'">' . $row['name_operating_system_version'] .  '</option>';
                                         }

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
                                 <label for="cpu" style="color:black;font-size:15px;">Процессоры:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="cpu" id="cpu" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Процессоры</option>
                                     <?php
                                     $result = mysql_query("SELECT cpu_tablet.* FROM  cpu_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['cpu'] == $row['id_cpu'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_cpu'].'">' . $row['name_cpu'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_cpu'].'">' . $row['name_cpu'] .  '</option>';
                                         }

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
                                 <label for="graphics_accelerator" style="color:black;font-size:15px;">Графический ускоритель:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="graphics_accelerator" id="graphics_accelerator" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" selected="selected">Графический ускоритель</option>
                                     <?php
                                     $result = mysql_query("SELECT graphics_accelerator_tablet.* FROM  graphics_accelerator_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['graphics_accelerator'] == $row['id_graphics_accelerator'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_graphics_accelerator'].'">' . $row['name_graphics_accelerator'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_graphics_accelerator'].'">' . $row['name_graphics_accelerator'] .  '</option>';
                                         }

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
                                 <label for="ram" style="color:black;font-size:15px;">Оперативная память:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="ram" id="ram" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Оперативная память</option>
                                     <?php
                                     $result = mysql_query("SELECT ram_tablet.* FROM  ram_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['ram'] == $row['id_ram'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_ram'].'">' . $row['name_ram'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_ram'].'">' . $row['name_ram'] .  '</option>';
                                         }

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
                                 <label for="internal_memory" style="color:black;font-size:15px;">Внутренняя память:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="internal_memory" id="internal_memory" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Внутренняя память</option>
                                     <?php
                                     $result = mysql_query("SELECT internal_memory_tablet.* FROM  internal_memory_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['internal_memory'] == $row['id_internal_memory'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_internal_memory'].'">' . $row['name_internal_memory'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_internal_memory'].'">' . $row['name_internal_memory'] .  '</option>';
                                         }

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
                                 <label for="number_of_cores" style="color:black;font-size:15px;">Количество ядер:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="number_of_cores" id="number_of_cores" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" selected="selected">Количество ядер</option>
                                     <?php
                                     $result = mysql_query("SELECT number_of_cores_tablet.* FROM  number_of_cores_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['number_of_cores'] == $row['id_number_of_cores'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_number_of_cores'].'">' . $row['name_number_of_cores'] .  '</option>';
                                         }

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

                         <!-- Тактовая частота   : (clock_speed)-->
                         <tr>
                             <td>
                                 <label for="clock_speed" style="color:black;font-size:15px;">Тактовая частота:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="clock_speed" id="clock_speed" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Тактовая частота</option>
                                     <?php
                                     $result = mysql_query("SELECT clock_speed_tablet.* FROM  clock_speed_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['clock_speed'] == $row['id_clock_speed'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_clock_speed'].'">' . $row['name_clock_speed'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_clock_speed'].'">' . $row['name_clock_speed'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_clock_speed"  name="delete_clock_speed"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_clock_speed">Добавить Тактовая частота</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_clock_speed" style="display:none">

                                 <label>Тактовая частота:</label>
                                 <input type="text" id="name_clock_speed" name="name_clock_speed">

                                 </br>
                                 </br>
                                 <input type="button" id="add_clock_speed" name="add_clock_speed" value="Добавить Тактовая частота">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_clock_speed").click(function() {
                                                 deleteClockSpeed();
                                             });

                                             $("#add_clock_speed").click(function() {
                                                 addClockSpeed();
                                             });

                                             $("#div_add_clock_speed").click(function() {
                                                 showFormAddClockSpeed();
                                             });
                                         }

                                     );

                                     function deleteClockSpeed()
                                     {
                                         var area = $("#clock_speed");
                                         var operatingSystemValue = $("#clock_speed option:selected").val();
                                         area.load('tablet/delete_clock_speed.php',{id_clock_speed : operatingSystemValue});
                                     }

                                     function addClockSpeed()
                                     {
                                         var area = $("#clock_speed");
                                         var nameOperatingSystem = $("#name_clock_speed").val();
                                         area.load('tablet/add_clock_speed.php',{name_clock_speed : nameOperatingSystem});
                                     }

                                     function showFormAddClockSpeed()
                                     {
                                         if (   $("#div_add_clock_speed").text() == 'Добавить Тактовая частота')
                                         {
                                             $("#div_add_clock_speed").text('Скрыть форму');
                                             $("#td_add_clock_speed").css("display","");
                                             $("#div_add_clock_speed").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_clock_speed").text('Добавить Тактовая частота');
                                             $("#td_add_clock_speed").css("display","none");
                                             $("#div_add_clock_speed").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Материал корпуса   : (case_material)-->
                         <tr>
                             <td>
                                 <label for="case_material" style="color:black;font-size:15px;">Материал корпуса:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="case_material" id="case_material" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Материал корпуса</option>
                                     <?php
                                     $result = mysql_query("SELECT case_material_tablet.* FROM  case_material_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['case_material'] == $row['id_case_material'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_case_material'].'">' . $row['name_case_material'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_case_material'].'">' . $row['name_case_material'] .  '</option>';
                                         }

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
                                 <label for="battery_capacity" style="color:black;font-size:15px;">Емкость аккумулятора:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="battery_capacity" id="battery_capacity" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Емкость аккумулятора</option>
                                     <?php
                                     $result = mysql_query("SELECT battery_capacity_tablet.* FROM  battery_capacity_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['battery_capacity'] == $row['id_battery_capacity'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_battery_capacity'].'">' . $row['name_battery_capacity'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_battery_capacity'].'">' . $row['name_battery_capacity'] .  '</option>';
                                         }

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
                                 <label for="length" style="color:black;font-size:15px;">Длина:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="length" id="length" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" selected="selected">Длина</option>
                                     <?php
                                     $result = mysql_query("SELECT length_tablet.* FROM  length_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['length'] == $row['id_length'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_length'].'">' . $row['name_length'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_length'].'">' . $row['name_length'] .  '</option>';
                                         }

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
                                 <label for="width" style="color:black;font-size:15px;">Ширина:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="width" id="width" ><!--style="font-size:11px;width:500px;"-->
                                     <option value="0" >Ширина</option>
                                     <?php
                                     $result = mysql_query("SELECT width_tablet.* FROM  width_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['width'] == $row['id_width'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_width'].'">' . $row['name_width'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_width'].'">' . $row['name_width'] .  '</option>';
                                         }

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
                                 <label for="thickness" style="color:black;font-size:15px;">Толщина:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="thickness" id="thickness" ><!--style="font-size:11px;thickness:500px;"-->
                                     <option value="0" >Толщина</option>
                                     <?php
                                     $result = mysql_query("SELECT thickness_tablet.* FROM  thickness_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['thickness'] == $row['id_thickness'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_thickness'].'">' . $row['name_thickness'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_thickness'].'">' . $row['name_thickness'] .  '</option>';
                                         }

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
                                 <label for="weight" style="color:black;font-size:15px;">Вес:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="weight" id="weight" ><!--style="font-size:11px;weight:500px;"-->
                                     <option value="0" >Вес</option>
                                     <?php
                                     $result = mysql_query("SELECT weight_tablet.* FROM  weight_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['weight'] == $row['id_weight'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_weight'].'">' . $row['name_weight'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_weight'].'">' . $row['name_weight'] .  '</option>';
                                         }

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
                                                 deleteWeight();
                                             });

                                             $("#add_weight").click(function() {
                                                 addWeight();
                                             });

                                             $("#div_add_weight").click(function() {
                                                 showFormAddWeight();
                                             });
                                         }

                                     );

                                     function deleteWeight()
                                     {
                                         var area = $("#weight");
                                         var batteryCapacityValue = $("#weight option:selected").val();
                                         area.load('tablet/delete_weight.php',{id_weight : batteryCapacityValue});
                                     }

                                     function addWeight()
                                     {
                                         var area = $("#weight");
                                         var batteryCapacitySystem = $("#name_weight").val();
                                         area.load('tablet/add_weight.php',{name_weight : batteryCapacitySystem});
                                     }

                                     function showFormAddWeight()
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

                         <!-- Акселерометр     : (accelerometer)-->
                         <tr>
                             <td>
                                 <label for="accelerometer" style="color:black;font-size:15px;">Акселерометр:</label>
                             </td>
                             <td>
                                 <input type="checkbox"  name="accelerometer" id="accelerometer" <?php echo $rowTablet['accelerometer'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Гироскоп      : (gyroscope)-->
                         <tr>
                             <td>
                                 <label for="gyroscope" style="color:black;font-size:15px;">Гироскоп:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="gyroscope" id="gyroscope" <?php echo $rowTablet['gyroscope'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Датчик приближения       : (proximity_sensor)-->
                         <tr>
                             <td>
                                 <label for="proximity_sensor" style="color:black;font-size:15px;">Датчик приближения:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="proximity_sensor" id="proximity_sensor" <?php echo $rowTablet['proximity_sensor'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>


                         <!-- Разрешение экрана    : (screen_resolution)-->
                         <tr>
                             <td>
                                 <label for="screen_resolution" style="color:black;font-size:15px;">Разрешение экрана:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="screen_resolution" id="screen_resolution" ><!--style="font-size:11px;screen_resolution:500px;"-->
                                     <option value="0" >Разрешение экрана</option>
                                     <?php
                                     $result = mysql_query("SELECT screen_resolution_tablet.* FROM  screen_resolution_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['screen_resolution'] == $row['id_screen_resolution'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_screen_resolution'].'">' . $row['name_screen_resolution'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_screen_resolution'].'">' . $row['name_screen_resolution'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_screen_resolution"  name="delete_screen_resolution"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_screen_resolution">Добавить Разрешение экрана</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_screen_resolution" style="display:none">

                                 <label>Разрешение экрана:</label>
                                 <input type="text" id="name_screen_resolution" name="name_screen_resolution">

                                 </br>
                                 </br>
                                 <input type="button" id="add_screen_resolution" name="add_screen_resolution" value="Добавить Разрешение экрана">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_screen_resolution").click(function() {
                                                 deleteScreenResolution();
                                             });

                                             $("#add_screen_resolution").click(function() {
                                                 addScreenResolution();
                                             });

                                             $("#div_add_screen_resolution").click(function() {
                                                 showFormAddScreenResolution();
                                             });
                                         }

                                     );

                                     function deleteScreenResolution()
                                     {
                                         var area = $("#screen_resolution");
                                         var screenResolutionValue = $("#screen_resolution option:selected").val();
                                         area.load('tablet/delete_screen_resolution.php',{id_screen_resolution : screenResolutionValue});
                                     }

                                     function addScreenResolution()
                                     {
                                         var area = $("#screen_resolution");
                                         var screenResolutionSystem = $("#name_screen_resolution").val();
                                         area.load('tablet/add_screen_resolution.php',{name_screen_resolution : screenResolutionSystem});
                                     }

                                     function showFormAddScreenResolution()
                                     {
                                         if (   $("#div_add_screen_resolution").text() == 'Добавить Разрешение экрана')
                                         {
                                             $("#div_add_screen_resolution").text('Скрыть форму');
                                             $("#td_add_screen_resolution").css("display","");
                                             $("#div_add_screen_resolution").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_screen_resolution").text('Добавить Разрешение экрана');
                                             $("#td_add_screen_resolution").css("display","none");
                                             $("#div_add_screen_resolution").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Тип матрицы экрана    : (type_of_matrix_screen)-->
                         <tr>
                             <td>
                                 <label for="type_of_matrix_screen" style="color:black;font-size:15px;">Тип матрицы экрана:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="type_of_matrix_screen" id="type_of_matrix_screen" ><!--style="font-size:11px;type_of_matrix_screen:500px;"-->
                                     <option value="0" >Тип матрицы экрана</option>
                                     <?php
                                     $result = mysql_query("SELECT type_of_matrix_screen_tablet.* FROM  type_of_matrix_screen_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['type_of_matrix_screen'] == $row['id_type_of_matrix_screen'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_type_of_matrix_screen'].'">' . $row['name_type_of_matrix_screen'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_type_of_matrix_screen'].'">' . $row['name_type_of_matrix_screen'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_type_of_matrix_screen"  name="delete_type_of_matrix_screen"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_type_of_matrix_screen">Добавить Тип матрицы экрана</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_type_of_matrix_screen" style="display:none">

                                 <label>Тип матрицы экрана:</label>
                                 <input type="text" id="name_type_of_matrix_screen" name="name_type_of_matrix_screen">

                                 </br>
                                 </br>
                                 <input type="button" id="add_type_of_matrix_screen" name="add_type_of_matrix_screen" value="Добавить Тип матрицы экрана">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_type_of_matrix_screen").click(function() {
                                                 deleteTypeOfMatrixScreen();
                                             });

                                             $("#add_type_of_matrix_screen").click(function() {
                                                 addTypeOfMatrixScreen();
                                             });

                                             $("#div_add_type_of_matrix_screen").click(function() {
                                                 showFormAddTypeOfMatrixScreen();
                                             });
                                         }

                                     );

                                     function deleteTypeOfMatrixScreen()
                                     {
                                         var area = $("#type_of_matrix_screen");
                                         var typeOfMatrixScreenValue = $("#type_of_matrix_screen option:selected").val();
                                         area.load('tablet/delete_type_of_matrix_screen.php',{id_type_of_matrix_screen : typeOfMatrixScreenValue});
                                     }

                                     function addTypeOfMatrixScreen()
                                     {
                                         var area = $("#type_of_matrix_screen");
                                         var typeOfMatrixScreenSystem = $("#name_type_of_matrix_screen").val();
                                         area.load('tablet/add_type_of_matrix_screen.php',{name_type_of_matrix_screen : typeOfMatrixScreenSystem});
                                     }

                                     function showFormAddTypeOfMatrixScreen()
                                     {
                                         if (   $("#div_add_type_of_matrix_screen").text() == 'Добавить Тип матрицы экрана')
                                         {
                                             $("#div_add_type_of_matrix_screen").text('Скрыть форму');
                                             $("#td_add_type_of_matrix_screen").css("display","");
                                             $("#div_add_type_of_matrix_screen").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_type_of_matrix_screen").text('Добавить Тип матрицы экрана');
                                             $("#td_add_type_of_matrix_screen").css("display","none");
                                             $("#div_add_type_of_matrix_screen").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Мультитач      : (multi_touch)-->
                         <tr>
                             <td>
                                 <label for="multi_touch" style="color:black;font-size:15px;">Мультитач:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="multi_touch" id="multi_touch" <?php echo $rowTablet['multi_touch'] ? 'checked="checked"' : '';?>/>
                             </td>
                             <td>
                                 <input type="text" name="text_multi_touch" id="text_multi_touch" value="<?php echo $rowTablet['multi_touch'] ? $rowTablet['text_multi_touch']: '';?>"/>
                             </td>
                         </tr>

                         <!-- Защита от царапин      : (protection_from_scratches)-->
                         <tr>
                             <td>
                                 <label for="protection_from_scratches" style="color:black;font-size:15px;">Защита от царапин:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="protection_from_scratches" id="protection_from_scratches" <?php echo $rowTablet['protection_from_scratches'] ? 'checked="checked"' : '';?>/>
                             </td>

                         </tr>


                         <!-- Карты памяти      : (memory_cards)-->
                         <tr>
                             <td>
                                 <label for="memory_cards" style="color:black;font-size:15px;">Карты памяти:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="memory_cards" id="memory_cards" <?php echo $rowTablet['memory_cards'] ? 'checked="checked"' : '';?>/>
                             </td>
                             <td>
                                 <input type="text" name="text_memory_cards" id="text_memory_cards" value="<?php echo $rowTablet['memory_cards'] ? $rowTablet['text_memory_cards']: '';?>"/>
                             </td>
                         </tr>

                         <!-- Встроенная камера      : (built-in_camera)-->
                         <tr>
                             <td>
                                 <label for="built-in_camera" style="color:black;font-size:15px;">Встроенная камера:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="built-in_camera" id="built-in_camera" <?php echo $rowTablet['built-in_camera'] ? 'checked="checked"' : '';?>/>
                             </td>

                         </tr>

                         <!-- Количество активных пикселей    : (number_of_active_pixels)-->
                         <tr>
                             <td>
                                 <label for="number_of_active_pixels" style="color:black;font-size:15px;">Количество активных пикселей:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="number_of_active_pixels" id="number_of_active_pixels" ><!--style="font-size:11px;number_of_active_pixels:500px;"-->
                                     <option value="0" >Количество активных пикселей</option>
                                     <?php
                                     $result = mysql_query("SELECT number_of_active_pixels_tablet.* FROM  number_of_active_pixels_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['number_of_active_pixels'] == $row['id_number_of_active_pixels'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_number_of_active_pixels'].'">' . $row['name_number_of_active_pixels'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_number_of_active_pixels'].'">' . $row['name_number_of_active_pixels'] .  '</option>';
                                         }
                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_number_of_active_pixels"  name="delete_number_of_active_pixels"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_number_of_active_pixels">Добавить Количество активных пикселей</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_number_of_active_pixels" style="display:none">

                                 <label>Количество активных пикселей:</label>
                                 <input type="text" id="name_number_of_active_pixels" name="name_number_of_active_pixels">

                                 </br>
                                 </br>
                                 <input type="button" id="add_number_of_active_pixels" name="add_number_of_active_pixels" value="Добавить Количество активных пикселей">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_number_of_active_pixels").click(function() {
                                                 deleteNumberOfActivePixels();
                                             });

                                             $("#add_number_of_active_pixels").click(function() {
                                                 addNumberOfActivePixels();
                                             });

                                             $("#div_add_number_of_active_pixels").click(function() {
                                                 showFormAddNumberOfActivePixels();
                                             });
                                         }

                                     );

                                     function deleteNumberOfActivePixels()
                                     {
                                         var area = $("#number_of_active_pixels");
                                         var numberOfActivePixelsValue = $("#number_of_active_pixels option:selected").val();
                                         area.load('tablet/delete_number_of_active_pixels.php',{id_number_of_active_pixels : numberOfActivePixelsValue});
                                     }

                                     function addNumberOfActivePixels()
                                     {
                                         var area = $("#number_of_active_pixels");
                                         var numberOfActivePixelsSystem = $("#name_number_of_active_pixels").val();
                                         area.load('tablet/add_number_of_active_pixels.php',{name_number_of_active_pixels : numberOfActivePixelsSystem});
                                     }

                                     function showFormAddNumberOfActivePixels()
                                     {
                                         if (   $("#div_add_number_of_active_pixels").text() == 'Добавить Количество активных пикселей')
                                         {
                                             $("#div_add_number_of_active_pixels").text('Скрыть форму');
                                             $("#td_add_number_of_active_pixels").css("display","");
                                             $("#div_add_number_of_active_pixels").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_number_of_active_pixels").text('Добавить Количество активных пикселей');
                                             $("#td_add_number_of_active_pixels").css("display","none");
                                             $("#div_add_number_of_active_pixels").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Количество активных пикселей фронтальной камеры    : (number_of_active_pixels_front_camera)-->
                         <tr>
                             <td>
                                 <label for="number_of_active_pixels_front_camera" style="color:black;font-size:15px;">Количество активных пикселей фронтальной камеры:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="number_of_active_pixels_front_camera" id="number_of_active_pixels_front_camera" ><!--style="font-size:11px;number_of_active_pixels_front_camera:500px;"-->
                                     <option value="0" >Количество активных пикселей фронтальной камеры</option>
                                     <?php
                                     $result = mysql_query("SELECT number_of_active_pixels_front_camera_tablet.* FROM  number_of_active_pixels_front_camera_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['id_number_of_active_pixels_front_camera'] == $row['number_of_active_pixels_front_camera'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_number_of_active_pixels_front_camera'].'">' . $row['name_number_of_active_pixels_front_camera'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_number_of_active_pixels_front_camera'].'">' . $row['name_number_of_active_pixels_front_camera'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_number_of_active_pixels_front_camera"  name="delete_number_of_active_pixels_front_camera"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_number_of_active_pixels_front_camera">Добавить Количество активных пикселей фронтальной камеры</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_number_of_active_pixels_front_camera" style="display:none">

                                 <label>Количество активных пикселей фронтальной камеры:</label>
                                 <input type="text" id="name_number_of_active_pixels_front_camera" name="name_number_of_active_pixels_front_camera">

                                 </br>
                                 </br>
                                 <input type="button" id="add_number_of_active_pixels_front_camera" name="add_number_of_active_pixels_front_camera" value="Добавить Количество активных пикселей фронтальной камеры">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_number_of_active_pixels_front_camera").click(function() {
                                                 deleteNumberOfActivePixelsFrontCamera();
                                             });

                                             $("#add_number_of_active_pixels_front_camera").click(function() {
                                                 addNumberOfActivePixelsFrontCamera();
                                             });

                                             $("#div_add_number_of_active_pixels_front_camera").click(function() {
                                                 showFormAddNumberOfActivePixelsFrontCamera();
                                             });
                                         }

                                     );

                                     function deleteNumberOfActivePixelsFrontCamera()
                                     {
                                         var area = $("#number_of_active_pixels_front_camera");
                                         var numberOfActivePixelsFrontCameraValue = $("#number_of_active_pixels_front_camera option:selected").val();
                                         area.load('tablet/delete_number_of_active_pixels_front_camera.php',{id_number_of_active_pixels_front_camera : numberOfActivePixelsFrontCameraValue});
                                     }

                                     function addNumberOfActivePixelsFrontCamera()
                                     {
                                         var area = $("#number_of_active_pixels_front_camera");
                                         var numberOfActivePixelsFrontCameraSystem = $("#name_number_of_active_pixels_front_camera").val();
                                         area.load('tablet/add_number_of_active_pixels_front_camera.php',{name_number_of_active_pixels_front_camera : numberOfActivePixelsFrontCameraSystem});
                                     }

                                     function showFormAddNumberOfActivePixelsFrontCamera()
                                     {
                                         if (   $("#div_add_number_of_active_pixels_front_camera").text() == 'Добавить Количество активных пикселей фронтальной камеры')
                                         {
                                             $("#div_add_number_of_active_pixels_front_camera").text('Скрыть форму');
                                             $("#td_add_number_of_active_pixels_front_camera").css("display","");
                                             $("#div_add_number_of_active_pixels_front_camera").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_number_of_active_pixels_front_camera").text('Добавить Количество активных пикселей фронтальной камеры');
                                             $("#td_add_number_of_active_pixels_front_camera").css("display","none");
                                             $("#div_add_number_of_active_pixels_front_camera").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Встроенный микрофон     : (built-in_microphone)-->
                         <tr>
                             <td>
                                 <label for="built-in_microphone" style="color:black;font-size:15px;">Встроенный микрофон:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="built-in_microphone" id="built-in_microphone" <?php echo $rowTablet['built-in_microphone'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Встроенные динамики    : (built_in_speakers)-->
                         <tr>
                             <td>
                                 <label for="built_in_speakers" style="color:black;font-size:15px;">Встроенные динамики:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="built_in_speakers" id="built_in_speakers" ><!--style="font-size:11px;built_in_speakers:500px;"-->
                                     <option value="0" >Встроенные динамики</option>
                                     <?php
                                     $result = mysql_query("SELECT built_in_speakers_tablet.* FROM  built_in_speakers_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['built_in_speakers'] == $row['id_built_in_speakers'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_built_in_speakers'].'">' . $row['name_built_in_speakers'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_built_in_speakers'].'">' . $row['name_built_in_speakers'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_built_in_speakers"  name="delete_built_in_speakers"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_built_in_speakers">Добавить Встроенные динамики</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_built_in_speakers" style="display:none">

                                 <label>Встроенные динамики:</label>
                                 <input type="text" id="name_built_in_speakers" name="name_built_in_speakers">

                                 </br>
                                 </br>
                                 <input type="button" id="add_built_in_speakers" name="add_built_in_speakers" value="Добавить Встроенные динамики">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_built_in_speakers").click(function() {
                                                 deleteBuiltInSpeakers();
                                             });

                                             $("#add_built_in_speakers").click(function() {
                                                 addBuiltInSpeakers();
                                             });

                                             $("#div_add_built_in_speakers").click(function() {
                                                 showFormAddBuiltInSpeakers();
                                             });
                                         }

                                     );

                                     function deleteBuiltInSpeakers()
                                     {
                                         var area = $("#built_in_speakers");
                                         var numberOfActivePixelsFrontCameraValue = $("#built_in_speakers option:selected").val();
                                         area.load('tablet/delete_built_in_speakers.php',{id_built_in_speakers : numberOfActivePixelsFrontCameraValue});
                                     }

                                     function addBuiltInSpeakers()
                                     {
                                         var area = $("#built_in_speakers");
                                         var numberOfActivePixelsFrontCameraSystem = $("#name_built_in_speakers").val();
                                         area.load('tablet/add_built_in_speakers.php',{name_built_in_speakers : numberOfActivePixelsFrontCameraSystem});
                                     }

                                     function showFormAddBuiltInSpeakers()
                                     {
                                         if (   $("#div_add_built_in_speakers").text() == 'Добавить Встроенные динамики')
                                         {
                                             $("#div_add_built_in_speakers").text('Скрыть форму');
                                             $("#td_add_built_in_speakers").css("display","");
                                             $("#div_add_built_in_speakers").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_built_in_speakers").text('Добавить Встроенные динамики');
                                             $("#td_add_built_in_speakers").css("display","none");
                                             $("#div_add_built_in_speakers").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>


                         <!-- Bluetooth      : (bluetooth)-->
                         <tr>
                             <td>
                                 <label for="bluetooth" style="color:black;font-size:15px;">Bluetooth:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="bluetooth" id="bluetooth" <?php echo $rowTablet['bluetooth'] ? 'checked="checked"' : '';?>/>
                             </td>
                             <td>
                                 <input type="text" name="text_bluetooth" id="text_bluetooth" value="<?php echo $rowTablet['bluetooth'] ? $rowTablet['text_bluetooth']: '';?>"/>
                             </td>
                         </tr>

                         <!-- Lan      : (lan)-->
                         <tr>
                             <td>
                                 <label for="lan" style="color:black;font-size:15px;">Lan:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="lan" id="lan" <?php echo $rowTablet['lan'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Wifi      : (wifi)-->
                         <tr>
                             <td>
                                 <label for="wifi" style="color:black;font-size:15px;">Wifi:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="wifi" id="wifi" <?php echo $rowTablet['wifi'] ? 'checked="checked"' : '';?>/>
                             </td>
                             <td>
                                 <input type="text" name="text_wifi" id="text_wifi" value="<?php echo $rowTablet['wifi'] ? $rowTablet['text_wifi']: '';?>"/>
                             </td>
                         </tr>

                         <!-- 3G_modem     : (3g_modem)-->
                         <tr>
                             <td>
                                 <label for="3g_modem" style="color:black;font-size:15px;">3G_modem:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="3g_modem" id="3g_modem" <?php echo $rowTablet['3g_modem'] ? 'checked="checked"' : '';?>/>
                             </td>
                             <td>
                                 <input type="text" name="text_3g_modem" id="text_3g_modem" value="<?php echo $rowTablet['3g_modem'] ? $rowTablet['text_3g_modem']: '';?>"/>
                             </td>
                         </tr>

                         <!-- USB 2.0     : (usb_2)-->
                         <tr>
                             <td>
                                 <label for="usb_2" style="color:black;font-size:15px;">USB 2.0:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="usb_2" id="usb_2" <?php echo $rowTablet['usb_2'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- USB 3.0     : (usb_3)-->
                         <tr>
                             <td>
                                 <label for="usb_3" style="color:black;font-size:15px;">USB 3.0:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="usb_3" id="usb_3" <?php echo $rowTablet['usb_3'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- HDMI    : (hdmi)-->
                         <tr>
                             <td>
                                 <label for="hdmi" style="color:black;font-size:15px;">HDMI:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="hdmi" id="hdmi"<?php echo $rowTablet['hdmi'] ? 'checked="checked"' : '';?> />
                             </td>
                         </tr>

                         <!-- DisplayPort    : (display_port)-->
                         <tr>
                             <td>
                                 <label for="display_port" style="color:black;font-size:15px;">DisplayPort:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="display_port" id="display_port" <?php echo $rowTablet['display_port'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Аудио выходы (3.5 мм jack)    : (audio_outputs)-->
                         <tr>
                             <td>
                                 <label for="audio_outputs" style="color:black;font-size:15px;">Аудио выходы (3.5 мм jack):</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="audio_outputs" id="audio_outputs" <?php echo $rowTablet['audio_outputs'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Док-порт    : (docking_port)-->
                         <tr>
                             <td>
                                 <label for="docking_port" style="color:black;font-size:15px;">Док-порт:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="docking_port" id="docking_port" <?php echo $rowTablet['docking_port'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- GPS/A-GPS    : (gps)-->
                         <tr>
                             <td>
                                 <label for="gps" style="color:black;font-size:15px;">GPS/A-GPS:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="gps" id="gps" <?php echo $rowTablet['gps'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>

                         <!-- Электронный компас    : (electronic_compass)-->
                         <tr>
                             <td>
                                 <label for="electronic_compass" style="color:black;font-size:15px;">GPS/A-GPS:</label>
                             </td>
                             <td>
                                 <input type="checkbox" name="electronic_compass" id="electronic_compass" <?php echo $rowTablet['electronic_compass'] ? 'checked="checked"' : '';?>/>
                             </td>
                         </tr>
                         <!-- Загрузка картинок    : (image_name)-->
                         <tr>
                             <td>
                                 <label for="image_name" style="font-size:15px">Выбор Изображения:</label>
                                 <label for="image_name" style="font-size:10px">(изображение загружаются в папку images/tablet_images. Первое изображение разрешения 260px*177px,
                                     второе изображение без изменений. Пример имени: 1-ая картинка - panasoniс_small.jpg, 2-ая картинка - panasoniс_full.jpg. _small и _full в имени изображений обязательны.), а пишем в строке только panasonic:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="image_name" id="image_name" ><!--style="font-size:11px;image_name:500px;"-->
                                     <option value="0" >Выбор Изображения</option>
                                     <?php
                                     $result = mysql_query("SELECT image_name_tablet.* FROM  image_name_tablet WHERE id_tablet=".$rowTablet['id_tablet'], $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['image_name'] == $row['id_image_name'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_image_name'].'">' . $row['name_image_name'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_image_name"  name="delete_image_name"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_image_name">Добавить Изображение</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_image_name" style="display:none">

                                 <label>Изображение:</label>
                                 <input type="text" id="name_image_name" name="name_image_name">

                                 </br>
                                 </br>
                                 <input type="button" id="add_image_name" name="add_image_name" value="Добавить Изображение">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_image_name").click(function() {
                                                 deleteImageName();
                                             });

                                             $("#add_image_name").click(function() {
                                                 addImageName();
                                             });

                                             $("#div_add_image_name").click(function() {
                                                 showFormAddImageName();
                                             });
                                         }

                                     );

                                     function deleteImageName()
                                     {
                                         var area = $("#image_name");
                                         var numberOfActivePixelsFrontCameraValue = $("#image_name option:selected").val();
                                         area.load('tablet/delete_image_name.php',{id_image_name : numberOfActivePixelsFrontCameraValue, id_tablet:<?php echo $rowTablet['id_tablet']?> });
                                     }

                                     function addImageName()
                                     {
                                         var area = $("#image_name");
                                         var numberOfActivePixelsFrontCameraSystem = $("#name_image_name").val();
                                         area.load('tablet/add_image_name.php',{name_image_name : numberOfActivePixelsFrontCameraSystem, id_tablet:<?php echo $rowTablet['id_tablet']?> });
                                     }

                                     function showFormAddImageName()
                                     {
                                         if (   $("#div_add_image_name").text() == 'Добавить Изображение')
                                         {
                                             $("#div_add_image_name").text('Скрыть форму');
                                             $("#td_add_image_name").css("display","");
                                             $("#div_add_image_name").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_image_name").text('Добавить Изображение');
                                             $("#td_add_image_name").css("display","none");
                                             $("#div_add_image_name").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>

                         <!-- Производитель    : (manufacture)-->
                         <tr>
                             <td>
                                 <label for="manufacture" style="font-size:15px">Производитель:</label>
                             </td>
                             <td>
                                 <!--                                        <input type="text" id="design" name="design" value="--><?php //echo $row['design'];?><!--"/><br/>-->
                                 <select  name="manufacture" id="manufacture" ><!--style="font-size:11px;image_name:500px;"-->
                                     <option value="0" selected="selected">Производитель</option>
                                     <?php
                                     $result = mysql_query("SELECT manufacture_tablet.* FROM  manufacture_tablet", $db);
                                     while($row = mysql_fetch_assoc($result))
                                     {
                                         if ($rowTablet['manufacture'] == $row['id_manufacture'])
                                         {
                                             echo  '<option selected="selected"value="'.  $row['id_manufacture'].'">' . $row['name_manufacture'] .  '</option>';
                                         }
                                         else
                                         {
                                             echo  '<option value="'.  $row['id_manufacture'].'">' . $row['name_manufacture'] .  '</option>';
                                         }

                                     }

                                     ?>
                                     <td>
                                         <input type="button" id="delete_manufacture"  name="delete_manufacture"  value="Удалить"/>
                                     </td>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <div style="color:red" id="div_add_manufacture">Добавить Производителя</div>
                             </td>
                         </tr>
                         <tr>
                             <td id="td_add_manufacture" style="display:none">

                                 <label>Производителя:</label>
                                 <input type="text" id="name_manufacture" name="name_manufacture">

                                 </br>
                                 </br>
                                 <input type="button" id="add_manufacture" name="add_manufacture" value="Добавить Производителя">


                                 <script type="text/javascript">
                                     $(document).ready(function() {

                                             $("#delete_manufacture").click(function() {
                                                 deleteManufacture();
                                             });

                                             $("#add_manufacture").click(function() {
                                                 addManufacture();
                                             });

                                             $("#div_add_manufacture").click(function() {
                                                 showFormAddManufacture();
                                             });
                                         }

                                     );

                                     function deleteManufacture()
                                     {
                                         var area = $("#manufacture");
                                         var manufactureValue = $("#manufacture option:selected").val();
                                         area.load('tablet/delete_manufacture.php',{id_manufacture : manufactureValue});
                                     }

                                     function addManufacture()
                                     {
                                         var area = $("#manufacture");
                                         var manufactureSystem = $("#name_manufacture").val();
                                         area.load('tablet/add_manufacture.php',{name_manufacture : manufactureSystem});
                                     }

                                     function showFormAddManufacture()
                                     {
                                         if (   $("#div_add_manufacture").text() == 'Добавить Производителя')
                                         {
                                             $("#div_add_manufacture").text('Скрыть форму');
                                             $("#td_add_manufacture").css("display","");
                                             $("#div_add_manufacture").css("color",'blue');
                                         }
                                         else
                                         {
                                             $("#div_add_manufacture").text('Добавить Производителя');
                                             $("#td_add_manufacture").css("display","none");
                                             $("#div_add_manufacture").css("color",'red');
                                         }

                                     }
                                 </script>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <label for="cost" style="color:black;font-size:15px;">Стоимость:</label>
                             </td>
                             <td>
                                 <input type="text" name="cost" id="cost" value="<?php echo $rowTablet['cost'];?>"/>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <input type="submit" name="submit" id="submit" value="Редактировать планшет" />
                             </td>
                             <td></td>
                         </tr>
                         </table>
                         </form>
                    </div><br/>
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
