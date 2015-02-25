<?php

@include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='main_page_boxes';
$table_key='main_page_boxid';
$view_name1='Main page boxes';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

/*
main_page_boxid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
news_categoryid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements on list
$elements_list1_tab['name']['name']='Name';
//$elements_list1_tab['name']['news_categoryid']='Category';
$elements_list1_tab['name']['active']='Active';

$elements_list1_tab['type']['name']='text';
//$elements_list1_tab['type']['news_categoryid']='multiselect';
$elements_list1_tab['type']['active']='select';

//select values
$query = "SELECT * FROM news_categories ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['multiselect']['news_categoryid'][$row['news_categoryid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_list1_tab['select']['active'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['name']='80';
//$elements_list1_tab['width']['news_categoryid']='60';
$elements_list1_tab['width']['active']='10';
//$elements_list1_tab['width']['ban_cat']='5';

//element for filters
$elements_list1_tab['filter']['name']='text';
//$elements_list1_tab['filter']['news_categoryid']='select';
$elements_list1_tab['filter']['active']='select';
//$elements_list1_tab['filter']['ban_cat']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;
//$elements_list1_tab['sort']['news_categoryid']=1;
$elements_list1_tab['sort']['active']=1;
//$elements_list1_tab['sort']['ban_cat']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='name';
//$elements_details1_tab['name']['news_categoryid']='Category';
$elements_details1_tab['name']['active']='Active';
$elements_details1_tab['name']['header']='Header';
$elements_details1_tab['name']['type']='Type';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
//$elements_details1_tab['type']['news_categoryid']='multiselect';
$elements_details1_tab['type']['active']='select';
$elements_details1_tab['type']['header']='select';
$elements_details1_tab['type']['type']='select';
$elements_details1_tab['type']['description']='wysywig';

//select values tpe_of_banner_type_tab
$query = "SELECT * FROM news_categories ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['news_categoryid'][$row['news_categoryid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_details1_tab['select']['active'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {
	$elements_details1_tab['select']['header'][$key]=$value;
}

foreach ($type_of_main_page_tab as $key => $value) {
	$elements_details1_tab['select']['type'][$key]=$value;
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['position']=1;

//translations settings
//$elements_details1_tab['translations']['name']=1;
//$elements_details1_tab['translations']['description']=1;

@include_once('php/elements/structure_basic.php');





































?>