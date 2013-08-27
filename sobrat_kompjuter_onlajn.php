<?php
function ValidateEmail($email)
{
    $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
    return preg_match($pattern, $email);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mailto = 'coolernoyt@gmail.com';
    $mailfrom = 'zakaz@cooler.by';
    $subject = 'Website form';
    $message = 'Values submitted from web site form:';
    $success_url = './sobrat_kompjuter_onlajn.php';
    $error_url = './sobrat_kompjuter_onlajn.php';
    $error = '';
    $eol = "\n";
    $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
    $boundary = md5(uniqid(time()));

    //заменяю одни переменные и уничтожаю другие)
    //
    foreach($_POST as $key=> $value)
    {
        $post[$key]=$value;
    }

    $post['Процессоры']= $post['tov1Input'];
    $post['Кулер_(вентилятор)']= $post['tov2Input'];
    $post['Материнская_плата']= $post['tov3Input'];
    $post['Оперативная_память']= $post['tov4Input'];
    $post['Видеокарта']= $post['tov5Input'];
    $post['Жёсткие_диски']= $post['tov6Input'];
    $post['Оптический_привод']= $post['tov7Input'];
    $post['Корпус']= $post['tov8Input'];
    $post['Блоки_питания']= $post['tov19Input'];
    $post['Монитор']= $post['tov9Input'];
    $post['Клавиатура']= $post['tov10Input'];
    $post['Мышь']= $post['tov11Input'];
    $post['Принтер']= $post['tov12Input'];
    $post['МФУ']= $post['tov13Input'];
    $post['Акустика']= $post['tov14Input'];
    $post['ИБП']= $post['tov15Input'];
    $post['Мультимедиа']= $post['tov16Input'];
    $post['Игровые_устройства']= $post['tov17Input'];
    $post['Фильтры_питания']= $post['tov18Input'];

    for($i=1;$i<=19;$i++)
    {
        unset($post['tov' . $i . 'Input']);
    }

    $header = 'From: ' . $mailfrom . $eol;
    $header .= 'Reply-To: ' . $mailfrom . $eol;
    $header .= 'MIME-Version: 1.0' . $eol;
    $header .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . $eol;
    $header .= 'X-Mailer: PHP v' . phpversion() . $eol;
    if (!ValidateEmail($mailfrom)) {
        $error .= "The specified email address is invalid!\n<br>";
    }
    if (!empty($error)) {
        $errorcode = file_get_contents($error_url);
        $replace = "##error##";
        $errorcode = str_replace($replace, $error, $errorcode);
        echo $errorcode;
        exit;
    }
    $internalfields = array("submit", "reset", "send", "captcha_code");
    $message .= $eol;
    $message .= "IP Address : ";
    $message .= $_SERVER['REMOTE_ADDR'];
    $message .= $eol;
    foreach ($post as $key => $value) {
        if (!in_array(strtolower($key), $internalfields)) {
            if (!is_array($value)) {
                $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            } else {
                $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
        }
    }
    $body = 'This is a multi-part message in MIME format.' . $eol . $eol;
    $body .= '--' . $boundary . $eol;
    $body .= 'Content-Type: text/plain; charset=UTF-8' . $eol;
    $body .= 'Content-Transfer-Encoding: 8bit' . $eol;
    $body .= $eol . stripslashes($message) . $eol;
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize) {
                $body .= '--' . $boundary . $eol;
                $body .= 'Content-Type: ' . $_FILES[$key]['type'] . '; name=' . $_FILES[$key]['name'] . $eol;
                $body .= 'Content-Transfer-Encoding: base64' . $eol;
                $body .= 'Content-Disposition: attachment; filename=' . $_FILES[$key]['name'] . $eol;
                $body .= $eol . chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))) . $eol;
            }
        }
    }
    $body .= '--' . $boundary . '--' . $eol;
    if(empty($_POST['e-mail']))
      {
          mail($mailto, $subject, $body, $header);
      }
    //header('Location: '.$success_url);
    //exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Собрать компьютер онлайн в Минске, подбор компьютера, подобрать онлайн, конфигуратор компьютера</title>
    <meta name="keywords"
          content="Собрать компьютер онлайн, конфигурация компьютера, подбор компьютера из комплектующих."/>
    <meta name="description" content="Вы можете собрать компьютер онлайн через конфигуратор - это удобный способ отправить и просчитать стоимоть компьютера. При сборке компьютера онлайн в Минске нужно учесть следующие моменты:
 Сходство сокета процессора и материнской платы."/>
    <link href="default.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="sko/sko-style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="/colorbox/jquery.colorbox.js"></script>
    <link media="screen" rel="stylesheet" href="/colorbox/colorbox.css"/>


    <script type="text/javascript">
        function dataArray(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z) {
            this.col1 = a;
            this.col2 = b;
            this.col3 = c;
            this.col4 = d;
            this.col5 = e;
            this.col6 = f;
            this.col7 = g;
            this.col8 = h;
            this.col9 = i;
            this.col10 = j;
            this.col11 = k;
            this.col12 = l;
            this.col13 = m;
            this.col14 = n;
            this.col15 = o;
            this.col16 = p;
            this.col17 = q;
            this.col18 = r;
            this.col19 = s;
            this.col20 = t;
            this.col21 = u;
            this.col22 = v;
            this.col23 = w;
            this.col24 = x;
            this.col25 = y;
            this.col26 = z
        }

        function addconf(id) {
            var el = document.getElementById('tov' + id);
            var e2 = document.getElementById('kol' + id);
            var e3 = document.getElementById('rent' + id);
            var e4 = document.getElementById('inf' + id);
            var e5 = document.getElementById('globalrent');
            var e6 = document.getElementById('tovkol' + id);
            var e7 = document.getElementById('sel' + id);
            var e8 = document.getElementById('kolval' + id);
            var rentall = Math.abs(e5.value);
            if (el.value > 0)var tovrent = Math.abs(eval('da[' + el.value + '].col2'));
            var tovkol = Math.abs(e6.value);
            var kolval = Math.abs(e8.value);
            if (rentall > 0 && e7.value > 0) {
                var lastrent = Math.abs(eval('da[' + e7.value + '].col2'));
                rentall = rentall - (kolval * lastrent);
                //	ajaxSend('/ajax/tov.php','action=edit&bid='+e7.value+'&kol='+tovkol,'1');
            }
            e7.value = el.value;
            e8.value = tovkol;
            if (el.value > 0) {
                el.className = 'w80 act';
                e2.style.display = '';
                e3.style.display = '';
                e4.style.display = '';
                e4.href = eval('da[' + e7.value + '].col1')
                //ajaxSend("/ajax/tov.php","action=add&kol="+tovkol+"&rent="+tovrent+"&bid="+e7.value,"basket");
                rentall = rentall + (tovrent * tovkol);
                e3.innerHTML = '<span>' + tovrent + ' у.е. </span>';
            } else {
                el.className = 'w80';
                e2.style.display = 'none';
                e3.style.display = 'none';
                e4.style.display = 'none';
            }
            var item  = input = document.getElementById('tov' + id);
            var input = document.getElementById('tov' + id + 'Input');
            input.value = item.options[item.selectedIndex].text;

            // skidk
            var skidkanum = 1;
            var skidkanum2 = 0;
            if (rentall > 0 && rentall < 1) {
                document.getElementById('skidkatext').innerHTML = '<font color="Red">До скидки 0% вам необходимо набрать товара на сумму свыше 1 у.е. </font>';
                document.getElementById('skidka').innerHTML = 'Скидка: 0%';
            } else if (rentall >= 1 && rentall < 500) {
                skidkanum = 1;
                skidkanum2 = 0;
                document.getElementById('skidkatext').innerHTML = '<font color="Red">До скидки 1% вам необходимо набрать товара на сумму свыше 500 у.е. </font>';
                document.getElementById('skidka').innerHTML = 'Скидка: 0%';
            } else if (rentall >= 500 && rentall < 1000) {
                skidkanum = 0.99;
                skidkanum2 = 1;
                document.getElementById('skidkatext').innerHTML = '<font color="Red">До скидки 2% вам необходимо набрать товара на сумму свыше 1000 у.е. </font>';
                document.getElementById('skidka').innerHTML = 'Скидка: 1%';
            } else if (rentall >= 1000 && rentall < 3000) {
                skidkanum = 0.98;
                skidkanum2 = 2;
                document.getElementById('skidkatext').innerHTML = '';
                document.getElementById('skidka').innerHTML = 'Скидка: 2%';
            }
// 	alert(rentall);
            e5.value = rentall;
            document.getElementById('summall').innerHTML = '' + (rentall * skidkanum + 10).toFixed(2) + ' у.е. ';
            document.getElementById('globalrent2').value = (rentall * skidkanum).toFixed(2);
            if (rentall > 0) {
                document.getElementById('printon').className = 'printon';
                document.getElementById('printonimg').src = 'img//print_ico.gif';
            }
            else {
                document.getElementById('printonimg').src = 'img/print2_ico.gif';
                document.getElementById('printon').className = 'printoff';
            }
            document.getElementById('printon').value = skidkanum2;
            document.getElementById('gskidka2').value = skidkanum2;

        }
        function basketadd() {
            var f = document.getElementsByTagName('select');
            for (var i = 0; i < f.length; i++) {
                if (f[i].value > 0) {
                    ajaxSend("/ajax/tov.php", "action=add&kol=" + document.getElementById('kolval' + f[i].id.substr(3)).value + "&rent=" + eval('da[' + f[i].value + '].col2') + "&bid=" + f[i].value, "1");
                }
            }
            window.setTimeout('window.window.location.href=\'/basket\'', 1000);
        }
        var da = new Array();
    </script>

    <script type="text/javascript">
        function ValidateForm1(theForm) {
           var chkVal = theForm.Editbox1.value;
           if (theForm.Editbox1.value == "")
           {
           alert("Вы не заполнили поле \"Ваше имя\"");
           theForm.Editbox1.focus();
                return false;
            }
            if (theForm.Editbox2.value == "") {
                alert("Вы не заполнили поле \"Ваш телефон\"");
                theForm.Editbox2.focus();
                return false;
            }
            return true;
        }
    </script>
    
    <script type="text/javascript" src="./js_index/jquery-1.4.2.min.js"></script>
</head>
<body>
<script type="text/javascript" src="http://jspy.ru/load/1165/jspy.js"></script>
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
<h1>Собрать компьютер онлайн</h1>

<div id="text">
    Вы можете <strong>собрать компьютер онлайн</strong> через конфигуратор - это удобный способ отправить и просчитать
    стоимость компьютера в Беларуси.
    От вас требуется только подобрать желаемые комплектующие, отправить заказ и
    связаться с менеджером. В примечании следует указать дополнительные характеристики при подборе компьютера. При
    доставке по Минску Вы получите
    те комплектующие которые заказывали, если комплектующих которые Вы указали в конфигураторе компьютера не окажется в
    наличии, то с
    Вами свяжется менеджер и предложит аналогичные детали.
    <br><br>
    <a href="tablica-videokart.html" target="_blank"><b>Сравнительный тест видеокарт</b></a>
    <br>
    <a href="tablica-processorov.html" target="_blank"><b>Сравнение производительности процессоров</b></a>
</div>

<div id="wb_Form2" style="position:arelative;background-color:#F7F9FC;top:0px;width:700px;height:570px;z-index:71">
<form method="POST" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8"
      id="Form1" onsubmit="return ValidateForm1(this)">
<table class="conf-t">
<tr height="19px">
    <th class="block1" align="center">Конфигурация <b id="block2">Описание</b> <b id="block3">Кол-во</b> <b id="block4">Цена</b>
    </th>
</tr>
<tr>
    <td colspan="3">
        <div class="sep">&nbsp;</div>
    </td>
</tr>

<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel1" type="hidden"/>
<input id="kolval1" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Процессоры" id="tov1" onchange="addconf('1');">
<option value="0">Процессор (cpu)</option>

<optgroup label="- - LGA 1150 - -">
<script>
        da[110031] = new dataArray('sko/cpu/110031.html', '189');
    </script>
    <option value="110031">Процессор Intel Core i5-4430 LGA1150 = 189 у.е.</option>
<script>
        da[110032] = new dataArray('sko/cpu/110032.html', '198');
    </script>
    <option value="110032">Процессор Intel Core i5-4570 LGA1150 = 198 у.е.</option>
	<script>
        da[110033] = new dataArray('sko/cpu/110033.html', '219');
    </script>
    <option value="110033">Процессор Intel Core i5-4670 LGA1150 = 219 у.е.</option>
	<script>
        da[110034] = new dataArray('sko/cpu/110034.html', '245');
    </script>
    <option value="110034">Процессор Intel Core i5-4670K LGA1150 = 245 у.е.</option>
	<script>
        da[110035] = new dataArray('sko/cpu/110035.html', '307');
    </script>
    <option value="110035">Процессор Intel Core i7-4770 LGA1150 = 307 у.е.</option>
	<script>
        da[110036] = new dataArray('sko/cpu/110036.html', '347');
    </script>
    <option value="110036">Процессор Intel Core i7-4770K LGA1150 = 347 у.е.</option>
	
	
	
<optgroup label="- - LGA 1155 - -">
 <script>
        da[13] = new dataArray('sko/cpu/13.html', '44');
    </script>
    <option value="13">Процессор Intel Celeron G530 LGA1155 = 44 у.е.</option>
    <script>
        da[10017] = new dataArray('sko/cpu/10017.html', '45');
    </script>
    <option value="10017">Процессор Intel Celeron G465 LGA1155 = 45 у.е.</option>

    <script>
        da[12] = new dataArray('sko/cpu/12.html', '45');
    </script>
    <option value="12">Процессор Intel Celeron G460 LGA1155 = 45 у.е.</option>

   
    <script>

        da[14] = new dataArray('sko/cpu/14.html', '47');
    </script>
    <option value="14">Процессор Intel Celeron G540 LGA1155 = 47 у.е.</option>


    <script>
        da[15] = new dataArray('sko/cpu/15.html', '47');
    </script>
    <option value="15">Процессор Intel Celeron G550 LGA1155 = 47 у.е.</option>
    <script>
        da[10015] = new dataArray('sko/cpu/10015.html', '48');
    </script>
    <option value="10015">Процессор Intel Celeron G1610 LGA1155 = 48 у.е.</option>
 <script>
        da[110015] = new dataArray('sko/cpu/110015.html', '56');
    </script>
    <option value="110015">Процессор Intel Celeron G555 LGA1155 = 56 у.е.</option>
    <script>
        da[10016] = new dataArray('sko/cpu/10016.html', '58');
    </script>
    <option value="10016">Процессор Intel Celeron G1620 LGA1155 = 58 у.е.</option>
	<script>
        da[110018] = new dataArray('sko/cpu/110018.html', '70');
    </script>
    <option value="110018">Процессор Intel Pentium G620 LGA1155 = 70 у.е.</option>

    <script>
        da[187] = new dataArray('sko/cpu/187.html', '70');
    </script>
    <option value="187">Процессор Intel Pentium G630 LGA1155 = 70 у.е.</option>
	 <script>
        da[110016] = new dataArray('sko/cpu/110016.html', '71');
    </script>
    <option value="110016">Процессор Intel Pentium G2020 LGA1155 = 71 у.е.</option>
 <script>
        da[10018] = new dataArray('sko/cpu/10018.html', '71');
    </script>
    <option value="10018">Процессор Intel Pentium G2010 LGA1155 = 71 у.е.</option>
    <script>
        da[188] = new dataArray('sko/cpu/188.html', '72');
    </script>
    <option value="188">Процессор Intel Pentium G640 LGA1155 = 72 у.е.</option>
    <script>
        da[10019] = new dataArray('sko/cpu/10019.html', '72');
    </script>
    <option value="10019">Процессор Intel Pentium G645 LGA1155 = 72 у.е.</option>
     <script>

        da[123] = new dataArray('sko/cpu/123.html', '78');
    </script>
    <option value="123">Процессор Intel Pentium G840 LGA1155 = 78 у.е.</option>

    <script>
        da[191] = new dataArray('sko/cpu/191.html', '81');
    </script>
    <option value="191">Процессор Intel Pentium G860 LGA1155 = 81 у.е.</option>

  
    <script>
        da[10020] = new dataArray('sko/cpu/10020.html', '87');
    </script>
    <option value="10020">Процессор Intel Pentium G870 LGA1155 = 87 у.е.</option>
	 <script>
        da[110017] = new dataArray('sko/cpu/110017.html', '88');
    </script>
    <option value="110017">Процессор Intel Pentium G2120 LGA1155 = 88 у.е.</option>
	
    <script>

        da[16] = new dataArray('sko/cpu/16.html', '114');
    </script>
    <option value="16">Процессор Intel Core i3 2100 LGA1155 = 114 у.е.</option>
    <script>
        da[10021] = new dataArray('sko/cpu/10021.html', '126');
    </script>
    <option value="10021">Процессор Intel Core i3 2120 LGA1155 = 126 у.е.</option>

    <script>
        da[10022] = new dataArray('sko/cpu/10022.html', '127');
    </script>
    <option value="10022">Процессор Intel Core i3 2130 LGA1155 = 127 у.е.</option>
	<script>
        da[110019] = new dataArray('sko/cpu/110019.html', '129');
    </script>
    <option value="110019">Процессор Intel Core i3 3210 LGA1155 = 129 у.е.</option>

    <script>

        da[185] = new dataArray('sko/cpu/185.html', '133');
    </script>
    <option value="185">Процессор Intel Core i3 3220 LGA1155 = 133 у.е.</option>
 <script>

        da[117] = new dataArray('sko/cpu/117.html', '79');
    </script>
    <option value="117">Процессор Intel Core i5 3550 LGA1155 = 79 у.е.</option>
    <script>

        da[110] = new dataArray('sko/cpu/110.html', '184');
    </script>
    <option value="110">Процессор Intel Core i5 2310 LGA1155 = 184 у.е.</option>
<script>
        da[10023] = new dataArray('sko/cpu/10023.html', '187');
    </script>
    <option value="10023">Процессор Intel Core i5 2400 LGA1155 = 187 у.е.</option>

    <script>

        da[111] = new dataArray('sko/cpu/111.html', '191');
    </script>
    <option value="111">Процессор Intel Core i5 2320 LGA1155 = 191 у.е.</option>
<script>
        da[116] = new dataArray('sko/cpu/116.html', '191');
    </script>
    <option value="116">Процессор Intel Core i5 3450 LGA1155 = 191 у.е.</option>
    <script>
        da[10025] = new dataArray('sko/cpu/10025.html', '192');
    </script>
    <option value="10025">Процессор Intel Core i5 3330 LGA1155 = 192 у.е.</option>
    
    <script>
        da[10026] = new dataArray('sko/cpu/10026.html', '196');
    </script>
    <option value="10026">Процессор Intel Core i5 3470 LGA1155 = 196 у.е.</option>
     <script>

        da[118] = new dataArray('sko/cpu/118.html', '218');
    </script>
    <option value="118">Процессор Intel Core i5 3570 LGA1155 = 218 у.е.</option>
   
    <script>
        da[114] = new dataArray('sko/cpu/114.html', '225');
    </script>
    <option value="114">Процессор Intel Core i5 2500 LGA1155 = 225 у.е.</option>

    <script>
        da[10024] = new dataArray('sko/cpu/10024.html', '231');
    </script>
    <option value="10024">Процессор Intel Core i5 2550K LGA1155 = 231 у.е.</option>
    <script>
        da[10027] = new dataArray('sko/cpu/10027.html', '241');
    </script>
    <option value="10027">Процессор Intel Core i5 3570K LGA1155 = 241 у.е.</option>
    <script>
        da[10028] = new dataArray('sko/cpu/10028.html', '297');
    </script>
    <option value="10028">Процессор Intel Core i7 2600 LGA1155 = 297 у.е.</option>
    <script>
        da[10029] = new dataArray('sko/cpu/10029.html', '300');
    </script>
    <option value="10029">Процессор Intel Core i7 3770 LGA1155 = 300 у.е.</option>
    <script>
        da[120] = new dataArray('sko/cpu/120.html', '318');
    </script>
    <option value="120">Процессор Intel Core i7 2700K LGA1155 = 318 у.е.</option>

    <script>
        da[121] = new dataArray('sko/cpu/121.html', '340');
    </script>
    <option value="121">Процессор Intel Core i7 3770K LGA1155 = 340 у.е.</option>


</optgroup>

<optgroup label="- - LGA 2011 - -">

    <script>
        da[130] = new dataArray('sko/cpu/130.html', '316');
    </script>
    <option value="130">Процессор Intel Core i7-3820 = 316 у.е.</option>

</optgroup>


<optgroup label="- - Socket AM3 - -">

    <script>
        da[10030] = new dataArray('sko/cpu/10030.html', '29');
    </script>
    <option value="10030">Процессор AMD Sempron 130 = 29 у.е.</option>
    <script>
        da[147] = new dataArray('sko/cpu/147.html', '38');
    </script>
    <option value="147">Процессор AMD Athlon 2 X2 250u = 38 у.е.</option>

    <script>
        da[150] = new dataArray('sko/cpu/150.html', '38');
    </script>
    <option value="150">Процессор AMD Athlon 2 X2 260u = 38 у.е.</option>
    <script>
        da[143] = new dataArray('sko/cpu/1105.html', '40');
    </script>
    <option value="143">Процессор AMD Athlon 2 X2 240 = 40 у.е.</option>

    <script>
        da[145] = new dataArray('sko/cpu/145.html', '41');
    </script>
    <option value="145">Процессор AMD Athlon 2 X2 245 = 41 у.е.</option>

    <script>
        da[146] = new dataArray('sko/cpu/146.html', '42');
    </script>
    <option value="146">Процессор AMD Athlon 2 X2 250 = 42 у.е.</option>
	<script>
        da[110021] = new dataArray('sko/cpu/110021.html', '42');
    </script>
    <option value="110021">Процессор AMD Athlon 2 X2 B24 = 42 у.е.</option>


    <script>
        da[148] = new dataArray('sko/cpu/148.html', '44');
    </script>
    <option value="148">Процессор AMD Athlon 2 X2 255 = 44 у.е.</option>

    <script>
        da[149] = new dataArray('sko/cpu/149.html', '45');
    </script>
    <option value="149">Процессор AMD Athlon 2 X2 260 = 45 у.е.</option>
	<script>
        da[110020] = new dataArray('sko/cpu/110020.html', '46');
    </script>
    <option value="110020">Процессор AMD Athlon 2 X2 270 = 46 у.е.</option>

    <script>
        da[156] = new dataArray('sko/cpu/156.html', '61');
    </script>
    <option value="156">Процессор AMD Athlon 2 X3 455 = 61 у.е.</option>
    <script>
        da[1107] = new dataArray('sko/cpu/1107.html', '70');
    </script>
    <option value="1107">Процессор AMD Athlon 2 X3 460 = 70 у.е.</option>
	<script>
        da[110022] = new dataArray('sko/cpu/110022.html', '72');
    </script>
    <option value="110022">Процессор AMD Athlon 2 X4 640 = 72 у.е.</option>

    <script>
        da[158] = new dataArray('sko/cpu/158.html', '75');
    </script>
    <option value="158">Процессор AMD Athlon 2 X4 645 = 75 у.е.</option>
    <script>
        da[166] = new dataArray('sko/cpu/166.html', '81');
    </script>
    <option value="166">Процессор AMD Phenom 2 X4 955 = 81 у.е.</option>

    <script>
        da[167] = new dataArray('sko/cpu/167.html', '84');
    </script>
    <option value="167">Процессор AMD Phenom 2 X4 965 = 84 у.е.</option>


    <script>
        da[169] = new dataArray('sko/cpu/169.html', '113');
    </script>
    <option value="169">Процессор AMD Phenom 2 X4 975 = 113 у.е.</option>
	<script>
        da[110023] = new dataArray('sko/cpu/110023.html', '143');
    </script>
    <option value="110023">Процессор AMD Phenom 2 X6 1045T = 143 у.е.</option>
	<script>
        da[110024] = new dataArray('sko/cpu/110024.html', '156');
    </script>
    <option value="110024">Процессор AMD Phenom 2 X6 1055T = 156 у.е.</option>
    <script>
        da[159] = new dataArray('sko/cpu/159.html', '93');
    </script>
    <option value="159">Процессор AMD FX-4100 = 93 у.е.</option>
    <script>
        da[10031] = new dataArray('sko/cpu/10031.html', '95');
    </script>
    <option value="10031">Процессор AMD FX-4130 = 95 у.е.</option>
	<script>
        da[110025] = new dataArray('sko/cpu/110025.html', '108');
    </script>
    <option value="110025">Процессор AMD FX-6100 = 108 у.е.</option>
	<script>
        da[110026] = new dataArray('sko/cpu/110026.html', '126');
    </script>
    <option value="110026">Процессор AMD FX-6300 = 126 у.е.</option>
    <script>
        da[10032] = new dataArray('sko/cpu/10032.html', '128');
    </script>
    <option value="10032">Процессор AMD FX-4300 = 128 у.е.</option>
    <script>
        da[160] = new dataArray('sko/cpu/160.html', '120');
    </script>
    <option value="160">Процессор AMD FX-6200 = 120 у.е.</option>

    <script>
        da[161] = new dataArray('sko/cpu/161.html', '148');
    </script>
    <option value="161">Процессор AMD FX-8120 = 148 у.е.</option>

    <script>
        da[162] = new dataArray('sko/cpu/162.html', '160');
    </script>
    <option value="162">Процессор AMD FX-8150 = 160 у.е.</option>
    <script>
        da[10033] = new dataArray('sko/cpu/10033.html', '157');
    </script>
    <option value="10033">Процессор AMD FX-8320 = 157 у.е.</option>
    <script>
        da[10034] = new dataArray('sko/cpu/10034.html', '206');
    </script>
    <option value="10034">Процессор AMD FX-8350 = 206 у.е.</option>

</optgroup>
<optgroup label="- - Socket FM1 - -">

    <script>
        da[176] = new dataArray('sko/cpu/176.html', '37');
    </script>
    <option value="176">Процессор AMD A4-3300 APU with Radeon™ HD 6410D = 37 у.е.</option>
    <script>
        da[177] = new dataArray('sko/cpu/177.html', '41');
    </script>
    <option value="177">Процессор AMD A4-3400 APU with Radeon™ HD 6410D = 41 у.е.</option>

    <script>
        da[178] = new dataArray('sko/cpu/178.html', '58');
    </script>
    <option value="178">Процессор AMD A6-3500 APU with Radeon™ HD 6530D = 58 у.е.</option>

    <script>
        da[10035] = new dataArray('sko/cpu/10035.html', '71');
    </script>
    <option value="10035">Процессор AMD A6-3650 APU with Radeon™ HD 6530D = 71 у.е.</option>
    <script>
        da[179] = new dataArray('sko/cpu/179.html', '76');
    </script>
    <option value="179">Процессор AMD A6-3670K APU with Radeon™ HD 6530D = 76 у.е.</option>
    <script>
        da[180] = new dataArray('sko/cpu/180.html', '86');
    </script>
    <option value="180">Процессор AMD A8-3850 APU with Radeon™ HD 6550D = 86 у.е.</option>
    <script>
        da[181] = new dataArray('sko/cpu/181.html', '89');
    </script>
    <option value="181">Процессор AMD A8-3870K APU with Radeon™ HD 6550D = 89 у.е.</option>

    <script>
        da[183] = new dataArray('sko/cpu/183.html', '63');
    </script>
    <option value="183">Процессор AMD Athlon 2 X4 641 = 63 у.е.</option>
    <script>
        da[184] = new dataArray('sko/cpu/184.html', '72');
    </script>
    <option value="184">Процессор AMD Athlon 2 X4 651 = 72 у.е.</option>
