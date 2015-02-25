<?php

@include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='news';
$table_key='newsid';
$view_name1='News';

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
$elements_list1_tab['name']['title']='Title';
$elements_list1_tab['name']['news_categoryid']='Category';
$elements_list1_tab['name']['state']='State';
$elements_list1_tab['name']['score']='Score';
$elements_list1_tab['name']['ban_main']='BanMain';
$elements_list1_tab['name']['ban_cat']='BanCat';
$elements_list1_tab['name']['main_page']='MainPage';
//$elements_list1_tab['name']['ban_cat']='BanCat';

$elements_list1_tab['type']['title']='text';
$elements_list1_tab['type']['news_categoryid']='multiselect';
$elements_list1_tab['type']['state']='select';
$elements_list1_tab['type']['score']='select';
$elements_list1_tab['type']['ban_main']='select';
$elements_list1_tab['type']['ban_cat']='select';
$elements_list1_tab['type']['main_page']='select';
//$elements_list1_tab['type']['ban_cat']='select';

//select values
$query = "SELECT * FROM news_categories ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['multiselect']['news_categoryid'][$row['news_categoryid']]=$row['name'];
}

$query = "SELECT * FROM news_categories WHERE parentid=0 ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['multiselect1']['news_categoryid'][$row['news_categoryid']]=$row['name'];
	$query1 = "SELECT * FROM news_categories WHERE parentid='".$row['news_categoryid']."' ORDER BY position ASC";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {		
		$elements_list1_tab['multiselect1']['news_categoryid'][$row1['news_categoryid']]='&nbsp;&nbsp;&nbsp;-&nbsp;'.$row1['name'];
	}
}



foreach ($news_state_tab as $key => $value) {
	$elements_list1_tab['select']['state'][$key]=$value;
}

foreach ($score_tab as $key => $value) {
	$elements_list1_tab['select']['score'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['ban_main'][$key]=$value;
}


foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['ban_cat'][$key]=$value;
}

foreach ($on_main_age_display_tab as $key => $value) {	
	$elements_list1_tab['select']['main_page'][$key]=$value;
}

/*
foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['ban_cat'][$key]=$value;
}
*/

//element for width
$elements_list1_tab['width']['title']='30';
$elements_list1_tab['width']['news_categoryid']='30';
$elements_list1_tab['width']['state']='10';
$elements_list1_tab['width']['score']='10';
$elements_list1_tab['width']['ban_main']='5';
$elements_list1_tab['width']['ban_cat']='5';
$elements_list1_tab['width']['main_page']='5';
//$elements_list1_tab['width']['ban_cat']='5';

//element for filters
$elements_list1_tab['filter']['title']='text';
$elements_list1_tab['filter']['news_categoryid']='multiselect';
$elements_list1_tab['filter']['state']='select';
$elements_list1_tab['filter']['score']='select';
$elements_list1_tab['filter']['ban_main']='select';
$elements_list1_tab['filter']['ban_cat']='select';
$elements_list1_tab['filter']['main_page']='select';
//$elements_list1_tab['filter']['ban_cat']='select';

//element for sort
$elements_list1_tab['sort']['title']=1;
$elements_list1_tab['sort']['state']=1;
$elements_list1_tab['sort']['score']=1;
$elements_list1_tab['sort']['ban_main']=1;
$elements_list1_tab['sort']['ban_cat']=1;
$elements_list1_tab['sort']['main_page']=1;
//$elements_list1_tab['sort']['ban_cat']=1;

$default_sort1='createtime';
$default_sort2='DESC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['title']='Title';
$elements_details1_tab['name']['alternate_title']='Alternate title';
$elements_details1_tab['name']['publication_date']='Publication date';
$elements_details1_tab['name']['publication_time']='Publication time';
$elements_details1_tab['name']['news_categoryid']='Category';
$elements_details1_tab['name']['state']='State';
$elements_details1_tab['name']['score']='Score';
$elements_details1_tab['name']['ban_main']='Banner Main Page';
$elements_details1_tab['name']['ban_cat']='Banner News List';
$elements_details1_tab['name']['main_page']='Display on Main Page';
//$elements_details1_tab['name']['ban_cat']='Banner Main Category';
$elements_details1_tab['name']['description']='Content';
$elements_details1_tab['name']['descriptionshort']='Leader';
$elements_details1_tab['name']['movie']='Movie';

$elements_details1_tab['type']['title']='text';
$elements_details1_tab['type']['alternate_title']='text';
$elements_details1_tab['type']['publication_date']='date';
$elements_details1_tab['type']['publication_time']='text';
$elements_details1_tab['type']['news_categoryid']='multiselect';
$elements_details1_tab['type']['state']='select';
$elements_details1_tab['type']['score']='select';
$elements_details1_tab['type']['ban_main']='select';
$elements_details1_tab['type']['ban_cat']='select';
$elements_details1_tab['type']['main_page']='select';
//$elements_details1_tab['type']['ban_cat']='select';
$elements_details1_tab['type']['description']='wysywig';
$elements_details1_tab['type']['descriptionshort']='wysywig';
$elements_details1_tab['type']['movie']='wysywig';

//select values
$query = "SELECT * FROM news_categories WHERE parentid=0 ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['news_categoryid'][$row['news_categoryid']]=$row['name'];
	$query1 = "SELECT * FROM news_categories WHERE parentid='".$row['news_categoryid']."' ORDER BY position ASC";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {		
		$elements_details1_tab['select']['news_categoryid'][$row1['news_categoryid']]='&nbsp;&nbsp;&nbsp;-&nbsp;'.$row1['name'];
	}
}

foreach ($score_tab as $key => $value) {
	$elements_details1_tab['select']['score'][$key]=$value;
}

foreach ($news_state_tab as $key => $value) {
	$elements_details1_tab['select']['state'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['ban_main'][$key]=$value;
}

foreach ($on_main_age_display_tab as $key => $value) {	
	$elements_details1_tab['select']['main_page'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['ban_cat'][$key]=$value;
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
//$page_settings_tab['translations']=1;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=0;

//translations settings
$elements_details1_tab['translations']['title']=1;
$elements_details1_tab['translations']['description']=1;

@include_once('php/elements/structure_basic.php');





































?>