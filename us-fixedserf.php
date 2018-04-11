<?php
/*
 * Серфинг для фермы
 * Version: 1.01
 * Edited by: MrShahzodbek
 * Telegram: @MrShahzodbek
*/
define('TIME', time());
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);

header("Content-type: text/html; charset=windows-1251");

session_start();

if (!isset($_SESSION['user_id'])) { exit(); }

if (isset($_POST['p1']))
{
  function __autoload($name){ include(BASE_DIR."/classes/_class.".$name.".php");}

  $config = new config;

  $db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
  $db->Query("set names cp1251;");

  $id = (int)$_POST['p1'];
  
  $db->Query("SELECT id FROM db_serfing WHERE money >= price and status = '2' and id = '".$id."'");
  
  if ($db->NumRows())
  {
    echo 'serfing/view/'.$id.'';
  } 
}  
?>