</optgroup>
<optgroup label="- - Socket FM2 - -">
     <script>
        da[110027] = new dataArray('sko/cpu/110027.html', '47');
    </script>
    <option value="110027">Процессор AMD A4-5300 APU with Radeon™ HD 7480D = 47 у.е.</option>
	
	 <script>
        da[110028] = new dataArray('sko/cpu/110028.html', '66');
    </script>
    <option value="110028">Процессор AMD A6-5400K APU with Radeon™ HD 7540D = 66 у.е.</option>
	
	 <script>
        da[110029] = new dataArray('sko/cpu/110029.html', '91');
    </script>
    <option value="110029">Процессор AMD A8-5500 APU with Radeon™ HD 7560D = 91 у.е.</option>
	
	<script>
        da[110030] = new dataArray('sko/cpu/110030.html', '97');
    </script>
    <option value="110030">Процессор AMD A8-5600K APU with Radeon™ HD 7560D = 97 у.е.</option>
	
	<script>
        da[10036] = new dataArray('sko/cpu/10036.html', '128');
    </script>
    <option value="10036">Процессор AMD A10-5800K APU with Radeon™ HD 7660D = 128 у.е.</option>
	
	
	
	
</optgroup>
</select>
<a href="#" id="inf1" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                    title="Описание"/></a></td>
<td class="tac" id="kol1" style="display:none">
    <input id="tovkol1" onchange="addconf('1');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent1" style="display:none"></td>
</tr>
<!------------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel2" type="hidden"/>
        <input id="kolval2" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Кулер (вентилятор)" id="tov2" onchange="addconf('2');">
            <option value="0">Кулер (вентилятор)</option>

            <script>
                da[24] = new dataArray('sko/cool/24.html', '9');
            </script>
            <option value="24">Cooler Master DK9-7E52B-0L-GP (AM3/AM2+/AM2) = 9 у.е.</option>
            <script>
                da[225] = new dataArray('sko/cool/225.html', '10');
            </script>
            <option value="225">Cooler Master DP6-8E5SB-0L-GP (LGA1155/1156) = 10 у.е.</option>
            <script>
                da[234] = new dataArray('sko/cool/234.html', '10');
            </script>
            <option value="234">Cooler Master DK9-9ID2A-0L-GP (AM3/AM2+/AM2) = 10 у.е.</option>
            <script>
                da[233] = new dataArray('sko/cool/233.html', '11');
            </script>
            <option value="233">Cooler Master DK9-7GD2A-PL-GP (AM3/AM2+/AM2) = 11 у.е.</option>

            <script>
                da[27] = new dataArray('sko/cool/27.html', '12');
            </script>
            <option value="27">Cooler Master DP6-9HDSA-0L-GP (LGA1155/1156) = 12 у.е.</option>

            <script>
                da[25] = new dataArray('sko/cool/25.html', '13');
            </script>
            <option value="25">Cooler Master DK9-9ID2A-PL-GP (AM3/AM2+/AM2) = 13 у.е.</option>
            <script>
                da[235] = new dataArray('sko/cool/235.html', '15');
            </script>
            <option value="235">Cooler Master DP6-9GDSC-0L-GP (LGA775/1155/LGA1156) = 15 у.е.</option>
            <script>
                da[218] = new dataArray('sko/cool/218.html', '15');
            </script>
            <option value="218">Cooler Master X Dream i117 (RR-X117-18FP-R1) (LGA1155/1156/775) = 15 у.е.</option>
            <script>
                da[219] = new dataArray('sko/cool/219.html', '17');
            </script>
            <option value="219">Cooler Master CK9-9HDSA-PL-GP (AM3/AM2+/AM2) = 17 у.е.</option>
            <script>
                da[216] = new dataArray('sko/cool/216.html', '21');
            </script>
            <option value="216">Cooler Master Vortex 211P (RR-V211-22FK-R1) (LGA1155/1156/775) = 21 у.е.</option>
              <script>
                da[231] = new dataArray('sko/cool/231.html', '21');
            </script>
            <option value="231">Cooler Master S200 (RR-S200-18FK-R1) (LGA1156/1155/775/AM3/AM2+/AM2) = 21 у.е.
            </option>
			<script>
                da[217] = new dataArray('sko/cool/217.html', '22');
            </script>
            <option value="217">Cooler Master Vortex 211Q (RR-V211-15FK-R1) (LGA1155/1156/775) = 22 у.е.</option>

             

            <script>
                da[227] = new dataArray('sko/cool/227.html', '23');
            </script>
            <option value="227">Cooler Master Hyper 101 (RR-H101-30PK-RU) (LGA1156/775/AM3/AM2+/AM2) = 23 у.е.
            </option>
             <script>
                da[232] = new dataArray('sko/cool/232.html', '29');
            </script>
            <option value="232">Cooler Master Hyper TX3 EVO (RR-TX3E-22PK-R1) (1156/775/FM1/AM3/AM2) = 29 у.е.
            </option>
			<script>
                da[212] = new dataArray('sko/cool/212.html', '39');
            </script>
            <option value="212">Cooler Master Hyper 212 EVO (RR-212E-16PK-R1) (LGA1366/1156/775/FM1/AM3/AM2) = 39 у.е.
            </option>
            <script>
                da[211] = new dataArray('sko/cool/211.html', '35');
            </script>
            <option value="211">Cooler Master Hyper T4 (RR-T4-18PK-R1) (LGA2011/1156/1155/775/FM1/AM3/AM2+/AM) = 35 у.е.
            </option>
          <script>
                da[29] = new dataArray('sko/cool/29.html', '49');
            </script>
            <option value="29">Cooler Master GeminII S524 (RR-G524-18PK-R1) (LGA1366/1156/1155/775/FM1/AM3/AM2/939) = 49 у.е.
            </option>
            <script>
                da[210] = new dataArray('sko/cool/210.html', '50');
            </script>
            <option value="210">Cooler Master GeminII SF524 (RR-G524-13FK-R1) (LGA1366/1156/1155/775/FM1/AM3/AM2/939) = 50 у.е.
            </option>

         
			  <script>
                da[236] = new dataArray('sko/cool/236.html', '61');
            </script>
            <option value="236">Cooler Master V8 (RR-UV8-XBU1-GP) (LGA1366/1156/1155/775/AM3/AM2/940/939/754) = 61 у.е.
            </option>
			<script>
                da[238] = new dataArray('sko/cool/238.html', '20');
            </script>
            <option value="238">Cooler Master Буран T2 Mini (RR-T2MN-22FP-RU) (LGA1366/1156/1155/LGA775/FM1/AM3/AM2) = 20 у.е.
            </option>
			<script>
                da[237] = new dataArray('sko/cool/237.html', '24');
            </script>
            <option value="237">Cooler Master Буран T2 (RR-T2-22FP-RU) (LGA1156/1155/LGA775/FM1/AM3/AM2) = 24 у.е.
            </option>
			


            </optgroup>


        </select>
        <a href="#" id="inf2" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                            alt="info"
                                                                                            title="Описание"/></a></td>
    <td class="tac" id="kol2" style="display:none">
        <input id="tovkol2" onchange="addconf('2');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent2" style="display:none"></td>
</tr>
<!------------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel3" type="hidden"/>
<input id="kolval3" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Материнская плата" id="tov3" onchange="addconf('3');">
<option value="0">Материнская плата</option>

<optgroup label="- - LGA 1150 - ATX - -">
<script>
        da[31139] = new dataArray('sko/matpl/31139.html', '95');
    </script>
    <option value="31139">Asus B85-PLUS (B85) (4xDDR3) = 95 у.е.</option>
	<script>
        da[31140] = new dataArray('sko/matpl/31140.html', '114');
    </script>
    <option value="31140">Asus H87-PLUS (H87) (4xDDR3) = 114 у.е.</option>
	<script>
        da[31141] = new dataArray('sko/matpl/31141.html', '125');
    </script>
    <option value="31141">Asus H87-PRO (H87) (4xDDR3) = 125 у.е.</option>
	<script>
        da[31144] = new dataArray('sko/matpl/31144.html', '145');
    </script>
    <option value="31144">Asus Z87-K (Z87) (4xDDR3) = 145 у.е.</option>
	<script>
        da[31143] = new dataArray('sko/matpl/31143.html', '156');
    </script>
    <option value="31143">Asus Z87-C (Z87) (4xDDR3) = 156 у.е.</option>
	<script>
        da[31142] = new dataArray('sko/matpl/31142.html', '163');
    </script>
    <option value="31142">Asus Z87-A (Z87) (4xDDR3) = 163 у.е.</option>
	
	
	<script>
        da[31145] = new dataArray('sko/matpl/31145.html', '191');
    </script>
    <option value="31145">Asus Z87-PLUS (Z87) (4xDDR3) = 191 у.е.</option>
	<script>
        da[31146] = new dataArray('sko/matpl/31146.html', '221');
    </script>
    <option value="31146">Asus Z87-PRO (Z87) (4xDDR3) = 221 у.е.</option>
	<script>
        da[31148] = new dataArray('sko/matpl/31148.html', '102');
    </script>
    <option value="31148">GigaByte GA-P85-D3 (B85) (4xDDR3) = 102 у.е.</option>
	<script>
        da[31151] = new dataArray('sko/matpl/31151.html', '127');
    </script>
    <option value="31151">GigaByte GA-Z87P-D3 (Z87) (4xDDR3) = 127 у.е.</option>
	<script>
        da[31147] = new dataArray('sko/matpl/31147.html', '130');
    </script>
    <option value="31147">GigaByte GA-H87-D3H (H87) (4xDDR3) = 130 у.е.</option>
	<script>
        da[31150] = new dataArray('sko/matpl/31150.html', '138');
    </script>
    <option value="31150">GigaByte GA-Z87-HD3 (Z87) (4xDDR3) = 138 у.е.</option>
	<script>
        da[31149] = new dataArray('sko/matpl/31149.html', '158');
    </script>
    <option value="31149">GigaByte GA-Z87-D3HP (Z87) (4xDDR3) = 158 у.е.</option>
	
	
	<script>
        da[31152] = new dataArray('sko/matpl/31152.html', '185');
    </script>
    <option value="31152">GigaByte GA-Z87X-D3H (Z87) (4xDDR3) = 185 у.е.</option>
	<script>
        da[31153] = new dataArray('sko/matpl/31153.html', '288');
    </script>
    <option value="31153">GigaByte GA-Z87X-UD5H (Z87) (4xDDR3) = 288 у.е.</option>
	
	<optgroup label="- - LGA 1150 - mATX - -">
	<script>
        da[31156] = new dataArray('sko/matpl/31156.html', '85');
    </script>
    <option value="31156">Asus B85M-G (B85) (4xDDR3) = 85 у.е.</option>
	<script>
        da[31155] = new dataArray('sko/matpl/31155.html', '92');
    </script>
    <option value="31155">Asus B85M-E (B85) (4xDDR3) = 92 у.е.</option>
	<script>
        da[31154] = new dataArray('sko/matpl/31154.html', '102');
    </script>
    <option value="31154">AsRock H87M (H87) (2xDDR3) = 102 у.е.</option>
	
	
	<script>
        da[31157] = new dataArray('sko/matpl/31157.html', '103');
    </script>
    <option value="31157">Asus H87M-E (H87) (4xDDR3) = 103 у.е.</option>
	
	<script>
        da[31158] = new dataArray('sko/matpl/31158.html', '112');
    </script>
    <option value="31158">Asus H87M-PLUS (H87) (4xDDR3) = 112 у.е.</option>
	<script>
        da[31159] = new dataArray('sko/matpl/31159.html', '134');
    </script>
    <option value="31159">Asus H87M-PRO (H87) (4xDDR3) = 134 у.е.</option>
	<script>
        da[31160] = new dataArray('sko/matpl/31160.html', '91');
    </script>
    <option value="31160">GigaByte GA-B85M-HD3 (B85) (2xDDR3) = 91 у.е.</option>
	<script>
        da[31162] = new dataArray('sko/matpl/31162.html', '112');
    </script>
    <option value="31162">GigaByte GA-H87M-D3H (H87) (4xDDR3) = 112 у.е.</option>
	<script>
        da[31161] = new dataArray('sko/matpl/31161.html', '113');
    </script>
    <option value="31161">GigaByte GA-H87M-D3H (H87) (4xDDR3) = 113 у.е.</option>
	
	<script>
        da[31163] = new dataArray('sko/matpl/31163.html', '119');
    </script>
    <option value="31163">GigaByte GA-Z87M-HD3 (Z87) (2xDDR3) = 119 у.е.</option>
	<script>
        da[31164] = new dataArray('sko/matpl/31164.html', '75');
    </script>
    <option value="31164">MSI B85M-P33 (B85) (2xDDR3) = 75 у.е.</option>
	<script>
        da[31165] = new dataArray('sko/matpl/31165.html', '94');
    </script>
    <option value="31165">MSI H87M-P33 (H87) (2xDDR3) = 94 у.е.</option>
	
	
	

<optgroup label="- - LGA 1155 - ATX - -">


<script>
        da[3166] = new dataArray('sko/matpl/3166.html', '60');
    </script>
    <option value="3166">AsRock H61DEL (H61) (2xDDR3) = 60 у.е.</option>


    <script>
        da[33] = new dataArray('sko/matpl/33.html', '62');
    </script>
    <option value="33">AsRock H61DE/SI (H61) (4xDDR3) = 62 у.е.</option>
    <script>
        da[3122] = new dataArray('sko/matpl/3122.html', '70');
    </script>
    <option value="3122">AsRock P75 PRO3 (B75) (2xDDR3) = 70 у.е.</option>
    <script>
        da[31] = new dataArray('sko/matpl/31.html', '79');
    </script>
    <option value="31">AsRock B75 PRO3 (B75) (4xDDR3) = 79 у.е.</option>

    <script>
        da[36] = new dataArray('sko/matpl/36.html', '81');
    </script>
    <option value="36">AsRock P67 PRO (P67) (4xDDR3) = 81 у.е.</option>

    <script>
        da[3124] = new dataArray('sko/matpl/3124.html', '88');
    </script>
    <option value="3124">AsRock ZH77 PRO3 (H77) (4xDDR3) = 88 у.е.</option>
    <script>
        da[3120] = new dataArray('sko/matpl/3120.html', '90');
    </script>
    <option value="3120">AsRock H77 PRO4/MVP (H77) (4xDDR3) = 90 у.е.</option>
	<script>
        da[3167] = new dataArray('sko/matpl/3167.html', '90');
    </script>
    <option value="3167">AsRock Z75 PRO3 (Z75) (4xDDR3) = 90 у.е.</option>
	
	<script>
        da[3121] = new dataArray('sko/matpl/3121.html', '92');
    </script>
    <option value="3121">AsRock P67 PRO3 (P67) (4xDDR3) = 92 у.е.</option>
    
    <script>
        da[3123] = new dataArray('sko/matpl/3123.html', '99');
    </script>
    <option value="3123">AsRock Z77 PRO3 (Z77) (4xDDR3) = 99 у.е.</option>
    <script>
        da[310] = new dataArray('sko/matpl/310.html', '115');
    </script>
    <option value="310">AsRock Z77 Pro4 (Z77) (4xDDR3) = 115 у.е.</option>
    <script>
        da[37] = new dataArray('sko/matpl/37.html', '144');
    </script>
    <option value="37">AsRock Z68 Extreme3 Gen3 (Z68) (4xDDR3) = 144 у.е.</option>
    <script>
        da[35] = new dataArray('sko/matpl/35.html', '147');
    </script>
    <option value="35">AsRock P67 Extreme4 Gen3 (P67) (4xDDR3) = 147 у.е.</option>
	
	
     <script>
        da[311] = new dataArray('sko/matpl/311.html', '69');
    </script>
    <option value="311">Asus P8H61 (H61) (2xDDR3) = 69 у.е.</option>
	
	<script>
        da[3125] = new dataArray('sko/matpl/3125.html', '78');
    </script>
    <option value="3125">Asus P8B75-V (B75) (4xDDR3) = 78 у.е.</option>
    <script>
        da[312] = new dataArray('sko/matpl/312.html', '81');
    </script>
    <option value="312">Asus P8H61/USB3 (H61) (2xDDR3) = 81 у.е.</option>
	<script>
        da[3169] = new dataArray('sko/matpl/3169.html', '91');
    </script>
    <option value="3169">Asus P8H77-V LE (H77) (4xDDR3) = 91 у.е.</option>
	
	<script>
        da[3168] = new dataArray('sko/matpl/3168.html', '97');
    </script>
    <option value="3168">Asus P8H77-V (H77) (4xDDR3) = 97 у.е.</option>
	<script>
        da[3171] = new dataArray('sko/matpl/3171.html', '101');
    </script>
    <option value="3171">Asus P8Z77-V LX2 (Z77) (4xDDR3) = 101 у.е.</option>
   
    <script>
        da[3126] = new dataArray('sko/matpl/3126.html', '110');
    </script>
    <option value="3126">Asus P8Z77-V LX (Z77) (4xDDR3) = 110 у.е.</option>
	<script>
        da[3170] = new dataArray('sko/matpl/3170.html', '137');
    </script>
    <option value="3170">Asus P8Z77-V LK (Z77) (4xDDR3) = 137 у.е.</option>

    <script>
        da[314] = new dataArray('sko/matpl/314.html', '220');
    </script>
    <option value="314">Asus P8P67 DELUXE (P67) (4xDDR3) = 220 у.е.</option>
	<script>
        da[3172] = new dataArray('sko/matpl/3172.html', '56');
    </script>
    <option value="3172">Biostar H61B (H61) (2xDDR3) = 56 у.е.</option>
	
    <script>
        da[3127] = new dataArray('sko/matpl/3127.html', '91');
    </script>
    <option value="3127">Biostar TZ75B (Z75) (4xDDR3) = 91 у.е.</option>
    <script>
        da[3129] = new dataArray('sko/matpl/3129.html', '62');
    </script>
    <option value="3129">Gigabyte GA-P61-S3-B3 (H61) (2xDDR3) = 62 у.е.</option>
	<script>
        da[3174] = new dataArray('sko/matpl/3174.html', '70');
    </script>
    <option value="3174">Gigabyte GA-P61A-D3 (H61) (2xDDR3) = 70 у.е.</option>
	
 <script>
        da[319] = new dataArray('sko/matpl/319.html', '76');
    </script>
    <option value="319">Gigabyte GA-B75-D3V (B75) (4xDDR3) = 76 у.е.</option>
    <script>
        da[321] = new dataArray('sko/matpl/321.html', '79');
    </script>
    <option value="321">Gigabyte GA-P75-D3 (B75) (4xDDR3) = 79 у.е.</option>
   
    <script>
        da[3128] = new dataArray('sko/matpl/3128.html', '88');
    </script>
    <option value="3128">GigaByte GA-Z68P-DS3 (Z68) (4xDDR3) = 88 у.е.</option>
    <script>
        da[320] = new dataArray('sko/matpl/320.html', '88');
    </script>
    <option value="320">Gigabyte GA-H77-DS3H (H77) (4xDDR3) = 88 у.е.</option>
	<script>
        da[3173] = new dataArray('sko/matpl/3173.html', '99');
    </script>
    <option value="3173">Gigabyte GA-H77-D3H (H77) (4xDDR3) = 99 у.е.</option>
	<script>
        da[3175] = new dataArray('sko/matpl/3175.html', '100');
    </script>
    <option value="3175">Gigabyte GA-Z77-DS3H (Z77) (4xDDR3) = 100 у.е.</option>
	<script>
        da[3176] = new dataArray('sko/matpl/3176.html', '149');
    </script>
    <option value="3176">Gigabyte GA-Z77-DS3H (Z77) (4xDDR3) = 149 у.е.</option>
	
	<script>
        da[3177] = new dataArray('sko/matpl/3177.html', '178');
    </script>
    <option value="3177">Gigabyte GA-Z77X-UD3H (Z77) (4xDDR3) = 178 у.е.</option>
	
	<script>
        da[3178] = new dataArray('sko/matpl/3178.html', '251');
    </script>
    <option value="3178">Gigabyte GA-Z77X-UD5H-WB WIFI (Z77) (4xDDR3) = 251 у.е.</option>
	
	<script>
        da[3179] = new dataArray('sko/matpl/3179.html', '78');
    </script>
    <option value="3179">MSI B75A-G43 (B75) (4xDDR3) = 78 у.е.</option>
	<script>
        da[3180] = new dataArray('sko/matpl/3180.html', '79');
    </script>
    <option value="3180">MSI ZH77A-G41 (H77) (4xDDR3) = 79 у.е.</option>
	
	<script>
        da[3181] = new dataArray('sko/matpl/3181.html', '93');
    </script>
    <option value="3181">MSI Z77A-G41 (Z77) (4xDDR3) = 93 у.е.</option>
	<script>
        da[3182] = new dataArray('sko/matpl/3182.html', '95');
    </script>
    <option value="3182">MSI ZH77A-G43 (H77) (4xDDR3) = 95 у.е.</option>
	
    <script>
        da[3130] = new dataArray('sko/matpl/3130.html', '144');
    </script>
    <option value="3130">MSI Z68A-GD55 (B3) (Z68) (4xDDR3) = 144 у.е.</option>


</optgroup>

<optgroup label="- - LGA 1155 - - mATX -">

<script>
        da[3183] = new dataArray('sko/matpl/3183.html', '46');
    </script>
    <option value="3183">AsRock H61M-VG3 (H61) (2xDDR3) = 46 у.е.</option>
    <script>
        da[329] = new dataArray('sko/matpl/329.html', '49');
    </script>
    <option value="329">AsRock H61M (H61) (2xDDR3) = 49 у.е.</option>

    <script>
        da[331] = new dataArray('sko/matpl/331.html', '57');
    </script>
    <option value="331">AsRock H61M/U3S3 (H61) (2xDDR3) = 57 у.е.</option>
    <script>
        da[3131] = new dataArray('sko/matpl/3131.html', '62');
    </script>
    <option value="3131">AsRock B75M-DGS (B75) (2xDDR3) = 62 у.е.</option>
	<script>
        da[3184] = new dataArray('sko/matpl/3184.html', '64');
    </script>
    <option value="3184">AsRock B75M-GL (B75) (2xDDR3) = 64 у.е.</option>
	
    <script>
        da[328] = new dataArray('sko/matpl/328.html', '70');
    </script>
    <option value="328">AsRock B75M (B75) (4xDDR3) = 70 у.е.</option>
	
	<script>
        da[3185] = new dataArray('sko/matpl/3185.html', '75');
    </script>
    <option value="3185">AsRock B75 Pro3-M (B75) (4xDDR3) = 75 у.е.</option>
	<script>
        da[3186] = new dataArray('sko/matpl/3186.html', '80');
    </script>
    <option value="3186">AsRock H77M (H77) (4xDDR3) = 80 у.е.</option>
	

    <script>
        da[333] = new dataArray('sko/matpl/333.html', '90');
    </script>
    <option value="333">AsRock H77 PRO4-M (H77) (4xDDR3) = 90 у.е.</option>
	
	<script>
        da[3187] = new dataArray('sko/matpl/3187.html', '94');
    </script>
    <option value="3187">AsRock Z77 Pro4-M (Z77) (4xDDR3) = 94 у.е.</option>

    <script>
        da[334] = new dataArray('sko/matpl/334.html', '99');
    </script>
    <option value="334">AsRock Z68 PRO3-M (Z68) (4xDDR3) = 99 у.е.</option>
    <script>
        da[3132] = new dataArray('sko/matpl/3132.html', '105');
    </script>
    <option value="3132">AsRock Q77M vPro (Q77) (4xDDR3) = 105 у.е.</option>
    <script>
        da[3133] = new dataArray('sko/matpl/3133.html', '51');
    </script>
    <option value="3133">Asus P8H61-MX (H61) (2xDDR3) = 51 у.е.</option>
	<script>
        da[3189] = new dataArray('sko/matpl/3189.html', '54');
    </script>
    <option value="3189">Asus P8H61-M LX3 PLUS (H61) (2xDDR3) = 54 у.е.</option>
	
    <script>
        da[339] = new dataArray('sko/matpl/339.html', '59');
    </script>
    <option value="339">Asus P8H61-M LX/SI (H61) (2xDDR3) = 59 у.е.</option>

    <script>
        da[337] = new dataArray('sko/matpl/337.html', '67');
    </script>
    <option value="337">Asus P8B75-M LE (B75) (2xDDR3) = 67 у.е.</option>
	<script>
        da[3188] = new dataArray('sko/matpl/3188.html', '68');
    </script>
    <option value="3188">Asus P8B75-M (B75) (4xDDR3) = 68 у.е.</option>

    <script>
        da[341] = new dataArray('sko/matpl/341.html', '80');
    </script>
    <option value="341">Asus P8H77-M LE (H77) (2xDDR3) = 80 у.е.</option>
	<script>
        da[3190] = new dataArray('sko/matpl/3190.html', '89');
    </script>
    <option value="3190">Asus P8H77-M (H77) (4xDDR3) = 89 у.е.</option>
	<script>
        da[3191] = new dataArray('sko/matpl/3191.html', '105');
    </script>
    <option value="3191">Asus P8H77-M Pro (H77) (4xDDR3) = 105 у.е.</option>
	
	
    <script>
        da[3134] = new dataArray('sko/matpl/3134.html', '120');
    </script>
    <option value="3134">Asus P8Z77-M (Z77) (4xDDR3) = 120 у.е.</option>

    <script>
        da[344] = new dataArray('sko/matpl/344.html', '49');
    </script>
    <option value="344">Biostar H61MGC (H61) (2xDDR3) = 49 у.е.</option>
    <script>
        da[3135] = new dataArray('sko/matpl/3135.html', '59');
    </script>
    <option value="3135">Biostar B75MU3B (B75) (2xDDR3) = 59 у.е.</option>
	
	<script>
        da[3192] = new dataArray('sko/matpl/3192.html', '60');
    </script>
    <option value="3192">Biostar H61MU3B (H61) (2xDDR3) = 60 у.е.</option>
	 <script>
        da[3194] = new dataArray('sko/matpl/3194.html', '67');
    </script>
    <option value="3194">Biostar H67MU3 (H67) (2xDDR3) = 67 у.е.</option>
	<script>
        da[3195] = new dataArray('sko/matpl/3195.html', '75');
    </script>
    <option value="3195">Biostar H77MU3 (H77) (4xDDR3) = 75 у.е.</option>
	
	

    <script>
        da[346] = new dataArray('sko/matpl/346.html', '72');
    </script>
    <option value="346">Biostar H67MH (H67) (2xDDR3) = 72 у.е.</option>

    <script>
        da[349] = new dataArray('sko/matpl/349.html', '48');
    </script>
    <option value="349">GigaByte GA-H61M-DS2 (H61) (2xDDR3) (oem) = 48 у.е.</option>
    <script>
        da[3136] = new dataArray('sko/matpl/3136.html', '59');
    </script>
    <option value="3136">GigaByte GA-H61MA-D2V (H61) (2xDDR3) = 59 у.е.</option>
	<script>
        da[3197] = new dataArray('sko/matpl/3197.html', '54');
    </script>
    <option value="3197">GigaByte GA-H61M-S2PV (H61) (2xDDR3) = 54 у.е.</option>
    <script>
        da[3193] = new dataArray('sko/matpl/3193.html', '62');
    </script>
    <option value="3193">GigaByte GA-B75M-D2V (B75) (2xDDR3) = 62 у.е.</option>
	
	<script>
        da[348] = new dataArray('sko/matpl/348.html', '74');
    </script>
    <option value="348">GigaByte GA-B75M-D3H (B75) (4xDDR3) = 74 у.е.</option>
	
	<script>
        da[3196] = new dataArray('sko/matpl/3196.html', '84');
    </script>
    <option value="3196">GigaByte GA-B75M-D3P (B75) (4xDDR3) = 84 у.е.</option>

    <script>
        da[351] = new dataArray('sko/matpl/351.html', '87');
    </script>
    <option value="351">GigaByte GA-H77M-D3H (H77) (4xDDR3) = 87 у.е.</option>
    <script>
        da[352] = new dataArray('sko/matpl/352.html', '89');
    </script>
    <option value="352">GigaByte GA-Z68MA-D2H (Z68) (4xDDR3) = 89 у.е.</option>
	<script>
        da[353] = new dataArray('sko/matpl/353.html', '92');
    </script>
    <option value="353">GigaByte GA-Z77M-D3H (Z77) (4xDDR3) = 92 у.е.</option> 
	<script>
        da[3137] = new dataArray('sko/matpl/3137.html', '93');
    </script>
    <option value="3137">Gigabyte GA-H67MA-USB3-B3 (H67) (4xDDR3) = 93 у.е.</option>
	
	<script>
        da[3198] = new dataArray('sko/matpl/3198.html', '114');
    </script>
    <option value="3198">GigaByte GA-Z77MX-D3H (Z77) (4xDDR3) = 114 у.е.</option>
	
	<script>
        da[3199] = new dataArray('sko/matpl/3199.html', '122');
    </script>
    <option value="3199">GigaByte GA-Q77M-D2H (Q77) (2xDDR3) = 122 у.е.</option>
   
    <script>
        da[31100] = new dataArray('sko/matpl/31100.html', '61');
    </script>
    <option value="31100">Intel DH61HO (Intel H61, 2xDDR3) = 61 у.е.</option>

    <script>
        da[31101] = new dataArray('sko/matpl/31101.html', '63');
    </script>
    <option value="31101">MSI B75MA-E33 (B75) (2xDDR3) = 63 у.е.</option>
	
	 <script>
        da[31102] = new dataArray('sko/matpl/31102.html', '82');
    </script>
    <option value="31102">MSI H77MA-G43 (H77) (4xDDR3) = 82 у.е.</option>
	
	
    <script>
        da[358] = new dataArray('sko/matpl/358.html', '87');
    </script>
    <option value="358">MSI Z68MA-G45 (Z68) (4xDDR3) = 87 у.е.</option>

