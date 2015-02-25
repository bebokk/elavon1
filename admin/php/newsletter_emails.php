<?php

include('php/plugins/structure_details_clear_sessions.php');

$_SESSION['elements_list1_tab']='';
$_SESSION['elements_details1_tab']='';
$_SESSION['page_settings_tab']='';

//basic list of elements based on one standard table
$table_name='newsletter_emails';
$table_key='newsletter_emailid';
$view_name1='Newsletter';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

/*
newsid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
title 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
description 	text 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements on list 
$elements_list1_tab['name']['email']='E-mail';

$elements_list1_tab['type']['email']='text';

//element for width
$elements_list1_tab['width']['email']='90';

//element for filters
$elements_list1_tab['filter']['email']='text';

//element for sort
$elements_list1_tab['sort']['email']=1;

$default_sort1='email';
$default_sort2='DESC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['email']='E-mail';

$elements_details1_tab['type']['email']='text';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
//$page_settings_tab['translations']=1;
//$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//translations settings
//$elements_details1_tab['translations']['email']=1;

include_once('php/elements/structure_basic.php');





































?>