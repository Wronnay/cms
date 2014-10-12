<?php
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'de';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
        else
    {
        $_SESSION['lang'] = 'de';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == 'de' or $_SESSION['lang'] == 'en') {

}
else { $_SESSION['lang'] = 'de'; }
?>