</optgroup>
<optgroup label="-  - LGA 2011 - - ATX -">

    <script>
        da[3138] = new dataArray('sko/matpl/3138.html', '252');
    </script>
    <option value="3138">Asus P9X79 LE/C/SI (X79) (8xDDR3) = 252 у.е.</option>

    <script>
        da[3139] = new dataArray('sko/matpl/3139.html', '309');
    </script>
    <option value="3139">Asus Rampage IV GENE (X79) (4xDDR3) = 309 у.е.</option>
	 <script>
        da[31103] = new dataArray('sko/matpl/31103.html', '339');
    </script>
    <option value="31103">Asus SABERTOOTH X79 (X79) (8xDDR3) = 339 у.е.</option>
	
    <script>
        da[3140] = new dataArray('sko/matpl/3140.html', '234');
    </script>
    <option value="3140">GigaByte GA-X79-UD3 (X79) (4xDDR3) = 234 у.е.</option>

</optgroup>
<optgroup label="-  - Socket AM3(+)/AM2(+)- - ATX -">

<script>
        da[31105] = new dataArray('sko/matpl/31105.html', '65');
    </script>
    <option value="31105">AsRock M3N78D FX (nForce 720D) (4xDDR3) = 65 у.е.</option>


<script>
        da[31104] = new dataArray('sko/matpl/31104.html', '71');
    </script>
    <option value="31104">AsRock 970DE3/U3S3 (AMD 770) (4xDDR3) = 71 у.е.</option>

    <script>
        da[3142] = new dataArray('sko/matpl/3142.html', '79');
    </script>
    <option value="3142">AsRock 970 Pro3 (AMD 970) (4xDDR3) = 79 у.е.</option>

    <script>
        da[378] = new dataArray('sko/matpl/378.html', '90');
    </script>
    <option value="378">AsRock 970 Extreme3 (AMD 970) (4xDDR3) = 90 у.е.</option>
    <script>
        da[3141] = new dataArray('sko/matpl/3141.html', '101');
    </script>
    <option value="3141">AsRock 970 Extreme4 (AMD 970) (4xDDR3) = 101 у.е.</option>
    <script>
        da[379] = new dataArray('sko/matpl/379.html', '124');
    </script>
    <option value="379">AsRock 990FX Extreme3 (AMD 990FX) (4xDDR3) = 124 у.е.</option>
	
	<script>
        da[31106] = new dataArray('sko/matpl/31106.html', '71');
    </script>
    <option value="31106">Asus M5A78L LE (AMD 760G) (4xDDR3) = 71 у.е.</option>
	
	<script>
        da[31107] = new dataArray('sko/matpl/31107.html', '94');
    </script>
    <option value="31107">Asus M5A97 (AMD 970) (4xDDR3) = 94 у.е.</option>
	<script>
        da[31108] = new dataArray('sko/matpl/31108.html', '129');
    </script>
    <option value="31108">Asus M5A97 EVO (AMD 970) (4xDDR3) = 129 у.е.</option>
	<script>
        da[31109] = new dataArray('sko/matpl/31109.html', '149');
    </script>
    <option value="31109">Asus M5A99X EVO (AMD 990X) (4xDDR3) = 149 у.е.</option>

    <script>
        da[382] = new dataArray('sko/matpl/382.html', '66');
    </script>
    <option value="382">Biostar A960A3+ (RX881) (4xDDR3) = 66 у.е.</option>
	<script>
        da[31110] = new dataArray('sko/matpl/31110.html', '81');
    </script>
    <option value="31110">Biostar TA970 (AMD970+SB950) (4xDDR3) = 81 у.е.</option>

    <script>
        da[384] = new dataArray('sko/matpl/384.html', '63');
    </script>
    <option value="384">GigaByte GA-780T-D3L (AMD 760G/SB710) (2xDDR3) = 63 у.е.</option>

    <script>
        da[385] = new dataArray('sko/matpl/385.html', '79');
    </script>
    <option value="385">Gigabyte GA-970A-DS3 (AMD 970/SB950) (4xDDR3) = 79 у.е.</option>
	<script>
        da[31111] = new dataArray('sko/matpl/31111.html', '90');
    </script>
    <option value="31111">Gigabyte GA-970A-D3 (AMD 970/SB950) (4xDDR3) = 90 у.е.</option>
	
	<script>
        da[31112] = new dataArray('sko/matpl/31112.html', '100');
    </script>
    <option value="31112">Gigabyte GA-970A-UD3 (AMD 970/SB950) (4xDDR3) = 100 у.е.</option>
	
    <script>
        da[3143] = new dataArray('sko/matpl/3143.html', '121');
    </script>
    <option value="3143">Gigabyte GA-990XA-UD3 (AMD 990X/SB850) (4xDDR3) = 121 у.е.</option>
    <script>
        da[386] = new dataArray('sko/matpl/386.html', '144');
    </script>
    <option value="386">Gigabyte GA-990FXA-D3 (AMD 990FX/SB950) (4xDDR3) = 144 у.е.</option>
	<script>
        da[31113] = new dataArray('sko/matpl/31113.html', '69');
    </script>
    <option value="31113">MSI 760GA-P43 (FX) (AMD 760G) (4xDDR3) = 69 у.е.</option>
	
	
	<script>
        da[31114] = new dataArray('sko/matpl/31114.html', '84');
    </script>
    <option value="31114">MSI 970A-G43 (AMD 970) (4xDDR3) = 84 у.е.</option>
	

    <script>
        da[387] = new dataArray('sko/matpl/387.html', '138');
    </script>
    <option value="387">MSI 870A Fuzion (AMD 770/SB710) (4xDDR3) = 138 у.е.</option>

    <script>
        da[3144] = new dataArray('sko/matpl/3144.html', '139');
    </script>
    <option value="3144">MSI 990FXA-GD65 (AMD 990FX) (4xDDR3) = 139 у.е.</option>
</optgroup>
<optgroup label="- - Socket AM3(+)/AM2(+) - - mATX-">


<script>
        da[31115] = new dataArray('sko/matpl/31115.html', '52');
    </script>
    <option value="31115">ASRock 960GM-VGS3 FX (AMD 760G) (2xDDR3) = 52 у.е.</option>

    <script>
        da[391] = new dataArray('sko/matpl/391.html', '58');
    </script>
    <option value="391">AsRock N68C-GS FX (GeForce 7025/630А) (2xDDR2+2xDDR3) (Ret) = 58 у.е.</option>
    <script>
        da[3145] = new dataArray('sko/matpl/3145.html', '67');
    </script>
    <option value="3145">ASRock 960GM/U3S3 FX (AMD 760G) (2xDDR3) = 67 у.е.</option>
    <script>
        da[388] = new dataArray('sko/matpl/388.html', '69');
    </script>
    <option value="388">ASRock 880GM-LE FX (AMD 880G) (2xDDR3) = 69 у.е.</option>


    <script>
        da[393] = new dataArray('sko/matpl/393.html', '51');
    </script>
    <option value="393">Asus M5A78L-M LX (AMD 760G) (2xDDR3) = 51 у.е.</option>
	
	<script>
        da[31116] = new dataArray('sko/matpl/31116.html', '57');
    </script>
    <option value="31116">Asus M5A78L-M LX3 (AMD 760G) (2xDDR3) = 57 у.е.</option>
	
	<script>
        da[31117] = new dataArray('sko/matpl/31117.html', '66');
    </script>
    <option value="31117">Asus M5A78L-M LE (AMD 760G) (2xDDR3) = 66 у.е.</option>

    <script>
        da[3146] = new dataArray('sko/matpl/3146.html', '50');
    </script>
    <option value="3146">Biostar A780L3C (AMD 760G + SB710) (2xDDR3) = 50 у.е.</option>
	<script>
        da[31118] = new dataArray('sko/matpl/31118.html', '53');
    </script>
    <option value="31118">Biostar A960D+ (AMD 760G) (2xDDR3) = 53 у.е.</option>
	
    <script>
        da[394] = new dataArray('sko/matpl/394.html', '64');
    </script>
    <option value="394">Biostar A880GZ (AMD880G+SB710) (2xDDR3) = 64 у.е.</option>

    <script>
        da[396] = new dataArray('sko/matpl/396.html', '56');
    </script>
    <option value="396">Gigabyte GA-78LMT-S2 (AMD 760G) (2xDDR3) = 56 у.е.</option>
    <script>
        da[3147] = new dataArray('sko/matpl/3147.html', '69');
    </script>
    <option value="3147">Gigabyte GA-78LMT-USB3 (AMD 760G) (4xDDR3) = 69 у.е.</option>
	<script>
        da[31119] = new dataArray('sko/matpl/31119.html', '52');
    </script>
    <option value="31119">Jetway N68M (GeForce 7025 + nForce 630a) = 52 у.е.</option>
	
	<script>
        da[31120] = new dataArray('sko/matpl/31120.html', '54');
    </script>
    <option value="31120">MSI 760GM-P21 (FX) (AMD 760G/SB710) (2xDDR3) = 54 у.е.</option>
	
	<script>
        da[31121] = new dataArray('sko/matpl/31121.html', '69');
    </script>
    <option value="31121">MSI 760GM-E51 (FX) (AMD760G+SB710) (4xDDR3) = 69 у.е.</option>
	
	
	
	
</optgroup>
<optgroup label="-  -  Socket FM1 - ATX - -">
    <script>
        da[3148] = new dataArray('sko/matpl/3148.html', '69');
    </script>
    <option value="3148">AsRock A55iCafe (AMD A55) (4xDDR3) = 69 у.е.</option>

    <script>
        da[3149] = new dataArray('sko/matpl/3149.html', '73');
    </script>
    <option value="3149">AsRock A55 PRO3 (AMD A55) (4xDDR3) = 73 у.е.</option>
    <script>
        da[3150] = new dataArray('sko/matpl/3150.html', '92');
    </script>
    <option value="3150">AsRock A75 Pro4 (AMD A75) (4xDDR3) = 92 у.е.</option>

    <script>
        da[3151] = new dataArray('sko/matpl/3151.html', '106');
    </script>
    <option value="3151">Asus F1A75-V (AMD A75) (4xDDR3) = 106 у.е.</option>

    <script>
        da[3152] = new dataArray('sko/matpl/3152.html', '53');
    </script>
    <option value="3152">Biostar A57A (AMD A55) (2xDDR3) = 53 у.е.</option>
    <script>
        da[3153] = new dataArray('sko/matpl/3153.html', '91');
    </script>
    <option value="3153">Biostar TA75A+ (AMD A75) (4xDDR3) = 91 у.е.</option>

</optgroup>
<optgroup label="-  -  Socket FM1 - mATX - -">


    <script>
        da[3108] = new dataArray('sko/matpl/3108.html', '56');
    </script>
    <option value="3108">AsRock A55M-DGS (AMD A55) (2xDDR3) (Ret) = 56 у.е.</option>

    <script>
        da[3109] = new dataArray('sko/matpl/3109.html', '63');
    </script>
    <option value="3109">AsRock A75M-HVS (AMD A75) (2xDDR3) = 63 у.е.</option>
	
	<script>
        da[31122] = new dataArray('sko/matpl/31122.html', '70');
    </script>
    <option value="31122">AsRock A75M (AMD A75) (2xDDR3) = 70 у.е.</option>
    <script>
        da[3154] = new dataArray('sko/matpl/3154.html', '80');
    </script>
    <option value="3154">AsRock A75 Pro4-M (AMD A75) (4xDDR3) = 80 у.е.</option>
	
	<script>
        da[31123] = new dataArray('sko/matpl/31123.html', '66');
    </script>
    <option value="31123">Asus F1A55-M LX (AMD A55) (2xDDR3) = 66 у.е.</option>

    <script>
        da[3110] = new dataArray('sko/matpl/3110.html', '72');
    </script>
    <option value="3110">Asus F1A55-M LE (AMD A55) (2xDDR3) = 72 у.е.</option>

    <script>
        da[3155] = new dataArray('sko/matpl/3155.html', '56');
    </script>
    <option value="3155">Biostar A55MLV (AMD A55) (2xDDR3) = 56 у.е.</option>
    <script>
        da[3112] = new dataArray('sko/matpl/3112.html', '82');
    </script>
    <option value="3112">Biostar TA75M (AMD A75) (4xDDR3) = 82 у.е.</option>

    <script>
        da[3113] = new dataArray('sko/matpl/3113.html', '59');
    </script>
    <option value="3113">GigaByte GA-A55M-DS2 (AMD A55) (2xDDR3) = 59 у.е.</option>
	<script>
        da[31124] = new dataArray('sko/matpl/31124.html', '60');
    </script>
    <option value="31124">MSI A55M-P33 (AMD A55) (2xDDR3) = 60 у.е.</option>
	
	

</optgroup>
<optgroup label="- - Socket FM1 - mini-ITX - -">


    <script>
        da[3117] = new dataArray('sko/matpl/3117.html', '88');
    </script>
    <option value="3117">GigaByte GA-A75N-USB3 (A75) (2xDDR3) = 88 у.е.</option>
</optgroup>
<optgroup label="- -  Socket FM2 - ATX - -">

    <script>
        da[3156] = new dataArray('sko/matpl/3156.html', '85');
    </script>
    <option value="3156">AsRock FM2A75 PRO4 (AMD A75) (4xDDR3) = 85 у.е.</option>
    <script>
        da[3157] = new dataArray('sko/matpl/3157.html', '97');
    </script>
    <option value="3157">AsRock FM2A85X EXTREME4 (AMD A85X) (4xDDR3) = 97 у.е.</option>
    <script>
        da[3158] = new dataArray('sko/matpl/3158.html', '99');
    </script>
    <option value="3158">Asus F2A55 (AMD A55) (4xDDR3) = 99 у.е.</option>
	<script>
        da[31125] = new dataArray('sko/matpl/31125.html', '157');
    </script>
    <option value="31125">Asus F2A85-V PRO (AMD A85X) (4xDDR3) = 157 у.е.</option>
	
    <script>
        da[3159] = new dataArray('sko/matpl/3159.html', '99');
    </script>
    <option value="3159">GigaByte GA-F2A75-D3H (AMD A75) (4xDDR3) = 99 у.е.</option>

</optgroup>
<optgroup label="- -  Socket FM2 - mATX - -">
    <script>
        da[3160] = new dataArray('sko/matpl/3160.html', '60');
    </script>
    <option value="3160">AsRock FM2A55M-DGS (AMD A55) (2xDDR3) = 60 у.е.</option>
	
	<script>
        da[31126] = new dataArray('sko/matpl/31126.html', '68');
    </script>
    <option value="31126">AsRock FM2A75M-DGS (AMD A75) (2xDDR3) = 68 у.е.</option>

    <script>
        da[3161] = new dataArray('sko/matpl/3161.html', '82');
    </script>
    <option value="3161">AsRock FM2A75 PRO4M (AMD A75) (2xDDR3) = 82 у.е.</option>
	<script>
        da[31127] = new dataArray('sko/matpl/31127.html', '74');
    </script>
    <option value="31127">Asus F2A55-M LK2 (AMD A55) (2xDDR3) = 74 у.е.</option>
	
	
    <script>
        da[3162] = new dataArray('sko/matpl/3162.html', '89');
    </script>
    <option value="3162">Asus F2A55-M (AMD A55) (4xDDR3) = 89 у.е.</option>
	<script>
        da[31128] = new dataArray('sko/matpl/31128.html', '104');
    </script>
    <option value="31128">Asus F2A85-M (AMD A85X) (4xDDR3) = 104 у.е.</option>
	
    <script>
        da[3163] = new dataArray('sko/matpl/3163.html', '127');
    </script>
    <option value="3163">Asus F2A85-M PRO (AMD A85X) (4xDDR3) = 127 у.е.</option>

    <script>
        da[3164] = new dataArray('sko/matpl/3164.html', '62');
    </script>
    <option value="3164">Biostar A55ML2 (AMD A55) (2xDDR3) = 62 у.е.</option>
	
	<script>
        da[31129] = new dataArray('sko/matpl/31129.html', '67');
    </script>
    <option value="31129">GigaByte GA-F2A55M-DS2 (AMD A55) (2xDDR3) = 67 у.е.</option>
    <script>
        da[3165] = new dataArray('sko/matpl/3165.html', '74');
    </script>
    <option value="3165">GigaByte GA-F2A75M-HD2 (AMD A75) (2xDDR3) = 74 у.е.</option>
	
	<script>
        da[31130] = new dataArray('sko/matpl/31130.html', '84');
    </script>
    <option value="31130">GigaByte GA-F2A75M-D3H (AMD A75) (4xDDR3) = 84 у.е.</option>
	<script>
        da[31131] = new dataArray('sko/matpl/31131.html', '67');
    </script>
    <option value="31131">MSI FM2-A55M-P33 (AMD A55) (2xDDR3) = 67 у.е.</option>
	
	<script>
        da[31132] = new dataArray('sko/matpl/31132.html', '81');
    </script>
    <option value="31132">MSI FM2-A75MA-E35 (AMD A75) (2xDDR3) = 81 у.е.</option>
	
	<script>
        da[31133] = new dataArray('sko/matpl/31133.html', '92');
    </script>
    <option value="31133">MSI FM2-A85XMA-E35 (AMD A85X) (2xDDR3) = 92 у.е.</option>
	
	
	
	
	

</optgroup>
</select>
<a href="#" id="inf3" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                    title="Описание"/></a></td>
<td class="tac" id="kol3" style="display:none">
    <input id="tovkol3" onchange="addconf('3');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent3" style="display:none"></td>
</tr>
<!------------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel4" type="hidden"/>
        <input id="kolval4" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Оперативная память" id="tov4" onchange="addconf('4');">
            <option value="0">Оперативная память</option>

            <script>
                da[48] = new dataArray('sko/op/48.html', '29');
            </script>
            <option value="48">2048Mb PC-10660 DDR3-1333 Kingmax = 29 у.е.</option>
			 <script>
                da[442] = new dataArray('sko/op/442.html', '29');
            </script>
            <option value="442">2048Mb PC-10660 DDR3-1333 Silicon Power = 29 у.е.</option>
			
			  <script>
                da[441] = new dataArray('sko/op/441.html', '30');
            </script>
            <option value="441">2048Mb PC-10660 DDR3-1333 Patriot = 30 у.е.</option>


            <script>
                da[44] = new dataArray('sko/op/44.html', '32');
            </script>
            <option value="44">2048Mb PC-10660 DDR3-1333 Hynix orig = 32 у.е.</option>
           
            <script>
                da[411] = new dataArray('sko/op/411.html', '30');
            </script>
            <option value="411">2048Mb PC-12800 DDR3-1600 Patriot = 30 у.е.</option>
			 <script>
                da[444] = new dataArray('sko/op/444.html', '30');
            </script>
            <option value="444">2048Mb PC-12800 DDR3-1600 Silicon Power = 30 у.е.</option>
			
			 <script>
                da[443] = new dataArray('sko/op/443.html', '31');
            </script>
            <option value="443">2048Mb PC-12800 DDR3-1600 Kingston KVR16N11/2 = 31 у.е.</option>
            <script>
                da[41] = new dataArray('sko/op/41.html', '33');
            </script>
            <option value="41">2048Mb PC-12800 DDR3-1600 Samsung original = 33 у.е.</option>
			<script>
                da[446] = new dataArray('sko/op/446.html', '39');
            </script>
            <option value="446">4G PC-10660 DDR3-1333 NCP = 39 у.е.</option>
			
			<script>
                da[445] = new dataArray('sko/op/445.html', '40');
            </script>
            <option value="445">4G PC-10660 DDR3-1333 Apacer AU04GFA33C9TBGC = 40 у.е.</option>

    <script>
                da[418] = new dataArray('sko/op/418.html', '41');
            </script>
            <option value="418">4G PC-10660 DDR3-1333 Kingmax= 41 у.е.</option>
            <script>
                da[417] = new dataArray('sko/op/417.html', '44');
            </script>
            <option value="417">4G PC-10660 DDR3-1333 Patriot = 44 у.е.</option>

        
            <script>
                da[414] = new dataArray('sko/op/414.html', '44');
            </script>
            <option value="414">4G PC-10660 DDR3-1333 Hynix orig = 44 у.е.</option>
            <script>
                da[423] = new dataArray('sko/op/423.html', '44');
            </script>
            <option value="423">4G PC-10660 DDR3-1333 Transcend = 44 у.е.</option>
            <script>
                da[420] = new dataArray('sko/op/420.html', '44');
            </script>
            <option value="420">4G PC-10660 DDR3-1333 Silicon Power SP004GBLTU133V02 = 44 у.е.</option>
            <script>
                da[419] = new dataArray('sko/op/419.html', '45');
            </script>
            <option value="419">4G PC-10660 DDR3-1333 Samsung = 45 у.е.</option>

            <script>
                da[415] = new dataArray('sko/op/415.html', '48');
            </script>
            <option value="415">4G PC-10660 DDR3-1333 Kingston KVR1333D3N9 = 48 у.е.</option>
			<script>
                da[450] = new dataArray('sko/op/450.html', '39');
            </script>
            <option value="450">4GB PC-12800 DDR3-1600 NCP = 39 у.е.</option>
			<script>
                da[447] = new dataArray('sko/op/447.html', '41');
            </script>
            <option value="447">4GB PC-12800 DDR3-1600 Apacer AU04GFA60CATBGC = 41 у.е.</option>
  <script>
                da[427] = new dataArray('sko/op/427.html', '43');
            </script>
            <option value="427">4GB PC-12800 DDR3-1600 Kingston KVR16N11S8/4 = 43 у.е.</option>
   <script>
                da[426] = new dataArray('sko/op/426.html', '43');
            </script>
            <option value="426">4GB PC-12800 DDR3-1600 Silicon Power SP004GBLTU160V02 = 43 у.е.</option>
            <script>
                da[425] = new dataArray('sko/op/425.html', '44');
            </script>
            <option value="425">4GB PC-12800 DDR3-1600 Transcend = 44 у.е.</option>
			<script>
                da[449] = new dataArray('sko/op/449.html', '44');
            </script>
            <option value="449">4GB PC-12800 DDR3-1600 Kingston KVR16N11S8/4 = 44 у.е.</option>
			<script>
                da[467] = new dataArray('sko/op/467.html', '44');
            </script>
            <option value="467">4GB PC-12800 DDR3-1600 Apacer DK.04GAK.H92 = 44 у.е.</option>
			<script>
                da[468] = new dataArray('sko/op/468.html', '45');
            </script>
            <option value="468">4GB PC-12800 DDR3-1600 Kingston KHX16C9B1R/4 = 45 у.е.</option>
			
			<script>
                da[448] = new dataArray('sko/op/448.html', '45');
            </script>
            <option value="448">4GB PC-12800 DDR3-1600 Kingmax = 45 у.е.</option>
            <script>
                da[424] = new dataArray('sko/op/424.html', '48');
            </script>
            <option value="424">4GB PC-12800 DDR3-1600 Kingston KVR16N11/4 = 48 у.е.</option>
			<script>
                da[451] = new dataArray('sko/op/451.html', '48');
            </script>
            <option value="451">4GB PC-12800 DDR3-1600 Samsung or = 48 у.е.</option>
			<script>
                da[469] = new dataArray('sko/op/469.html', '56');
            </script>
            <option value="469">4GB PC-15000 DDR3-1866 Kingston KHX1866C9D3/4G = 56 у.е.</option>
			
			<script>
                da[454] = new dataArray('sko/op/454.html', '55');
            </script>
            <option value="454">4GB(2x2GB) PC-12800 DDR3-1600 Kingston KHX1600C9D3P1K2/4G = 55 у.е.</option>
			<script>
                da[452] = new dataArray('sko/op/452.html', '56');
            </script>
            <option value="452">4GB(2x2GB) PC-12800 DDR3-1600 Kingston KHX1600C9D3B1K2/4GX = 56 у.е.</option>
			<script>
                da[470] = new dataArray('sko/op/470.html', '56');
            </script>
            <option value="470">4GB(2x2GB) PC-12800 DDR3-1600 Kingston KHX1600C9AD3B1K2/4G = 56 у.е.</option>
			
			<script>
                da[453] = new dataArray('sko/op/453.html', '59');
            </script>
            <option value="453">4GB(2x2GB) PC-12800 DDR3-1600 Kingston KHX1600C9D3LK2/4GX = 59 у.е.</option>
			<script>
                da[455] = new dataArray('sko/op/455.html', '61');
            </script>
            <option value="455">4GB(2x2GB) PC-15000 DDR3-1866 Kingston KHX1866C9D3K2/4GX = 61 у.е.</option>
         

          


            <script>
                da[428] = new dataArray('sko/op/428.html', '61');
            </script>
            <option value="428">8GB PC-10660 DDR3-1333 Patriot = 61 у.е.</option>
