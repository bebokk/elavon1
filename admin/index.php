<?php

//session_destroy();
session_start();

include_once('sec.php');

define("DIR_CL","class/");

require_once(DIR_CL.'class.Smarty.php');
require_once(DIR_CL.'class.MySmarty.php');
require_once(DIR_CL.'class.HttpRequest.php');

$tpl = new MySmarty();

require_once('config/mysql.php');

include_once('login.php');
	
include_once('includes/header.html');

$_SESSION['lang']=1;
$_SESSION['lang1']=1;

//get translation
require_once('config/trans/'.$_SESSION['lang1'].'.php');
$tpl->assign("trans_tab",$trans_tab);

if ($_SESSION['lang1'] != 1) {
	require_once('config/trans2/'.$_SESSION['lang1'].'.php');
}

include_once('global.php');
include_once('functions.php');

if ($_GET['subpage'] != '') {
	include('php/'.$_GET['subpage'].'.php');	
} elseif ($_GET['page'] != '') {
	include('php/'.$_GET['page'].'.php');	
}

$tpl->assign("session_lang",$_SESSION['lang']);
$tpl->assign("session",$_SESSION);
$tpl->display('_index.tpl');

include('includes/footer.html');




























mysql_close($dbc);

?>