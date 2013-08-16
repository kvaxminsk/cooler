<?php
include ("blocks/bd.php");/*Connecting to BD!*/

if (!empty($_GET))
{
    foreach($_GET as $key => $value)
    {
        $searchParams[$key] = htmlspecialchars(trim($value));
    }
    $strSgl = "SELECT * FROM  system_block
                               LEFT JOIN cpu ON cpu.id = system_block.id_cpu
                               LEFT JOIN hdd ON hdd.id = system_block.id_hdd
                               LEFT JOIN random_access_memory ON random_access_memory.id = system_block.id_random_access_memory
                               LEFT JOIN computer_case ON computer_case.id = system_block.id_computer_case
                               LEFT JOIN motherboard ON motherboard.id = system_block.id_motherboard
                               LEFT JOIN power_unit  ON power_unit.id = system_block.id_power_unit
                               LEFT JOIN optical_drive  ON optical_drive.id = system_block.id_optical_drive
                               LEFT JOIN vga  ON vga.id = system_block.id_vga     WHERE";

    if((!empty($searchParams["min_cost"])) && ($searchParams["min_cost"] != 'Не важно'))
    {
         $strSgl .= " system_block.cost >= " .  $searchParams["min_cost"] . '   AND ';
    }

    if((!empty($searchParams["max_cost"])) && ($searchParams["max_cost"] != 'Не важно'))
    {
         $strSgl .= "   system_block.cost <= " .  $searchParams["max_cost"]. '   AND ';
    }

    if((!empty($searchParams["select_cpu"]))&& ($searchParams["select_cpu"] != 'Не важно'))
    {
         $strSgl .= "   cpu.name_cpu LIKE '%" .  $searchParams["select_cpu"] . "%' "  . '   AND ';
    }
    if((!empty($searchParams["select_number_cores_cpu"]))&& ($searchParams["select_number_cores_cpu"] != 'Не важно'))
    {
        $strSgl .= "   cpu.number_cores_cpu = " .  $searchParams["select_number_cores_cpu"]. '   AND ';
    }
    if ((!empty($searchParams["min_speed_cpu"])) && ($searchParams["min_speed_cpu"] != 'Не важно'))
    {
        $strSgl .= "   cpu.speed_cpu >= '" . strtr($searchParams["min_speed_cpu"], ",", ".")  . "'    AND ";
    }
    if ((!empty($searchParams["max_speed_cpu"])) && ($searchParams["max_speed_cpu"] != 'Не важно'))
    {
        $strSgl .= "   cpu.speed_cpu <= '" . strtr($searchParams["max_speed_cpu"], ",", ".")   . "'    AND ";
    }
    if((!empty($searchParams["select_vga"]))&& ($searchParams["select_vga"] != 'Не важно'))
    {
        $strSgl .= "   system_block.id_vga = " .  $searchParams["select_vga"]. '    AND ';
    }
    if((!empty($searchParams["select_hdd"]))&& ($searchParams["select_hdd"] != 'Не важно'))
    {
        $strSgl .= "   system_block.id_hdd = " .  $searchParams["select_hdd"]. '     AND ';
    }
    if((!empty($searchParams["select_random_access_memory"]))&& ($searchParams["select_random_access_memory"] != 'Не важно'))
    {
        $strSgl .= "   random_access_memory.id = " .  $searchParams["select_random_access_memory"]. '   AND ';
    }
    if((!empty($searchParams["optical_drive"]))&& ($searchParams["optical_drive"] != 'Не важно'))
    {
        $strSgl .= "   system_block.id_optical_drive =1 ". '   AND ';
    }
    if((!empty($searchParams["select_power_unit"]))&& ($searchParams["select_power_unit"] != 'Не важно'))
    {
        $strSgl .= "   system_block.id_power_unit = " . $searchParams["select_power_unit"]. '    AND ' ;
    }
    if((!empty($searchParams["select_computer_case"]))&& ($searchParams["select_computer_case"] != 'Не важно'))
    {
        $strSgl .= "   system_block.id_computer_case = " . $searchParams["select_computer_case"]. '    AND ' ;
    }
    $strSgl =  substr($strSgl,0,-5);
    $strSgl .=  " ORDER BY system_block.cost ASC";
   //echo $strSgl;die();
    /*var_dump($_GET);echo "<br/>";
    var_dump($strSgl);die();  */
}
else
{
  $strSgl  = "SELECT * FROM  system_block
                                                           LEFT JOIN cpu ON cpu.id = system_block.id_cpu
                                                           LEFT JOIN hdd ON hdd.id = system_block.id_hdd
                                                           LEFT JOIN random_access_memory ON random_access_memory.id = system_block.id_random_access_memory
                                                           LEFT JOIN computer_case ON computer_case.id = system_block.id_computer_case
                                                           LEFT JOIN motherboard ON motherboard.id = system_block.id_motherboard
                                                           LEFT JOIN power_unit  ON power_unit.id = system_block.id_power_unit
                                                           LEFT JOIN optical_drive  ON optical_drive.id = system_block.id_optical_drive
                                                           LEFT JOIN vga  ON vga.id = system_block.id_vga ORDER BY system_block.cost ASC";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Подбор системного блока по параметрам из комплектующих</title>
    <meta name="keywords" content="Системный блок"/>
    <meta name="description" content="Системный блок - с виду, это просто  корпус, но внутри его находятся главные компоненты и узлы компьютера от которых зависит функциональность и мощность. Выбрать его значительно сложнее, чем другие составляющие так, 
                как системный блок заменяется очень редко из-за своей стоимости, поэтому нужно выбирать с такими характеристиками, которые будут полностью удовлетворять все Ваши требования. 
                Предлагаем  Вам широкий выбор системных блоков в Минске с удобным подбором по параметрам из комплектующих. Благодаря тому, что системники различных комплектаций, каждый пользователь сможет найти свою модель." />
    <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/system_block.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="favicon.ico"/>
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/global.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.lightbox-0.5.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.treeview.css" media="screen" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <script type="text/javascript" src="js/jquery.treeview.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/flyshit.js"></script>
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
            <div id="right"><?php include ("index/soc-seti.txt"); ?> 
                <h1>Подбор системного блока по параметрам</h1>
                <div id="text">
                Системный блок - с виду, это просто  корпус, но внутри его находятся главные компоненты и узлы компьютера от которых зависит функциональность и мощность. Выбрать его значительно сложнее, чем другие составляющие так, 
                как системный блок заменяется очень редко из-за своей стоимости, поэтому нужно выбирать с такими характеристиками, которые будут полностью удовлетворять все Ваши требования.
                Предлагаем Вам широкий выбор чтобы <strong>купить системных блоков в Минске</strong> с удобным подбором по параметрам из комплектующих. Благодаря тому, что системники различных комплектаций, каждый пользователь сможет найти свою модель.
                </div>
                <div id='podbor' >
                    <h3>Характеристики системного блока</h3>
                    <form id="search_with_parameters" name="search_with_parameters"  action="sistemnyj-blok.php" method="get">
                        <table  cellpadding="10" cellspacing="10" >
                            <tr align="left">
                                <td width="340px">
                                    Цена от <input type="text" size="4" id="min_cost" name="min_cost" size="1" maxlength="5" value=<?php echo $searchParams["min_cost"];?>>
                                    до <input type="text" size="4" id="max_cost" name="max_cost" size="1" maxlength="5" value=<?php echo $searchParams["max_cost"];?>>
                                     у.е.
                                </td>
                                <td width="330px">
                                    Процессор
                                    <select class="punkt" id="proc" name="select_cpu">
                                        <option value="0" <?php echo (empty($searchParams['select_cpu']))?"selected='selected'" :'' ?>>Не важно</option>
                                        <option value="AMD" <?php echo ($searchParams['select_cpu'] == 'AMD')?"selected='selected'" :'' ?>>AMD</option>
                                        <option value="Intel" <?php echo ($searchParams['select_cpu'] == 'Intel')?"selected='selected'" :'' ?>>Intel</option>
                                    </select>
                                </td>
                            </tr>
                            <tr align="left">
                                <td>
                                    Количество ядер процессора
                                    <select class="punkt" id="kolcpu" name="select_number_cores_cpu">
                                        <option value="0" <?php (empty($searchParams['select_number_cores_cpu']))?"selected='selected'" :'' ?>>Не важно</option>
                                        <?php
                                        $resultCpuSelect = mysql_query("SELECT DISTINCT(cpu.number_cores_cpu) FROM  cpu
                                                       LEFT JOIN system_block ON system_block.id_cpu = cpu.id ORDER BY cpu.number_cores_cpu ASC ",$db);

                                        while($rowCpuSelect = mysql_fetch_assoc($resultCpuSelect))
                                        {
                                            echo "<option value='" . $rowCpuSelect['number_cores_cpu'] . "'" . (($searchParams['select_number_cores_cpu'] == $rowCpuSelect['number_cores_cpu']) ?"selected='selected'" :'' ).">"  . $rowCpuSelect['number_cores_cpu'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    Тактовая частота <input type="text" size="3" id="min_speed_cpu" name="min_speed_cpu"size="1" maxlength="5" value="<?php echo $searchParams['min_speed_cpu'] ?>">
                                    до <input type="text" size="3" id="max_speed_cpu" name="max_speed_cpu" size="1" maxlength="5" value="<?php echo $searchParams['max_speed_cpu'] ?>">
                                     GHz
                                </td>
                            </tr>
                            <tr align="left">
                                <td>
                                    Видеокарта
                                    <select class="punkt" id="video" id="select_vga" name="select_vga">
                                        <option value="0">Не важно</option>
                                        <?php
                                        $resultVgaSelect = mysql_query("SELECT DISTINCT(vga.size_vga),vga.name_vga,vga.id FROM  vga
                                                       LEFT JOIN system_block ON system_block.id_vga = vga.id ORDER BY vga.name_vga ASC ",$db);
                                        while($rowVgaSelect = mysql_fetch_assoc($resultVgaSelect))
                                        {
                                            echo "<option value='" . $rowVgaSelect['id'] . "'" . (($searchParams['select_vga'] == $rowVgaSelect['id']) ?"selected='selected'" :'' ).">"  . $rowVgaSelect['name_vga'] .  ' ' . $rowVgaSelect['size_vga'] . 'GB' . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                 <td>
                                    Блок питания
                                    <select class="punkt" id="blpit" id="select_power_unit" name="select_power_unit">
                                        <option value="0">Не важно</option>
                                        <?php
                                        $resultPowerUnitSelect = mysql_query("SELECT DISTINCT(power_unit.size_power_unit),power_unit.name_power_unit,power_unit.id FROM  power_unit
                                                       LEFT JOIN system_block ON system_block.id_power_unit = power_unit.id ORDER BY power_unit.size_power_unit ASC",$db);
                                        while($rowPowerUnitSelect = mysql_fetch_assoc($resultPowerUnitSelect))
                                        {
                                            echo "<option value='" . $rowPowerUnitSelect['id'] . "'" . (($searchParams['select_power_unit'] == $rowPowerUnitSelect['id']) ?"selected='selected'" :'' ).">"  . $rowPowerUnitSelect['size_power_unit'] . 'Вт' . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr align="left">
                                <td>
                                    Оперативная память
                                    <select class="punkt" id="oppam" id="select_random_access_memory"  name="select_random_access_memory">
                                        <option selected="selected" value="0">Не важно</option>
                                        <?php
                                        $resultRandomAccessMemorySelect = mysql_query("SELECT DISTINCT(random_access_memory.size_random_access_memory),random_access_memory.name_random_access_memory,random_access_memory.id FROM  random_access_memory
                                                       LEFT JOIN system_block ON system_block.id_random_access_memory = random_access_memory.id ORDER BY random_access_memory.size_random_access_memory ASC",$db);
                                        while($rowRandomAccessMemorySelect = mysql_fetch_assoc($resultRandomAccessMemorySelect))
                                        {
                                            echo "<option value='" . $rowRandomAccessMemorySelect['id'] . "'" . (($searchParams['select_random_access_memory'] == $rowRandomAccessMemorySelect['id']) ?"selected='selected'" :'' ).">"  . $rowRandomAccessMemorySelect['size_random_access_memory'] . 'GB' . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    Корпус
                                    <select class="punkt" id="korp" id="select_computer_case" name="select_computer_case">
                                        <option value="0">Не важно</option>
                                        <?php
                                            $resultComputerCaseSelect = mysql_query("SELECT DISTINCT(computer_case.name_computer_case), computer_case.id FROM  computer_case
                                                           LEFT JOIN system_block ON system_block.id_computer_case = computer_case.id
                                                           ORDER BY computer_case.name_computer_case ASC",$db);
                                            while($rowComputerCaseSelect = mysql_fetch_assoc($resultComputerCaseSelect))
                                            {
                                                echo "<option value='" . $rowComputerCaseSelect['id'] . "'" . (($searchParams['select_computer_case'] == $rowComputerCaseSelect['id']) ?"selected='selected'" :'' ).">"  . $rowComputerCaseSelect['name_computer_case'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr align="left">
                                <td>
                                    Жесткий диск
                                    <select class="punkt" id="zdisk" id="select_hdd" name="select_hdd">
                                        <option selected="selected" value="0">Не важно</option>
                                        <?php
                                        $resultHddSelect = mysql_query("SELECT DISTINCT(hdd.size_hdd),hdd.name_hdd,hdd.id FROM  hdd
                                                       LEFT JOIN system_block ON system_block.id_hdd = hdd.id ORDER BY hdd.size_hdd ASC",$db);
                                        while($rowHddSelect = mysql_fetch_assoc($resultHddSelect))
                                        {
                                            echo "<option value='" . $rowHddSelect['id'] . "'" . (($searchParams['select_hdd'] == $rowHddSelect['id']) ?"selected='selected'" :'' ).">"  . $rowHddSelect['size_hdd'] . 'GB' . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <label>Оптический привод </label>
                                    <?php if (!isset($searchParams)){?>
                                        <input type="checkbox" id="optical_drive" name="optical_drive" checked="checked" value="1">
                                    <?php }
                                        else {
                                    ?>
                                         <input type="checkbox" id="optical_drive" name="optical_drive" <?php  echo ($searchParams['optical_drive'] == 1) ?  "checked='checked'" :'';?> value="1">
                                    <?php }?>
                                </td>
                            </tr>
                            <tr align="left">
                                <td class="lineoranz" colspan="2">
                                    <a id="knopka-2" href="http://cooler.by/sistemnyj-blok.php">Новый подбор</a>
                                    <input id="knopka-1" type="submit" value="Подобрать">
                                </td>
                            </tr>
                        </table>
                </form>
                 </div>
                <?php
                    $result = mysql_query($strSgl, $db);//"SELECT title,image,cost,cost_sb,cost_monitor,cost_keyboard,cost_mouse,cost_loudspeakers,processor,hdd,ram,optical_drive,motherboard,housing,vga,monitor,loudspeakers,information FROM kompjuter WHERE type='igrovoj'", $db);
                    $myrow = mysql_fetch_array($result)  ;
                    if (!$myrow)
                    {
                        echo "<br/><h1>нет конфигураций соответствующих подбору</h1><br/><br/><br/><br/><br/><br/><br/>";
                    }
                    $result = mysql_query($strSgl, $db);
                    $i=0;
                    while($myrow = mysql_fetch_array($result))
                    {
                ?>

                    <div id='komp'>
                        <h3><?php echo $myrow["name_system_block"];?></h3>

                        <span class="img-slide"><img  src='/system_block_images/<?php echo $myrow["url_image"];?> ' alt='Системный блок' title='Системный блок'/></span>
                        <form method='post'>
                            <table style="float:right;margin-top: 24px;margin-right: 100px;margin-bottom: -5px">
                                <tr>
                                    <td>
                                        <button id='show-ocb-form<?=$i;?>' class='kupi-sist-bl' >Купить</button>


                                        <div class='ocb-form' id='ocb-form-wrap<?=$i;?>' style='display: none'>
                                            <div class='ocb-form-header'>

                                                <div class='ocb-form-header-caption'>Быстрый заказ</div>
                                                <div class='ocb-form-header-close'></div>
                                            </div>
                                            <div id='ocb-form<?=$i;?>'>
                                                <div id='ocb-params<?=$i;?>'>
                                                    <input type='hidden' id='titleSystemBlock<?=$i;?>' value='<?=$myrow['name_system_block'];?>'/>
                                                    <input type='hidden' id='itemCost<?=$i;?>' value='<?=$myrow['cost'];?>'/>
                                                    <div class='ocb-form-field'>
                                                        <label>Ваше имя
                                                            <ins>*</ins>
                                                        </label>
                                                        <input type='text' name='new_order<?=$i;?>[FIO]' value='' id='ocb-id-FIO<?=$i;?>'/>

                                                        <div id='ocb-id-FIO<?=$i;?>-error<?=$i;?>' class='ocb-error-msg'>Обязательно укажите ваше имя
                                                        </div>

                                                    </div>
                                                    <div class='ocb-form-field'>
                                                        <label>Контактный телефон
                                                            <ins>*</ins>
                                                        </label>
                                                        <select name='operator<?=$i;?>'
                                                                style='width: 70px; text-align: left; margin-right: 10px' id='operator<?=$i;?>'>
                                                            <option value='velcom'>Velcom</option>
                                                            <option value='mts'>МТС</option>
                                                            <option value='life'>life</option>
                                                        </select><input type='text' name='new_order<?=$i;?>[PHONE]' value='' id='ocb-id-PHONE<?=$i;?>'
                                                                        style='width: 250px'/>

                                                        <div id='ocb-id-PHONE<?=$i;?>-error<?=$i;?>' class='ocb-error-msg'>Обязательно укажите
                                                            контактный телефон
                                                        </div>

                                                    </div>

                                                    <div class='intaro-modules-button ptichka'>
                                                        <input type='submit' value='Отправить заказ' id='ocb-form-button<?=$i;?>'
                                                               name='ocb_form_button<?=$i;?>'/>
                                                    </div>
                                                    <div class='ocb-form-loader'></div>
                                                </div>
                                            </div>
                                            <div class='ocb-form-result' id='ocb-form-result<?=$i;?>'>
                                                <div class='ocb-result-icon-success'>Спасибо за заказ!</div>
                                                <div class='ocb-result-icon-fail'>Ошибка!</div>

                                                <div class='ocb-result-text'>В ближайшее время наш менеджер свяжется с вами.</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div class='cena-sist-bl'>Системный блок <span class="cenagl"><?php echo $myrow['cost'] .  ' '; ?></span> у.е.</div>

                        <span class="comlekt" >
                         <ul class="opisanie-left">
                         <li>Процессор - <b><?php  echo $myrow['name_cpu'] .  ' (' . $myrow['number_cores_cpu'] . 'x' . $myrow['speed_cpu'] . 'GHz)';?></b></li>
                         <li>Оперативная память - <b><?php  echo ' ' . $myrow['size_random_access_memory'] . 'GB ' . $myrow['name_random_access_memory']  ; ?></b></li>
                         <li>Материнская плата - <b><?php   echo $myrow['name_motherboard'] . ' ';?></b></li>
                         <li>Видеокарта - <b><?php echo $myrow['name_vga'] .  ' ' . $myrow['size_vga'] . 'GB ';?></b></li>
                         </ul>
                         <ul class="opisanie-right">
                         <li>Жёсткий диск - <b><?php echo $myrow['name_hdd'] .  ' ' . $myrow['size_hdd'] .  'GB '; ?></b></li>
                         <li><?php if(!empty($myrow['id_optical_drive'])) { ?>Оптический привод - <b><?php echo $myrow['name_optical_drive'];}?></b></li>
                         <li>Корпус - <b><?php echo $myrow['name_computer_case'] . ' '; ?>*</b></li>
                         <li>Блок питания - <b><?php  echo $myrow['name_power_unit'] .  ' ' . $myrow['size_power_unit'] . 'Вт ';?></b></li>
                         </ul>
                            <br>— Гарантийное обслуживание, бесплатная доставка.
                            <br>— Соответствие картинки уточняйте у менеджера.
                            <br>
                         </span>
                    </div>



                <?php
                    $i++;
                     }
                ?>
                <div id="text_footer">
                </div>
            </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
    </div>

    <!-- start footer -->
    <?php include ("index/footer.txt"); ?>

</div>
<?php include ("index/metrika_jivo.txt"); ?>

<script language="JavaScript" type="text/javascript"
src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>

<script type="text/javascript">
jQuery(function(){
 $("#Go_Top").hide().removeAttr("href");
 if ($(window).scrollTop()>="750") $("#Go_Top").fadeIn("slow")
 $(window).scroll(function(){
  if ($(window).scrollTop()<="750") $("#Go_Top").fadeOut("slow")
  else $("#Go_Top").fadeIn("slow")
 });

 $("#Go_Bottom").hide().removeAttr("href");
 if ($(window).scrollTop()<=$(document).height()-"999") $("#Go_Bottom").fadeIn("slow")
 $(window).scroll(function(){
  if ($(window).scrollTop()>=$(document).height()-"999") $("#Go_Bottom").fadeOut("slow")
  else $("#Go_Bottom").fadeIn("slow")
 });

 $("#Go_Top").click(function(){
  $("html, body").animate({scrollTop:0},"slow")
 })
 $("#Go_Bottom").click(function(){
  $("html, body").animate({scrollTop:$(document).height()},"slow")
 })
});
</script>

<a style='position: fixed; bottom: 190px; right: 3%; cursor:pointer; display:none;'
href='#' id='Go_Top'>
 <img src="./images/go_up.png" alt="Вверх" title="Вверх">
</a>
<a style='position: fixed; bottom: 150px; right: 3%; cursor:pointer; display:none;'
href='#' id='Go_Bottom'>
 <img src="./images/go_bottom.png" alt="Вниз" title="Вниз">
</a>
<?php

for($j=0;$j<=$i;$j++)
{
    printf(" <script type='text/javascript'>
$(document).ready(function() {
$('#show-ocb-form{$j}').live('click', function() {
$('#ocb-form-wrap{$j}').show();
$('#ocb-form{$j}').show();
$('#ocb-form-result{$j}').hide();
return !1;
});

$('.ocb-form-header-close').live('click', function() {
$('.ocb-error-msg').each(function(index) { $(this).hide(); });
$('.ocb-result-icon-success').hide();
$('.ocb-result-icon-fail').hide();
$('#ocb-form-wrap{$j}').fadeOut();
return !1;
});

$('button.intaro-modules-button.disabled, .intaro-modules-button.disabled input').live('click', function() {
return false;
});

$('#ocb-form-button{$j}').live('click', function() {
$('.ocb-error-msg').each(function(index) { $(this).hide(); });
var fieldId, fieldVal, checked = !0, self = $(this);
$('input[name^=\"new_order{$j}\"]').each(function() {
fieldId = $(this).attr('id');
fieldVal = $(this).val();
if (fieldVal=='') {
$('#' + fieldId + '-error{$j}').show();
checked = !1;
}
});
if (!checked) return !1;
$('.intaro-modules-button', $(this)).addClass('disabled');
$('.ocb-form-loader').show();

if(!$('#ocb-antispam{$j}').length) {
$('#ocb-params{$j}').prepend(\"<input id='ocb-antispam' type='hidden' name='antispam' value=''>\");
}

$.ajax({
url: \"/send_mail.php\",
data: \"firstname=\" + $(\"#ocb-id-FIO{$j}\").val() + \"&mobile_phone=\" + $(\"#ocb-id-PHONE{$j}\").val() + \"&title=\" + $(\"#titleSystemBlock{$j}\").val() + \"&price=\" + $(\"#itemCost{$j}\").val() + \"&mobile_operator=\" + $(\"#operator{$j}\").val(),
type: 'POST',
dataType: 'json',
error: function(obj, text, err) {
},
success: function(data) {
if(data.ok!='Y') {
$('.ocb-result-icon-fail').show();
$('.ocb-result-text').text(data.msg);
} else {
$('.ocb-result-icon-success').show();
if ($('#cart_line{$j}').length > 0)
$('#cart_line{$j}').html(data.msg);
}
$('.ocb-form-loader').hide();
$('.intaro-modules-button', self).removeClass('disabled');
$('#ocb-form{$j}').hide();
$('#ocb-form-result{$j}').show();
window.setTimeout(function() { $('.ocb-form-header-close').click(); }, 3000);
}
});
return !1;
});
});

</script>
");
}

?>
</body>
</html>
