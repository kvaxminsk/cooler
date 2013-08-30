<?php
session_start();

if(htmlspecialchars(trim($_POST['currency'])) == 'on')
{
    if($_POST['current_currency'] == 'dollar')
    {
        $_SESSION['current_currency'] = 'belarus';
    }
    elseif($_POST['current_currency'] == 'belarus')
    {
        $_SESSION['current_currency'] = 'dollar';
    }

}
else
{
    $_SESSION['current_currency'] = 'dollar';
}
header('Location: '. $_SERVER['HTTP_REFERER']);