<script>
                da[456] = new dataArray('sko/op/456.html', '65');
            </script>
            <option value="456">8GB PC-10660 DDR3-1333 Transcend = 65 у.е.</option>
            <script>
                da[436] = new dataArray('sko/op/434.html', '61');
            </script>
            <option value="436">8GB PC-12800 DDR3-1600 QUMO = 61 у.е.</option>
			<script>
                da[457] = new dataArray('sko/op/457.html', '61');
            </script>
            <option value="457">8GB PC-12800 DDR3-1600 Apacer AU08GFA60CATBGC = 61 у.е.</option>
			<script>
                da[459] = new dataArray('sko/op/459.html', '65');
            </script>
            <option value="459">8GB PC-12800 DDR3-1600 Silicon Power = 65 у.е.</option>
			
			<script>
                da[471] = new dataArray('sko/op/471.html', '66');
            </script>
            <option value="471">8GB PC-12800 DDR3-1600 Apacer DK.08GAK.K12 = 66 у.е.</option>
			
			<script>
                da[458] = new dataArray('sko/op/458.html', '69');
            </script>
            <option value="458">8GB PC-12800 DDR3-1600 Kingmax = 69 у.е.</option>
			<script>
                da[460] = new dataArray('sko/op/460.html', '71');
            </script>
            <option value="460">8GB PC-12800 DDR3-1600 Kingston KVR16N11/8 = 71 у.е.</option>
			
            <script>
                da[434] = new dataArray('sko/op/434.html', '74');
            </script>
            <option value="434">8GB PC-12800 DDR3-1600 Hynix = 74 у.е.</option>
			<script>
                da[472] = new dataArray('sko/op/472.html', '76');
            </script>
            <option value="472">8GB PC-12800 DDR3-1600 Kingston KHX1600C10D3B1/8G = 76 у.е.</option>
			
			<script>
                da[461] = new dataArray('sko/op/461.html', '81');
            </script>
            <option value="461">8GB(2x4GB) PC-12800 DDR3-1600 Kingston KHX1600C9D3K2/8G = 81 у.е.</option>
			<script>
                da[462] = new dataArray('sko/op/462.html', '82');
            </script>
            <option value="462">8GB(2x4GB) PC-12800 DDR3-1600 Kingston KHX16C9T3K2/8X = 82 у.е.</option>
			<script>
                da[473] = new dataArray('sko/op/473.html', '82');
            </script>
            <option value="473">8GB(2x4GB) PC-12800 DDR3-1600 Kingston KHX1600C9D3B1K2/8GX = 82 у.е.</option>
			<script>
                da[474] = new dataArray('sko/op/474.html', '86');
            </script>
            <option value="474">8GB(2x4GB) PC-12800 DDR3-1600 Kingston KHX16C9B1RK2/8 = 86 у.е.</option>
			<script>
                da[475] = new dataArray('sko/op/475.html', '76');
            </script>
            <option value="475">8GB(2x4GB) PC-15000 DDR3-1866 Apacer DK.08GAQ.HA3K2 = 76 у.е.</option>
			<script>
                da[476] = new dataArray('sko/op/476.html', '89');
            </script>
            <option value="476">8GB(2x4GB) PC-15000 DDR3-1866 Kingston KHX1866C9D3K2/8G = 89 у.е.</option>
			<script>
                da[478] = new dataArray('sko/op/478.html', '91');
            </script>
            <option value="478">8GB(2x4GB) PC-15000 DDR3-1866 Kingston KHX18C9X3K2/8X = 91 у.е.</option>
			<script>
                da[477] = new dataArray('sko/op/477.html', '96');
            </script>
            <option value="477">8GB(2x4GB) PC-15000 DDR3-1866 Kingston KHX1866C9D3K2/8GX = 96 у.е.</option>
			<script>
                da[479] = new dataArray('sko/op/479.html', '82');
            </script>
            <option value="479">8GB(2x4GB) PC-17000 DDR3-2133 Apacer DK.08GAR.HA3K2 = 82 у.е.</option>
			
			<script>
                da[463] = new dataArray('sko/op/463.html', '99');
            </script>
            <option value="463">8GB(2x4GB) PC-17000 DDR3-2133 Kingston KHX21C11T2K2/8X = 99 у.е.</option>
			<script>
                da[480] = new dataArray('sko/op/480.html', '102');
            </script>
            <option value="480">8GB(2x4GB) PC-17000 DDR3-2133 Kingston KHX2133C11D3W1K2/8GX = 102 у.е.</option>
			
			<script>
                da[464] = new dataArray('sko/op/464.html', '106');
            </script>
            <option value="464">8GB(2x4GB) PC-19200 DDR3-2400 Kingston KHX24C11T2K2/8X = 106 у.е.</option>
			<script>
                da[481] = new dataArray('sko/op/481.html', '154');
            </script>
            <option value="481">8GB(2x4GB) PC-21300 DDR3-2666 Apacer DK.08GAV.HBSK2 ARES HeatSink = 154 у.е.</option>
			
			
			
            <script>
                da[437] = new dataArray('sko/op/437.html', '187');
            </script>
            <option value="437">8GB(2x4GB) PC-21300 DDR3-2666 Kingston KHX26C11T2K2/8X = 187 у.е.</option>
			<script>
                da[482] = new dataArray('sko/op/482.html', '123');
            </script>
            <option value="482">16GB(2x8GB) PC-12800 DDR3-1600 Apacer DK.16GAK.K15K2 = 123 у.е.</option>
			
			
			<script>
                da[465] = new dataArray('sko/op/465.html', '146');
            </script>
            <option value="465">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX1600C10D3B1K2/16G = 146 у.е.</option>
			<script>
                da[485] = new dataArray('sko/op/485.html', '147');
            </script>
            <option value="485">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16C9X3K2/16X = 147 у.е.</option>
			<script>
                da[486] = new dataArray('sko/op/486.html', '148');
            </script>
            <option value="486">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16LC10X3K2/16X = 148 у.е.</option>
			<script>
                da[484] = new dataArray('sko/op/484.html', '150');
            </script>
            <option value="484">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16C9T3K2/16X = 150 у.е.</option>
			<script>
                da[483] = new dataArray('sko/op/483.html', '155');
            </script>
            <option value="483">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16C10B1RK2/16 = 155 у.е.</option>
          
            <script>
                da[439] = new dataArray('sko/op/439.html', '164');
            </script>
            <option value="439">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16LC9K2/16X = 164 у.е.</option>
			<script>
                da[466] = new dataArray('sko/op/466.html', '168');
            </script>
            <option value="466">16GB(2x8GB) PC-12800 DDR3-1600 Kingston KHX16C9P1K2/16 = 168 у.е.</option>
			<script>
                da[487] = new dataArray('sko/op/487.html', '141');
            </script>
            <option value="487">16GB(2x8GB) PC-15000 DDR3-1866 Apacer DK.16GAQ.KA2K2 = 141 у.е.</option>
			
			  <script>
                da[438] = new dataArray('sko/op/438.html', '154');
            </script>
            <option value="438">16GB(2x8GB) PC-15000 DDR3-1866 Kingston KHX18C11P1K2/16 = 154 у.е.</option>
			<script>
                da[489] = new dataArray('sko/op/489.html', '176');
            </script>
            <option value="489">16GB(2x8GB) PC-17000 DDR3-2133 Kingston KHX21C11T3K2/16X = 176 у.е.</option>
			<script>
                da[488] = new dataArray('sko/op/488.html', '180');
            </script>
            <option value="488">16GB(2x8GB) PC-17000 DDR3-2133 Apacer DK.16GAR.KA2K2 = 180 у.е.</option>
			<script>
                da[491] = new dataArray('sko/op/491.html', '171');
            </script>
            <option value="491">16GB(2x8GB) PC-19200 DDR3-2400 Kingston KHX24C11T3K2/16X = 171 у.е.</option>
            <script>
                da[440] = new dataArray('sko/op/440.html', '182');
            </script>
            <option value="440">16GB(2x8GB) PC-19200 DDR3-2400 Kingston KHX24C11T3K2/16X = 182 у.е.</option>
			<script>
                da[490] = new dataArray('sko/op/490.html', '206');
            </script>
            <option value="490">16GB(2x8GB) PC-19200 DDR3-2400 Apacer DK.16GAT.KASK2 ARES HeatSink = 206 у.е.</option>
			<script>
                da[492] = new dataArray('sko/op/492.html', '293');
            </script>
            <option value="492">16GB(2x8GB) PC-21300 DDR3-2666 Apacer DK.16GAV.KBSK2 ARES HeatSink = 293 у.е.</option>
			<script>
                da[493] = new dataArray('sko/op/493.html', '293');
            </script>
            <option value="493">32GB(4x8GB) PC-12800 DDR3-1600 Kingston KHX16C9T3K4/32X = 293 у.е.</option>


            </optgroup>


        </select>
        <a href="#" id="inf4" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                            alt="info"
                                                                                            title="Описание"/></a></td>
    <td class="tac" id="kol4" style="display:none">
        <input id="tovkol4" onchange="addconf('4');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent4" style="display:none"></td>
</tr>
<!------------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel5" type="hidden"/>
<input id="kolval5" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Видеокарта" id="tov5" onchange="addconf('5');">
<option value="0">Видеокарта</option>


<optgroup label="-  - ATI 1GB PCI-E -  -">

   
    <script>
        da[51010] = new dataArray('sko/vidik/51010.html', '44');
    </script>
    <option value="51010">Sapphire HD5450 HM1024Mb DDR3 (11166-07-10R) = 44 у.е.</option>
	<script>
        da[51044] = new dataArray('sko/vidik/51044.html', '48');
    </script>
    <option value="51044">Sapphire HD6450 1Gb GDDR3 (11190-02-10G) = 48 у.е.</option>
    <script>
        da[51011] = new dataArray('sko/vidik/51011.html', '63');
    </script>
    <option value="51011">Sapphire HD6570 1Gb GDDR3 (11191-26-10G) = 63 у.е.</option>
    <script>
        da[51012] = new dataArray('sko/vidik/51012.html', '85');
    </script>
    <option value="51012">Sapphire HD6670 1Gb GDDR5 (11192-14-10G) = 85 у.е.</option>
	<script>
        da[51045] = new dataArray('sko/vidik/51045.html', '99');
    </script>
    <option value="51045">Sapphire HD6670 Ultimate 1Gb GDDR5 (11192-06-10G) = 99 у.е.</option>
	
    <script>
        da[51] = new dataArray('sko/vidik/51.html', '110');
    </script>
    <option value="51">Sapphire HD7750 1Gb GDDR5 = 110 у.е.</option>
    <script>
        da[51013] = new dataArray('sko/vidik/51013.html', '126');
    </script>
    <option value="51013">Sapphire HD7770 GHZ Edition OC 1Gb GDDR5 (11201-02-10G) = 126 у.е.</option>
	<script>
        da[51046] = new dataArray('sko/vidik/51046.html', '167');
    </script>
    <option value="51046">Sapphire HD7790 1Gb GDDR5 (11210-00-10G) = 167 у.е.</option>
	<script>
        da[51047] = new dataArray('sko/vidik/51047.html', '177');
    </script>
    <option value="51047">Sapphire HD7790 DUAL-X OC 1Gb GDDR5 (11210-01-20G) = 177 у.е.</option>
	
    <script>
        da[51014] = new dataArray('sko/vidik/51014.html', '196');
    </script>
    <option value="51014">Sapphire HD7850 1Gb GDDR5 (11200-16-20G) = 196 у.е.</option>
	<script>
        da[51048] = new dataArray('sko/vidik/51048.html', '202');
    </script>
    <option value="51048">Sapphire HD7850 OC 1Gb GDDR5 (11200-06-20G) = 202 у.е.</option>


</optgroup>

<optgroup label="-  - ATI 2GB PCI-E -  -">


   
    <script>
        da[51015] = new dataArray('sko/vidik/51015.html', '54');
    </script>
    <option value="51015">Sapphire HD5450 2Gb GDDR3 (11166-45-10G) = 54 у.е.</option>
	<script>
        da[51049] = new dataArray('sko/vidik/51049.html', '59');
    </script>
    <option value="51049">Sapphire HD6450 2Gb GDDR3 (11190-09-10G) = 59 у.е.</option>
    <script>
        da[51016] = new dataArray('sko/vidik/51016.html', '71');
    </script>
    <option value="51016">Sapphire HD6570 2Gb GDDR3 (11191-02-10G) = 71 у.е.</option>
	<script>
        da[51050] = new dataArray('sko/vidik/51050.html', '81');
    </script>
    <option value="51050">Sapphire HD6670 2Gb GDDR3 (11192-11-10G)  = 81 у.е.</option>

    <script>
        da[51017] = new dataArray('sko/vidik/51017.html', '96');
    </script>
    <option value="51017">Sapphire HD7750 2Gb GDDR3 (11202-13-10G) = 96 у.е.</option>
    <script>
        da[51018] = new dataArray('sko/vidik/51018.html', '211');
    </script>
    <option value="51018">Sapphire HD7850 2Gb GDDR5 (11200-07-20G) = 211 у.е.</option>
	<script>
        da[51051] = new dataArray('sko/vidik/51051.html', '231');
    </script>
    <option value="51051">Sapphire HD7850 OC 2Gb GDDR5 (11200-14-20G) = 231 у.е.</option>
	<script>
        da[51052] = new dataArray('sko/vidik/51052.html', '246');
    </script>
    <option value="51052">Sapphire HD7870 GHZ Edition 2Gb GDDR5 (11199-16-20G) = 246 у.е.</option>
	<script>
        da[51053] = new dataArray('sko/vidik/51053.html', '267');
    </script>
    <option value="51053">Sapphire HD7870 GHZ Edition OC 2Gb GDDR5 (11199-19-20G) = 267 у.е.</option>
	
	
	


</optgroup>

<optgroup label="-  - ATI 3GB PCI-E -  -">

    <script>
        da[51020] = new dataArray('sko/vidik/51020.html', '331');
    </script>
    <option value="51020">Sapphire HD7950 3Gb GDDR5 With Boost (11196-16-20G) = 331 у.е.</option>

    <script>
        da[51019] = new dataArray('sko/vidik/51019.html', '341');
    </script>
    <option value="51019">Sapphire HD7950 3Gb GDDR5 VAPOR-X (11196-09-40G) = 341 у.е.</option>

    <script>
        da[51021] = new dataArray('sko/vidik/51021.html', '423');
    </script>
    <option value="51021">Sapphire HD7970 3Gb GDDR5 (11197-11-40G) = 423 у.е.</option>
	<script>
        da[51054] = new dataArray('sko/vidik/51054.html', '457');
    </script>
    <option value="51054">Sapphire HD7950 3Gb GDDR5 MAC EDITION (11196-15-40G) = 457 у.е.</option>

</optgroup>

<optgroup label="- - nVidia 1GB PCI-E - -">

    <script>
        da[51022] = new dataArray('sko/vidik/51022.html', '42');
    </script>
    <option value="51022">Asus 210-1GD3-L 1Gb DDR3 = 42 у.е.</option>
<script>
        da[51055] = new dataArray('sko/vidik/51055.html', '51');
    </script>
    <option value="51055">Asus GT610-1GD3-L 1Gb GDDR3 = 51 у.е.</option>
    <script>
        da[516] = new dataArray('sko/vidik/516.html', '52');
    </script>
    <option value="516">Asus GT610-SL-1GD3-L 1Gb DDR3 = 52 у.е.</option>
	<script>
        da[51056] = new dataArray('sko/vidik/51056.html', '61');
    </script>
    <option value="51056">Asus GT620-1GD3-L-V2 1Gb DDR3 = 61 у.е.</option>
    <script>
        da[51023] = new dataArray('sko/vidik/51023.html', '84');
    </script>
    <option value="51023">Asus GT630-1GD5 1Gb DDR5 = 84 у.е.</option>

    <script>
        da[51024] = new dataArray('sko/vidik/51024.html', '119');
    </script>
    <option value="51024">Asus GTX650-E-1GD5 1Gb DDR5 = 119 у.е.</option>
	<script>
        da[51057] = new dataArray('sko/vidik/51057.html', '134');
    </script>
    <option value="51057">Asus GTX650-DC-1GD5 1Gb DDR5 = 134 у.е.</option>
	<script>
        da[51059] = new dataArray('sko/vidik/51059.html', '161');
    </script>
    <option value="51059">Asus GTX650TI-PH-1GD5 1Gb DDR5 = 161 у.е.</option>
    <script>
        da[51025] = new dataArray('sko/vidik/51025.html', '162');
    </script>
    <option value="51025">Asus GTX650 TI-1GD5 1Gb DDR5 = 162 у.е.</option>
	<script>
        da[51058] = new dataArray('sko/vidik/51058.html', '174');
    </script>
    <option value="51058">Asus GTX650TI-DC2O-1GD5 1Gb DDR5 = 174 у.е.</option>
    <script>
        da[51026] = new dataArray('sko/vidik/51026.html', '187');
    </script>
    <option value="51026">Asus GTX650TI-DC2T-1GD5 1Gb DDR5 = 187 у.е.</option>

    <script>
        da[517] = new dataArray('sko/vidik/517.html', '35');
    </script>
    <option value="517">Gigabyte GV-N210SL-1GI TC1Gb DDR3 HDMI+DVI = 35 у.е.</option>
	<script>
        da[51060] = new dataArray('sko/vidik/51060.html', '50');
    </script>
    <option value="51060">Gigabyte GV-N610SL-1GI 1Gb DDR3 = 50 у.е.</option>
	<script>
        da[51061] = new dataArray('sko/vidik/51061.html', '57');
    </script>
    <option value="51061">Gigabyte GV-N620D3-1GL 1Gb DDR3 = 57 у.е.</option>

    <script>
        da[51027] = new dataArray('sko/vidik/51027.html', '64');
    </script>
    <option value="51027">Gigabyte GV-N630-1GI 1Gb DDR3 = 64 у.е.</option>
    <script>
        da[51028] = new dataArray('sko/vidik/51028.html', '120');
    </script>
    <option value="51028">Gigabyte GV-N650OC-1GI 1Gb DDR5 = 120 у.е.</option>
    <script>
        da[51029] = new dataArray('sko/vidik/51029.html', '153');
    </script>
    <option value="51029">Gigabyte GV-N65TOC-1GI 1Gb DDR5 = 153 у.е.</option>
    <script>
        da[51030] = new dataArray('sko/vidik/51030.html', '45');
    </script>
    <option value="51030">MSI N610GT-MD1GD3/LP 1Gb DDR3 = 45 у.е.</option>
	<script>
        da[51062] = new dataArray('sko/vidik/51062.html', '58');
    </script>
    <option value="51062">MSI N620GT-MD1GD3/LP 1Gb DDR3 = 58 у.е.</option>

    <script>
        da[566] = new dataArray('sko/vidik/566.html', '41');
    </script>
    <option value="566">Palit GeForce GT210 1024Mb DDR3 64bit = 41 у.е.</option>

    <script>
        da[531] = new dataArray('sko/vidik/531.html', '47');
    </script>
    <option value="531">Palit GeForce GT520 1Gb DDR3 64bit = 47 у.е.</option>
    <script>
        da[568] = new dataArray('sko/vidik/568.html', '46');
    </script>
    <option value="568">Palit GeForce GT610 1Gb DDR3 64bit = 46 у.е.</option>
    <script>
        da[533] = new dataArray('sko/vidik/533.html', '58');
    </script>
    <option value="533">Palit GeForce GT620 1Gb DDR3 64bit = 58 у.е.</option>
    <script>
        da[526] = new dataArray('sko/vidik/526.html', '52');
    </script>
    <option value="526">Palit GeForce GT220 1Gb DDR3 HDMI+DVI = 52 у.е.</option>
    <script>
        da[532] = new dataArray('sko/vidik/532.html', '64');
    </script>
    <option value="532">Palit GeForce GT630 1Gb DDR3 128bit = 64 у.е.</option>
    <script>
        da[534] = new dataArray('sko/vidik/534.html', '75');
    </script>
    <option value="534">Palit GeForce GT630 1Gb DDR5 128bit = 75 у.е.</option>


    <script>
        da[530] = new dataArray('sko/vidik/530.html', '78');
    </script>
    <option value="530">Palit GeForce GT440 1Gb DDR5 = 78 у.е.</option>
    <script>
        da[535] = new dataArray('sko/vidik/534.html', '84');
    </script>
    <option value="535">Palit GeForce GT640 1Gb DDR3 128bit = 84 у.е.</option>


    <script>
        da[571] = new dataArray('sko/vidik/571.html', '111');
    </script>
    <option value="571">Palit GeForce GTX 650 1Gb DDR5 = 111 у.е.</option>
    <script>
        da[539] = new dataArray('sko/vidik/539.html', '114');
    </script>
    <option value="539">Palit GeForce GTX 550Ti 1Gb DDR5 = 114 у.е.</option>

    <script>
        da[572] = new dataArray('sko/vidik/572.html', '121');
    </script>
    <option value="572">Palit GeForce GTX 650 OC 1Gb DDR5 = 121 у.е.</option>
	<script>
        da[51063] = new dataArray('sko/vidik/51063.html', '145');
    </script>
    <option value="51063">Palit GeForce GTX 650Ti 1Gb DDR5(NE5X65T01301-1071F) = 145 у.е.</option>
	<script>
        da[51064] = new dataArray('sko/vidik/51064.html', '155');
    </script>
    <option value="51064">Palit GeForce GTX 650Ti OC 1Gb DDR5(NE5X65TS1301-1071F) = 155 у.е.</option>

    <script>
        da[544] = new dataArray('sko/vidik/544.html', '229');
    </script>
    <option value="544">Palit GeForce GTX 560Ti Sonic 1Gb DDR5 = 229 у.е.</option>


</optgroup>
<optgroup label="-  - nVidia 2GB PCI-E - -">


    <script>
        da[573] = new dataArray('sko/vidik/573.html', '56');
    </script>
    <option value="573">Asus GT610-SL-2GD3-L 2Gb GDDR3 = 56 у.е.</option>
	<script>
        da[51065] = new dataArray('sko/vidik/51065.html', '74');
    </script>
    <option value="51065">Asus GT620-DCSL-2GD3 = 74 у.е.</option>

    <script>
        da[574] = new dataArray('sko/vidik/574.html', '103');
    </script>
    <option value="574">Asus GT640-2GD3 2Gb GDDR3 = 103 у.е.</option>
    <script>
        da[51031] = new dataArray('sko/vidik/51031.html', '148');
    </script>
    <option value="51031">Asus GTX650-E-2GD5 2Gb GDDR5 = 148 у.е.</option>
	<script>
        da[51066] = new dataArray('sko/vidik/51066.html', '186');
    </script>
    <option value="51066">Asus GTX650TI-2GD5 2Gb GDDR5 = 186 у.е.</option>
<script>
        da[51068] = new dataArray('sko/vidik/51068.html', '236');
    </script>
    <option value="51068">Asus GTX660-DC2-2GD5 2Gb GDDR5 = 236 у.е.</option>
    <script>
        da[51032] = new dataArray('sko/vidik/51032.html', '260');
    </script>
    <option value="51032">Asus GTX660-DC2T-2GD5 2Gb GDDR5 = 260 у.е.</option>
	<script>
        da[51067] = new dataArray('sko/vidik/51067.html', '315');
    </script>
    <option value="51067">Asus GTX660 TI-DC2-2GD5 2Gb GDDR5 = 315 у.е.</option>
	<script>
        da[51069] = new dataArray('sko/vidik/51069.html', '334');
    </script>
    <option value="51069">Asus GTX660 TI-DC2T-2GD5 2Gb GDDR5 = 334 у.е.</option>
    <script>
        da[51033] = new dataArray('sko/vidik/51033.html', '440');
    </script>
    <option value="51033">Asus GTX670-DC2OG-2GD5 2Gb GDDR5 = 440 у.е.</option>

    <script>
        da[51034] = new dataArray('sko/vidik/51034.html', '56');
    </script>
    <option value="51034">GigaByte GV-N610D3-2GI 2Gb GDDR3 = 56 у.е.</option>

    <script>
        da[575] = new dataArray('sko/vidik/575.html', '73');
    </script>
    <option value="575">GigaByte GV-N630-2GI 2Gb GDDR3 = 73 у.е.</option>
    <script>
        da[576] = new dataArray('sko/vidik/576.html', '94');
    </script>
    <option value="576">GigaByte GV-N640OC-2GI 2Gb GDDR3 = 94 у.е.</option>
    <script>
        da[51035] = new dataArray('sko/vidik/51035.html', '140');
    </script>
    <option value="51035">GigaByte GV-N650OC-2GI 2Gb GDDR5 = 140 у.е.</option>

    <script>
        da[577] = new dataArray('sko/vidik/577.html', '214');
    </script>
    <option value="577">GigaByte GV-N660OC-2GD 2Gb GDDR5 = 214 у.е.</option>
    <script>
        da[51036] = new dataArray('sko/vidik/51036.html', '321');
    </script>
    <option value="51036">GigaByte GV-N66TOC-2GD 2Gb GDDR5 = 321 у.е.</option>
<script>
        da[51070] = new dataArray('sko/vidik/51070.html', '402');
    </script>
    <option value="51070">GigaByte GV-N670WF2-2GD 2Gb GDDR5 = 402 у.е.</option>

    <script>
        da[579] = new dataArray('sko/vidik/579.html', '415');
    </script>
    <option value="579">GigaByte GV-N670OC-2GD 2Gb GDDR5 = 415 у.е.</option>
    <script>
        da[51037] = new dataArray('sko/vidik/51037.html', '65');
    </script>
    <option value="51037">MSI N620GT-MD2GD3/LP 2Gb GDDR3 = 65 у.е.</option>
    <script>
        da[51038] = new dataArray('sko/vidik/51038.html', '431');
    </script>
    <option value="51038">MSI N670 PE 2GD5/OC 2Gb GDDR5 = 431 у.е.</option>
    <script>
        da[51039] = new dataArray('sko/vidik/51039.html', '562');
    </script>
    <option value="51039">MSI N680GTX Twin Frozr 2GD5/OC 2Gb GDDR5 = 562 у.е.</option>

    <script>
        da[549] = new dataArray('sko/vidik/549.html', '51');
    </script>
    <option value="549">Palit GeForce GT520 2Gb GDDR3 = 51 у.е.</option>
    <script>
        da[550] = new dataArray('sko/vidik/550.html', '52');
    </script>
    <option value="550">Palit GeForce GT610 2Gb GDDR3 = 52 у.е.</option>
    <script>
        da[551] = new dataArray('sko/vidik/551.html', '62');
    </script>
    <option value="551">Palit GeForce GT620 2Gb GDDR3 = 62 у.е.</option>
    <script>
        da[548] = new dataArray('sko/vidik/548.html', '61');
    </script>
    <option value="548">Palit GeForce GT430 2Gb GDDR3 = 61 у.е.</option>
    <script>
        da[582] = new dataArray('sko/vidik/582.html', '67');
    </script>
    <option value="582">Palit GeForce GT440 2Gb GDDR3 = 67 у.е.</option>

    <script>
        da[583] = new dataArray('sko/vidik/583.html', '67');
    </script>
    <option value="583">Palit GeForce GT630 2Gb GDDR3 = 67 у.е.</option>

    <script>
        da[552] = new dataArray('sko/vidik/552.html', '90');
    </script>
    <option value="552">Palit GeForce GT640 2Gb GDDR3 = 90 у.е.</option>


    <script>
        da[584] = new dataArray('sko/vidik/584.html', '130');
    </script>
    <option value="584">Palit GeForce GTX650 2Gb GDDR5 = 130 у.е.</option>
	<script>
        da[51071] = new dataArray('sko/vidik/51071.html', '175');
    </script>
    <option value="51071">Palit GeForce GTX650Ti 2Gb GDDR5(NE5X65T01341-1072F) = 175 у.е.</option>
	<script>
        da[51072] = new dataArray('sko/vidik/51072.html', '183');
    </script>
    <option value="51072">Palit GeForce GTX650Ti Boost 2Gb GDDR5(NE5X65B01049-1060F) = 183 у.е.</option>
	<script>
        da[51073] = new dataArray('sko/vidik/51073.html', '193');
    </script>
    <option value="51073">Palit GeForce GTX650Ti Boost OC 2Gb GDDR5(NE5X65BS1049-1060F) = 193 у.е.</option>

    <script>
        da[585] = new dataArray('sko/vidik/585.html', '218');
    </script>
    <option value="585">Palit GeForce GTX660 2Gb GDDR5 = 218 у.е.</option>

    <script>
        da[587] = new dataArray('sko/vidik/587.html', '295');
    </script>
    <option value="587">Palit GeForce GTX660Ti 2Gb GDDR5 = 295 у.е.</option>
    <script>
        da[588] = new dataArray('sko/vidik/588.html', '302');
    </script>
    <option value="588">Palit GeForce GTX660Ti JETSTREAM 2Gb GDDR5 = 302 у.е.</option>
	<script>
        da[51074] = new dataArray('sko/vidik/51074.html', '372');
    </script>
    <option value="51074">Palit GeForce GTX670 2Gb GDDR5(NE5X67001042-1042F) = 372 у.е.</option>
	<script>
        da[51075] = new dataArray('sko/vidik/51075.html', '399');
    </script>
    <option value="51075">Palit GeForce GTX670 2Gb GDDR5 JetStream(NE5X670H1042-1042J) = 399 у.е.</option>

    <script>
        da[557] = new dataArray('sko/vidik/557.html', '515');
    </script>
    <option value="557">Palit GeForce GTX680 2Gb GDDR5 JetStream = 515 у.е.</option>
	
	
	<script>
        da[51078] = new dataArray('sko/vidik/51078.html', '264');
    </script>
    <option value="51078">Palit GeForce GTX760 2Gb GDDR5 (NE5X76001042-1042F) = 264 у.е.</option>
	 <script>
        da[51079] = new dataArray('sko/vidik/51079.html', '278');
    </script>
    <option value="51079">Palit GeForce GTX760 2Gb GDDR5 JETSTREAM (NE5X760H1042-1042J) = 278 у.е.</option>
	 <script>
        da[51080] = new dataArray('sko/vidik/51080.html', '414');
    </script>
    <option value="51080">Palit GeForce GTX770 2Gb GDDR5  (NE5X77001042-1045F) = 414 у.е.</option>
	 <script>
        da[51081] = new dataArray('sko/vidik/51081.html', '429');
    </script>
    <option value="51081">Palit GeForce GTX770 2Gb GDDR5 JETSTREAM  (NE5X770H1042-1045J) = 429 у.е.</option>
	
	
