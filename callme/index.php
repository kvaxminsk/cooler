<?
// www.nazartokar.com
// www.dedushka.org
// icq: 167-250-811
// nazartokar@gmail.com

//давайте укажем кодировку
header("Content-Type: text/html; charset=utf-8");

//адрес почты для отправки уведомления
//несколько ящиков перечисляются через запятую
$to = "coolernoyt@gmail.com";
//адрес, от которого придёт уведомление
$from = "info@cooler.by";

//далее можно не трогать

$time = time(); // время отправки
$interval = $time - $_GET['ctime'];
if ($interval < 20) { // если прошло менее часа, указано в секундах
	$result = "error";
	$cls = "c_error";
	$time = "";
	$message = "Сообщение уже было отправлено.";	
} else {

if ( (strlen($_GET['cname']) > 2) && ( (strlen($_GET['cphone']) > 5 ) ) ) {

$ip = $_SERVER['REMOTE_ADDR'];

$title = "Перезвоните мне";
$mess =  "Телефон: \n".substr(htmlspecialchars(trim($_GET['cphone'])), 0, 15)."\n\nИмя: \n".substr(htmlspecialchars(trim($_GET['cname'])), 0, 50);

if (strlen($_GET['ccmnt']) > 2) {
	$mess = $mess."\n\nКомментарий: \n".substr(htmlspecialchars(trim($_GET['ccmnt'])), 0, 70);
}

$mess = $mess.("\n\nОтправлено со страницы: \n".htmlspecialchars($_GET['url']));
$mess = $mess.("\n\nIP: \n".$ip);

$headers = "From: ".$from."\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";

@mail($to, $title, $mess, $headers);
	$result = "success";
	$cls = "c_success";
	$message = "Спасибо, сообщение отправлено."; //сообщение об отправке
	//$message = $mess;
} else {
	$result = "error";
	$cls = "c_error";
	$time = "";
	$message = "Заполните все поля.";
}
}
?>{
"result": "<? echo $result; ?>",
"cls": "<? echo $cls; ?>",
"time": "<? echo $time; ?>",
"message": "<? echo $message; ?>"
}