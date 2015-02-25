<?php

@include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='main_page_boxes_elements';
$table_key='main_page_boxes_elementid';
$view_name1='Main page boxes elements';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

/*
main_page_boxes_elementid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
main_page_boxid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
newsid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements on list
$elements_list1_tab['name']['newsid']='Name';
$elements_list1_tab['name']['main_page_boxid']='Box';
$elements_list1_tab['name']['active']='Active';

$elements_list1_tab['type']['newsid']='select';
$elements_list1_tab['type']['main_page_boxid']='select';
$elements_list1_tab['type']['active']='select';

//select values
$query = "SELECT * FROM news WHERE main_page>0 ORDER BY title ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['newsid'][$row['newsid']]=$row['title'];
}

$query = "SELECT * FROM main_page_boxes ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['main_page_boxid'][$row['main_page_boxid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_list1_tab['select']['active'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['newsid']='60';
$elements_list1_tab['width']['main_page_boxid']='20';
$elements_list1_tab['width']['active']='10';
//$elements_list1_tab['width']['ban_cat']='5';

//element for filters
$elements_list1_tab['filter']['newsid']='text';
$elements_list1_tab['filter']['main_page_boxid']='select';
$elements_list1_tab['filter']['active']='select';
//$elements_list1_tab['filter']['ban_cat']='select';

//element for sort
$elements_list1_tab['sort']['newsid']=1;
$elements_list1_tab['sort']['main_page_boxid']=1;
$elements_list1_tab['sort']['active']=1;
//$elements_list1_tab['sort']['ban_cat']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['newsid']='name';
$elements_details1_tab['name']['main_page_boxid']='Box';
$elements_details1_tab['name']['active']='Active';
$elements_details1_tab['name']['main_page_position']='Display on';
$elements_details1_tab['name']['display_type']='Display type';
$elements_details1_tab['name']['display_size']='Display size';

$elements_details1_tab['type']['newsid']='select';
$elements_details1_tab['type']['main_page_boxid']='select';
$elements_details1_tab['type']['active']='select';
$elements_details1_tab['type']['main_page_position']='select';
$elements_details1_tab['type']['display_type']='select';
$elements_details1_tab['type']['display_size']='select';

//select values
$query = "SELECT * FROM news WHERE main_page>0 ORDER BY title ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	/*
	$query1 = "SELECT * FROM main_page_boxes_elements WHERE newsid='".$row['newsid']."'";
	$result1 = @mysql_query($query1);
	$test1 = mysql_num_rows($result1);
	
	if ($test1 == 0) {
	}
	*/
	$elements_details1_tab['select']['newsid'][$row['newsid']]=$row['title'];
}

$query = "SELECT * FROM main_page_boxes ORDER BY position ASC";
$result = @mysql_query ($query);
$news_categories_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['main_page_boxid'][$row['main_page_boxid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_details1_tab['select']['active'][$key]=$value;
}

foreach ($main_page_position_tab as $key => $value) {
	$elements_details1_tab['select']['main_page_position'][$key]=$value;
}

foreach ($main_page_display_type_tab as $key => $value) {
	$elements_details1_tab['select']['display_type'][$key]=$value;
}

foreach ($main_page_display_size_tab as $key => $value) {
	$elements_details1_tab['select']['display_size'][$key]=$value;
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