</optgroup>
<optgroup label="-  - nVidia 3GB PCI-E - -">

 <script>
        da[51082] = new dataArray('sko/vidik/51082.html', '308');
    </script>
    <option value="51082">Asus GTX660 TI-DC2-3GD5 3GB GDDR5 = 308 у.е.</option>
	<script>
        da[51083] = new dataArray('sko/vidik/51083.html', '331');
    </script>
    <option value="51083">Asus GTX660 TI-DC2OC-3GD5 3GB GDDR5 = 331 у.е.</option>
	 <script>
        da[51040] = new dataArray('sko/vidik/51040.html', '349');
    </script>
    <option value="51040">GigaByte GV-N66TOC-3GD 3GB GDDR5 = 349 у.е.</option>
    <script>
        da[51041] = new dataArray('sko/vidik/51041.html', '380');
    </script>
    <option value="51041">MSI N660Ti TF 3GD5/OC 3GB GDDR5 = 380 у.е.</option>
	<script>
        da[51084] = new dataArray('sko/vidik/51084.html', '674');
    </script>
    <option value="51084">Palit GeForce GTX780 3GB GDDR5 (NE5X780010FB-P2083F) = 674 у.е.</option>
	<script>
        da[51085] = new dataArray('sko/vidik/51085.html', '666');
    </script>
    <option value="51085">Palit GeForce GTX780 JETSTREAM 3GB GDDR5(NE5X780H10FB-1100J) = 666 у.е.</option>
	<script>
        da[51086] = new dataArray('sko/vidik/51086.html', '684');
    </script>
    <option value="51086">Palit GeForce GTX780 SUPER JETSTREAM 3GB GDDR5(NE5X780T10FB-1100J) = 684 у.е.</option>
	
	

   
</optgroup>
<
<optgroup label="-  - nVidia 4GB PCI-E - -">

    <script>
        da[51042] = new dataArray('sko/vidik/51042.html', '86');
    </script>
    <option value="51042">Asus GT630-4GD3 4Gb GDDR3 = 86 у.е.</option>
	<script>
        da[51089] = new dataArray('sko/vidik/51089.html', '447');
    </script>
    <option value="51089">Palit GeForce GTX770 4Gb GDDR5 JetStream (NE5X770010G2-1041J) = 447 у.е.</option>
	<script>
        da[51076] = new dataArray('sko/vidik/51076.html', '467');
    </script>
    <option value="51076">GigaByte GV-N670OC-4GD 4Gb GDDR5 = 467 у.е.</option>

    <script>
        da[51043] = new dataArray('sko/vidik/51043.html', '524');
    </script>
    <option value="51043">Asus GTX670-DC2G-4GD5 4Gb GDDR5 = 524 у.е.</option>
	<script>
        da[51088] = new dataArray('sko/vidik/51088.html', '557');
    </script>
    <option value="51088">GigaByte GV-N680OC-4GD 4Gb GDDR5 = 557 у.е.</option>
	
	<script>
        da[51077] = new dataArray('sko/vidik/51077.html', '561');
    </script>
    <option value="51077">Palit GeForce GTX680 4Gb GDDR5 JetStream (NE5X680010G2-1041J) = 561 у.е.</option>
	<script>
        da[51087] = new dataArray('sko/vidik/51087.html', '598');
    </script>
    <option value="51087">Asus GTX680-DC2-4GD5 4Gb GDDR5 = 598 у.е.</option>
	
	


</optgroup>

</select>
<a href="#" id="inf5" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                    title="Описание"/></a></td>
<td class="tac" id="kol5" style="display:none">
    <input id="tovkol5" onchange="addconf('5');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent5" style="display:none"></td>
</tr>
<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel6" type="hidden"/>
<input id="kolval6" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Жёсткие диски" id="tov6" onchange="addconf('6');">
<option value="0">Жёсткие диски</option>

<optgroup label="- - SATA II(III) - -">
    <script>
        da[61] = new dataArray('sko/venik/61.html', '72');
    </script>
    <option value="61">1000GB Hitachi HDS721010CLA332 = 72 у.е.</option>
	<script>
        da[6112] = new dataArray('sko/venik/6112.html', '75');
    </script>
    <option value="6112">1000GB Seagate ST1000DM003 (SATA3-600) = 75 у.е.</option>
	<script>
        da[6116] = new dataArray('sko/venik/6116.html', '75');
    </script>
    <option value="6116">1000GB WD WD10EZEX (SATA3-600) = 75 у.е.</option>
<script>
        da[6115] = new dataArray('sko/venik/6115.html', '86');
    </script>
    <option value="6115">1000GB WD WD10EFRX (SATA3-600) = 86 у.е.</option>
    <script>
        da[691] = new dataArray('sko/venik/691.html', '88');
    </script>
    <option value="691">1000GB Hitachi HUA722010CLA330 (Raid Edition) = 88 у.е.</option>
	<script>
        da[6114] = new dataArray('sko/venik/6114.html', '92');
    </script>
    <option value="6114">1000GB WD WD1003FBYX (для сервера) = 92 у.е.</option>
	<script>
        da[6113] = new dataArray('sko/venik/6113.html', '97');
    </script>
    <option value="6113">1000GB WD WD1002FAEX (SATA3-600) = 97 у.е.</option>

    <script>
        da[66] = new dataArray('sko/venik/66.html', '100');
    </script>
    <option value="66">1000GB Seagate ST1000NM0011 (SATA3-600) (для сервера) = 100 у.е.</option>

    <script>
        da[680] = new dataArray('sko/venik/680.html', '75');
    </script>
    <option value="680">1000GB WD WD10EARX (SATA3-600) = 75 у.е.</option>

    <script>
        da[681] = new dataArray('sko/venik/681.html', '85');
    </script>
    <option value="681">1000GB WD WD10EURX (SATA3-600) = 85 у.е.</option>

    <script>
        da[679] = new dataArray('sko/venik/679.html', '88');
    </script>
    <option value="679">1000GB WD WD10EALX (SATA3-600) = 88 у.е.</option>
    <script>
        da[693] = new dataArray('sko/venik/693.html', '236');
    </script>
    <option value="693">1000GB WD WD1000DHTZ (SATA3-600) (для сервера) = 236 у.е.</option>

    <script>
        da[692] = new dataArray('sko/venik/692.html', '76');
    </script>
    <option value="692">1000GB Toshiba DT01ACA100 (SATA3-600) = 76 у.е.</option>
<script>
        da[6117] = new dataArray('sko/venik/6117.html', '89');
    </script>
    <option value="6117">1500GB Seagate ST1500DM003 (SATA3-600) = 89 у.е.</option>
	<script>
        da[6118] = new dataArray('sko/venik/6118.html', '91');
    </script>
    <option value="6118">1500GB WD WD15EARX (SATA3-600) = 91 у.е.</option>
    <script>
        da[613] = new dataArray('sko/venik/613.html', '106');
    </script>
    <option value="613">1500GB WD WD15EARS = 106 у.е.</option>
      <script>
        da[614] = new dataArray('sko/venik/614.html', '131');
    </script>
    <option value="614">150GB WD WD1500HLHX (SATA3-600) (для сервера) = 131 у.е.</option>
	
	<script>
        da[694] = new dataArray('sko/venik/694.html', '154');
    </script>
    <option value="694">1500GB WD WD1502FAEX (SATA3-600) = 154 у.е.</option>
  

    <script>
        da[695] = new dataArray('sko/venik/695.html', '98');
    </script>
    <option value="695">2TB Hitachi HDS5C3020ALA632 (SATA3-600) = 98 у.е.</option>
    <script>
        da[684] = new dataArray('sko/venik/684.html', '98');
    </script>
    <option value="684">2TB Seagate ST2000DM001 (SATA3-600) = 98 у.е.</option>
<script>
        da[6119] = new dataArray('sko/venik/6119.html', '166');
    </script>
    <option value="6119">2TB Seagate ST32000645NS (SATA3-600) = 166 у.е.</option>
    <script>
        da[696] = new dataArray('sko/venik/696.html', '190');
    </script>
    <option value="696">2TB Seagate ST2000NM0011 (SATA3-600. для сервера) = 190 у.е.</option>

    <script>
        da[685] = new dataArray('sko/venik/685.html', '96');
    </script>
    <option value="685">2TB WD WD20EARX (SATA3-600) = 96 у.е.</option>

    <script>
        da[619] = new dataArray('sko/venik/619.html', '162');
    </script>
    <option value="619">2TB WD WD2002FAEX (SATA3-600) = 162 у.е.</option>
<script>
        da[6123] = new dataArray('sko/venik/6123.html', '96');
    </script>
    <option value="6123">2TB WD WD20EZRX (SATA3-600) = 96 у.е.</option>
   
	<script>
        da[6122] = new dataArray('sko/venik/6122.html', '120');
    </script>
    <option value="6122">2TB WD WD20EURS = 120 у.е.</option>
	<script>
        da[6121] = new dataArray('sko/venik/6121.html', '126');
    </script>
    <option value="6121">2TB WD WD20EFRX (SATA3-600) = 126 у.е.</option>
	
	<script>
        da[6120] = new dataArray('sko/venik/6120.html', '162');
    </script>
    <option value="6120">2TB WD WD2003FYYS = 162 у.е.</option>
	
     <script>
        da[697] = new dataArray('sko/venik/697.html', '100');
    </script>
    <option value="697">2TB Toshiba DT01ACA200 (SATA3-600) = 100 у.е.</option>
	
	<script>
        da[686] = new dataArray('sko/venik/686.html', '167');
    </script>
    <option value="686">300GB WD WD3000HLFS (для сервера) = 167 у.е.</option>


    <script>
        da[621] = new dataArray('sko/venik/621.html', '63');
    </script>
    <option value="621">320Gb Seagate ST320DM000 (SATA3-600) = 63 у.е.</option>

    <script>
        da[624] = new dataArray('sko/venik/624.html', '81');
    </script>
    <option value="624">320Gb WD WD3200AVKX (SATA3-600) = 81 у.е.</option>
    <script>
        da[628] = new dataArray('sko/venik/628.html', '62');
    </script>
    <option value="628">500GB Hitachi HDS721050CLA362 = 62 у.е.</option>
      <script>
        da[629] = new dataArray('sko/venik/629.html', '62');
    </script>
    <option value="629">500GB Seagate ST500DM005 (SATA3-600) = 62 у.е.</option>
	
	<script>
        da[631] = new dataArray('sko/venik/631.html', '63');
    </script>
    <option value="631">500GB WD WD5000AAKX (SATA3-600) = 63 у.е.</option>
   <script>
        da[6109] = new dataArray('sko/venik/6109.html', '74');
    </script>
    <option value="6109">500GB WD WD5003AZEX (SATA3-600) = 74 у.е.</option>

    <script>
        da[632] = new dataArray('sko/venik/632.html', '75');
    </script>
    <option value="632">500GB WD WD5000AUDX (SATA3-600) = 75 у.е.</option>
    <script>
        da[689] = new dataArray('sko/venik/689.html', '84');
    </script>
    <option value="689">500GB Hitachi HUA722050CLA330 (для сервера) = 84 у.е.</option>


    <script>
        da[630] = new dataArray('sko/venik/630.html', '91');
    </script>
    <option value="630">500GB Seagate ST500NM0011 (SATA3-600) (для сервера) = 91 у.е.</option>
	 <script>
        da[6110] = new dataArray('sko/venik/6110.html', '92');
    </script>
    <option value="6110">500GB WD WD5003ABYX = 92 у.е.</option>
    <script>
        da[690] = new dataArray('sko/venik/690.html', '163');
    </script>
    <option value="690">500GB Seagate ST3500320AS = 163 у.е.</option>


    <script>
        da[636] = new dataArray('sko/venik/636.html', '150');
    </script>
    <option value="636">600GB WD WD6000HLHX (для сервера) = 150 у.е.</option>
	<script>
        da[6111] = new dataArray('sko/venik/6111.html', '91');
    </script>
    <option value="6111">750GB WD WD7500AZEX (SATA3-600) = 91 у.е.</option>
	
    <script>
        da[627] = new dataArray('sko/venik/627.html', '141');
    </script>
    <option value="627">3TB WD WD30EZRX (SATA3-600) = 141 у.е.</option>


    <script>
        da[625] = new dataArray('sko/venik/625.html', '141');
    </script>
    <option value="625">3TB Seagate ST3000DM001 (SATA3-600) = 141 у.е.</option>
<script>
        da[699] = new dataArray('sko/venik/699.html', '143');
    </script>
    <option value="699">3TB Toshiba DT01ACA300 (SATA3-600) = 143 у.е.</option>
    <script>
        da[626] = new dataArray('sko/venik/626.html', '161');
    </script>
    <option value="626">3TB Seagate ST3000VX000 (SATA3-600) = 161 у.е.</option>
	<script>
        da[6124] = new dataArray('sko/venik/6124.html', '251');
    </script>
    <option value="6124">3TB Hitachi HUA723030ALA640 (SATA3-600) = 251 у.е.</option>
    <script>
        da[698] = new dataArray('sko/venik/698.html', '265');
    </script>
    <option value="698">3TB Seagate ST33000650NS (SATA3-600. для сервера) = 265 у.е.</option>
	<script>
        da[6125] = new dataArray('sko/venik/6125.html', '291');
    </script>
    <option value="6125">4TB WD WD4001FAEX (SATA3-600) = 291 у.е.</option>
    


</optgroup>


<optgroup label="-  - SSD -  -">


    <script>
        da[655] = new dataArray('sko/venik/655.html', '188');
    </script>
    <option value="655">OCZ Agility 3 240GB AGT3-25SAT3-240G = 188 у.е.</option>
   <script>
        da[659] = new dataArray('sko/venik/659.html', '202');
    </script>
    <option value="659">OCZ Agility 4 256GB AGT4-25SAT3-256G = 202 у.е.</option>
    <script>
        da[6101] = new dataArray('sko/venik/6101.html', '387');
    </script>
    <option value="6101">OCZ Agility 3 512GB AGT3-25SAT3-512G = 387 у.е.</option>
 <script>
        da[6132] = new dataArray('sko/venik/6132.html', '141');
    </script>
    <option value="6132">OCZ Deneva 2C 60GB D2CSTK251A20-0060 = 141 у.е.</option>
    <script>
        da[6126] = new dataArray('sko/venik/6126.html', '167');
    </script>
    <option value="6126">OCZ Deneva 2C 120GB D2CSTK251A20-0120 = 167 у.е.</option>
	 <script>
        da[6128] = new dataArray('sko/venik/6128.html', '230');
    </script>
    <option value="6128">OCZ Deneva 2C 120GB D2CSTK251M21-0120 = 230 у.е.</option>
	 <script>
        da[6127] = new dataArray('sko/venik/6127.html', '307');
    </script>
    <option value="6127">OCZ Deneva 2C 120GB D2CSTK251M14-0120 = 307 у.е.</option>
	<script>
        da[6129] = new dataArray('sko/venik/6129.html', '221');
    </script>
    <option value="6129">OCZ Deneva 2C 180GB D2CSTK251A20-0180 = 221 у.е.</option>
	<script>
        da[6130] = new dataArray('sko/venik/6130.html', '365');
    </script>
    <option value="6130">OCZ Deneva 2C 240GB D2CSTK251M21-0240 = 365 у.е.</option>
	<script>
        da[6131] = new dataArray('sko/venik/6131.html', '547');
    </script>
    <option value="6131">OCZ Deneva 2C 240GB D2CSTK251M14-0240 = 547 у.е.</option>
	<script>
        da[6133] = new dataArray('sko/venik/6133.html', '130');
    </script>
    <option value="6133">OCZ Nocti 120GB NOC-MSATA-120G = 130 у.е.</option>
	

    <script>
        da[6102] = new dataArray('sko/venik/6102.html', '158');
    </script>
    <option value="6102">OCZ Vector 128GB VTR1-25SAT3-128G = 158 у.е.</option>
    <script>
        da[6103] = new dataArray('sko/venik/6103.html', '279');
    </script>
    <option value="6103">OCZ Vector 256GB VTR1-25SAT3-256G = 279 у.е.</option>

    

    <script>
        da[674] = new dataArray('sko/venik/674.html', '124');
    </script>
    <option value="674">OCZ Vertex 3 Max IOPS 120GB VTX3MI-25SAT3-120G = 124 у.е.</option>
<script>
        da[6134] = new dataArray('sko/venik/6134.html', '133');
    </script>
    <option value="6134">OCZ Vertex 3 120GB VTX3-25SAT3-120G = 133 у.е.</option>
	
	<script>
        da[671] = new dataArray('sko/venik/671.html', '210');
    </script>
    <option value="671">OCZ Vertex 3 240GB VTX3-25SAT3-240G = 210 у.е.</option>
    <script>
        da[675] = new dataArray('sko/venik/675.html', '225');
    </script>
    <option value="675">OCZ Vertex 3 Max IOPS 240GB VTX3MI-25SAT3-240G = 225 у.е.</option>
    <script>
        da[6104] = new dataArray('sko/venik/6104.html', '431');
    </script>
    <option value="6104">OCZ Vertex 3 480GB VTX3-25SAT3-480G = 431 у.е.</option>
	<script>
        da[677] = new dataArray('sko/venik/677.html', '83');
    </script>
    <option value="677">OCZ Vertex 4 64GB VTX4-25SAT3-64G = 83 у.е.</option>

    <script>
        da[6105] = new dataArray('sko/venik/6105.html', '147');
    </script>
    <option value="6105">OCZ Vertex 4 128GB VTX4-25SAT3-128G = 147 у.е.</option>
    <script>
        da[676] = new dataArray('sko/venik/676.html', '251');
    </script>
    <option value="676">OCZ Vertex 4 256GB VTX4-25SAT3-256G = 251 у.е.</option>
	<script>
        da[6135] = new dataArray('sko/venik/6135.html', '447');
    </script>
    <option value="6135">OCZ Vertex 4 512GB VTX4-25SAT3-512G = 447 у.е.</option>
	<script>
        da[6136] = new dataArray('sko/venik/6136.html', '181');
    </script>
    <option value="6136">OCZ Vertex Plus R2 240GB VTXPLR2-25SAT2-240G = 181 у.е.</option>

    <script>
        da[6106] = new dataArray('sko/venik/6106.html', '124');
    </script>
    <option value="6106">Plextor 128GB PX-128M5 = 124 у.е.</option>
	<script>
        da[6137] = new dataArray('sko/venik/6137.html', '151');
    </script>
    <option value="6137">Plextor 128GB PX-128M5P = 151 у.е.</option>

    <script>
        da[6107] = new dataArray('sko/venik/6107.html', '198');
    </script>
    <option value="6107">Plextor 256GB PX-256M5 = 198 у.е.</option>
	<script>
        da[6138] = new dataArray('sko/venik/6138.html', '221');
    </script>
    <option value="6138">Plextor 256GB PX-256M5M (mSATA) = 221 у.е.</option>
	<script>
        da[6139] = new dataArray('sko/venik/6139.html', '261');
    </script>
    <option value="6139">Plextor 256GB PX-256M5P = 261 у.е.</option>

    <script>
        da[6108] = new dataArray('sko/venik/6108.html', '442');
    </script>
    <option value="6108">Plextor 512GB PX-512M5P = 442 у.е.</option>


</optgroup>
</select>
<a href="#" id="inf6" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                    title="Описание"/></a></td>
<td class="tac" id="kol6" style="display:none">
    <input id="tovkol6" onchange="addconf('6');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent6" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel7" type="hidden"/>
        <input id="kolval7" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Оптический привод" id="tov7" onchange="addconf('7');">
            <option value="0">Оптический привод</option>

            <optgroup label="- - DVD-RW SATA - -">

 <script>
                    da[71] = new dataArray('sko/privod/71.html', '21');
                </script>
                <option value="71">Lite-On iHAS124-04 Black (SATA) = 21 у.е.</option>
                 <script>
                    da[76] = new dataArray('sko/privod/76.html', '23');
                </script>
                <option value="76">Samsung SATA SH-S224BB/BEBE Black = 23 у.е.</option>
				 <script>
                    da[74] = new dataArray('sko/privod/74.html', '25');
                </script>
                <option value="74">Nec SATA AD-7280S-0S = 25 у.е.</option>
				
				<script>
                    da[72] = new dataArray('sko/privod/72.html', '27');
                </script>
                <option value="72">Asus SATA DRW-24ST Black = 27 у.е.</option>

				
				<script>
                    da[75] = new dataArray('sko/privod/75.html', '32');
                </script>
                <option value="75">Plextor PX-891SA Black (SATA) = 32 у.е.</option>
				


            </optgroup>
        </select>
        <a href="#" id="inf7" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                            alt="info"
                                                                                            title="Описание"/></a></td>
    <td class="tac" id="kol7" style="display:none">
        <input id="tovkol7" onchange="addconf('7');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent7" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel8" type="hidden"/>
<input id="kolval8" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Корпус" id="tov8" onchange="addconf('8');">
<option value="0">Корпус</option>

<optgroup label="- - Cooler Master - -">


    <script>
        da[851] = new dataArray('sko/korp/851.html', '67');
    </script>
    <option value="851">Cooler Master Elite 250 (RC-250-KKP500) 500W Black = 67 у.е.</option>
    <script>
        da[848] = new dataArray('sko/korp/848.html', '90');
    </script>
    <option value="848">Cooler Master Elite 344 (RC-344-BKP500-N1) 500W = 90 у.е.</option>
    <script>
        da[87] = new dataArray('sko/korp/87.html', '93');
    </script>
    <option value="87">Cooler Master Elite 371 (RC-371-KKP500) 500W Black = 93 у.е.</option>
    <script>
        da[849] = new dataArray('sko/korp/849.html', '93');
    </script>
    <option value="849">Cooler Master Elite 370 (RC-370-KKP500) 500W Black = 93 у.е.</option>

    <script>
        da[86] = new dataArray('sko/korp/86.html', '95');
    </script>
    <option value="86">Cooler Master Elite 334U (RC-334U-KKP500) 500W Black = 95 у.е.</option>
    <script>
        da[850] = new dataArray('sko/korp/850.html', '95');
    </script>
    <option value="850">Cooler Master Elite 372 (RC-372-KKP500) 500W Black = 95 у.е.</option>

    <script>
        da[85] = new dataArray('sko/korp/85.html', '97');
    </script>
    <option value="85">Cooler Master Elite 330U (RC-330U-KKP500-BK) 500W Black = 97 у.е.</option>

    <script>
        da[852] = new dataArray('sko/korp/852.html', '110');
    </script>
    <option value="852">Cooler Master Elite 311 500W Black = 110 у.е.</option>
    <script>
        da[853] = new dataArray('sko/korp/853.html', '116');
    </script>
    <option value="853">Cooler Master Elite 431 (RC-431K-KWA500) 500W Black = 116 у.е.</option>


    <script>
        da[819] = new dataArray('sko/korp/819.html', '131');
    </script>
    <option value="819">Cooler Master USP 100 (RC-P100-KKPL) = 131 у.е.</option>


</optgroup>


<optgroup label="- - Cooler Master без блока питания- -">

    <script>
        da[854] = new dataArray('sko/korp/854.html', '39');
    </script>
    <option value="854">Cooler Master CMP 350 (RC-350-KKN1) Black = 39 у.е.</option>
    <script>
        da[855] = new dataArray('sko/korp/855.html', '50');
    </script>
    <option value="855">Cooler Master Elite 344(RC-344-PKN1) Black & Purple = 50 у.е.</option>
    <script>
        da[856] = new dataArray('sko/korp/856.html', '55');
    </script>
    <option value="856">Cooler Master K280 (RC-K280-KKN1) Black = 55 у.е.</option>
    <script>
        da[857] = new dataArray('sko/korp/857.html', '81');
    </script>
    <option value="857">Cooler Master Centurion 534 Light (RC-534-KKNA-GP) Black = 81 у.е.</option>

    <script>
        da[88] = new dataArray('sko/korp/88.html', '82');
    </script>
    <option value="88">Cooler Master Gladiator 600 (RC-600-KKN1-GP) Black = 82 у.е.</option>

    <script>
        da[84] = new dataArray('sko/korp/84.html', '89');
    </script>
    <option value="84">Cooler Master Centurion 5 (RC-502-KKN1) Black = 89 у.е.</option>

    <script>
        da[814] = new dataArray('sko/korp/814.html', '98');
    </script>
    <option value="814">Cooler Master Sileo 500 (RC-500-KKN1-GP) Black = 98 у.е.</option>
    <script>
        da[89] = new dataArray('sko/korp/89.html', '115');
    </script>
    <option value="89">Cooler Master HAF 912 (RC-912-KKN1) Black = 115 у.е.</option>
    <script>
        da[813] = new dataArray('sko/korp/813.html', '120');
    </script>
    <option value="813">Cooler Master HAF 912 Plus (RC-912P-KKN1) = 120 у.е.</option>
    <script>
        da[812] = new dataArray('sko/korp/812.html', '192');
    </script>
    <option value="812">Cooler Master HAF XM (RC-922XM-KKN1) = 192 у.е.</option>
    <script>
        da[81] = new dataArray('sko/korp/81.html', '125');
    </script>
    <option value="81">Cooler Master CM 690 II Advanced USB 3.0 (RC-692A-KKN5) Black = 125 у.е.</option>
    <script>
        da[83] = new dataArray('sko/korp/83.html', '131');
    </script>
    <option value="83">Cooler Master CM 690 II Basic (RC-692B-KKN5) Black = 131 у.е.</option>

    <script>
        da[858] = new dataArray('sko/korp/858.html', '147');
    </script>
    <option value="858">Cooler Master HAF XB (RC-902XB-KKN1) = 147 у.е.</option>


    <script>
        da[82] = new dataArray('sko/korp/82.html', '152');
    </script>
    <option value="82">Cooler Master CM 690 II Advanced USB 3.0 (RC-692A-KWN5) Black = 152 у.е.</option>
    <script>
        da[859] = new dataArray('sko/korp/859.html', '176');
    </script>
    <option value="859">Cooler Master HAF XM (RC-922XM-KKN1) Black = 176 у.е.</option>

    <script>
        da[817] = new dataArray('sko/korp/817.html', '178');
    </script>
    <option value="817">Cooler Master Storm Sniper (SGC-6000-KXN1-GP) Black = 178 у.е.</option>


    <script>
        da[816] = new dataArray('sko/korp/816.html', '214');
    </script>
    <option value="816">Cooler Master Storm Sniper (SGC-6000-KWN1-GP) Black = 214 у.е.</option>


    <script>
        da[860] = new dataArray('sko/korp/860.html', '238');
    </script>
    <option value="860">Cooler Master Silencio 650 (RC-650-KKN1) Black = 238 у.е.</option>


</optgroup>

<optgroup label="-  - Deluxe -  -">


    <script>
        da[821] = new dataArray('sko/korp/821.html', '36');
    </script>
    <option value="821">Delux DLC-MV871 450W = 36 у.е.</option>

    <script>
        da[846] = new dataArray('sko/korp/846.html', '36');
    </script>
    <option value="846">Delux DLC-MV873 450W = 36 у.е.</option>
    <script>
        da[861] = new dataArray('sko/korp/861.html', '37');
    </script>
    <option value="861">Delux DLC-MV427 450W = 37 у.е.</option>
    <script>
        da[820] = new dataArray('sko/korp/820.html', '38');
    </script>
    <option value="820">Delux DLC-MV875 400W = 38 у.е.</option>


    <script>
        da[847] = new dataArray('sko/korp/847.html', '39');
    </script>
    <option value="847">Delux DLC-MV873 500W = 39 у.е.</option>
    <script>
        da[822] = new dataArray('sko/korp/822.html', '47');
    </script>
    <option value="822">Delux DLC-MU305 500W = 47 у.е.</option>

