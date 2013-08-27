<?php
$host = "localhost";
$login ="root";//"varetis";
$pass = "root";//"ecoleds5";
$database = "varetis_cooler";
$db = mysql_connect($host, $login, $pass);
if (!$db)
{
	echo "DataBase Error: can't connect DB!";
	exit();
	}
	
$pb = mysql_select_db($database, $db);
if (!$pb)
{
	echo "DataBase Error: can't select DB!";
	exit();
	}
	mysql_query('set names utf8');
?>