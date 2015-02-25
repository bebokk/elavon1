<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='properties_users';
$table_key='properties_userid';
$view_name1='Properties user';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['propertieid']='Property';
$elements_list1_tab['name']['userid']='User';

$elements_list1_tab['type']['propertieid']='select';
$elements_list1_tab['type']['userid']='select';

//select values
$query = "SELECT * FROM properties ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	//get property name
	if ($row['num_bed'] > 0) {
		$elements_list1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_list1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['propertieid']='45';
$elements_list1_tab['width']['userid']='45';

//element for filters
$elements_list1_tab['filter']['propertieid']='select';
$elements_list1_tab['filter']['userid']='select';

//element for sort
$elements_list1_tab['sort']['propertieid']=1;
$elements_list1_tab['sort']['userid']=1;

/*
properties_userid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
propertieid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
userid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['propertieid']='Property';
$elements_details1_tab['name']['userid']='User';

$elements_details1_tab['type']['propertieid']='select';
$elements_details1_tab['type']['userid']='select';

//select values
$query = "SELECT * FROM properties ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	//get property name
	if ($row['num_bed'] > 0) {
		$elements_details1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_details1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

@include_once('php/elements/structure_basic.php');





































?>