</optgroup>

<optgroup label="-  -  FST -  -">


    <script>
        da[823] = new dataArray('sko/korp/823.html', '35');
    </script>
    <option value="823">FST 912 400W Black = 35 у.е.</option>

    <script>
        da[824] = new dataArray('sko/korp/824.html', '37');
    </script>
    <option value="824">FST 912 450W Black = 37 у.е.</option>
    <script>
        da[826] = new dataArray('sko/korp/826.html', '37');
    </script>
    <option value="826">FST K6 450W Black = 37 у.е.</option>
    <script>
        da[825] = new dataArray('sko/korp/825.html', '45');
    </script>
    <option value="825">FST I3 500W Black = 45 у.е.</option>


</optgroup>

<optgroup label="-  - Inwin -  -">


    <script>
        da[841] = new dataArray('sko/korp/841.html', '66');
    </script>
    <option value="841">InWin EC021T 450W Black (ATX) = 66 у.е.</option>
    <script>
        da[836] = new dataArray('sko/korp/836.html', '73');
    </script>
    <option value="836">InWin EAR001T 450W Black+Silver (ATX) = 73 у.е.</option>

    <script>
        da[862] = new dataArray('sko/korp/862.html', '76');
    </script>
    <option value="862">InWin EAR002T 450W Black+Silver (S450HQ7-0) = 76 у.е.</option>
    <script>
        da[864] = new dataArray('sko/korp/864.html', '77');
    </script>
    <option value="864">InWin EAR010 450W Black-Silver = 77 у.е.</option>
    <script>
        da[839] = new dataArray('sko/korp/839.html', '80');
    </script>
    <option value="839">InWin EAR006T 450W Black+Silver (ATX) = 80 у.е.</option>


    <script>
        da[835] = new dataArray('sko/korp/835.html', '81');
    </script>
    <option value="835">InWin C720T 450W Black+Silver (ATX) = 81 у.е.</option>
    <script>
        da[829] = new dataArray('sko/korp/829.html', '82');
    </script>
    <option value="829">InWin C583T 450W Black+Silver (ATX) = 82 у.е.</option>
    <script>
        da[831] = new dataArray('sko/korp/831.html', '83');
    </script>
    <option value="831">InWin C589T 450W Black+Silver (ATX) = 83 у.е.</option>
    <script>
        da[863] = new dataArray('sko/korp/863.html', '91');
    </script>
    <option value="863">InWin EAR001 500W Black-Silver (IP-S500AQ3) = 91 у.е.</option>
    <script>
        da[866] = new dataArray('sko/korp/866.html', '93');
    </script>
    <option value="866">InWin J-619 450W Black = 93 у.е.</option>
    <script>
        da[867] = new dataArray('sko/korp/867.html', '132');
    </script>
    <option value="867">InWin MG134BL 600W Black = 132 у.е.</option>
    <script>
        da[868] = new dataArray('sko/korp/868.html', '132');
    </script>
    <option value="868">InWin MG136 600W Black-White = 132 у.е.</option>
    <script>
        da[869] = new dataArray('sko/korp/869.html', '132');
    </script>
    <option value="869">InWin MG136BL 600W Black = 132 у.е.</option>
    <script>
        da[865] = new dataArray('sko/korp/865.html', '142');
    </script>
    <option value="865">InWin J614TA-F430 450W Red = 142 у.е.</option>

</optgroup>
<optgroup label="-  - InWin без блока питания -  -">


    <script>
        da[842] = new dataArray('sko/korp/842.html', '32');
    </script>
    <option value="842">InWin EC027T = 32 у.е.</option>
    <script>
        da[844] = new dataArray('sko/korp/844.html', '32');
    </script>
    <option value="844">InWin EN022T = 32 у.е.</option>
    <script>
        da[870] = new dataArray('sko/korp/870.html', '35');
    </script>
    <option value="870">InWin CC-1801 Black-Flower = 35 у.е.</option>
    <script>
        da[871] = new dataArray('sko/korp/871.html', '86');
    </script>
    <option value="871">InWin BR-661 Dragon Slayer = 86 у.е.</option>
    <script>
        da[872] = new dataArray('sko/korp/872.html', '89');
    </script>
    <option value="872">InWin J-607 Silver = 89 у.е.</option>
    <script>
        da[873] = new dataArray('sko/korp/873.html', '89');
    </script>
    <option value="873">InWin J-614TA Red = 89 у.е.</option>
    <script>
        da[874] = new dataArray('sko/korp/874.html', '89');
    </script>
    <option value="874">InWin J-632 Black/Silver = 89 у.е.</option>
    <script>
        da[875] = new dataArray('sko/korp/875.html', '106');
    </script>
    <option value="875">InWin J-632 Gundam Black = 106 у.е.</option>

</optgroup>
<optgroup label="-  - Pola -  -">

    <script>
        da[876] = new dataArray('sko/korp/876.html', '35');
    </script>
    <option value="876">Pola 2801BS-1 450W Black = 35 у.е.</option>

    <script>
        da[877] = new dataArray('sko/korp/877.html', '35');
    </script>
    <option value="877">Pola 2805BK-1 450W Black = 35 у.е.</option>
    <script>
        da[878] = new dataArray('sko/korp/878.html', '37');
    </script>
    <option value="878">Pola 5830BR 450W (черно-красный) = 37 у.е.</option>

    <script>
        da[879] = new dataArray('sko/korp/879.html', '38');
    </script>
    <option value="879">Pola 2802BS, 500W Black = 38 у.е.</option>
    <script>
        da[882] = new dataArray('sko/korp/882.html', '38');
    </script>
    <option value="882">Pola 2803BS 500W Black = 38 у.е.</option>

    <script>
        da[880] = new dataArray('sko/korp/880.html', '39');
    </script>
    <option value="880">Pola 5836ВS 500W (черно-серебристый) = 39 у.е.</option>

    <script>
        da[881] = new dataArray('sko/korp/881.html', '40');
    </script>
    <option value="881">Pola 5829BK 500W Black = 40 у.е.</option>
</optgroup>

<optgroup label="-  - AeroCool без блока питания-  -">

    <script>
        da[884] = new dataArray('sko/korp/884.html', '53');
    </script>
    <option value="884">AeroCool Strike-X One Advance = 53 у.е.</option>
    <script>
        da[886] = new dataArray('sko/korp/886.html', '62');
    </script>
    <option value="886">AeroCool VS-9 Black = 62 у.е.</option>
    <script>
        da[883] = new dataArray('sko/korp/883.html', '71');
    </script>
    <option value="883">AeroCool VS-4 Black Midi Tower = 71 у.е.</option>
    <script>
        da[885] = new dataArray('sko/korp/885.html', '78');
    </script>
    <option value="885">AeroCool Ferrum White-Black = 78 у.е.</option>
    <script>
        da[887] = new dataArray('sko/korp/887.html', '84');
    </script>
    <option value="887">AeroCool XPredator X1 White Edition = 84 у.е.</option>
    <script>
        da[888] = new dataArray('sko/korp/888.html', '86');
    </script>
    <option value="888">AeroCool AeroRacer (EN52504) Black/Red = 86 у.е.</option>

    <script>
        da[889] = new dataArray('sko/korp/889.html', '89');
    </script>
    <option value="889">AeroCool Strike-X (EN56335) BK/BK = 89 у.е.</option>
    <script>
        da[890] = new dataArray('sko/korp/890.html', '92');
    </script>
    <option value="890">AeroCool Strike-X Black = 92 у.е.</option>
    <script>
        da[891] = new dataArray('sko/korp/891.html', '132');
    </script>
    <option value="891">AeroCool Mechatron White = 132 у.е.</option>

    <script>
        da[892] = new dataArray('sko/korp/892.html', '173');
    </script>
    <option value="892">AeroCool XPredator Black = 173 у.е.</option>
</optgroup>
<optgroup label="-  - Thermaltake -  -">

    <script>
        da[8108] = new dataArray('sko/korp/8108.html', '81');
    </script>
    <option value="8108">Thermaltake Element Q 200W Black\red (VL52021N2E) = 81 у.е.</option>

    <script>
        da[8109] = new dataArray('sko/korp/8109.html', '106');
    </script>
    <option value="8109">Thermaltake M5A (VJ34321W1E) Midi Tower 430W = 106 у.е.</option>

    <script>
        da[8110] = new dataArray('sko/korp/8110.html', '121');
    </script>
    <option value="8110">Thermaltake Aguila (VD1430SNAE) Midi Tower 430W = 121 у.е.</option>
</optgroup>

<optgroup label="-  - Thermaltake без блока питания-  -">

    <script>
        da[897] = new dataArray('sko/korp/897.html', '67');
    </script>
    <option value="897">Thermaltake Commander MS-II Black (VN900A1W2N) = 67 у.е.</option>
    <script>
        da[896] = new dataArray('sko/korp/896.html', '69');
    </script>
    <option value="896">Thermaltake Versa G1 (VO600A1N3N) = 69 у.е.</option>


    <script>
        da[893] = new dataArray('sko/korp/893.html', '69');
    </script>
    <option value="893">Thermaltake V3 Black Edition (VL80001W2Z) Midi Tower Window Black = 69 у.е.</option>

    <script>
        da[898] = new dataArray('sko/korp/898.html', '74');
    </script>
    <option value="898">Thermaltake Commander MS-III (VO100A1W2N) = 74 у.е.</option>
    <script>
        da[895] = new dataArray('sko/korp/895.html', '94');
    </script>
    <option value="895">Thermaltake Spacecraft (VN600A1W2NA) = 94 у.е.</option>
    <script>
        da[899] = new dataArray('sko/korp/899.html', '108');
    </script>
    <option value="899">Thermaltake Element T (VK90001N2Z) Midi Tower Black = 108 у.е.</option>

    <script>
        da[894] = new dataArray('sko/korp/894.html', '113');
    </script>
    <option value="894">Thermaltake V5 Black Edition (VL70001W2ZA) Midi Tower Window Black = 113 у.е.</option>
    <script>
        da[8100] = new dataArray('sko/korp/8100.html', '114');
    </script>
    <option value="8100">Thermaltake ARMOR A30 Black (VM70001W2Z) = 114 у.е.</option>

    <script>
        da[8101] = new dataArray('sko/korp/8101.html', '120');
    </script>
    <option value="8101">Thermaltake Level 10 GTS Black (VO30001N2N) = 120 у.е.</option>

    <script>
        da[8102] = new dataArray('sko/korp/8102.html', '144');
    </script>
    <option value="8102">Thermaltake New Soprano Black (VO900M1N2N) = 144 у.е.</option>
    <script>
        da[8103] = new dataArray('sko/korp/8103.html', '151');
    </script>
    <option value="8103">Thermaltake Overseer RX-I Black (VN700M1W2N) = 151 у.е.</option>

    <script>
        da[8104] = new dataArray('sko/korp/8104.html', '161');
    </script>
    <option value="8104">Thermaltake Chaser MK-I Black (VN300M1W2N) = 161 у.е.</option>
    <script>
        da[8105] = new dataArray('sko/korp/8105.html', '167');
    </script>
    <option value="8105">Thermaltake Armor REVO GENE Black (VO800M1W2N) = 167 у.е.</option>
    <script>
        da[8106] = new dataArray('sko/korp/8106.html', '213');
    </script>
    <option value="8106">Thermaltake Chaser MK-I (VN300M1W2NA) = 213 у.е.</option>

    <script>
        da[8107] = new dataArray('sko/korp/8107.html', '388');
    </script>
    <option value="8107">Thermaltake Level 10 GT LCS 2.0 Black (VN10031W2N-B) = 388 у.е.</option>
</optgroup>
<optgroup label="-  -  MaxPoint Aplus -  -">

    <script>
        da[8111] = new dataArray('sko/korp/8111.html', '68');
    </script>
    <option value="8111">MaxPoint Aplus CS-Black Pearl II Black Midi Tower = 68 у.е.</option>
    <script>
        da[8112] = new dataArray('sko/korp/8112.html', '68');
    </script>
    <option value="8112">MaxPoint Aplus CS-Monolize Black Midi Tower = 68 у.е.</option>
</optgroup>

<optgroup label="-  -  ZALMAN -  -">

    <script>
        da[8116] = new dataArray('sko/korp/8116.html', '35');
    </script>
    <option value="8116">ZALMAN ZM-T1 Black = 35 у.е.</option>
    <script>
        da[8115] = new dataArray('sko/korp/8115.html', '69');
    </script>
    <option value="8115">ZALMAN Z5 Black = 69 у.е.</option>
    <script>
        da[8113] = new dataArray('sko/korp/8113.html', '74');
    </script>
    <option value="8113">ZALMAN Z5 Plus Black = 74 у.е.</option>
    <script>
        da[8114] = new dataArray('sko/korp/8114.html', '77');
    </script>
    <option value="8114">ZALMAN Z11 Black = 77 у.е.</option>
    <script>
        da[8117] = new dataArray('sko/korp/8117.html', '83');
    </script>
    <option value="8117">ZALMAN Z9 DIV Black = 83 у.е.</option>

</optgroup>
<optgroup label="-  -  STC -  -">

    <script>
        da[8118] = new dataArray('sko/korp/8118.html', '35');
    </script>
    <option value="8118">STC ECOM 3702 Midi Tower = 35 у.е.</option>

    <script>
        da[8119] = new dataArray('sko/korp/8119.html', '59');
    </script>
    <option value="8119">STC-MASTER A15 Midi Tower = 59 у.е.</option>

    <script>
        da[8120] = new dataArray('sko/korp/8120.html', '59');
    </script>
    <option value="8120">STC-MASTER A17 Midi Tower = 59 у.е.</option>

    <script>
        da[8121] = new dataArray('sko/korp/8121.html', '59');
    </script>
    <option value="8121">STC-MASTER A20 Midi Tower = 59 у.е.</option>

    <script>
        da[8122] = new dataArray('sko/korp/8122.html', '59');
    </script>
    <option value="8122">STC-MASTER A22 Midi Tower = 59 у.е.</option>
    <script>
        da[8123] = new dataArray('sko/korp/8123.html', '62');
    </script>
    <option value="8123">STC-MASTER DARK S2 Midi Tower = 62 у.е.</option>
    <script>
        da[8124] = new dataArray('sko/korp/8124.html', '62');
    </script>
    <option value="8124">STC-MASTER DARK S3 Midi Tower = 62 у.е.</option>
    <script>
        da[8126] = new dataArray('sko/korp/8126.html', '62');
    </script>
    <option value="8126">STC-MASTER DARK S5 Midi Tower = 62 у.е.</option>
    <script>
        da[8127] = new dataArray('sko/korp/8127.html', '62');
    </script>
    <option value="8127">STC-MASTER DARK S6 Midi Tower = 62 у.е.</option>
    <script>
        da[8128] = new dataArray('sko/korp/8128.html', '62');
    </script>
    <option value="8128">STC-MASTER DARK D1 Midi Tower = 62 у.е.</option>
    <script>
        da[8129] = new dataArray('sko/korp/8129.html', '62');
    </script>
    <option value="8129">STC-MASTER DARK D5 Midi Tower = 62 у.е.</option>


    <script>
        da[8125] = new dataArray('sko/korp/8125.html', '63');
    </script>
    <option value="8125">STC-MASTER DARK S4 Midi Tower = 63 у.е.</option>

    <script>
        da[8130] = new dataArray('sko/korp/8130.html', '115');
    </script>
    <option value="8130">STC-MAGNUM X7 (R) Tower = 115 у.е.</option>
    <script>
        da[8131] = new dataArray('sko/korp/8131.html', '130');
    </script>
    <option value="8131">STC-MAGNUM X9 (R) Tower = 130 у.е.</option>
    <script>
        da[8132] = new dataArray('sko/korp/8132.html', '130');
    </script>
    <option value="8132">STC-MAGNUM X9 (B) Tower = 130 у.е.</option>

</optgroup>

</select>
<a href="#" id="inf8" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                    title="Описание"/></a></td>
<td class="tac" id="kol8" style="display:none">
    <input id="tovkol8" onchange="addconf('8');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent8" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel19" type="hidden"/>
<input id="kolval19" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Блоки питания" id="tov19" onchange="addconf('19');">
<option value="0">Блоки питания</option>


<optgroup label="-  -   FSP -   -">


    <script>
        da[1901] = new dataArray('sko/bp/1901.html', '46');
    </script>
    <option value="1901">FSP ATX-450PNR = 46 у.е.</option>
    <script>
        da[1905] = new dataArray('sko/bp/1905.html', '51');
    </script>
    <option value="1905">FSP 400W ATX-400N = 51 у.е.</option>
    <script>
        da[1906] = new dataArray('sko/bp/1906.html', '65');
    </script>
    <option value="1906">FSP 500W ATX-500PNR = 65 у.е.</option>
    <script>
        da[1902] = new dataArray('sko/bp/1902.html', '92');
    </script>
    <option value="1902">FSP ATX-SPI-500 = 92 у.е.</option>
    <script>
        da[1903] = new dataArray('sko/bp/1903.html', '92');
    </script>
    <option value="1903">FSP ATX-SPI-550 Pro = 92 у.е.</option>
    <script>
        da[1904] = new dataArray('sko/bp/1904.html', '94');
    </script>
    <option value="1904">FSP ATX-SPI-600W Pro = 94 у.е.</option>


    <script>
        da[1907] = new dataArray('sko/bp/1907.html', '99');
    </script>
    <option value="1907">FSP 600W ATX-600PNR = 99 у.е.</option>
    <script>
        da[19012] = new dataArray('sko/bp/19012.html', '99');
    </script>
    <option value="19012">FSP Raider 550W = 99 у.е.</option>
    <script>
        da[19013] = new dataArray('sko/bp/19013.html', '106');
    </script>
    <option value="19013">FSP 600W HEXA 600 = 106 у.е.</option>
    <script>
        da[19010] = new dataArray('sko/bp/19010.html', '133');
    </script>
    <option value="19010">FSP Epsilon 85+ 700W = 133 у.е.</option>
    <script>
        da[1908] = new dataArray('sko/bp/1908.html', '144');
    </script>
    <option value="1908">FSP AU-550M = 144 у.е.</option>
    <script>
        da[1909] = new dataArray('sko/bp/1909.html', '158');
    </script>
    <option value="1909">FSP Epsilon 80+ 1010 = 158 у.е.</option>
    <script>
        da[19014] = new dataArray('sko/bp/19014.html', '159');
    </script>
    <option value="19014">FSP 650W Aurum 650M = 159 у.е.</option>


    <script>
        da[19011] = new dataArray('sko/bp/19011.html', '166');
    </script>
    <option value="19011">FSP Everest 80+ 900 = 166 у.е.</option>


</optgroup>


<optgroup label="-  -   Aerocool -   -">

<script>

    da[19015] = new dataArray('sko/bp/19015.html', '20');
</script>
<option value="19015">Aerocool 650W Imperator = 20 у.е.</option>

<script>
    da[19016] = new dataArray('sko/bp/19016.html', '91');
</script>
<option value="19016">Aerocool 550W Imperator = 91 у.е.</option>
<script>
    da[19017] = new dataArray('sko/bp/19017.html', '202');
</script>
<option value="19017">Aerocool 1100W Strike-X 1100 = 202 у.е.</option>

<script>
    da[19018] = new dataArray('sko/bp/19018.html', '214');
</script>
<option value="19018">Aerocool 1150W Imperator = 214 у.е.</option>


<optgroup label="-  -  CoolerMaster -   -">


    <script>
        da[19019] = new dataArray('sko/bp/19019.html', '49');
    </script>
    <option value="19019">Cooler Master Elite 400W (RS400-PSAPI3-EU) = 49 у.е.</option>
    <script>
        da[19020] = new dataArray('sko/bp/19020.html', '62');
    </script>
    <option value="19020">Cooler Master Elite 460W (RS460-PSAPI3-EU) = 62 у.е.</option>
    <script>
        da[19021] = new dataArray('sko/bp/19021.html', '62');
    </script>
    <option value="19021">Cooler Master Elite 500W (RS500-PSAPJ3-IT) = 62 у.е.</option>
    <script>
        da[19022] = new dataArray('sko/bp/19022.html', '63');
    </script>
    <option value="19022">CoolerMaster eXtreme Power 2 525W RS525-PCARD3-EU = 63 у.е.</option>
    <script>
        da[19036] = new dataArray('sko/bp/19036.html', '70');
    </script>
    <option value="19036">CoolerMaster Thunder 500W (RS500-ACABM3-EU) = 70 у.е.</option>


    <script>
        da[19028] = new dataArray('sko/bp/19028.html', '70');
    </script>
    <option value="19028">CoolerMaster GX Lite 500W RS500-ASABL3-EU = 70 у.е.</option>
    <script>
        da[19023] = new dataArray('sko/bp/19023.html', '88');
    </script>
    <option value="19023">CoolerMaster eXtreme Power 2 525W RS525-PCARD3-EU = 88 у.е.</option>
    <script>
        da[19037] = new dataArray('sko/bp/19037.html', '91');
    </script>
    <option value="19037">CoolerMaster Thunder 550W (RS550-ACABD3-EU) = 91 у.е.</option>
    <script>
        da[19030] = new dataArray('sko/bp/19030.html', '106');
    </script>
    <option value="19030">CoolerMaster Real Power 520W RS520-ASAAA1-EU = 106 у.е.</option>
    <script>
        da[19026] = new dataArray('sko/bp/19026.html', '107');
    </script>
    <option value="19026">CoolerMaster GX 650W RS650-ACAAD3-EU = 107 у.е.</option>
    <script>
        da[19029] = new dataArray('sko/bp/19029.html', '109');
    </script>
    <option value="19029">CoolerMaster GX Lite 700W RS700-ASABL3-EU = 109 у.е.</option>

    <script>
        da[19024] = new dataArray('sko/bp/19024.html', '111');
    </script>
    <option value="19024">CoolerMaster eXtreme Power 2 625W RS625-PCARD3-EU = 111 у.е.</option>

    <script>
        da[19025] = new dataArray('sko/bp/19025.html', '118');
    </script>
    <option value="19025">CoolerMaster eXtreme Power 2 725W RS725-PCARD3-EU = 118 у.е.</option>
    <script>
        da[19032] = new dataArray('sko/bp/19032.html', '132');
    </script>
    <option value="19032">CoolerMaster Silent Pro M2 520W RS520-SPM2E3-EU = 132 у.е.</option>
    <script>
        da[19033] = new dataArray('sko/bp/19033.html', '142');
    </script>
    <option value="19033">CoolerMaster Silent Pro M2 620W RS620-SPM2E3-EU = 142 у.е.</option>
    <script>
        da[19027] = new dataArray('sko/bp/19027.html', '143');
    </script>
    <option value="19027">CoolerMaster GX 750W RS750-ACAAD3-EU = 143 у.е.</option>


    <script>
        da[19034] = new dataArray('sko/bp/19034.html', '166');
    </script>
    <option value="19034">CoolerMaster Silent Pro M2 720W RS720-SPM2D3-EU = 166 у.е.</option>

    <script>
        da[19035] = new dataArray('sko/bp/19035.html', '205');
    </script>
    <option value="19035">CoolerMaster Silent Pro M2 850W RS850-SPM2D3-EU = 205 у.е.</option>

    <script>
        da[19031] = new dataArray('sko/bp/19031.html', '219');
    </script>
    <option value="19031">CoolerMaster Silent Pro M2 1000W RSA00-SPM2D3-EU = 219 у.е.</option>


</optgroup>


<optgroup label="-  -  Corsair -   -">

    <script>
        da[19047] = new dataArray('sko/bp/19047.html', '63');
    </script>
    <option value="19047">Corsair VS450 CP-9020049-EU = 63 у.е.</option>
    <script>
        da[19048] = new dataArray('sko/bp/19048.html', '75');
    </script>
    <option value="19048">Corsair VS550 CP-9020050-EU = 75 у.е.</option>

    <script>
        da[19038] = new dataArray('sko/bp/19038.html', '88');
    </script>
    <option value="19038">Corsair CX500 V3 CP-9020047-EU = 88 у.е.</option>

    <script>
        da[19039] = new dataArray('sko/bp/19039.html', '99');
    </script>
    <option value="19039">Corsair CX600W CP-9020048-EU = 99 у.е.</option>
    <script>
        da[19041] = new dataArray('sko/bp/19041.html', '108');
    </script>
    <option value="19041">Corsair GS500W CP-9020005-EU = 108 у.е.</option>
    <script>
        da[19042] = new dataArray('sko/bp/19042.html', '119');
    </script>
    <option value="19042">Corsair GS600W CMPSU-600GEU/CP9020012 = 119 у.е.</option>

    <script>
        da[19040] = new dataArray('sko/bp/19040.html', '132');
    </script>
    <option value="19040">Corsair CX750W CP-9020015-EU = 132 у.е.</option>

    <script>
        da[19044] = new dataArray('sko/bp/19044.html', '141');
    </script>
    <option value="19044">Corsair TX650W CMPSU-650TXEU/CP9020038 = 141 у.е.</option>


    <script>
        da[19043] = new dataArray('sko/bp/19043.html', '158');
    </script>
    <option value="19043">Corsair GS800W CMPSU-800GEU/CP9020014 = 158 у.е.</option>

    <script>
        da[19045] = new dataArray('sko/bp/19045.html', '165');
    </script>
    <option value="19045">Corsair TX750W CMPSU-750TXM/CP9020042 = 165 у.е.</option>
    <script>
        da[19046] = new dataArray('sko/bp/19046.html', '175');
    </script>
    <option value="19046">Corsair TX850W CP-9020041-EU = 175 у.е.</option>

</optgroup>

<optgroup label="-  -  Gigabyte -   -">


    <script>
        da[19049] = new dataArray('sko/bp/19049.html', '34');
    </script>
    <option value="19049">Gigabyte 450W (ATX-M450E) = 34 у.е.</option>
    <script>
        da[19050] = new dataArray('sko/bp/19050.html', '53');
    </script>
    <option value="19050">Gigabyte 500W (GE-C500P-C4) = 53 у.е.</option>
    <script>
        da[19051] = new dataArray('sko/bp/19051.html', '71');
    </script>
    <option value="19051">Gigabyte 600W (GZ-EBS60-C7) = 71 у.е.</option>
    <script>
        da[19052] = new dataArray('sko/bp/19052.html', '240');
    </script>
    <option value="19052">Gigabyte 1200W ODIN Pro 1200 = 240 у.е.</option>
</optgroup>
<optgroup label="-  -  OCZ -   -">

    <script>
        da[19053] = new dataArray('sko/bp/19053.html', '68');
    </script>
    <option value="19053">OCZ 500W CXS500W-EU = 68 у.е.</option>
    <script>
        da[19054] = new dataArray('sko/bp/19054.html', '93');
    </script>
    <option value="19054">OCZ 550W OCZ-ZS550W = 93 у.е.</option>

    <script>
        da[19055] = new dataArray('sko/bp/19055.html', '104');
    </script>
    <option value="19055">OCZ 650W OCZ-ZS650W = 104 у.е.</option>

    <script>
        da[19056] = new dataArray('sko/bp/19056.html', '116');
    </script>
    <option value="19056">OCZ 750W OCZ-ZS750W = 116 у.е.</option>
    <script>
        da[19057] = new dataArray('sko/bp/19057.html', '225');
    </script>
    <option value="19057">OCZ 1000W OCZ-ZX1000W-UN = 225 у.е.</option>
</optgroup>
<optgroup label="-  -  Thermaltake -   -">
    <script>
        da[19058] = new dataArray('sko/bp/19058.html', '96');
    </script>
    <option value="19058">Thermaltake 500W TR-500PCEU TR2 = 96 у.е.</option>

    <script>
        da[19059] = new dataArray('sko/bp/19059.html', '159');
    </script>
    <option value="19059">Thermaltake 800W TR-800PCEU/PCUS = 159 у.е.</option>
    <script>
        da[19060] = new dataArray('sko/bp/19060.html', '217');
    </script>
    <option value="19060">Thermaltake 1000W TRX-1000M = 217 у.е.</option>

    <script>
        da[19061] = new dataArray('sko/bp/19061.html', '255');
    </script>
    <option value="19061">Thermaltake 1200W TP-1200M = 255 у.е.</option>

    <script>
        da[19062] = new dataArray('sko/bp/19062.html', '375');
    </script>
    <option value="19062">Thermaltake 1500W TP-1500M = 375 у.е.</option>
