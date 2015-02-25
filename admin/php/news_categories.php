<?php

include('php/plugins/structure_details_clear_sessions.php');

$_SESSION['elements_list1_tab']='';
$_SESSION['elements_details1_tab']='';
$_SESSION['page_settings_tab']='';

//basic list of elements based on one standard table
$table_name='news_categories';
$table_key='news_categoryid';
$view_name1='News categories';

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
$elements_list1_tab['name']['parentid']='Parent';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['parentid']='select';

//element for width
$elements_list1_tab['width']['name']='45'; 
$elements_list1_tab['width']['parentid']='45';

$query = "SELECT * FROM news_categories ORDER BY position ASC";
$result = @mysql_query ($query);
$elements_list1_tab['select']['parentid'][0]='Main catagory';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['parentid'][$row['news_categoryid']]=$row['name'];
}

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['parentid']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['parentid']='Parent';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['parentid']='select';

$query = "SELECT * FROM news_categories ORDER BY position ASC";
$result = @mysql_query ($query);
$elements_details1_tab['select']['parentid'][0]='Main catagory';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['parentid'][$row['news_categoryid']]=$row['name'];
}

$page_settings_tab['position']=1;
$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
//$page_settings_tab['translations']=1;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//translations settings
$elements_details1_tab['translations']['name']=1;

include_once('php/elements/structure_basic.php');

generate_friendly_urls();


































?>