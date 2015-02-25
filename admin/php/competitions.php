<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='competitions';
$table_key='competitionid';
$view_name1='Competitions';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

/*
newsid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
name 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
description 	text 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['active']='Active';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['active']='select';

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['active'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['name']='80';
$elements_list1_tab['width']['active']='10';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['active']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['active']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['question']='Question';
$elements_details1_tab['name']['answers']='Answers';
$elements_details1_tab['name']['active']='Active';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['question']='text';
$elements_details1_tab['type']['answers']='text';
$elements_details1_tab['type']['active']='select';
$elements_details1_tab['type']['description']='wysywig';

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['active'][$key]=$value;
}

$page_settings_tab['position']=1;
$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
//$page_settings_tab['translations']=1;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//translations settings
//$elements_details1_tab['translations']['name']=1;
//$elements_details1_tab['translations']['description']=1;

include_once('php/elements/structure_basic.php');





































?>