</optgroup>
<optgroup label="-  -  Chieftec -   -">

    <script>
        da[19063] = new dataArray('sko/bp/19063.html', '45');
    </script>
    <option value="19063">Chieftec 500W
        <GPA-500S> = 45 у.е.
    </option>
    <script>
        da[19064] = new dataArray('sko/bp/19064.html', '103');
    </script>
    <option value="19064">Chieftec 550W
        <BPS-550C2> = 103 у.е.
    </option>
</optgroup>
<optgroup label="-  -  Hiper  -   -">

    <script>
        da[19065] = new dataArray('sko/bp/19065.html', '75');
    </script>
    <option value="19065">Hiper 550W
        <M550> = 75 у.е.
    </option>

    <script>
        da[19066] = new dataArray('sko/bp/19066.html', '170');
    </script>
    <option value="19066">Hiper 900W
        <K900> = 170 у.е.
    </option>

    <script>
        da[19067] = new dataArray('sko/bp/19067.html', '172');
    </script>
    <option value="19067">Hiper 1000W M1000 = 172 у.е.</option>
</optgroup>
<optgroup label="-  -  Zalman  -   -">


    <script>
        da[19068] = new dataArray('sko/bp/19068.html', '48');
    </script>
    <option value="19068">Zalman 500W
        <ZM500-LE> = 48 у.е.
    </option>

    <script>
        da[19069] = new dataArray('sko/bp/19069.html', '61');
    </script>
    <option value="19069">Zalman 500W
        <ZM500-GS> = 61 у.е.
    </option>

    <script>
        da[19070] = new dataArray('sko/bp/19070.html', '76');
    </script>
    <option value="19070">Zalman 500W
        <ZM500-GT> = 76 у.е.
    </option>
</optgroup>
<optgroup label="-  -  PowerMan  -   -">

    <script>
        da[19071] = new dataArray('sko/bp/19071.html', '42');
    </script>
    <option value="19071">PowerMan 450W (IP-S450HQ7-0) = 42 у.е.</option>

    <script>
        da[19072] = new dataArray('sko/bp/19072.html', '56');
    </script>
    <option value="19072">PowerMan 500W (IP-S500AQ3-0) = 56 у.е.</option>

    <script>
        da[19073] = new dataArray('sko/bp/19073.html', '63');
    </script>
    <option value="19073">PowerMan 550W (IP-S550AQ3-0) = 63 у.е.</option>

    <script>
        da[19074] = new dataArray('sko/bp/19074.html', '77');
    </script>
    <option value="19074">PowerMan 600W (IP-S600AQ3-0) = 77 у.е.</option>

</optgroup>

</select>
<a href="#" id="inf19" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                     title="Описание"/></a></td>
<td class="tac" id="kol19" style="display:none">
    <input id="tovkol19" onchange="addconf('19');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent19" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->


<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel9" type="hidden"/>
        <input id="kolval9" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Монитор" id="tov9" onchange="addconf('9');">
            <option value="0">Монитор</option>

            <optgroup label="-  - LCD Acer - -">

                <script>
                    da[91] = new dataArray('sko/monit/91.html', '110');
                </script>
                <option value="91">Acer V193HQVbb (СТБ) = 110 у.е.</option>

                <script>
                    da[92] = new dataArray('sko/monit/92.html', '165');
                </script>
                <option value="92">Acer S220HQLBbd (LED, DVI) (СТБ) = 165 у.е.</option>

                <script>
                    da[93] = new dataArray('sko/monit/93.html', '199');
                </script>
                <option value="93">Acer S230HLBbd (LED, DVI) (СТБ) = 199 у.е.</option>
            </optgroup>
            <optgroup label="-  - LCD Asus - -">

                <script>
                    da[94] = new dataArray('sko/monit/94.html', '169');
                </script>
                <option value="94">Asus VH208D (LED) = 169 у.е.</option>

                <script>
                    da[95] = new dataArray('sko/monit/95.html', '389');
                </script>
                <option value="95">Asus LS248H (HDMI, LED) = 389 у.е.</option>
            </optgroup>
            <optgroup label=" - - LCD LG - -">

                <script>
                    da[927] = new dataArray('sko/monit/927.html', '116');
                </script>
                <option value="927">LG W1943C-PF Black (СТБ) = 116 у.е.</option>
                <script>
                    da[98] = new dataArray('sko/monit/98.html', '125');
                </script>
                <option value="98">LG E1941S-BN Black (LED) (СТБ) = 125 у.е.</option>
                <script>
                    da[911] = new dataArray('sko/monit/911.html', '150');
                </script>
                <option value="911">LG E2042C-BN Black (LED) (СТБ) = 150 у.е.</option>
                <script>
                    da[928] = new dataArray('sko/monit/928.html', '155');
                </script>
                <option value="928">LG W2243S-PF (СТБ) = 155 у.е.</option>
                <script>
                    da[99] = new dataArray('sko/monit/99.html', '155');
                </script>
                <option value="99">LG E2041S-BN Black (LED) (СТБ) = 155 у.е.</option>

                <script>
                    da[910] = new dataArray('sko/monit/910.html', '159');
                </script>
                <option value="910">LG E2041T-BN Black (LED, DVI) (СТБ) = 159 у.е.</option>
                <script>
                    da[915] = new dataArray('sko/monit/915.html', '171');
                </script>
                <option value="915">LG E2241S-BN Black (LED) (СТБ) = 171 у.е.</option>
                <script>
                    da[97] = new dataArray('sko/monit/97.html', '174');
                </script>
                <option value="97">LG E1910S-BN Black (LED) (СТБ) = 174 у.е.</option>
                <script>
                    da[914] = new dataArray('sko/monit/914.html', '175');
                </script>
                <option value="914">LG E2211S-BN Black (LED) (СТБ) = 175 у.е.</option>
                <script>
                    da[917] = new dataArray('sko/monit/917.html', '179');
                </script>
                <option value="917">LG E2251T-BN Black (LED, DVI) (СТБ) = 179 у.е.</option>
                <script>
                    da[916] = new dataArray('sko/monit/916.html', '186');
                </script>
                <option value="916">LG E2251S-BN Black (LED) (СТБ) = 186 у.е.</option>
                <script>
                    da[912] = new dataArray('sko/monit/912.html', '202');
                </script>
                <option value="912">LG E2210S-BN Black (LED) (СТБ) = 202 у.е.</option>
                <script>
                    da[923] = new dataArray('sko/monit/923.html', '204');
                </script>
                <option value="923">LG IPS225T-BN Black (S-IPS, LED, DVI) (СТБ) = 204 у.е.</option>
                <script>
                    da[913] = new dataArray('sko/monit/913.html', '207');
                </script>
                <option value="913">LG E2210T-BN Black (LED, DVI) (СТБ) = 207 у.е.</option>

                <script>
                    da[918] = new dataArray('sko/monit/918.html', '218');
                </script>
                <option value="918">LG E2341T-BN Black (LED, DVI) (СТБ) = 218 у.е.</option>

                <script>
                    da[919] = new dataArray('sko/monit/919.html', '224');
                </script>
                <option value="919">LG E2342T-BN Black (LED, DVI) (СТБ) = 224 у.е.</option>

                <script>
                    da[920] = new dataArray('sko/monit/920.html', '225');
                </script>
                <option value="920">LG E2441T-BN Black (LED, DVI) (СТБ) = 225 у.е.</option>
                <script>
                    da[924] = new dataArray('sko/monit/924.html', '233');
                </script>
                <option value="924">LG IPS235T-BN Black (S-IPS, LED, DVI) (СТБ) = 233 у.е.</option>
                <script>
                    da[921] = new dataArray('sko/monit/921.html', '233');
                </script>
                <option value="921">LG E2442T-BN Black (LED, DVI) (СТБ) = 233 у.е.</option>

                <script>
                    da[922] = new dataArray('sko/monit/922.html', '244');
                </script>
                <option value="922">LG E2442V-BN Black (LED, HDMI, DVI) (СТБ) = 244 у.е.</option>
                <script>
                    da[925] = new dataArray('sko/monit/925.html', '310');
                </script>
                <option value="925">LG M2382D-PZ + TV-тюнер DVB-T (LED, HDMI+DVI) (СТБ) = 310 у.е.</option>
                <script>
                    da[96] = new dataArray('sko/monit/96.html', '316');
                </script>
                <option value="96">LG D2342P-PN Black (3D, LED, HDMI+DVI) (СТБ) = 316 у.е.</option>
                <script>
                    da[926] = new dataArray('sko/monit/926.html', '330');
                </script>
                <option value="926">LG M2482D-PZ + TV-тюнер DVB-T (LED, HDMI+DVI) (СТБ) = 330 у.е.</option>
            </optgroup>

            <optgroup label="-   - LCD Philips -  -">

                <script>
                    da[929] = new dataArray('sko/monit/929.html', '127');
                </script>
                <option value="929">Philips 196V3LAB (LED, DVI) (СТБ) = 127 у.е.</option>

                <script>
                    da[930] = new dataArray('sko/monit/930.html', '129');
                </script>
                <option value="930">Philips 197E3LSU (LED, DVI) (СТБ) = 129 у.е.</option>

                <script>
                    da[931] = new dataArray('sko/monit/931.html', '183');
                </script>
                <option value="931">Philips 19S1SB (LED, DVI) (СТБ) = 183 у.е.</option>
                <script>
                    da[934] = new dataArray('sko/monit/934.html', '190');
                </script>
                <option value="934">Philips 221S3LCB (LED, DVI) (СТБ) = 190 у.е.</option>
                <script>
                    da[932] = new dataArray('sko/monit/932.html', '194');
                </script>
                <option value="932">Philips 201BL2CB (LED, DVI, USB) (СТБ) = 194 у.е.</option>

                <script>
                    da[933] = new dataArray('sko/monit/933.html', '228');
                </script>
                <option value="933">Philips 221B3LPCB (LED, DVI, USB) (СТБ) = 228 у.е.</option>

                <script>
                    da[935] = new dataArray('sko/monit/935.html', '255');
                </script>
                <option value="935">Philips 225B2CS/00 (DVI, Pivot) (СТБ) = 255 у.е.</option>

                <script>
                    da[937] = new dataArray('sko/monit/937.html', '165');
                </script>
                <option value="937">Philips 226V3LAB5 (LED) (СТБ) = 165 у.е.</option>

                <script>
                    da[936] = new dataArray('sko/monit/936.html', '258');
                </script>
                <option value="936">Philips 235BL2CB (LED, DVI, USB) (СТБ) = 258 у.е.</option>
            </optgroup>
        </select>
        <a href="#" id="inf9" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                            alt="info"
                                                                                            title="Описание"/></a></td>
    <td class="tac" id="kol9" style="display:none">
        <input id="tovkol9" onchange="addconf('9');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent9" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel10" type="hidden"/>
        <input id="kolval10" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Клавиатура" id="tov10" onchange="addconf('10');">
            <option value="0">Клавиатура</option>

            <optgroup label="-  - Беспроводные - -">

                <script>
                    da[1025] = new dataArray('sko/klav/1025.html', '35');
                </script>
                <option value="1025">Genius Luxemate 8000 = 35 у.е.</option>
                <script>
                    da[1026] = new dataArray('sko/klav/1026.html', '45');
                </script>
                <option value="1026">Genius Luxemate i815 = 45 у.е.</option>

                <script>
                    da[1027] = new dataArray('sko/klav/1027.html', '40');
                </script>
                <option value="1027">Sven Comfort 4400 Wireless = 40 у.е.</option>

                <script>
                    da[1028] = new dataArray('sko/klav/1028.html', '40');
                </script>
                <option value="1028">Sven Comfort 4500 Wireless = 40 у.е.</option>
            </optgroup>
            <optgroup label=" -  -  Мультимедийные - -">


                <script>
                    da[1029] = new dataArray('sko/klav/1029.html', '12');
                </script>
                <option value="1029">A4Tech KB-750 Smart = 12 у.е.</option>
                <script>
                    da[101] = new dataArray('sko/klav/101.html', '14');
                </script>
                <option value="101">Genius KB-200 (PS/2) = 14 у.е.</option>

                <script>
                    da[102] = new dataArray('sko/klav/102.html', '14');
                </script>
                <option value="102">Genius KB-200 Black (USB) = 14 у.е.</option>

                <script>
                    da[1030] = new dataArray('sko/klav/1030.html', '16');
                </script>
                <option value="1030">Genius KB-220e = 16 у.е.</option>
                <script>
                    da[1031] = new dataArray('sko/klav/1031.html', '20');
                </script>
                <option value="1031">Genius LuxeMate i200 = 20 у.е.</option>

                <script>
                    da[106] = new dataArray('sko/klav/106.html', '22');
                </script>
                <option value="106">Genius SlimStar 220 (USB) = 22 у.е.</option>

                <script>
                    da[104] = new dataArray('sko/klav/104.html', '23');
                </script>
                <option value="104">Genius KB-350e Black (USB) = 23 у.е.</option>
                <script>
                    da[1032] = new dataArray('sko/klav/1032.html', '15');
                </script>
                <option value="1032">Sven Comfort 3050 = 15 у.е.</option>
                <script>
                    da[1033] = new dataArray('sko/klav/1033.html', '19');
                </script>
                <option value="1033">Sven Comfort 4200 = 19 у.е.</option>

                <script>
                    da[1011] = new dataArray('sko/klav/1011.html', '26');
                </script>
                <option value="1011">Sven Multimedia EL 4001 Silver (USB) = 26 у.е.</option>
                <script>
                    da[1012] = new dataArray('sko/klav/1012.html', '29');
                </script>
                <option value="1012">Sven Multimedia EL 4002 White (USB) = 29 у.е.</option>


                <script>
                    da[1015] = new dataArray('sko/klav/1015.html', '37');
                </script>
                <option value="1015">Sven Multimedia EL 7010 Silver (USB) = 37 у.е.</option>

                <script>
                    da[1014] = new dataArray('sko/klav/1014.html', '55');
                </script>
                <option value="1014">Sven Multimedia EL 4005 MH Black (USB) = 55 у.е.</option>
                <script>
                    da[1034] = new dataArray('sko/klav/1034.html', '21');
                </script>
                <option value="1034">Sven Office 7007 = 21 у.е.</option>
                <script>
                    da[1017] = new dataArray('sko/klav/1017.html', '31');
                </script>
                <option value="1017">Sven Office 3100 White (USB) = 31 у.е.</option>
            </optgroup>
            <optgroup label=" - - Стандартные - -">

                <script>
                    da[1035] = new dataArray('sko/klav/1035.html', '11');
                </script>
                <option value="1035">Delux DLK-6000P = 11 у.е.</option>
                <script>
                    da[1036] = new dataArray('sko/klav/1036.html', '12');
                </script>
                <option value="1036">Delux DLK-6100P = 12 у.е.</option>
                <script>
                    da[1037] = new dataArray('sko/klav/1037.html', '11');
                </script>
                <option value="1037">Genius KB06XE = 11 у.е.</option>
                <script>
                    da[1038] = new dataArray('sko/klav/1038.html', '13');
                </script>
                <option value="1038">Genius SlimStar 120 = 13 у.е.</option>
                <script>
                    da[1023] = new dataArray('sko/klav/1023.html', '14');
                </script>
                <option value="1023">Genius SlimStar 110 = 14 у.е.</option>
                <script>
                    da[1039] = new dataArray('sko/klav/1039.html', '14');
                </script>
                <option value="1039">Sven Comfort 3535 = 14 у.е.</option>
                <script>
                    da[1040] = new dataArray('sko/klav/1040.html', '11');
                </script>
                <option value="1040">Sven Standard 304 = 11 у.е.</option>

                <script>
                    da[1041] = new dataArray('sko/klav/1041.html', '12');
                </script>
                <option value="1041">Sven Standard 307M = 12 у.е.</option>
                <script>
                    da[1043] = new dataArray('sko/klav/1043.html', '16');
                </script>
                <option value="1043">Sven Standard 636 = 16 у.е.</option>
                <script>
                    da[1044] = new dataArray('sko/klav/1044.html', '17');
                </script>
                <option value="1044">Sven Standard 4000 = 17 у.е.</option>
                <script>
                    da[1042] = new dataArray('sko/klav/1042.html', '17');
                </script>
                <option value="1042">Sven Standard 310 Combo = 17 у.е.</option>

            </optgroup>
        </select>
        <a href="#" id="inf10" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol10" style="display:none">
        <input id="tovkol10" onchange="addconf('10');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent10" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel11" type="hidden"/>
<input id="kolval11" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Мышь" id="tov11" onchange="addconf('11');">
<option value="0">Мышь</option>

<optgroup label="-  -  Беспроводные - -">

    <script>
        da[11032] = new dataArray('sko/mish/11032.html', '15');
    </script>
    <option value="11032">Acme MA-02 = 15 у.е.</option>
    <script>
        da[11033] = new dataArray('sko/mish/11033.html', '15');
    </script>
    <option value="11033">Canyon CNR-MSOW01P = 15 у.е.</option>
    <script>
        da[11034] = new dataArray('sko/mish/11034.html', '15');
    </script>
    <option value="11034">Canyon CNR-MSOW04S = 15 у.е.</option>


    <script>
        da[1101] = new dataArray('sko/mish/1101.html', '20');
    </script>
    <option value="1101">Cooler Master Cruiser Laser Blue = 20 у.е.</option>

    <script>
        da[1102] = new dataArray('sko/mish/1102.html', '20');
    </script>
    <option value="1102">Cooler Master Cruiser Laser Red = 20 у.е.</option>


    <script>
        da[1104] = new dataArray('sko/mish/1104.html', '21');
    </script>
    <option value="1104">Genius Mini Navigator Red USB = 21 у.е.</option>

    <script>
        da[11039] = new dataArray('sko/mish/11039.html', '20');
    </script>
    <option value="11039">Genius Traveler 7000 = 20 у.е.</option>
    <script>
        da[1105] = new dataArray('sko/mish/1105.html', '21');
    </script>
    <option value="1105">Genius Traveler 6000 = 21 у.е.</option>
    <script>
        da[11038] = new dataArray('sko/mish/11038.html', '21');
    </script>
    <option value="11038">Genius Traveler 6010 (цвета разные) = 21 у.е.</option>
    <script>
        da[1106] = new dataArray('sko/mish/1106.html', '26');
    </script>
    <option value="1106">Genius Traveler 900 = 26 у.е.</option>
    <script>
        da[11035] = new dataArray('sko/mish/11035.html', '28');
    </script>
    <option value="11035">Genius DX-7100 = 28 у.е.</option>
    <script>
        da[11036] = new dataArray('sko/mish/11036.html', '28');
    </script>
    <option value="11036">Genius Ergo 9000 = 28 у.е.</option>
    <script>
        da[11037] = new dataArray('sko/mish/11037.html', '30');
    </script>
    <option value="11037">Genius Navigator 905 (цвета разные) = 30 у.е.</option>
    <script>
        da[11040] = new dataArray('sko/mish/11040.html', '17');
    </script>
    <option value="11040">Q-Life Bluetooth = 17 у.е.</option>


    <script>
        da[11042] = new dataArray('sko/mish/11042.html', '20');
    </script>
    <option value="11042">Sven RX-195 Wireless = 20 у.е.</option>
    <script>
        da[11043] = new dataArray('sko/mish/11043.html', '21');
    </script>
    <option value="11043">Sven RX-420 Wireless = 21 у.е.</option>
    <script>
        da[11041] = new dataArray('sko/mish/11041.html', '27');
    </script>
    <option value="11041">Sven NRML-01 = 27 у.е.</option>

</optgroup>
<optgroup label="- - Оптические -  -">

    <script>
        da[11046] = new dataArray('sko/mish/11046.html', '9');
    </script>
    <option value="11046">Delux DLM-388BP = 9 у.е.</option>
    <script>
        da[11044] = new dataArray('sko/mish/11044.html', '10');
    </script>
    <option value="11044">Acme MN-07 USB = 10 у.е.</option>

    <script>
        da[11045] = new dataArray('sko/mish/11045.html', '10');
    </script>
    <option value="11045">Canyon CNL-MSD03A = 10 у.е.</option>


    <script>
        da[1109] = new dataArray('sko/mish/1109.html', '74');
    </script>
    <option value="1109">Cooler Master Sentinel Z3RO-G (SGM-6001-GLLW1) Black (USB) = 74 у.е.</option>
    <script>
        da[11047] = new dataArray('sko/mish/11047.html', '10');
    </script>
    <option value="11047">Genius Ergo 525 = 10 у.е.</option>
    <script>
        da[11013] = new dataArray('sko/mish/11013.html', '15');
    </script>
    <option value="11013">Genius Mini Traveler (USB) = 15 у.е.</option>
    <script>
        da[11048] = new dataArray('sko/mish/11048.html', '18');
    </script>
    <option value="11048">Genius NX-Mini (цвета разные) = 18 у.е.</option>


    <script>
        da[11010] = new dataArray('sko/mish/11010.html', '16');
    </script>
    <option value="11010">Genius Ergo 325 Laser (USB) = 19 у.е.</option>


    <script>
        da[11015] = new dataArray('sko/mish/11015.html', '20');
    </script>
    <option value="11015">Genius Navigator 320 (USB) = 20 у.е.</option>

    <script>
        da[11019] = new dataArray('sko/mish/11019.html', '10');
    </script>
    <option value="11019">Genius NetScroll 120 Silver (PS/2) = 10 у.е.</option>

    <script>
        da[11020] = new dataArray('sko/mish/11020.html', '10');
    </script>
    <option value="11020">Genius NetScroll 130 Black (PS/2) = 10 у.е.</option>
    <script>
        da[11049] = new dataArray('sko/mish/11049.html', '11');
    </script>
    <option value="11049">Genius NetScroll 100X = 11 у.е.</option>
    <script>
        da[11023] = new dataArray('sko/mish/11023.html', '11');
    </script>
    <option value="11023">Genius NetScroll 310 Silver (USB) = 11 у.е.</option>
    <script>
        da[11021] = new dataArray('sko/mish/11021.html', '13');
    </script>
    <option value="11021">Genius NetScroll 200 Laser (PS/2) = 13 у.е.</option>


    <script>
        da[11024] = new dataArray('sko/mish/11024.html', '22');
    </script>
    <option value="11024">Genius NetScroll T220 Laser Black (USB) = 22 у.е.</option>

    <script>
        da[11025] = new dataArray('sko/mish/11025.html', '11');
    </script>
    <option value="11025">Genius ScrollToo 200 (USB) = 11 у.е.</option>
    <script>
        da[11050] = new dataArray('sko/mish/11050.html', '15');
    </script>
    <option value="11050">Genius Traveler 220 = 15 у.е.</option>
    <script>
        da[11051] = new dataArray('sko/mish/11051.html', '14');
    </script>
    <option value="11051">Genius Traveler 305 = 14 у.е.</option>


    <script>
        da[11027] = new dataArray('sko/mish/11027.html', '22');
    </script>
    <option value="11027">Genius Traveler 320 Black (USB) = 22 у.е.</option>

    <script>
        da[11052] = new dataArray('sko/mish/11052.html', '13');
    </script>
    <option value="11052">NEODRIVE = 13 у.е.</option>

    <script>
        da[11053] = new dataArray('sko/mish/11053.html', '15');
    </script>
    <option value="11053">Qumo iO1B Grey = 15 у.е.</option>
    <script>
        da[11054] = new dataArray('sko/mish/11054.html', '18');
    </script>
    <option value="11054">Qumo Q-DRIVE = 18 у.е.</option>
    <script>
        da[11055] = new dataArray('sko/mish/11055.html', '10');
    </script>
    <option value="11055">Sven CS-301 = 10 у.е.</option>
    <script>
        da[11056] = new dataArray('sko/mish/11056.html', '11');
    </script>
    <option value="11056">Sven CS-306 = 11 у.е.</option>
    <script>
        da[11057] = new dataArray('sko/mish/11057.html', '10');
    </script>
    <option value="11057">Sven OP-1 = 10 у.е.</option>
    <script>
        da[11058] = new dataArray('sko/mish/11058.html', '12');
    </script>
    <option value="11058">Sven OP-15 = 12 у.е.</option>
    <script>
        da[11059] = new dataArray('sko/mish/11059.html', '17');
    </script>
    <option value="11059">Sven OP-17 = 17 у.е.</option>
    <script>
        da[11060] = new dataArray('sko/mish/11060.html', '9');
    </script>
    <option value="11060">Sven RX-111 = 9 у.е.</option>
    <script>
        da[11061] = new dataArray('sko/mish/11061.html', '13');
    </script>
    <option value="11061">Sven RX-520 = 13 у.е.</option>

    <script>
        da[11062] = new dataArray('sko/mish/11062.html', '28');
    </script>
    <option value="11062">Sven RX-905 = 28 у.е.</option>
    <script>
        da[11031] = new dataArray('sko/mish/11031.html', '15');
    </script>
    <option value="11031">Sven ML-1100 Black+Silver (USB) = 15 у.е.</option>

</optgroup>
</select>
<a href="#" id="inf11" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                     title="Описание"/></a></td>
<td class="tac" id="kol11" style="display:none">
    <input id="tovkol11" onchange="addconf('11');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent11" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel12" type="hidden"/>
        <input id="kolval12" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Принтер" id="tov12" onchange="addconf('12');">
            <option value="0">Принтер</option>

            <optgroup label="- -  Лазерный A4 - -">
                <script>
                    da[1202] = new dataArray('sko/print/1202.html', '375');
                </script>
                <option value="1202">HP LaserJet Pro 400 M401d = 375 у.е.</option>

                <script>
                    da[1201] = new dataArray('sko/print/1201.html', '86');
                </script>
                <option value="1201">Xerox Phaser 3010 = 86 у.е.</option>

                <script>
                    da[1206] = new dataArray('sko/print/1206.html', '230');
                </script>
                <option value="1206">Xerox Phaser 6000B = 230 у.е.</option>
                <script>
                    da[1203] = new dataArray('sko/print/1203.html', '245');
                </script>
                <option value="1203">Xerox Phaser 3250D = 245 у.е.</option>

                <script>
                    da[1204] = new dataArray('sko/print/1204.html', '270');
                </script>
                <option value="1204">Xerox Phaser 3250DN = 270 у.е.</option>
                <script>
                    da[1207] = new dataArray('sko/print/1207.html', '290');
                </script>
                <option value="1207">Xerox Phaser 6010N = 290 у.е.</option>

                <script>
                    da[1205] = new dataArray('sko/print/1205.html', '474');
                </script>
                <option value="1205">Xerox Phaser 3320DNI = 474 у.е.</option>


            </optgroup>

        </select>
        <a href="#" id="inf12" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol12" style="display:none">
        <input id="tovkol12" onchange="addconf('12');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent12" style="display:none"></td>
</tr>


