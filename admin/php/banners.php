<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='banners';
$table_key='bannerid';
$view_name1='Banners';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

/*
bannerid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
name 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
description 	text 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['main_page']='Display on Main Page';
//$elements_list1_tab['name']['ban_cat']='BanCat';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['main_page']='select';

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['main_page'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['name']='70';
$elements_list1_tab['width']['main_page']='20';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['main_page']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['main_page']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='name';
$elements_details1_tab['name']['description']='description';
$elements_details1_tab['name']['main_page']='Display on Main Page';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['description']='wysywig';
$elements_details1_tab['type']['main_page']='select';

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['main_page'][$key]=$value;
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