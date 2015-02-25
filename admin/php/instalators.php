<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='instalators';
$table_key='instalatorid';
$view_name1='Instalators';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
//$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['company']='Company';
$elements_list1_tab['name']['city']='City';
$elements_list1_tab['name']['email']='E-mail';
$elements_list1_tab['name']['website']='Website';

//$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['company']='text';
$elements_list1_tab['type']['city']='text';
$elements_list1_tab['type']['email']='text';
$elements_list1_tab['type']['website']='text';

//element for width
//$elements_list1_tab['width']['name']='18';
$elements_list1_tab['width']['company']='22';
$elements_list1_tab['width']['city']='22';
$elements_list1_tab['width']['email']='22';
$elements_list1_tab['width']['website']='22';

//element for filters
//$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['company']='text';
$elements_list1_tab['filter']['city']='text';
$elements_list1_tab['filter']['email']='text';
$elements_list1_tab['filter']['website']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['company']=1;
$elements_list1_tab['sort']['city']=1;
$elements_list1_tab['sort']['email']=1;
$elements_list1_tab['sort']['website']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

/*
instalatorid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
name 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
company 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
adress 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
phone 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
mobile 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
email 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
website 	varchar(255) 	latin1_swedish_ci 		Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
createtime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
lastactiontime 	datetime 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/

//elements for details
//$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['company']='Company';
$elements_details1_tab['name']['county']='County';
$elements_details1_tab['name']['city']='City';
$elements_details1_tab['name']['adress']='Adress';
$elements_details1_tab['name']['phone']='Phone';
$elements_details1_tab['name']['mobile']='Mobile';
$elements_details1_tab['name']['email']='E-mail';
$elements_details1_tab['name']['website']='Website';

//$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['company']='text';
$elements_details1_tab['type']['county']='select';
$elements_details1_tab['type']['city']='text';
$elements_details1_tab['type']['adress']='text';
$elements_details1_tab['type']['phone']='text';
$elements_details1_tab['type']['mobile']='text';
$elements_details1_tab['type']['email']='text';
$elements_details1_tab['type']['website']='text';

foreach ($wojewodztwa_tab as $key => $value) {
	$elements_details1_tab['select']['county'][$key]=$value;	
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['attachments']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//extra tables connected

/*
clients_contactid 	int(10) 		UNSIGNED 	No 	None 	AUTO_INCREMENT 	Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
position 	int(11) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
positionname 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
name 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
phone 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
email 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
createtime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
lastactiontime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
*/

include_once('php/elements/structure_basic.php');





































?>