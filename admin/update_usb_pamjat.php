<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['image'])) {$image = $_POST['image']; if ($image == '') {unset($image);}}
if (isset($_POST['cost'])) {$cost = $_POST['cost']; if ($cost == '') {unset($cost);}}
if (isset($_POST['date'])) {$date = $_POST['date']; if ($date == '') {unset($date);}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Обработчик</title>
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
             <div id="text"><br>
<?php
echo "<div align='center'><table border='1' width='710px'>
  <tr>
    <td id='td_tabl_sbor'><a href='new_usb_pamjat.php'>Добавить</a></td>
	<td id='td_tabl_sbor'><a href='edit_usb_pamjat.php'>Редактировать</a></td>
  </tr>
</table></div><br />";
?>
<?php
if (isset($title) && isset($image) && isset($cost) && isset($date))
{
$result = mysql_query("UPDATE usb_pamjat SET title='$title', image='$image', cost='$cost', date='$date' WHERE id=$id");

if ($result == 'true') {echo "<p>Данные успешно обновлены!</p>";}
else {echo "<p>Данные не обновлены!</p>";}	
}
else
{
echo "<p>Вы ввели не все данные!</p>";	
}


?>
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