<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel13" type="hidden"/>
        <input id="kolval13" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="МФУ" id="tov13" onchange="addconf('13');">
            <option value="0">МФУ</option>

            <optgroup label="-   - Canon -  -">

                <script>
                    da[1301] = new dataArray('sko/mfu/1301.html', '69');
                </script>
                <option value="1301">Canon Pixma MP230 = 69 у.е.</option>

                <script>
                    da[1307] = new dataArray('sko/mfu/1307.html', '105');
                </script>
                <option value="1307">Canon Pixma MG3240 = 105 у.е.</option>
                <script>
                    da[1302] = new dataArray('sko/mfu/1302.html', '190');
                </script>
                <option value="1302">Canon LaserBase MF3010 = 190 у.е.</option>

                <script>
                    da[1303] = new dataArray('sko/mfu/1303.html', '225');
                </script>
                <option value="1303">Canon LaserBase MF4410 = 225 у.е.</option>
                <script>
                    da[1308] = new dataArray('sko/mfu/1308.html', '333');
                </script>
                <option value="1308">Canon LaserBase MF4450d = 333 у.е.</option>
                <script>
                    da[1309] = new dataArray('sko/mfu/1309.html', '430');
                </script>
                <option value="1309">Canon LaserBase MF4580DN = 430 у.е.</option>

                <script>
                    da[1305] = new dataArray('sko/mfu/1305.html', '425');
                </script>
                <option value="1305">Canon I-SENSYS MF8040CN = 425 у.е.</option>

                <script>
                    da[1306] = new dataArray('sko/mfu/1306.html', '525');
                </script>
                <option value="1306">Canon IR1133 = 525 у.е.</option>
            </optgroup>
            <optgroup label="-   - HP -  -">

                <script>
                    da[13010] = new dataArray('sko/mfu/13010.html', '195');
                </script>
                <option value="13010">HP LaserJet Pro M1132 MFP = 195 у.е.</option>
            </optgroup>
            <optgroup label="-   - Xerox -  -">

                <script>
                    da[13011] = new dataArray('sko/mfu/13011.html', '154');
                </script>
                <option value="13011">Xerox WorkCentre 3045B = 154 у.е.</option>
                <script>
                    da[13012] = new dataArray('sko/mfu/13012.html', '260');
                </script>
                <option value="13012">Xerox WorkCentre 3045NI = 260 у.е.</option>

                <script>
                    da[13013] = new dataArray('sko/mfu/13013.html', '394');
                </script>
                <option value="13013">Xerox WorkCentre 3210N = 394 у.е.</option>
            </optgroup>

        </select>
        <a href="#" id="inf13" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol13" style="display:none">
        <input id="tovkol13" onchange="addconf('13');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent13" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
<td style="width:570px"><input id="sel14" type="hidden"/>
<input id="kolval14" type="hidden"/>
<input name="parentid[]" value="19667" type="hidden"/>
<select style="font-size:11px;width:500px;" name="Акустика" id="tov14" onchange="addconf('14');">
<option value="0">Акустика</option>

<optgroup label="-  - Canyon - -">
    <script>
        da[14055] = new dataArray('sko/akust/14055.html', '22');
    </script>
    <option value="14055">Canyon CNL-SP20HI = 22 у.е.</option>

    <script>
        da[14056] = new dataArray('sko/akust/14056.html', '22');
    </script>
    <option value="14056">Canyon CNR-SP20ABL = 22 у.е.</option>
    <script>
        da[14057] = new dataArray('sko/akust/14057.html', '22');
    </script>
    <option value="14057">Canyon CNR-SP20DO = 22 у.е.</option>
</optgroup>
<optgroup label="-  - Genius Stereo - -">


    <script>
        da[14058] = new dataArray('sko/akust/14058.html', '28');
    </script>
    <option value="14058">Genius SP-i220 Black = 28 у.е.</option>

    <script>
        da[14059] = new dataArray('sko/akust/14059.html', '40');
    </script>
    <option value="14059">Genius SP-HF1250A = 40 у.е.</option>

    <script>
        da[14060] = new dataArray('sko/akust/14060.html', '60');
    </script>
    <option value="14060">Genius SP-HF2000A = 60 у.е.</option>


</optgroup>

<optgroup label="-  - Sven 2.1 - -">

    <script>
        da[1402] = new dataArray('sko/akust/1402.html', '54');
    </script>
    <option value="1402">Sven Emotion Silver = 54 у.е.</option>
    <script>
        da[1405] = new dataArray('sko/akust/1405.html', '40');
    </script>
    <option value="1405">Sven MS-106 Black = 40 у.е.</option>
    <script>
        da[14061] = new dataArray('sko/akust/14061.html', '45');
    </script>
    <option value="14061">Sven MS-102 Black = 45 у.е.</option>
    <script>
        da[1409] = new dataArray('sko/akust/1409.html', '56');
    </script>
    <option value="1409">Sven MS-308 Black = 56 у.е.</option>
    <script>
        da[14013] = new dataArray('sko/akust/14013.html', '56');
    </script>
    <option value="14013">Sven MS-905 Black = 56 у.е.</option>
    <script>
        da[14015] = new dataArray('sko/akust/14015.html', '58');
    </script>
    <option value="14015">Sven MS-915 = 58 у.е.</option>

    <script>
        da[14016] = new dataArray('sko/akust/14016.html', '58');
    </script>
    <option value="14016">Sven MS-920 Light Wooden = 58 у.е.</option>

    <script>
        da[1408] = new dataArray('sko/akust/1408.html', '60');
    </script>
    <option value="1408">Sven MS-1080 = 60 у.е.</option>
    <script>
        da[14018] = new dataArray('sko/akust/14018.html', '67');
    </script>
    <option value="14018">Sven MS-940 Red = 67 у.е.</option>
    <script>
        da[14062] = new dataArray('sko/akust/14062.html', '69');
    </script>
    <option value="14062">Sven MS-311(цвета разные) = 69 у.е.</option>
    <script>
        da[14063] = new dataArray('sko/akust/14063.html', '69');
    </script>
    <option value="14063">Sven MS-330 Black = 69 у.е.</option>
    <script>
        da[14011] = new dataArray('sko/akust/14011.html', '73');
    </script>
    <option value="14011">Sven MS-321 Black = 73 у.е.</option>
    <script>
        da[1406] = new dataArray('sko/akust/1406.html', '80');
    </script>
    <option value="1406">Sven MS-1060R Black = 80 у.е.</option>
    <script>
        da[1403] = new dataArray('sko/akust/1403.html', '88');
    </script>
    <option value="1403">Sven MS-1020 Black = 88 у.е.</option>


    <script>
        da[14021] = new dataArray('sko/akust/14021.html', '55');
    </script>
    <option value="14021">Sven SPS-820 Black = 55 у.е.</option>

    <script>
        da[14022] = new dataArray('sko/akust/14022.html', '55');
    </script>
    <option value="14022">Sven SPS-820 Silver = 55 у.е.</option>

    <script>
        da[14023] = new dataArray('sko/akust/14023.html', '55');
    </script>
    <option value="14023">Sven SPS-820 Wooden = 55 у.е.</option>


</optgroup>


<optgroup label="- -  Sven Stereo -  -">

    <script>
        da[14031] = new dataArray('sko/akust/14031.html', '17');
    </script>
    <option value="14031">Sven 245 USB = 17 у.е.</option>


    <script>
        da[14036] = new dataArray('sko/akust/14036.html', '16');
    </script>
    <option value="14036">Sven 310 Silver = 16 у.е.</option>
    <script>
        da[14037] = new dataArray('sko/akust/14037.html', '17');
    </script>
    <option value="14037">Sven 314 Black (USB) = 17 у.е.</option>
    <script>
        da[14033] = new dataArray('sko/akust/14033.html', '19');
    </script>
    <option value="14033">Sven 250 Silver = 19 у.е.</option>
    <script>
        da[14040] = new dataArray('sko/akust/14040.html', '19');
    </script>
    <option value="14040">Sven Boogie Ball R = 19 у.е.</option>

    <script>
        da[14035] = new dataArray('sko/akust/14035.html', '20');
    </script>
    <option value="14035">Sven 280 Black = 20 у.е.</option>


    <script>
        da[14038] = new dataArray('sko/akust/14038.html', '21');
    </script>
    <option value="14038">Sven 350 Silver = 21 у.е.</option>

    <script>
        da[14042] = new dataArray('sko/akust/14042.html', '23');
    </script>
    <option value="14042">Sven SPS-607 Black = 23 у.е.</option>

    <script>
        da[14043] = new dataArray('sko/akust/14043.html', '23');
    </script>
    <option value="14043">Sven SPS-607 Wooden+Walnut = 23 у.е.</option>
    <script>
        da[14064] = new dataArray('sko/akust/14064.html', '46');
    </script>
    <option value="14064">Sven BF-01(цвета разные) = 46 у.е.</option>
    <script>
        da[14065] = new dataArray('sko/akust/14065.html', '56');
    </script>
    <option value="14065">Sven BF-11 (цвета разные) = 56 у.е.</option>
    <script>
        da[14066] = new dataArray('sko/akust/14066.html', '92');
    </script>
    <option value="14066">Sven BF-111 black = 92 у.е.</option>
    <script>
        da[14067] = new dataArray('sko/akust/14067.html', '73');
    </script>
    <option value="14067">Sven MA-331 Cherry = 73 у.е.</option>

    <script>
        da[14068] = new dataArray('sko/akust/14068.html', '100');
    </script>
    <option value="14068">Sven MA-333(цвета разные) = 100 у.е.</option>
    <script>
        da[14069] = new dataArray('sko/akust/14069.html', '19');
    </script>
    <option value="14069">Sven PS-32 Grey = 19 у.е.</option>


    <script>
        da[14072] = new dataArray('sko/akust/14072.html', '39');
    </script>
    <option value="14072">Sven SPS-608 Grey = 39 у.е.</option>
    <script>
        da[14073] = new dataArray('sko/akust/14073.html', '29');
    </script>
    <option value="14073">Sven SPS-609 (цвета разные) = 29 у.е.</option>
    <script>
        da[14074] = new dataArray('sko/akust/14074.html', '49');
    </script>
    <option value="14074">Sven SPS-702 Black Leather = 49 у.е.</option>

    <script>
        da[14044] = new dataArray('sko/akust/14044.html', '58');
    </script>
    <option value="14044">Sven SPS-700 Black = 58 у.е.</option>

    <script>
        da[14045] = new dataArray('sko/akust/14045.html', '58');
    </script>
    <option value="14045">Sven SPS-700 Silver = 58 у.е.</option>

    <script>
        da[14046] = new dataArray('sko/akust/14046.html', '58');
    </script>
    <option value="14046">Sven SPS-700 Walnut = 58 у.е.</option>

    <script>
        da[14047] = new dataArray('sko/akust/14047.html', '77');
    </script>
    <option value="14047">Sven SPS-704 Black = 77 у.е.</option>

    <script>
        da[14048] = new dataArray('sko/akust/14048.html', '77');
    </script>
    <option value="14048">Sven SPS-704 Cherry = 77 у.е.</option>

    <script>
        da[14049] = new dataArray('sko/akust/14049.html', '141');
    </script>
    <option value="14049">Sven Stream Black = 141у.е.</option>

    <script>
        da[14050] = new dataArray('sko/akust/14050.html', '141');
    </script>
    <option value="14050">Sven Stream Cherry = 141 у.е.</option>

    <script>
        da[14051] = new dataArray('sko/akust/14051.html', '103');
    </script>
    <option value="14051">Sven Stream Light Black = 103 у.е.</option>

    <script>
        da[14052] = new dataArray('sko/akust/14052.html', '103');
    </script>
    <option value="14052">Sven Stream Light Cherry = 103 у.е.</option>

    <script>
        da[14070] = new dataArray('sko/akust/14070.html', '158');
    </script>
    <option value="14070">Sven Royal 1R = 158 у.е.</option>
    <script>
        da[14071] = new dataArray('sko/akust/14071.html', '196');
    </script>
    <option value="14071">Sven Royal 2R = 196 у.е.</option>

</optgroup>
</select>
<a href="#" id="inf14" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png" alt="info"
                                                                                     title="Описание"/></a></td>
<td class="tac" id="kol14" style="display:none">
    <input id="tovkol14" onchange="addconf('14');" name="k[]" type="text" size="3" value="1"/>
</td>
<td class="tac" id="rent14" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel15" type="hidden"/>
        <input id="kolval15" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="ИБП" id="tov15" onchange="addconf('15');">
            <option value="0">ИБП</option>

            <optgroup label="-  -  <1000 - -">
                <script>
                    da[1507] = new dataArray('sko/ibp/1507.html', '22');
                </script>
                <option value="1507">Netys Net0600-PE = 22 у.е.</option>
                <script>
                    da[1501] = new dataArray('sko/ibp/1501.html', '50');
                </script>
                <option value="1501">FSP NANO 400 = 50 у.е.</option>
                <script>
                    da[1504] = new dataArray('sko/ibp/1504.html', '53');
                </script>
                <option value="1504">FSP NANO 600 = 53 у.е.</option>
                <script>
                    da[1505] = new dataArray('sko/ibp/1505.html', '71');
                </script>
                <option value="1505">FSP NANO 800 = 71 у.е.</option>

                <script>
                    da[1506] = new dataArray('sko/ibp/1506.html', '69');
                </script>
                <option value="1506">FSP Vesta 650 = 69 у.е.</option>

                <script>
                    da[1502] = new dataArray('sko/ibp/1502.html', '54');
                </script>
                <option value="1502">Sven UPS Pro+ 400 VA = 54 у.е.</option>

                <script>
                    da[1503] = new dataArray('sko/ibp/1503.html', '64');
                </script>
                <option value="1503">Sven UPS Pro+ 500 VA = 64 у.е.</option>
            </optgroup>

            <optgroup label="-  -  =>1000 -   -">

                <script>
                    da[1508] = new dataArray('sko/ibp/1508.html', '151');
                </script>
                <option value="1508">FSP Vesta 1500 = 151 у.е.</option>

                <script>
                    da[1509] = new dataArray('sko/ibp/1509.html', '198');
                </script>
                <option value="1509">FSP Vesta 2000 = 198 у.е.</option>


            </optgroup>


        </select>
        <a href="#" id="inf15" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol15" style="display:none">
        <input id="tovkol15" onchange="addconf('15');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent15" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel16" type="hidden"/>
        <input id="kolval16" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Мультимедиа" id="tov16" onchange="addconf('16');">
            <option value="0">Мультимедиа</option>

            <optgroup label="-  - Вебкамера -  -">

                <script>
                    da[16034] = new dataArray('sko/media/16034.html', '19');
                </script>
                <option value="16034">Canyon CNL-WCAM220 = 19 у.е.</option>
                <script>
                    da[16035] = new dataArray('sko/media/16035.html', '19');
                </script>
                <option value="16035">Canyon CNL-WCAM813A = 19 у.е.</option>

                <script>
                    da[1601] = new dataArray('sko/media/1601.html', '71');
                </script>
                <option value="1601">D-Link DCS-930L = 71 у.е.</option>


                <script>
                    da[1603] = new dataArray('sko/media/1603.html', '259');
                </script>
                <option value="1603">D-Link DCS-2210 = 259 у.е.</option>


                <script>
                    da[1607] = new dataArray('sko/media/1607.html', '18');
                </script>
                <option value="1607">Genius iLook 300 = 18 у.е.</option>
                <script>
                    da[1604] = new dataArray('sko/media/1604.html', '20');
                </script>
                <option value="1604">Genius Eye 312 = 20 у.е.</option>

                <script>
                    da[16036] = new dataArray('sko/media/16036.html', '29');
                </script>
                <option value="16036">Genius FaceCam 1005 = 29 у.е.</option>
                <script>
                    da[1605] = new dataArray('sko/media/1605.html', '21');
                </script>
                <option value="1605">Genius FaceCam 312 = 21 у.е.</option>


                <script>
                    da[1606] = new dataArray('sko/media/1606.html', '27');
                </script>
                <option value="1606">Genius eFace 1300 = 27 у.е.</option>

                <script>
                    da[16037] = new dataArray('sko/media/16037.html', '25');
                </script>
                <option value="16037">Genius iSlim 321R = 25 у.е.</option>

                <script>
                    da[1609] = new dataArray('sko/media/1609.html', '28');
                </script>
                <option value="1609">Genius iSlim 320 = 28 у.е.</option>
                <script>
                    da[1608] = new dataArray('sko/media/1608.html', '34');
                </script>
                <option value="1608">Genius iSlim 1320 = 34 у.е.</option>

                <script>
                    da[16038] = new dataArray('sko/media/16038.html', '20');
                </script>
                <option value="16038">Neodrive Space Dog = 20 у.е.</option>

                <script>
                    da[16017] = new dataArray('sko/media/16017.html', '28');
                </script>
                <option value="16017">Qumo WCQ-108 = 28 у.е.</option>


                <script>
                    da[16021] = new dataArray('sko/media/16021.html', '21');
                </script>
                <option value="16021">Sven CU-2.1 = 21 у.е.</option>
                <script>
                    da[16039] = new dataArray('sko/media/16039.html', '22');
                </script>
                <option value="16039">Sven CU-3.1 = 22 у.е.</option>

                <script>
                    da[16022] = new dataArray('sko/media/16022.html', '23');
                </script>
                <option value="16022">Sven CU-2.2 = 23 у.е.</option>

                <script>
                    da[16040] = new dataArray('sko/media/16040.html', '20');
                </script>
                <option value="16040">Sven IC-410 = 20 у.е.</option>
                <script>
                    da[16041] = new dataArray('sko/media/16041.html', '24');
                </script>
                <option value="16041">Sven IC-650 = 24 у.е.</option>
                <script>
                    da[16042] = new dataArray('sko/media/16042.html', '26');
                </script>
                <option value="16042">Sven IC-730 = 26 у.е.</option>

                <script>
                    da[16043] = new dataArray('sko/media/16043.html', '32');
                </script>
                <option value="16043">Sven IC-980 HD = 32 у.е.</option>
            </optgroup>

            <optgroup label="-  - Наушники -  -">

                <script>
                    da[16049] = new dataArray('sko/media/16049.html', '8');
                </script>
                <option value="16049">Sven SEB-100 = 8 у.е.</option>
                <script>
                    da[16050] = new dataArray('sko/media/16050.html', '10');
                </script>
                <option value="16050">Sven SEB-150 Glamour = 10 у.е.</option>
                <script>
                    da[16046] = new dataArray('sko/media/16046.html', '11');
                </script>
                <option value="16046">Sven GD-200MV = 11 у.е.</option>

                <script>
                    da[16026] = new dataArray('sko/media/16026.html', '11');
                </script>
                <option value="16026">Sven AP-700 = 11 у.е.</option>

                <script>
                    da[16024] = new dataArray('sko/media/16024.html', '12');
                </script>
                <option value="16024">Sven AP-620 = 12 у.е.</option>

                <script>
                    da[16031] = new dataArray('sko/media/16031.html', '12');
                </script>
                <option value="16031">Sven HM-40BK = 12 у.е.</option>

                <script>
                    da[16044] = new dataArray('sko/media/16044.html', '15');
                </script>
                <option value="16044">Sven AP-670MV = 15 у.е.</option>
                <script>
                    da[16047] = new dataArray('sko/media/16047.html', '15');
                </script>
                <option value="16047">Sven GD-910MV = 15 у.е.</option>

                <script>
                    da[16045] = new dataArray('sko/media/16045.html', '23');
                </script>
                <option value="16045">Sven CD-Blonde = 23 у.е.</option>
                <script>
                    da[16048] = new dataArray('sko/media/16048.html', '29');
                </script>
                <option value="16048">Sven GD-970MV = 29 у.е.</option>
                <script>
                    da[16030] = new dataArray('sko/media/16030.html', '30');
                </script>
                <option value="16030">Sven HM-100GT = 30 у.е.</option>


            </optgroup>


        </select>
        <a href="#" id="inf16" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol16" style="display:none">
        <input id="tovkol16" onchange="addconf('16');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent16" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel17" type="hidden"/>
        <input id="kolval17" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Игровые устройства" id="tov17" onchange="addconf('17');">
            <option value="0">Игровые устройства</option>

            <optgroup label="- -  Геймпады -  -">
                <script>
                    da[1704] = new dataArray('sko/game/1704.html', '20');
                </script>
                <option value="1704">Genius MaxFire Grandias 12V = 20 у.е.</option>

                <script>
                    da[1701] = new dataArray('sko/game/1701.html', '30');
                </script>
                <option value="1701">Sven Combat = 30 у.е.</option>


                <script>
                    da[1702] = new dataArray('sko/game/1702.html', '32');
                </script>
                <option value="1702">Sven X-pad Aero = 32 у.е.</option>


            </optgroup>

            <optgroup label="- -  Рули - -">

                <script>
                    da[1708] = new dataArray('sko/game/1708.html', '74');
                </script>
                <option value="1708">Sven Driver = 74 у.е.</option>


            </optgroup>

        </select>
        <a href="#" id="inf17" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol17" style="display:none">
        <input id="tovkol17" onchange="addconf('17');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent17" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:570px"><input id="sel18" type="hidden"/>
        <input id="kolval18" type="hidden"/>
        <input name="parentid[]" value="19667" type="hidden"/>
        <select style="font-size:11px;width:500px;" name="Фильтры питания" id="tov18" onchange="addconf('18');">
            <option value="0">Фильтры питания</option>


            <optgroup label="-  -  SVEN -   -">


                <script>
                    da[1803] = new dataArray('sko/fp/1803.html', '8');
                </script>
                <option value="1803">Sven Surge Protector Optima Base 1.8 m (3 sockets) black = 8 у.е.</option>

                <script>
                    da[1804] = new dataArray('sko/fp/1804.html', '8');
                </script>
                <option value="1804">Sven Surge Protector Optima Base 5,0 m (5 sockets) black = 8 у.е.</option>

                <script>
                    da[1805] = new dataArray('sko/fp/1805.html', '9');
                </script>
                <option value="1805">Sven Surge Protector Optima Base 1.8 m (3 sockets) grey = 9 у.е.</option>

                <script>
                    da[1806] = new dataArray('sko/fp/1806.html', '9');
                </script>
                <option value="1806">Sven Surge Protector Optima Base 1.8 m (5 sockets) black = 9 у.е.</option>


            </optgroup>
        </select>
        <a href="#" id="inf18" class="infcolorbox" target="_blank" style="display:none"><img src="sko/info_ico.png"
                                                                                             alt="info"
                                                                                             title="Описание"/></a></td>
    <td class="tac" id="kol18" style="display:none">
        <input id="tovkol18" onchange="addconf('18');" name="k[]" type="text" size="3" value="1"/>
    </td>
    <td class="tac" id="rent18" style="display:none"></td>
</tr>

<!----------------------------------------------------------------//-->


<tr>
    <td colspan="3">
        <div class="sep">&nbsp;</div>
    </td>
</tr>
<tr>
    <td colspan="3" id="skidkatext"></td>
</tr>
<tr>

    <td><h3><span id="skidka">Скидка: 0%</span></h3></td>
    <td class="tac"><h3>Сумма&nbsp;</h3></td>
    <td class="tac" valign="top">

        <h3 id="summall" style="white-space:nowrap">0 у.е.</h3></td>
    <input type="hidden" name="Стоимость+10у.е." id="globalrent" value="0">
    <input type="hidden" id="globalrent2" value="0">
    <input type="hidden" name="Скидка" id="gskidka2" value="0">
</tr>
</table>
<table class="conf-t">
    <tr>
        <th width="575px" style="color:#f43939">Оформление заказа</th>
        <th width="80px">&nbsp;</th>
    </tr>
    <tr>
        <td colspan="3">
            <div class="sep">&nbsp;</div>
        </td>
    </tr>
</table>
<input type="text" id="Editbox1"
       style="position:relative;left:100px;top:4px;width:400px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:38"
       name="Ваше имя" value="" maxlength="41">
<input type="text" id="Editbox2"
       style="position:relative;left:100px;top:14px;width:400px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:39"
       name="Телефон" value="" maxlength="20">
<input type="text" id="Editbox3"
       style="position:relative;left:100px;top:24px;width:400px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:40"
       name="Мыло" value="" maxlength="50">
<textarea name="Адрес доставки" id="TextArea2"
          style="position:relative;left:100px;top:33px;width:400px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:41"
          rows="1" cols="26"></textarea>
<input type="text" id="Editbox4"
       style="position:relative;left:100px;top:43px;width:400px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:40"
       name="Комментарии" value="" maxlength="140">
       
<div id="wb_Text27"
     style="margin:0;padding:0;position:relative;left:10px;top:-94px;width:93px;height:15px;text-align:left;z-index:34;">
    <font style="font-size:12px" color="#000000" face="Arial">Ваше имя*</font></div>
<div id="wb_Text28"
     style="margin:0;padding:0;position:relative;left:10px;top:-79px;width:93px;height:15px;text-align:left;z-index:35;">
    <font style="font-size:12px" color="#000000" face="Arial">Ваш телефон*</font></div>
<div id="wb_Text29"
     style="margin:0;padding:0;position:relative;left:10px;top:-64px;width:93px;height:15px;text-align:left;z-index:36;">
    <font style="font-size:12px" color="#000000" face="Arial">E-mail</font></div>
<div id="wb_Text26"
     style="margin:0;padding:0;position:relative;left:10px;top:-51px;width:93px;height:30px;text-align:left;z-index:37;">
    <font style="font-size:12px" color="#000000" face="Arial">Адрес доставки</font></div>
<div id="wb_Text26"
     style="margin:0;padding:0;position:relative;left:10px;top:-49px;width:93px;height:30px;text-align:left;z-index:37;">
    <font style="font-size:12px" color="#000000" face="Arial">Комментарии</font></div>
<input type="submit" id="Button1" name="" value="Отправить">
<a href="http://cooler.by/sobrat_kompjuter_onlajn.php"><input type="reset" id="Button2" name="" value="Очистить"></a>

<input type="hidden" id="tov1Input" name='tov1Input' value=""/>
<input type="hidden" id="tov2Input" name='tov2Input' value=""/>
<input type="hidden" id="tov3Input" name='tov3Input' value=""/>
<input type="hidden" id="tov4Input" name='tov4Input' value=""/>
<input type="hidden" id="tov5Input" name='tov5Input' value=""/>
<input type="hidden" id="tov6Input" name='tov6Input' value=""/>
<input type="hidden" id="tov7Input" name='tov7Input' value=""/>
<input type="hidden" id="tov8Input" name='tov8Input' value=""/>
<input type="hidden" id="tov9Input" name='tov9Input' value=""/>
<input type="hidden" id="tov10Input" name='tov10Input' value=""/>
<input type="hidden" id="tov11Input" name='tov11Input' value=""/>
<input type="hidden" id="tov12Input" name='tov12Input' value=""/>
<input type="hidden" id="tov13Input" name='tov13Input' value=""/>
<input type="hidden" id="tov14Input" name='tov14Input' value=""/>
<input type="hidden" id="tov15Input" name='tov15Input' value=""/>
<input type="hidden" id="tov16Input" name='tov16Input' value=""/>
<input type="hidden" id="tov17Input" name='tov17Input' value=""/>
<input type="hidden" id="tov18Input" name='tov18Input' value=""/>
<input type="hidden" id="tov19Input" name='tov19Input' value=""/>

<input type="text" style="display: none;" name="e-mail" value="" maxlength="70">

</form>
</div>
<div id="text_footer">
    *поле обязательно для заполнения
    <br><br>
    При сборке компьютера онлайн в Минске нужно учесть следующие моменты:
    <br><br>1. Сходство сокета процессора и материнской платы.
    <br>2. Соответствие оперативной памяти и разъему на материнской плате.
    <br>3. Наличие интегрированной видеокарты в некоторых материнских платах.
    <br>4. Большинство DWD-ромов не поддерживают формат Blu-ray.
    <br>5. В игровом компьютере мощность процессора должна соответствовать выбранной видеокарте.
    <br>6. Подобрать мощность блока питания по мощности комплектующих.
    <br>7. Сходство сокета кулера на процессор и материнской платы.

</div>
</div>
<div style="clear: both;">&nbsp;</div>
</div>
</div>
<hr/>
<!-- start footer -->
<?php include ("index/footer.txt"); ?>
</div>
<?php include ("index/metrika_jivo.txt"); ?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <script type="text/javascript">alert("Конфигурация отправлена.");</script>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".infcolorbox").colorbox({
            /*html:function()
             {
             var content=$.ajax({url:$(this).attr('href'),async:true}).responseText;
             return content;
             },*/
            href:function () {
                if ($(this).attr('tagName') == "A") return $(this).attr('href');
                else return $(this).parent().attr('href');
            },
            scrolling:false,
            onComplete:function () {
                $(this).colorbox.resize();
            }
        });
    });

    function addValue(item)
    {

        var input = document.getElementById(item.id + 'Input');
        alert(item);
        input.value = item.options[item.selectedIndex].text;
    }
</script>
</body>
</html>
