<?php
session_start();
require 'php/config.php';

//chech if language is selected from from the options and set its value in variable
if(isSet($_GET['lang'])){

$lang = $_GET['lang'];

// register the session and set the cookie,cookie expires in 30 days(3600*24 = 84600 which is equal to 1 day *30 equals to 30 days)
$_SESSION['lang'] = $lang;
setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
//if everything is alright set the chosen language to to session and give it expiration day.Once the exipration time passes the language 
//will be set to English
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
//if no language is selected the default language is English (en)
else{
$lang = 'en';
}
//depending on the value in $lanf the path file equals to the corresponding language
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
//set path to that corresponding file
include_once 'languages/'.$lang_file;
?>