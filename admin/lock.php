<?php
/*include ("blocks/bd.php");*/
$host = "localhost";
$login = "varetis";
$pass = "ecoleds5";
$database = "varetis_cooler";
$db = mysql_connect($host, $login, $pass);
$pb = mysql_select_db($database, $db);

 if(!isset($_SESSION['enter'])) 
    { 
        if (empty($_SERVER['PHP_AUTH_USER']))  
        {  
            header ("WWW-Authenticate: Basic realm=\"Admin Page\"");  
            header ("HTTP/1.0 401 Unauthorized");  
            exit();  
        }  
        else  
        {  
            $res = mysql_query("SELECT COUNT(*) AS cnt FROM userlist  
                               WHERE user='". mysql_real_escape_string($_SERVER['PHP_AUTH_USER']) ."'  
                               AND pass='".md5($_SERVER['PHP_AUTH_PW'])."'" 
                              );  


            if (mysql_result($res, 0) == 0)  
            {  
                header ("WWW-Authenticate: Basic realm=\"Admin Page\"");  
                header ("HTTP/1.0 401 Unauthorized");  
                exit();  
            } 
            
            $_SESSION['enter'] = true;        
        
        } 
    }
?>