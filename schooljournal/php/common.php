<?php
session_start();
require 'config.php';
header('Cache-control: private'); // IE 6 FIX
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

$_SESSION['lang'] = $lang;

setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}
switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;

  case 'bg':
  $lang_file = 'lang.bg.php';
  break;

  case 'rus':
  $lang_file = 'lang.rus.php';
  break;
  default:
  $lang_file = 'lang.en.php';

}

include_once '../languages/'.$lang_file;
?>