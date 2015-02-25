<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='competitions_answers';
$table_key='competitions_answerid';
$view_name1='Answers';

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
//competitions_answerid 	competitionid 	userid 	position 	name 	createtime 	lastactiontime
$elements_list1_tab['name']['name']='Answer';
$elements_list1_tab['name']['competitionid']='Competition';
$elements_list1_tab['name']['userid']='User';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['competitionid']='select';
$elements_list1_tab['type']['userid']='bigselect';

$query = "SELECT * FROM competitions ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['competitionid'][$row['competitionid']]=$row['name'];
}

$elements_list1_tab['bigselect']['userid']['tabname']='users';
$elements_list1_tab['bigselect']['userid']['disname']='name';

//element for width
$elements_list1_tab['width']['name']='30';
$elements_list1_tab['width']['competitionid']='30';
$elements_list1_tab['width']['userid']='30';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['competitionid']='select';
$elements_list1_tab['filter']['userid']='bigselect';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['active']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Answer';
$elements_details1_tab['name']['competitionid']='Competition';
$elements_details1_tab['name']['userid']='User';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['competitionid']='select';
$elements_details1_tab['type']['userid']='bigselect';

$query = "SELECT * FROM competitions ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['competitionid'][$row['competitionid']]=$row['name'];
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